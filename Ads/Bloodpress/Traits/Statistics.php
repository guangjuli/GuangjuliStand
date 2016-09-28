<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-28
 * Time: 15:05
 */

namespace Ads\Bloodpress\Traits;


trait Statistics
{
    /**
     * 通过日期获取血压折线图
     * @param int $createDay
     * @param int $day
     * 1:白天，0：晚上，折线图未用到，方便饼状图使用
     * @param int $userId
     * @return array
     */
    public function getBloodLineGraphByDate($createDay,$day=null,$userId)
    {
        //参数处理
        $createDay = intval($createDay);
        $userId = intval($userId);
        $peiChart = $day!=null?"and `day`='$day'":null;
        //执行sql
        $bloodInfo = server('Db')->getAll("select shrink,diastole,bpm from bloodpress where `userId`=$userId and `createDay`='$createDay' $peiChart");
        //返回值处理
        if($bloodInfo){
            $data = array();
            foreach($bloodInfo as $v){
                $data['shrink'][] = $v['shrink'];
                $data['diastole'][] = $v['diastole'];
                $data['bpm'][] = $v['bpm'];
            }
            return $data;
        }
        return [];
    }

    /**
     * 通过日期获取血压柱状图
     * @param int $createDay
     * @param int $day
     * 1:白天，0：晚上，柱状图未用到，方便饼状图使用
     * @param int $userId
     * @return array
     */
    public function getBloodBarGraphByDate($createDay,$day=null,$userId)
    {
        $bloodInfo=$this->getBloodLineGraphByDate($createDay,$day,$userId);
        if(!$bloodInfo)return [];
        $data = $this->barGraphAlgorithm($bloodInfo);
        return $data?$data:[];
    }

    /**
     * 饼状图比例分配标准
     */
    public function PieChartConfig()
    {
        return[
            'acceptableLevel' => 0.25,
            'field'=>[
                0=>[                    //晚上
                    'shrink'=>140,
                    'diastole'=>90
                ],
                1=>[                    //白天
                    'shrink'=>130,
                    'diastole'=>80
                ],
                'all'=>[            //全天
                    'shrink'=>135,
                    'diastole'=>85
                ]
            ]
        ];
    }

    /**
     * 根据白天夜晚或全天获取饼状图
     * @param int $createDay
     * @param string $day
     * @param int $userId
     * $day可选值：0:夜晚，1白天，null全天
     * @return array
     */
    public function getPieChartByDay($createDay,$day=null,$userId)
    {
        $bloodInfo = $this->getBloodBarGraphByDate($createDay,$day,$userId);  //调用柱状图获取测量数据统计量   全天
        if(!$bloodInfo) return [];
        $result = $this->pieChartAlgorithm($bloodInfo,$day);  //调用算法
        return $result?$result:[];    //输出统计数据
    }

    /**
     * 柱状图算法
     * @param array $bloodLog
     * 血压数据数组,['shrink'=>[0=>92,1=>93],'diastole'=>[0=>93,1=>98],'bpm'=>[0=>98,1=>100]]
     * @return array
     */
    private function barGraphAlgorithm(Array $bloodLog)
    {
        if(empty($bloodLog)||!is_array($bloodLog))return [];
        $result = array();  //初始化存储
        foreach($bloodLog as $allKey=>$allValue){
            $countValue=array_count_values($allValue);   //对数据进行统计出现次数
            $numValue = array();   //初始化存储次数的数组
            foreach($countValue as $k=>$v){
                $key = intval(floor($k/10));     //数据分割以10为单位
                $numValue[$key][] =$v;
            }  //将十位以上相同的数据分组
            if(!empty($numValue)){
                foreach($numValue as $k=>$v){
                    $a = 0;
                    foreach($v as $value){
                        $a+=$value;
                    }  //统计同组内数据出现的次数
                    $result[$allKey][$k*10]=$a;  //存储数据
                }
            }
            ksort($result[$allKey],1);  //对数组按整数排序
        }
        return $result;
    }


    /**
     * 饼状图算法
     * @param $bloodBarGraphByDate
     * $bloodBarGraphByDate获取饼状图的结果
     * @param $day
     * $day 1白天/0晚上/all
     * @return array
     */
    private function pieChartAlgorithm($bloodBarGraphByDate,$day)
    {
        if(!is_array($bloodBarGraphByDate)&&empty($bloodBarGraphByDate))return [];
        //读取饼状图比例分配标准方法
        $config = $this->PieChartConfig();
        $filed = $day?$config['field'][$day]:$config['field']['all'];
        $acceptableLevel = $config['acceptableLevel'];
        //参数初始化
        unset($bloodBarGraphByDate['bpm']);  //bpm脉率不参与计算
        $result = array();
        //开始
        foreach($bloodBarGraphByDate as $keyAll=>$valueAll) {
            $standard = $filed[$keyAll];  //读取对应的配置文件 $keyAll=shrink or diastole
            $normal = 0;
            $unNormal = 0;
            foreach ($valueAll as $key => $value) {       //$valueAll= [ 'shrink'=>[92=>3,93=>1],'diastole'=>[80=>1,88=>2]]
                if ($standard - $key >= 10) {   //因为数据由向下取整   各位均为0
                    $normal+=$value;
                } else {
                    $unNormal+=$value;
                }
            }   //normal次数  unNormal 不正常次数分组ok
            $total = $normal + $unNormal;   //总次数
            $normalScale = $normal==0?0:sprintf("%.2f",$normal/$total);  //正常占总次数的比例
            //依据配置文件和算法进行计算输出
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
        return $result?$result:[];
    }

    /**
     * 获取统计图信息
     * @param int $time   20160912/201609/2016
     * @param int $userId
     * @param string $table    day,week,month,year
     * @return array
     */
    public function getStatistics($time,$userId,$table)
    {
        $checkTable = ['day','week','month','year'];
        if(!in_array($table,$checkTable))return [];
        $time = intval($time);
        $userId = intval($userId);
        $statistics=server('Db')->getAll("select * from {$table} where `time`='{$time}' and `userId`='{$userId}'");
        return $statistics?:[];
    }
}