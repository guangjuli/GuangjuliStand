<?php
/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/6/19
 * Time: 18:44
 */

namespace Addons\Model;


class Scan
{

    public function Run()
    {
        echo 123;
    }

    public function getFile($path = '')
    {
        if(is_dir($path)){
            $dp=dir($path);
            while($file=$dp->read()){
                if($file!='.'&& $file!='..'){
                    if(is_file($path.$file)) $data[] = $file;
                }
            }
            $dp->close();
        }
        return $data;
    }


    public function getList($path = '')
    {
        if(is_dir($path)){
            $dp=dir($path);
            while($file=$dp->read()){
                if($file!='.'&& $file!='..'){
                    if(is_dir($path.$file)) $data[] = $file;
                }
            }
            $dp->close();
        }
        return $data;
    }



    public function tree($dir)
    {


        $datatree = array();
        $basedir = $dir;
        $res = $this->get($dir,$datatree,$basedir);

return $res;
    }

//调用示例





    public function ScanDir($path,&$data)
    {
        if(is_dir($path)){
            $dp=dir($path);
            while($file=$dp->read()){
                if($file!='.'&& $file!='..'){
                    //$this->ScanDir($path.'/'.$file,$data);
                    if(is_dir($file)) $data[] = $file;
                }
            }
            $dp->close();
        }
        $data[]=$path;
    }



    function get($dir,$chr = ''){
        $dir = rtrim($dir,'/');

        //$chr 默认 目录 / json / md / all
        $data = array();
        $this->ScanDir($dir,$data);

//        $chr = 'JSON';
//        $chr = 'md';

        foreach($data as $key=>$value){
            $dee = ltrim(str_replace($dir,'',$value),'/');
            if($dee) $res[$key] = $dee;
        }

        return $res;
    }

}
