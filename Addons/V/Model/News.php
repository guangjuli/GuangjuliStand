<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 13:57
 */

namespace Addons\Model;


class News
{
     //relation是user_relationship的字段值由id串组成，用‘，’分隔开
    public function getNewsList($relation)
    {
        //并未对$relation进行过多验证，非用户输入项,从数据库获取
        $newList = array();
        if(!empty($relation)){
            $sql = 'select userId, createTime,newsType from news where `userId` in '.'('.$relation.')';
            $newList = server('Db')->getAll($sql,'userId');
        }
        return $newList;
    }
}