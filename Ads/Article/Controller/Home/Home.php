<?php

namespace Addons\Controller;

/*
 * 所有设备都是管理员所在机构的设备
 */

class Home extends BaseController {
//



    public function doArticleEdit($params = 0){
        $params = intval($params);

        $res = server('db')->getrow("SELECT * FROM `article` where articleId = $params");
        //D($row);

        view('',[
            'res' => $res,
        ]);
    }

    public function doPreView($params = 0){
        $params = intval($params);

        $res = server('db')->getrow("SELECT `content` FROM `article` where articleId = $params");
        //D($row);

        view('',[
            'res' => $res,
        ]);
    }


    public function doIndexPost()
    {
        $file = $_FILES['thumb'];
        $res = req('Post');
        $info = 0;
        if($res['act']=="addnew"||$res['act']=="update") {
            //参数
            if($file['name']){
                $res['thumb'] = M('upload')->UserImage($file);
            }
            if($res['act']=="addnew") {
                $info = 1;
            }
            $content = $res['content'];
            $arr = explode("<img", $content);
            $newContent = "";
            for ($i = 0; $i < count($arr) - 1; $i++) {
                $newContent .= $arr[$i] . "<img class=\"img-responsive\"";
            }
            //数据
            $res['content'] = $newContent . end($arr);
            req('Post',$res);
        }  //修改数据库
        M('form')->set([
            'table'     =>'article',
            'idfield'   =>'articleId',
        ])->get()->run();
        if($info==1) {
            echo "<SCRIPT LANGUAGE=\"javascript\">location.href=' '</SCRIPT>";
            return;
        }
        $this->AjaxReturn();
    }

    /*
     * 列表显示
     */
    public function doIndex($params = 0){
        $params = intval($params);
        //ruleLib不再管理范围之内,交给专门的程序去处理
        $where = 1;						//去除无效的
        if($_COOKIE['set_get_list'])	$where .= " and active != 0";
        $where .= " and categoryId = $params";

        $res =server('db')->getAll("select * from  article where $where order by sort desc,articleId desc");


        view('',[
            //分类数据
            'categorymap' => server('db')->getmap("select categoryId,title from category"),
            'categoryId'    =>$params,
            //文章列表
            'res' => $res,
        ]);
    }


}

