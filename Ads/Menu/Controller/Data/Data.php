<?php
namespace Ads\Menu\Controller\Data;

class Data {

    private $baseurl = '/man/';

    private $ads = '';
    private $menu = [];        //当前菜单
    private $menuId = 0;        //当前菜单id
    private $menuList = 0;      //菜单列表[所有]

    private $parendId = 0;  //父菜单ID
    private $topId = 0;     //主菜单ID

    public function __construct()
    {
        $this->ads = req('Ads');
        $this->menuList = server('db')->getall("SELECT * FROM `menu` order by sort desc,menuId desc", 'menuId');
        //对active进行计算
        foreach ($this->menuList as $key => $value) {
            if ($value['ads'] == $this->ads) {
                $this->menuId = $value['menuId'];
            }
        }

        //parent id
        $parendid = $this->menuList[$this->menuId]['parentId'];

        //top id
        $topid = $this->menuList[$this->menuList[$this->menuId]['parentId']]['parentId'];

        if ($this->menuId) {
            $this->menuList[$this->menuId]['active'] = 1;
        }
        if ($parendid) {
            $this->parendId = $parendid;
            $this->menuList[$parendid]['active'] = 1;
        }
        if ($topid) {
            $this->topId = $topid;
            $this->menuList[$topid]['active'] = 1;
        }
        $this->menu = $this->menuList[$this->menuId];
    }

    /**
     * 选择菜单的时候要用
     */
    public function doMenc($id = 0) //排除掉本菜单和下级菜单   - 三级 显示所有 二级 显示一级和二级 一级 显示一级和二级
    {
        //首先对本id 进行处理
        $level = 1;
        $res = $res2 = [];
        if($id){
            //计算本id层级
            $res = server('db')->getcol("select menuId from menu where parentId =$id");
            if(empty($res)){
                $level = 1;

                //所有的,除了本id

            }else{
                //发现有子目录
                //检查子菜单有没有子菜单
                $res2 = server('db')->getcol("select menuId from menu where parentId in(select menuId from menu where parentId =$id)");
                if(empty($res2)){
                    $level = 2;
                    //所有的,一级二级的二级的

                }else {
                    $level = 3;
                    //不能更改了,
                }
            }
        }
        //获得level
        $list = $this->menuList;
        $____dis[0] = '顶级菜单';
        if($level == 1){
            //所有的,除了自己id
            if(!empty($id))unset($list[$id]);
            foreach($list as $key=>$value){
                if($value['parentId'] ==0){
                    $____dis[$key] = "　|---".$value['title'];
                    foreach($list as $k=>$v) {
                        if($value['menuId'] == $v['parentId']) {
                            $____dis[$k] = "　　|---".$v['title'];
                        }
                    }
                }
            }
        }
        if($level == 2){
            //有子菜单
            //所有的,除了自己id
            unset($list[$id]);
            foreach($list as $key=>$value){
                if($value['parentId'] ==0){
                    $____dis[$key] = "|---".$value['title'];
                }
            }
        }
        //echo $level;
        return $____dis;
    }

        /**
     * 第三层平行菜单
     * 要跟当前同级
     * 第三集合
     */
    public function doMenuLevelThree()
    {
        $MenuLevelThree = [];

        if(empty($this->parendId)){
            //定位到第一季菜单
        }else{
            //定位到第二级菜单
            if(empty($this->topId)) {
                foreach($this->menuList as $key => $value){
                    if ($value['parentId'] == $this->menuId) {
                        $MenuLevelThree[] = $value;
                    }
                }
            }else{
                //定位到三级菜单
                foreach($this->menuList as $key => $value){
                    if ($value['parentId'] == $this->parendId) {
                        $MenuLevelThree[] = $value;
                    }
                }
            }
        }
        return $MenuLevelThree;
    }

    /**
     * 顶级菜单下面的二级菜单
     */
    public function doMenuSec()
    {
        $top = $this->doMenuTop();
        $topc = [];
        foreach ($top as $key => $value) {
            foreach ($this->menuList  as $k => $v) {
                if ($v['parentId'] == $value['menuId']) {
                    $topc[$key][] = $v;
                }
            }
        }
        return $topc;
    }

    /**
     * @return array
     * 顶级菜单
     */
    public function doMenuTop()
    {
        $res = [];
        foreach ($this->menuList as $key => $value) {
            if ($value['parentId'] == 0) {
                $res[$key] = $value;
            }
        }
        return $res;
    }

    public function doMenu()
    {
        return $this->menu;
    }

    public function doList()
    {
        return $this->menuList;
    }

    public function doTopId()
    {
        return $this->topId;
    }

    public function doParendId()
    {
        return $this->parendId;
    }

    public function doMenuId()
    {
        return $this->menuId;
    }


    /**
     * ===============================================
     * @return int
     * Widget调用的系列数据
     * ===============================================
     */

    public function doBreadcrumb()
    {
        //$base = adsdata('data/define/AdminBase');
        $base = $this->baseurl;
        $res = [
            'top' => $this->menuList[$this->topId],
            'parent'=> $this->menuList[$this->parendId],
            'menu' => $this->menuList[$this->menuId],
        ];
        if($res['top']) $res['top']['path'] = $base.'?'.$res['top']['ads'];
        if($res['parent']) $res['parent']['path'] = $base.'?'.$res['parent']['ads'];
        if($res['menu']) $res['menu']['path'] = $base.'?'.$res['menu']['ads'];
        return $res;
    }

    public function doNavLevelThree()
    {
        //$base = adsdata('data/define/AdminBase');
        $base = $this->baseurl;
        $res = $this->doMenuLevelThree();
        foreach($res as $key=>$value){
            $res[$key]['path'] = $base.'?'.$value['ads'];
        }
        return $res;
    }

    public function doWidgetNav()
    {
//        $base = adsdata('data/define/AdminBase');
        $base = '/man/';
        $base = $this->baseurl;
        $res = $this->doMenuTop();
        foreach($res as $key=>$value){
            $res[$key]['path'] = $base.'?'.$value['ads'];
        }
        return $res;
    }

    public function doWidgetNavLeft()
    {
       // $base = adsdata('data/define/AdminBase');
        $base = $this->baseurl;
        $res = $this->doMenuSec();

        //获取当前的顶级id
        $topid = $this->menuId;
        $topid = empty($this->parendId)?$topid:$this->parendId;
        $topid = empty($this->topId)?$topid:$this->topId;
        $res = $res[$topid];
        $res = $res?:[];
        foreach($res as $key=>$value){
            $res[$key]['path'] = $base.'?'.$value['ads'];
        }
        return $res;
    }



    //private

}
