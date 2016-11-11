<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-01
 * Time: 16:37
 */
namespace Ads\Queue\Traits;

trait Log
{
    private $path='../Cache/Timedtask/';

    /**
     * @param $key
     */
    public function get($key)
    {
        if (!preg_match('/^[0-9a-zA-Z._]+$/',$key))
        {
            halt('\Ads\Pm\Traits\Data::get Data Key error');
        }
        $file = $this->path.$key.'.data';
        if(is_file($file)){
            $nr = @file_get_contents($file);
        }else{
            $nr = '';
        }
        $nr = unserialize($nr);
        return $nr;
    }

    public function set($key,$value)
    {
        if (!preg_match('/^[0-9a-zA-Z._]+$/',$key))
        {
            halt('\Ads\Pm\Traits\Data::set Data Key error');
        }
        $file = $this->path.$key.'.data';
        $value = serialize($value)."\n";
        $handle=fopen($file,"a+");
        @fwrite($handle,$value);
        fclose($handle);
        return true;
    }
}