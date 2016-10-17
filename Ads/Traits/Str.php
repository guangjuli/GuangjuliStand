<?php

namespace Ads\Traits;

trait Str
{

    /**
     * 针对字符型存储的数据,进行字符和数组转换函数
     * 切分字符默认为 "\n"
     */
    private function find($find,$string)
    {
        if(empty($find) || empty($string)) return false;
        if(strpos($string,$find)===false){
            return false;
        }else{
            return true;
        }
    }

    private function cut($strb,$stre,$content){
        if(empty($strb) || empty($stre) || empty($content)) return '';
        $b= strpos($content,$strb);
        $content = substr($content,$b+strlen($strb),strlen($content)-strlen($strb));
        $c= strpos($content,$stre);
        $str = substr($content,0,$c);
        return $str;
    }

    private function cutof($strb,$stre,$content){
        if(empty($strb) || empty($stre) || empty($content)) return '';
        $b= strpos($content,$strb);
        $str1 = substr($content,0,$b+strlen($strb));

        $_content = substr($content,$b+strlen($strb),strlen($content)-strlen($strb));
        $c= strpos($_content,$stre);
        $str2 = substr($_content,$c,strlen($content)-strlen($stre));

        $str = $str1.$str2;
        return $str;
    }



}
