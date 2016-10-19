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
    public function getNewsList(array $userId,$page,$num)
    {
        $page = intval($page)-1;
        $num = intval($num);
        $newList = array();
        if(!empty($userId)){
            $list = '('.implode(',',$userId).')';
            $sql = "select userId, createTime,newsType,bloodpressId,planId from news where `userId` in $list and `active`=0 order by newsType desc,createTime desc limit {$page},{$num}";
            $newList = server('Db')->getAll($sql);
            $newList = $newList?:[];
        }
        return $newList;
    }

    //获取测量计划内未处理紧急消息数据id
    public function getNewsDataId($time,$userId,$orgId)
    {
        $data = array();
        $userId = intval($userId);
        $plan = model('Measureplan')->getMeasurePlanByTime($time,$userId,$orgId);
        if($plan){
            $beginTime = strtotime($plan['beginTime']);
            $endTime = strtotime($plan['endTime']);
            $id = server('Db')->getCol("select bloodpressId from news where userId={$userId} and active=0 and createTime>='{$beginTime}' and createTime<='{$endTime}' and newsType=2");
            if($id){
                $data=model('Bloodpress')->getBloodPressByBloodId($id);
            }
        }
        //数据类型转换
        if($data){
            foreach($data as $k=>$v){
                $data[$k]['bloodpressId']=intval($v['bloodpressId']);
                $data[$k]['time']=intval($v['time']);
                $data[$k]['shrink']=intval($v['shrink']);
                $data[$k]['diastole']=intval($v['diastole']);
                $data[$k]['bpm']=intval($v['bpm']);
            }
        }
        return $data;
    }
    //获取测量计划内所有紧急消息数据
    public function getNewsAllData($time,$userId,$orgId)
    {
        $data = array();
        $userId = intval($userId);
        $plan = model('Measureplan')->getMeasurePlanByTime($time,$userId,$orgId);
        if($plan){
            $beginTime = strtotime($plan['beginTime']);
            $endTime = strtotime($plan['endTime']);
            $id = server('Db')->getCol("select bloodpressId from news where userId={$userId} and createTime>'{$beginTime}' and createTime<'{$endTime}' and newsType=2");
            if($id){
                $data=model('Bloodpress')->getBloodPressByBloodId($id);
            }
        }
        //数据类型转换
        if($data){
            foreach($data as $k=>$v){
                $data[$k]['bloodpressId']=intval($v['bloodpressId']);
                $data[$k]['time']=intval($v['time']);
                $data[$k]['shrink']=intval($v['shrink']);
                $data[$k]['diastole']=intval($v['diastole']);
                $data[$k]['bpm']=intval($v['bpm']);
            }
        }
        return $data;
    }
    //为紧急消息源数据添加备注，取消紧急状态
    public function updateNewsState($req)
    {
        $return = false;
        $check = model('Bloodpress')->updateSingleReport($req);
        if($check){
            $bloodpressId = intval($req['bloodpressId']);
            $check2 = server('Db')->query("update news set active=1 where bloodpressId ={$bloodpressId}");
            if($check2)$return = true;
        }
        return $return;
    }
}