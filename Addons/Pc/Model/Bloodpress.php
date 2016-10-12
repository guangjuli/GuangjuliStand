<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 10:00
 */

namespace Addons\Model;


class Bloodpress
{
    public function getSingleBloodPress($time,$userId)
    {
        //初始化返回参数
        $single = array();
        $plan = model('Measureplan')->getMeasurePlanByTime($time,$userId);
        if($plan){
            $beginTime = $plan['beginTime'];
            $endTime = $plan['endTime'];
            if($beginTime&&$endTime){
                $single = server('Db')->getAll("select `time`,shrink,diastole,bpm,average,des from bloodpress where createDay>='{$beginTime}' and createDay<'{$endTime}' and userId={$userId} and type=0");
                $single = $single?:[];
                foreach($single as $k=>$v){
                    if($v['des'])$single[$k]['des']=unserialize($v['des']);
                }
            }
            $single['planId']=$plan['planId'];
        }
        return $single;
    }

    public function getSingleByPlanTime($plan,$userId)
    {
        $single = array();
        $beginTime = $plan['beginTime'];
        $endTime = $plan['endTime'];
        if($beginTime&&$endTime){
            $single = server('Db')->getAll("select `time`,shrink,diastole,bpm,average,des from bloodpress where createDay>='{$beginTime}' and createDay<'{$endTime}' and userId={$userId} and type=0");
            $single = $single?:[];
            foreach($single as $k=>$v){
                if($v['des'])$single[$k]['des']=unserialize($v['des']);
            }
        }
        if($single){
            $single['planId']=$plan['planId'];
        }
        return $single;
    }

    public function getSingleBloodPressAverage($planId,$userId)
    {
        $plan = model('Measureplan')->getPlanTimeByPlanId($planId);
        $returnSingle = array();
        if($plan){
            $single = $this->getSingleByPlanTime($plan,$userId);
            //初始化
            $shrink = 0;
            $diastole=0;
            $bpm = 0;
            foreach($single as $v){
                $shrink+=$v['shrink'];
                $diastole+=$v['diastole'];
                $bpm+=$v['bpm'];
            }
            $num = count($single);
            if($num){
                $returnSingle['averageShrink'] = $shrink/$num;
                $returnSingle['averageDiastole'] = $diastole/$num;
                $returnSingle['averageBpm'] = $bpm/$num;
            }
        }
        return $returnSingle;
    }

    public function getDynamicBloodpress($planId,$userId){
        //初始化返回参数
        $dynamic = array();
        $plan = model('Measureplan')->getPlanTimeByPlanId($planId);
        if($plan){
            $beginTime = $plan['beginTime'];
            $endTime = $plan['endTime'];
            if($beginTime&&$endTime){
                $dynamic = server('Db')->getAll("select `time`,shrink,diastole,bpm,average,des from bloodpress where createDay>'{$beginTime}' and createDay<'{$endTime}' and userId={$userId} and type=1");
                $dynamic = $dynamic?:[];
                foreach($dynamic as $k=>$v){
                    if($v['des'])$dynamic[$k]['des']=unserialize($v['des']);
                }
            }
        }
        return $dynamic;
    }

    public function getDynamicByPlanTime($plan,$userId)
    {
        $dynamic = array();
        $beginTime = $plan['beginTime'];
        $endTime = $plan['endTime'];
        if($beginTime&&$endTime){
            $dynamic = server('Db')->getAll("select `time`,shrink,diastole,bpm,average,des from bloodpress where createDay>='{$beginTime}' and createDay<'{$endTime}' and userId={$userId} and type=1");
            $dynamic = $dynamic?:[];
            foreach($dynamic as $k=>$v){
                if($v['des'])$dynamic[$k]['des']=unserialize($v['des']);
            }
        }
        if($dynamic){
            $dynamic['planId']=$plan['planId'];
        }
        return $dynamic;
    }

    //编辑单条血压报告
    //需求参数，bloodpressId,time,report,doctorName
    public function updateSingleReport($req)
    {
        $req = saddslashes($req);
        $bloodpressId = intval($req['bloodpressId']);
        unset($req['bloodpressId']);
        $insert=serialize($req);
        $sql = "update bloodpress  set `des`='{$insert}' where bloodpressId = '{$bloodpressId}'";
        $check = server('Db')->query($sql);
        return $check?true:false;
    }

    //根据bloodpressId获取数据
    public function getBloodPressByBloodId(Array $idList)
    {
        $list = '('.implode(',',$idList).')';
        $data =server('Db')->getAll("select bloodpressId,time,shrink,diastole,bpm from bloodpress where bloodpressId in {$list}");
        return $data?:[];
    }

    //获取测量计划内单次测量次数
    public function getMeasurePlanSingleCount($time,$userId)
    {
        $single = $this->getSingleBloodPress($time,$userId);
        $counts = $single?count($single)-1:0;
        return $counts;
    }
    //获取测量计划内动态测量次数
    public function getMeasurePlanDynamicCount($time,$userId)
    {
        $plan = model('Measureplan')->getMeasurePlanByTime($time,$userId);
        $counts = 0;
        if($plan){
            $counts = server('Db')->getAll("select count(createDay) from bloodpress where createDay>'{$plan['beginTime']}' and createDay<'{$plan['endTime']}'  and userId = {$userId} group by createDay");
            $counts = $counts?:0;
        }
        return $counts;
    }
    //获取测量计划内测量次数
    public function getMeasurePlanCount($time,$userId)
    {
        $counts = array();
        $counts['single']=$this->getMeasurePlanSingleCount($time,$userId);
        $counts['dynamic']=$this->getMeasurePlanDynamicCount($time,$userId);
        return $counts;
    }



}