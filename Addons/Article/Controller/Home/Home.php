<?php

namespace Addons\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }


    //根据情况进行跳转
    public function doPage($params){
        $id = intval($params);
        $sql = "SELECT title,content FROM `article` where articleId = $id ";
        $article = server('db')->getrow($sql);
        $sql = "update article set views = views+1 where articleId = $id ";
        server('db')->query($sql);
        View('',[
            'article' => $article
        ]);
    }
    //根据情况进行跳转
    public function doShare($params){
        $id = intval($params);
        $sql = "SELECT title,createAt,content FROM `article` where articleId = $id ";
        $article = server('db')->getrow($sql);
        View('',[
            'article' => $article
        ]);
    }


    //根据情况进行跳转
    public function doXieyi($id = 0){
        View('',[
        ]);
    }


}
