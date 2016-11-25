<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-06
 * Time: 14:19
 */

namespace Addons\Controller;


class Article extends BaseController
{
    use \Addons\Traits\AjaxReturn;

    public function __construct()
    {
        parent::__construct();
    }

    //文章的收藏
    public function doArticlecollectPost()
    {
        $articleId = intval(req('Post')['articleId']);
        model('Article')->articleCollect($articleId);
        $this->AjaxReturn([
            'code'  => 200
        ]);
    }

    //获取我的收藏
    public function doMycollectPost()
    {
        $userId = intval(bus('tokenInfo')['userId']);
        $mc = model('Article')->getMyCollect($userId);
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'succeed',
            'data'=>$mc,
        ]);
    }

    //文章列表
    public function doArticlelistPost(){
        $page       = intval(req('Post')['page'])-1;
        $count      = intval(req('Post')['count']);
        $mc = model('Article')->getArticleList($page,$count);
        $this->AjaxReturn([
            'data' => $mc
        ]);
    }




    //---------------------------------------------------------------------------未用

    //知识列表文章详情     未用
    public function doKnowledge_details(){
        $userId = intval(bus('tokenInfo')['userId']);
        $articleId = intval(req('Post')['articleId']);
        //增加浏览量
        server('db')->query("update `article` set `views`=`views`+1 where articleId = {$articleId}");
        //获取文章详情
        $article = server('db')->getRow("SELECT * FROM `article` where articleId = {$articleId}");
        //获取收藏
        $sc = server('db')->getOne("SELECT guid FROM `articlesc` where uid = {$userId}");
        $sc = $sc?unserialize($sc):[];
        $sc = array_unique($sc);
        $rc = [];
        if($article){
            //-----------------------------------------------------
            if(in_array($article['articleId'],$sc)){
                $article['collect'] = 'YES';
            }else{
                $article['collect'] = 'NO';
            }
            //渲染一下,进行输出
            $rc['knowledge_title']      = $article['title'];
            $rc['knowledge_article']    = $this->articleSource.$article['articleId'];
            $rc['knowledge_publishtime']= $article['createAt'];
            $rc['knowledge_collect']    = $article['collect'];
            $rc['knowledge_guid']       = $article['articleId'];
            $rc['knowledge_image']      = $article['thumb'];
            $rc['knowledge_summary']    = $article['subtitle'];
            $rc['knowledge_views']      = $article['views'];
        }
        $this->AjaxReturn([
            'data'=>$rc,
        ]);
    }

    //控糖首页的文章推荐
    //已经弃用
    public function doControlrecommend(){
//        $info = M('user')->infoByLogin(req('Get')['login']);
//        $uid        = intval($info['userId']);
        $uid = M('token')->get()->userId();

        //收藏夹
        $sc = sapp('db')->getone("SELECT guid FROM `articlesc` where uid = '$uid'");
        $sc = $sc?unserialize($sc):[];
        $sc = array_unique($sc);

        //检索数据
        $rc = sapp('db')->getall("select * from article where push = 1 order by articleId desc limit 4  ");

        $mc = [];
        $v  = [];
        if($rc){
            foreach($rc as $key=>$value){
                unset($v);

                $v['title']         = $value['title'];
                $v['summary']       = strip_tags($value['subtitle']);
                $v['image']         = $value['thumb'];
                $v['guid']          = $value['articleId'];
                $v['readcount']     = $value['views'];
                $v['publish_time']  = $value['createAt'];

                if(in_array($value['articleId'],$sc)){
                    $v['collect'] = 'YES';
                }else{
                    $v['collect'] = 'NO';
                }
                array_push($mc,$v);
            }
        }
        $this->AjaxReturn([
            'data' => $mc
        ]);
    }


}