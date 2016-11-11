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
    public function getNewsList(array $userId,$doctorId,$page,$num,$field=null,$sort=null)
    {
        $page = intval($page)-1;
        $num = intval($num);
        $newList = array();
        $newsIdList = $this->getNewsId($userId,$doctorId);
        if(!empty($field))
        if($newsIdList){
            $list = '('.implode(',',$newsIdList).')';
            $sql = "select newsId,userId, createTime,newsType,bloodpressId,planId from news where `newsId` in $list and `active`=0 order by newsType desc,createTime desc limit {$page},{$num}";
            $newList = server('Db')->getAll($sql);
            $newList = $newList?:[];
        }
        return $newList;
    }

    //获取组织机构待处理的消息id
    public function getNewsId(array $userId,$doctorId)
    {
        $newList = array();
        if(!empty($userId)){
            $list = '('.implode(',',$userId).')';
            $sql = "select newsId from news where `userId` in $list and `active`=0 ";
            $newList = server('Db')->getCol($sql);
            $newList = $newList?:[];
            foreach($newList as $k=>$v){
                if($data = server('cache')->get($v)){
                    if($data!=$doctorId)unset($newList[$k]);
                }
            }
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

    //定时任务统计一般  插入news表    一般newsType:1
    public function getGeneralTotal()
    {
        $check = false;
        $time = date('Ymd',time());
        $data = server('Db')->query("select planId,userId from measure_plan where endTime<'{$time}' and reportId=0");
        if($data){
            foreach($data as $k=>$v){
                $data[$k]['createTime']=time();
                $data[$k]['newsType']=1;
            }
            $check = model('Batchinsert')->batchInsert($data,'news');
        }
        return $check;
    }
    //定时任务统计正常   插入news表   正常newsType:0
    public function getNormalTotal()
    {
        $check = false;
        $time = date('Ymd',time());
        $data = server('Db')->query("select planId,userId from measure_plan where beginTime<'{$time}' and endTime>'{$time}'");
        if($data){
            foreach($data as $k=>$v){
                $data[$k]['createTime']=time();
                $data[$k]['newsType']=0;
            }
            $check = model('Batchinsert')->batchInsert($data,'news');
        }
        return $check;
    }

    //数据的状态锁定
    public function lock($newsId,$doctorId,$expire=null)
    {
        //key:newsId,value:doctorId
        $newsId = intval($newsId);
        $doctorId = intval($doctorId);
        $expire = intval($expire);
        server('cache')->set($newsId,$doctorId,$expire);
    }
    //取消锁定状态
    public function unlock($newsId)
    {
        //清除
        $newsId = intval($newsId);
        server('cache')->delete($newsId);
    }
    //判断是否处于锁定状态
    public function isLock($newsId,$doctorId,$expire)
    {
        //判断锁是否存在，如果存在医生编号是否对应，如果对应允许编辑，
        $newsId = intval($newsId);
        $doctorId = intval($doctorId);
        if($data=server('cache')->get($newsId)){
            if($data==$doctorId){
                return true;
            }else{
                return false;
            }
        }else{
            $this->lock($newsId,$doctorId,$expire);
            return true;
        }
    }

    //参数校验
    //校验newsId是否存在

    //校验医生id是否存在
}