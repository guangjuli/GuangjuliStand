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
    //获取组织机构患者未被查看的消息列表
    public function getNewsList(array $userId)
    {
        $newList = array();
        if(!empty($userId)){
            $list = implode(',',$userId);
            $sql = 'select userId, createTime,newsType from news where `userId` in '.'('.$list.') and `active`=0';
            $newList = server('Db')->getAll($sql,'userId');
            $newList = $newList?:[];
        }
        return $newList;
    }
}