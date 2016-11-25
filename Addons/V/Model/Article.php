<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-25
 * Time: 9:33
 */

namespace Addons\Model;


class Article {

    private $articleAddress='/article/home/page/';

    //获取分类id
    public function category($type){
        $choose = '';
        switch($type){
            case 'tuijian':
                $choose = '推荐';
                break;
            case 'redian':
                $choose = '热点';
                break;
            case 'yufang':
                $choose = '预防';
                break;
            case 'yinshi':
                $choose = '饮食';
                break;
            case 'yundong':
                $choose = '运动';
                break;
            case 'yongyao':
                $choose = '用药';
            default:
                break;
        }
        $categoryId = server('Db')->getOne("select categoryId from category where title = '{$choose}'");
        return $categoryId;
    }

    //获取文章收藏id列
    public function myArticleCollect($userId)
    {
        $sc = server('Db')->getOne("SELECT guid FROM `articlesc` where uid = {$userId}");
        $sc = $sc?unserialize($sc):[];
        return array_unique($sc);
    }

    //获取文章列表
    public function getArticleList($page,$count)
    {
        $userId = intval(bus('tokenInfo')['userId']);
        $category = $this->category(req('Post')['type']);
        $where = "categoryId = '$category'";
        //检索数据
        $rc = server('Db')->getAll("select * from article where $where order by articleId desc limit {$page},{$count}");

        $mc = [];
        $v  = [];
        if($rc){
            //收藏夹
            $sc = $this->myArticleCollect($userId);
            foreach($rc as $key=>$value){
                unset($v);

                $v['title']         = $value['title'];
                $v['summary']       = strip_tags($value['subtitle']);
                $v['image']         = $value['thumb'];
                $v['articled']      = $value['articleId'];
                $v['readcount']     = $value['views'];
                $v['createAt']  = $value['createAt'];
                $v['source']        = $value['source'];

                if(in_array($value['articleId'],$sc)){
                    $v['collect'] = 'YES';
                }else{
                    $v['collect'] = 'NO';
                }
                array_push($mc,$v);
            }
        }
        return $mc;
    }

    //文章的收藏
    public function articleCollect($articleId)
    {
        $userId = intval(bus('tokenInfo')['userId']);
        $guid = server('db')->getOne("select guid from articlesc where uid = '$userId'");
        if($guid){
            $gu = array_unique(unserialize($guid));
            if(in_array($articleId,$gu)){
                $gu = array_diff($gu,[$articleId]);
            }else{
                array_push($gu,$articleId);
            }
            $re['guid'] = saddslashes(serialize($gu));
            server('db')->autoExecute('articlesc',$re,'UPDATE',"uid = '$userId'");
        }else{
            $re['uid'] = $userId;
            $re['guid'] = serialize([$articleId]);
            server('db')->autoExecute('articlesc',$re,'INSERT');
        }
    }

    //获取文章收藏详情
    public function getMyCollect($userId)
    {
        $sc = $this->myArticleCollect($userId);
        $sc = $sc?:[];
        $mc = [];
        if(!empty($sc)){
            $scstr = implode(',',$sc);
            $where = "articleId in($scstr)";
            //检索数据
            $rc = server('db')->getAll("select title,subtitle,thumb,articleId,createAt,views from article where $where order by articleId desc  ");
            $v  = [];
            if($rc){
                foreach($rc as $key=>$value){
                    unset($v);
                    $v['title']         = $value['title'];
                    $v['summary']      = strip_tags($value['subtitle']);
                    $v['image']        = $value['thumb'];
                    $v['article']      = $this->address($value['articleId']);
                    $v['articleId']         = $value['articleId'];
                    $v['collect']      = 'YES';
                    $v['createAt']  = $value['createAt'];
                    $v['readcount']       = $value['views'];
                    array_push($mc,$v);
                }
            }
        }
        return $mc;
    }

    //设置文章的地址
    private function address($articleId)
    {
        $target = $this->articleAddress.$articleId;
        $address = model('Upload')->isAbsolutePath($target);
        return $address;
    }

}