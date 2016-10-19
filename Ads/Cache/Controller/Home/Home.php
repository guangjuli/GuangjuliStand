<?php
namespace Ads\Cache\Controller\Home;

class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

//    public function doIndex(){
//    }
//
//    public function doDet(){
//        return server('Smarty')->ads('group/home/index')->fetch('',[
//        ]);
//    }

    /**
     * 该ads是否设置了缓存
     */
    public function doIsCacheAble($ads = ''){

    }

    /**
     * @param string $ads
     * 获取缓存
     */
    public function doGetCache($ads = '',$params = []){

    }

    /**
     * @param string $ads
     * 设置缓存
     */
    public function doSetCache($ads = '',$params = []){

    }

    /**
     * @param string $ads
     * 是否已经缓存
     */
    public function doIsCache($ads = '',$params = []){

    }


}
