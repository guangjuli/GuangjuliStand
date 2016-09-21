<?php

namespace Ads\Pm\Traits;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:39
 * ajax返回部件
 */

trait Data
{

    private $cachepath = __DIR__;

    /**
     * @param $key
     */
    public function get($key)
    {
        if (!preg_match('/^[0-9a-zA-Z._]+$/',$key))
        {
            halt('\Ads\Pm\Traits\Data::get Data Key error');
        }
        $file = $this->cachepath = __DIR__.'/../Data/'.$key.'.data';
        if(is_file($file)){
            $nr = @file_get_contents($file);
        }else{
            $nr = '';
        }
        $nr = json_decode($nr,true);
        return $nr;
    }

    public function set($key,$value)
    {
        if (!preg_match('/^[0-9a-zA-Z._]+$/',$key))
        {
            halt('\Ads\Pm\Traits\Data::set Data Key error');
        }
        $file = $this->cachepath = __DIR__.'/../Data/'.$key.'.data';
        $value = json_encode($value);
        @file_put_contents($file,$value);
        return true;
    }


}
