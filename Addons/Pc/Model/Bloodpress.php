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
    public function getSingleBloodPress($planId,$userId)
    {
        //初始化返回参数
        $single = array();
        $plan = model('Measureplan')->getPlanTimeByPlanId($planId);
        if($plan){
            $beginTime = $plan['beginTime'];
            $endTime = $plan['endTime'];
            if($beginTime&&$endTime){
                $single = server('Db')->getAll("select `time`,shrink,diastole,bpm,average,des from bloodpress where createDay>='{$beginTime}' and createDay<'{$endTime}' and userId={$userId} and type=0");
                $single = $single?:[];
                foreach($single as $k=>$v){
                    //数据类型转换
                    $single[$k]['time']=intval($v['time']);
                    $single[$k]['shrink']=intval($v['shrink']);
                    $single[$k]['diastole']=intval($v['diastole']);
                    $single[$k]['bpm']=intval($v['bpm']);
                    $single[$k]['average']=intval($v['average']);
                    if($v['des']){
                        $des=unserialize($v['des']);
                        if(is_array($des)){
                            $des['time']=intval($des['time']);
                            $single[$k]['des']=$des;
                        }
                    }else{
                        $single[$k]['des']=array();
                    }
                }
            }
            $single['planId']=intval($plan['planId']);
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
            if($single){
                $returnSingle['planId']=intval($single['planId']);
                $returnSingle['beginTime']=intval($plan['beginTime']);
                $returnSingle['endTime']=intval($plan['endTime']);
                unset($single['planId']);
            }
            //初始化
            $shrink = 0;
            $diastole=0;
            $bpm = 0;
            foreach($single as $v){
                $shrink+=intval($v['shrink']);
                $diastole+=intval($v['diastole']);
                $bpm+=intval($v['bpm']);
            }
            $num = count($single);
            if($num){
                $returnSingle['averageShrink'] = intval($shrink/$num);
                $returnSingle['averageDiastole'] = intval($diastole/$num);
                $returnSingle['averageBpm'] = intval($bpm/$num);
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
                $dynamic = server('Db')->getAll("select `time`,shrink,diastole,bpm,average,des from bloodpress where createDay>='{$beginTime}' and createDay<='{$endTime}' and userId={$userId} and type=1");
                $dynamic = $dynamic?:[];
                foreach($dynamic as $k=>$v){
                    //数据类型转换
                    $dynamic[$k]['time']=intval($v['time']);
                    $dynamic[$k]['shrink']=intval($v['shrink']);
                    $dynamic[$k]['diastole']=intval($v['diastole']);
                    $dynamic[$k]['bpm']=intval($v['bpm']);
                    $dynamic[$k]['average']=intval($v['average']);
                    if($v['des']){
                        $des=unserialize($v['des']);
                        if(is_array($des)){
                            $des['time']=intval($des['time']);
                            $dynamic[$k]['des']=$des;
                        }
                    }else{
                        $dynamic[$k]['des']=array();
                    }
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
        if(!$req['bloodpressId'])return false;
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
    public function getMeasurePlanSingleCount($userId,$orgId)
    {
        $counts=0;
        $time = date('Ymd',time());
        $plan = model('Measureplan')->getMeasurePlanByTime($time,$userId,$orgId);
        if($plan){
            $single = $this->getSingleBloodPress($plan['planId'],$userId);
            $counts = $single?count($single)-1:0;
        }
        return $counts;
    }
    //获取测量计划内动态测量次数
    public function getMeasurePlanDynamicCount($userId,$orgId)
    {
        $time = date('Ymd',time());
        $plan = model('Measureplan')->getMeasurePlanByTime($time,$userId,$orgId);
        $counts = 0;
        if($plan){
            $counts = server('Db')->getCol("select count(createDay)as 'counts' from bloodpress where createDay>'{$plan['beginTime']}' and createDay<'{$plan['endTime']}'  and userId = {$userId} group by createDay");
            if($counts)$counts = count($counts);
        }
        return $counts;
    }
    //获取测量计划内测量次数
    public function getMeasurePlanCount($userId,$orgId)
    {
        $counts = array();
        $counts['single']=$this->getMeasurePlanSingleCount($userId,$orgId);
        $counts['dynamic']=$this->getMeasurePlanDynamicCount($userId,$orgId);
        return $counts;
    }



}