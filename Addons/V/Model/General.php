<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 13:51
 */

namespace Addons\Model;


class General implements \Grace\Base\ModelInterface
{
    //TODO : 需要下沉
    public function depend()
    {
        // TODO: Implement depend() method.
    }

    public function getByWhere($table,$field=[],$where='')
    {
        $field = $field?implode(',',$field):'*';
        $where = $where?$where:1;
        $sql = "select $field from $table where $where";
        $user = server('Db')->getAll($sql);
        $user = $user?$user:[];
        return $user;
    }

    public function getById($table,$field=[],$where='')
    {
        $field = $field?implode(',',$field):'*';
        $where = $where?$where:1;
        $sql = "select $field from $table where $where";
        $user = server('Db')->getRow($sql);
        $user = $user?$user:[];
        return $user;
    }

    public function insert(Array $array,$table)
    {
        $insert = server('Db')->autoExecute($table, $array, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }


}