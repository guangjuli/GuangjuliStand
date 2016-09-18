<?php
namespace Ads\Pm\Controller\Html;

class Html  {

    use \Ads\Pm\Traits\Data;
    use \Ads\Pm\Traits\Arr;
    use \Ads\Pm\Traits\PostRequest;
    use \Ads\Pm\Traits\AjaxReturnHtml;

    public function __construct(){
    }
    public function doIndex()
    {

    }
    /**
     * 安装菜单
     */
    public function doInmenu()
    {
        $chr = req('Get')['chr'];
        $menuads  = strtolower($chr)."/home/menu";
        $menu     = adsdata($menuads);
        //基础    Package
        //D($menu);
        if(!empty($menu)){

            $pid = server('db')->getone("select menuId from menu where package =  'Package' and parentid = 0");
            server('db')->query("delete from menu where package =  '".ucfirst($chr)."'");
            foreach($menu as $key=>$value){
                $res = [
                    'package'   => ucfirst($chr),
                    'title'     => $value['title'],
                    'des'       => $value['des'],
                    'ads'       => $value['ads'],
                    'icon'      => 'glyphicon glyphicon-home',
                    'parentId'  => $pid,
                    'hidden'    => $value['hidden'],
                    'sort'      => intval($value['sort']),
                    'active'    => '0',
                ];
                //D($res);
                server('db')->autoExecute('menu',$res,"INSERT");
                $_pid = server('db')->insert_id();
                $child = $value['child'];
                if(!empty($child)){
                    foreach($child as $k=>$v){
                        $_res = [
                            'package'   => ucfirst($chr),
                            'title'     => $v['title'],
                            'des'       => $v['des'],
                            'ads'       => $v['ads'],
                            'icon'      => 'glyphicon glyphicon-home',
                            'parentId'  => $_pid,
                            'hidden'    => $v['hidden'],
                            'sort'      => intval($v['sort']),
                            'active'    => '0',
                        ];
                        server('db')->autoExecute('menu',$_res,"INSERT");
                    }
                }
            }
        }
        $this->AjaxReturn([
            'url'=>'/man/?/pm/html/list'
        ]);
    }

    /*
    public function doUp()
    {
        $url = 'http://gst.so/Up.php';
        $chr = req('Get')['chr'];
        $zipfile = APPROOT."../Ads/".ucfirst($chr)."/".ucfirst($chr).".zip";
        if(is_file($zipfile)){
            $zip = base64_encode(file_get_contents($zipfile));
            $strlen = strlen($zip);


            //基本信息 depend
            //基本信息 版本
            $depend     = strtolower($chr)."/home/depend";
            $version    = strtolower($chr)."/home/version";
            $depend     = adsdata($depend);
            $version    = adsdata($version);

            $data = [
                'adschr'=> ucfirst($chr),
                'zip'   => $zip,
                'strlen'=> $strlen,
                'version'=> $version,
                'depend'=> $depend
            ];
            //上传
            $res =         $this->post_request($url,$data);
//            D($res);
        }
        R('/man/?/pm/html/index');
    }
*/

    public function doList(){
        $list = $this->getArr($this->get('pmsetup'));
        $dir = [];
        $file = [];
        $zip = [];
        //1 检查文件夹是否存在,
        //2 检查lock文件是否存在
        foreach($list as $key=>$value){
            $_dir  = APPROOT."../Ads/$value/";
            $_file = APPROOT."../Ads/$value/Install.lock";
            $_zip = APPROOT."../Ads/$value/".ucfirst($value).".zip";
            $dir[$value] = is_dir($_dir);
            $file[$value] = is_file($_file);
            $zip[$value] = is_file($_zip);
        }

        return  server('Smarty')->ads('pm/html/List')->fetch('',[
            'list' => $list,
            'dir'  => $dir,
            'file' => $file,
            'zip' => $zip,
        ]);
    }

    public function doSetupPost()
    {
        $pmsetup = $this->getStr($this->getArr(req('Post')['pmsetup']));
        $this->set('pmsetup',$pmsetup);
        R('/man/?pm/html/setup');
    }

    public function doSetup(){
        return  server('Smarty')->ads('pm/html/setup')->fetch('',[
            'pmsetup' => $this->get('pmsetup')
        ]);
    }

    public function doGuisetupPost()
    {
        $res = [
            'Breadcrumb' => intval(req('Post')['Breadcrumb']),
            'Tip' => intval(req('Post')['Tip']),
            'Footer' => intval(req('Post')['Footer']),
        ];
        //保存
        application('data')->set('AdminGuiConfig', $res);

        R("/man/?/pm/html/guisetup");
    }

    public function doGuisetup(){
        $config = application('data')->get('AdminGuiConfig');
        return  server('Smarty')->ads('pm/html/guisetup')->fetch('',[
            'pmsetup'   => $this->get('pmsetup'),
            'config'    => $config
        ]);
    }




}
