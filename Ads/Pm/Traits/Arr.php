<?php

namespace Ads\Pm\Traits;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:39
 * ajax返回部件
 */

trait Arr
{

    /**
     * 针对字符型存储的数据,进行字符和数组转换函数
     * 切分字符默认为 "\n"
     *
     */
    public function getArr($str,$chr="\n")
    {
        $arr = explode($chr,$str);
        foreach($arr as $key=>$value){
            $value = trim($value);
            if(empty($value)){
                unset($arr[$key]);
            }else{
                $arr[$key] = $value;
            }
        }
        return $arr;
    }

    public function getStr($arr,$chr="\n")
    {
        return implode($chr,$arr);
    }

}
