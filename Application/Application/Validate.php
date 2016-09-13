<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 17:02
 */

namespace Application\Application;


use Grace\Base\ModelInterface;

class Validate implements ModelInterface
{
    public function depend()
    {
        return[

        ];
    }

    /**
     * 校验数字字母及位数
     * @param string $str
     * @param int $min
     * @param int $max
     * @return boolean
     */
    public function validateNumberLetter($str,$min=null,$max=null)
    {
        $min = $min?:5;
        $max = $max?:20;
        $preg = '/^[a-zA-Z]+[a-zA-Z0-9_]{'.$min.','.$max.'}$/';
        return (preg_match($preg,$str))?true:false;
    }

    public function validatePhone($str)
    {
        $mobile =' /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/';
        return (preg_match($mobile,$str))?true:false;
    }

    public function validateInt($int){
        $checkInt = '/^[1-9][0-9]*$/';
        return (preg_match($checkInt,$int))?true:false;
    }

    /**
     * 校验请求参数存在性和非空
     * @param array $field
     * @param array $req
     * @return boolean
     */
    public function validateParams(Array $field,Array $req)
    {
        if(!$this->isExistParams($field,$req))return false;
        if(!$this->isEmpty($req))return false;
        return true;
    }

    /**
     * 验证数组中是否存在空值
     * @param array $array
     * @return boolean
     */
    public function isEmpty(Array $array)
    {
        if(!is_array($array))return false;
        $counts = count($array);
        $zeroNum = array_count_values($array)[0];
        $newReq = array_filter($array);
        if($counts!=count($newReq)+$zeroNum)return false;
        return true;
    }

    /**
     * isExistParams
     * @param $field
     * @param $req
     * @return boolean
     */
    public function isExistParams(Array $field,Array $req)
    {
        foreach($field as $v){
            if(!array_key_exists($v,$req))return false;
        }
        return true;
    }

    /**
     * 检验请求参数数据类型是否正确
     * @param array $req
     * @param array $string
     * @param array $int
     * @param array $array
     * @return array
     */
    public function validateParamsType(Array $req,$string=[],$int=[],$array=[])
    {
        $result = array();
        if($string){
            foreach($string as $v){
                if(!is_string($req[$v]))$result[]=$v;
            }
        }
        if($int){
            foreach($int as $v){
                if(!is_int($req[$v]))$result[]=$v;
            }
        }
        if($array){
            foreach($array as $v){
                if(!is_array($req[$v]))$result[]=$v;
            }
        }
        return $result;
    }
}