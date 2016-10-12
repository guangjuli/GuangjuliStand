<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-12
 * Time: 15:30
 */

namespace Addons\Model;


class Batchinsert
{
    public function batchInsert(Array $req,$table,$userId)
    {
        //获取表的字段
        $field_names = server('Db')->getCol('DESC '.$table);
        if(empty($field_names)) return false;
        //待插入数据必须以数组的形式存在
        $firstData = current($req);   //插入字段是以第一个键值的键名为标准
        if(!is_array($firstData)||empty($firstData)) return false;
        //验证并拼装待插入字段
        $insertFields = array_keys($firstData);  //待插入字段组成的数组
        foreach($insertFields as $v){            //检查待插入字段存在性
            $v = trim(str_replace("'",'',$v));
            if(!in_array($v,$field_names)) return false;
        }
        $fields = '('.implode(',',$insertFields).')';
        $fields = str_replace("'",'`',$fields); // $fields待插入字段拼装成的字符串
        //拼装值组成的字符串
        $insert = array();
        foreach($req as $k=>$v){
            if(is_array($v)){
                if(empty(array_diff_assoc($insertFields,array_keys($v)))){
                    $valueArray = array_values($v);
                    $valueString = '';
                    foreach($valueArray as $value){
                        $valueString.="'".$value."',";
                    }
                    $insert[] = '('.rtrim($valueString,',').')';
                }
            }  //对不是数组，及字段同标准字段不一致的进行过滤
        }
        $insert = implode(',',$insert);   //由待插入数据拼装成的字符串
        if(empty($insert)) return false;
        //拼装sql语句
        $sql = "insert into {$table}{$fields}values{$insert}";
        $check = server('Db')->query($sql);
        return $check?true:false;
    }
}