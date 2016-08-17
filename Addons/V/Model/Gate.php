<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 10:54
 */

namespace Addons\Model;


class Gate
{
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