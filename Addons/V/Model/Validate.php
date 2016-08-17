<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 17:02
 */

namespace Addons\Model;


class Validate
{
    public function validateNumberLetter($str,$min=null,$max=null)
    {
        $min = $min?:6;
        $max = $max?:20;
        $preg = '/^[\s\S][a-zA-Z0-9_]{'.$min.','.$max.'}$/';
        return (preg_match($preg,$str))?true:false;
    }

    //校验请求参数存在性和非空
    public function validateParams($field=[],Array $req)
    {
        if(!$this->isExistParams($field,$req))return false;
        if(!$this->isEmpty($req))return false;
        return true;
    }

    //验证数组中是否存在空值
    public function isEmpty(Array $array)
    {
        if(!is_array($array))return false;
        $counts = count($array);
        $newReq = array_filter($array);
        if($counts!=count($newReq))return false;
        return true;
    }

    /**
     * isExistParams
     * @param $field
     * @param $req
     * @return boolean
     */
    public function isExistParams($field=[],Array $req)
    {
        if(!is_array($field)) return false;
        foreach($field as $v){
            if(!array_key_exists($v,$req))return false;
        }
        return true;
    }
}