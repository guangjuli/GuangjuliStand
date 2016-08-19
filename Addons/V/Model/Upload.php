<?php

namespace Addons\Model;



use Grace\Base\ModelInterface;

class Upload implements ModelInterface
{

    private $sizeLimit;
    private $fileExtName=array();
    private $savePath = '';
    public function __construct($config)
    {
        $this->sizeLimit = $config['sizeLimit'];
        $this->fileExtName =$config['fileExtName'];
        $this->savePath = $config['savePath'];
    }

    public function depend()
    {
        // TODO: Implement depend() method.
    }

    public function upload($file)
    {
        if (empty($file['name']))return -101;
        if($file['size'] >$this->sizeLimit) return -200;
        //拓展名
        $extName = pathinfo($file['name'], PATHINFO_EXTENSION);
        if(!in_array($extName, $this->fileExtName)) return -201;
        //生成目录和保存路径
        $directory = $this->savePath . date("Ym") . '/';
        if(!is_dir($directory))@mkdir($directory);
        $directory = $this->savePath . date("Ym") . '/' . date("d") . '/';
        if(!is_dir($directory))@mkdir($directory);
        $target_path = $directory . md5($file['name']. microtime() . rand(1000000, 9999999)) . '.' . $extName;
        //上传开始
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            $target_path = ltrim($target_path, '.');        //去掉左边的.
            $source  = $_SERVER['SERVER_NAME'];
            $path = 'http://'.$source.$target_path;
            return $path;
        } else {
            return -400;
        }
    }

    public function returnMsg(){
        return[
            -101    => 'Upload file not found!',
            -200    => 'The file extension is limited',
            -201    => 'file is too big!',
            -400    => 'Unknown error, please try again!',
            -202    =>'System Exception!',
            200     =>'Succeed'
        ];
    }
}
