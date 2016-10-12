<?php

namespace Ads\Traits;

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
    public function getArr($str = '',$chr="\n")
    {
        $str = (string)$str;
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
        $arr = (array)$arr;
        return implode($chr,$arr);
    }

    public function getMap($str,$chr="\n")
    {
        $str = (string)$str;
        $arr = explode($chr,$str);
        $res = [];      //结果集

        foreach($arr as $key=>$value){
            $value = trim($value);
            if(empty($value)){
                unset($arr[$key]);
            }else{
                $arr[$key] = $value;
            }
        }

        foreach($arr as $key=>$value){
            $ar = explode(':',$value);
            $res[trim($ar[0])] = trim($ar[1]);
        }
        return $res;
    }


}
