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
    //按时间戳删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function deleteBloodLogByTimestamp($time)
    {
        $time = intval($time);
        $userId = bus('tokenInfo')['userId'];
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `time`= $time");
        return $check?200:-200;
    }

    /*String date
    eg: 20160823*/
    //按日期删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function deleteBloodLogByDate($createDay)
    {
        $createDay = intval($createDay);
        $userId = bus('tokenInfo')['userId'];
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `createDay`= $createDay");
        return $check?200:-200;
    }

    //插入血压记录
    //必须经过model('Gate')->verifyToken()
    public function insertBloodLog(Array $req)
    {
        //插入bloodpress表
        $userId = bus('tokenInfo')['userId'];
        $insert = array();
        foreach($req['story'] as $v){
            $v['userId'] = $userId;
            $insert[] = '('.implode(',',$v).')';
        }
        $insert = implode(',',$insert);
        $check = server('Db')->query("insert into bloodpress(type,createDay,time,shrink,diastole,bpm,day,userId)values $insert");
        return $check?200:-200;
    }

    /**
     * 通过日期和类型获取血压记录
     */
    public function getBloodLogByDateAndType($req)
    {
        $userId = bus('tokenInfo')['userId'];
        $type = intval($req['type']);
        $createDay = intval($req['createDay']);
        $bloodInfo = server('Db')->getAll("select time,shrink,diastole,bpm,createDay from bloodpress where `userId`=$userId and `type`=$type and `createDay`=$createDay");
        return $bloodInfo?$bloodInfo:-200;
    }

    /**
     * 通过日期获取血压折线图
     */
    public function getBloodLineGraphByDate($createDay,$day='')
    {
        $userId = bus('tokenInfo')['userId'];
        $createDay = intval($createDay);
        //$peiChart是饼状图所查询条件，此处并未使用
        $peiChart = $day?"and `day`=$day":'';
        $bloodInfo = server('Db')->getAll("select shrink,diastole,bpm from bloodpress where `userId`=$userId and `createDay`='$createDay' $peiChart");
        if($bloodInfo){
            $data = array();
            foreach($bloodInfo as $v){
                $data['shrink'][] = $v['shrink'];
                $data['diastole'][] = $v['diastole'];
                $data['bpm'][] = $v['bpm'];
            }
            return $data;
        }
        return -200;
    }

    /**
     * 通过日期获取血压柱状图
     */
    public function getBloodBarGraphByDate($createDay,$day='')
    {
        $bloodInfo=$this->getBloodLineGraphByDate($createDay,$day);
        $data = $this->barGraphAlgorithm($bloodInfo);
        return $bloodInfo?($data?$data:-200):-200;
    }

    public function PieChartConfig()
    {
        //1:day ,0:night,2:avg,3:all 全天
        return[
            'acceptableLevel' => 0.25,
            'field'=>[
                1=>[
                    'shrink'=>140,
                    'diastole'=>90
                ],
                0=>[
                    'shrink'=>130,
                    'diastole'=>80
                ],
                2=>[
                    'shrink'=>135,
                    'diastole'=>85
                ]
            ]
        ];
    }


    public function getPieChartByDay($createDay,$day=null)
    {
        $result = array();
        $dayDetail = $day?($day==1?:0):3;
        if($dayDetail==3){
            $bloodInfo = $this->getBloodBarGraphByDate($createDay);
            if(!$bloodInfo)return -200;
            $this->pieChartAlgorithm($bloodInfo,1);
            $this->pieChartAlgorithm($bloodInfo,0);
        }else{
            D(11);
            $bloodInfo = $this->getBloodBarGraphByDate($createDay,$dayDetail);
            $result = $this->pieChartAlgorithm($bloodInfo,$dayDetail);
        }
        return $result?$result:-200;
    }



    //传入数组
    /*[
        'shrink'=>[0=>92,1=>93],
        'diastole'=>[0=>93,1=>98],
        'bpm'=>[0=>98,1=>100]
    ];*/
    private function barGraphAlgorithm($bloodLog)
    {
        if(empty($bloodLog)||!is_array($bloodLog))return false;
        $result = array();
        foreach($bloodLog as $allKey=>$allValue){
            $countValue=array_count_values($allValue);
            $numValue = array();
            foreach($countValue as $k=>$v){
                $key = floor($k/10);
                $numValue[$key][] =$v;
            }
            if(!empty($numValue)){
                foreach($numValue as $k=>$v){
                    $a = 0;
                    foreach($v as $value){
                        $a+=$value;
                    }
                    $result[$allKey][$k*10]=$a;
                }
            }
            ksort($result[$allKey],1);
        }
        return $result;
    }


    /**
     * 饼状图算法
     * @param $bloodBarGraphByDate
     * $bloodBarGraphByDate获取饼状图的结果
     * @param $day
     * $day day/night/all
     */
    private function pieChartAlgorithm($bloodBarGraphByDate,$day)
    {
        //读取饼状图配置方法
        $config = $this->PieChartConfig();
        $filed = $config['field'][$day];
        $acceptableLevel = $config['acceptableLevel'];
        //参数初始化
        unset($bloodBarGraphByDate['bpm']);  //bpm脉率不参与计算
        $scale = array();     //各参数的统计个数
        $result = array();   //结果数组
        //开始
        foreach($bloodBarGraphByDate as $keyAll=>$valueAll) {
            $standard = $filed[$keyAll];  //读取对应的配置文件 $keyAll=shrink or diastole
            foreach ($valueAll as $key => $value) {       //$valueAll= [ 'shrink'=>[92=>3,93=>1],'diastole'=>[80=>1,88=>2]]
                if ($standard - $key >= 10) {
                    $scale[$keyAll]['normal'][] = $value;
                } else {
                    $scale[$keyAll]['unNormal'][] = $value;
                }
            }   //normal次数  unNormal 不正常次数分组ok
            $normal = null;
            if ($scale[$keyAll]['normal']) {
                foreach ($scale[$keyAll]['normal'] as $v) {
                    $normal += $v;
                }
            } else {
                $normal = 0;
            }   //normal 统计正常次数ok
            $unNormal = null;
            if ($scale[$keyAll]['unNormal']) {
                foreach ($scale[$keyAll]['unNormal'] as $v) {
                    $unNormal += $v;
                }
            } else {
                $unNormal = 0;
            }   //unNormal  统计不正常次数ok
            $total = $normal + $unNormal;   //总次数
            $normalScale = sprintf("%.2f",$normal/$total);  //正常占总次数的比例
            if(1-$normalScale<$acceptableLevel){
                $result[$keyAll]['normal'] = $normalScale;
                $result[$keyAll]['acceptable']=1-$normalScale;
                $result[$keyAll]['high']=0;
            }else{
                $result[$keyAll]['normal'] = $normalScale;
                $result[$keyAll]['acceptable']=$acceptableLevel;
                $result[$keyAll]['high']=1-$normalScale-$acceptableLevel;
            }
        }
        return $result?$result:-200;
    }

    public function returnNews($code=null)
    {
        $config = [
          200=>'Succeed',
          -200=>'error',
          -201=>'缺失重要参数',
          -202=>'存在格式不正确参数',
          -203=>'System Exception'
        ];
        return $code?$config[$code]:$config;
    }
}