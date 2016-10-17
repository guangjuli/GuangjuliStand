<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-17
 * Time: 14:38
 */

namespace Addons\Model;


class Medicine
{
    public function searchMedicine($req)
    {
        $data = array();
        $where = $this->searchWhere($req);
        if(!empty($where)){
            $data = server('Db')->getAll("select medicineId ,name,sideEffect from medicine where $where");
            $data = $data?:[];
        }
        return $data;
    }

    public function getMedicine(array $medicineId)
    {
        $data = array();
        if(!empty($medicineId)){
            $medicine='('.implode(',',$medicineId).')';
            $data = server('Db')->getAll("select name,sideEffect from medicine where medicineId in {$medicine}");
            $data = $data?:[];
        }
        return $data;
    }

    private function searchWhere($req)
    {
        $req = saddslashes($req);
        $disease=$req['disease'];
        $name = $req['name'];
        if($disease&&$name) return "`disease` like '{$disease}' and and `name` like '{$name}'";
        if($disease) return "`disease` like '{$disease}'";
        if($name) return " `name` like '{$name}'";
        return '';
    }
}