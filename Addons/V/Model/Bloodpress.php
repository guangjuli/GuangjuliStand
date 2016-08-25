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
    /**
     * 按时间戳删除血压记录
     * @param $time
     * @return boolean
     */
    public function deleteBloodLogByTimestamp($time)
    {
        $time = intval($time);
        $userId = bus('tokenInfo')['userId'];
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `time`= $time");
        return $check?true:false;
    }

    /**
     * 按日期删除血压记录
     * @param $createDay
     * @return boolean
     */
    public function deleteBloodLogByDate($createDay)
    {
        $createDay = intval($createDay);
        $userId = bus('tokenInfo')['userId'];
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `createDay`= $createDay");
        return $check?true:false;
    }

    /**
     * 插入血压记录
     * @param array $req
     * @return boolean
     */
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
        return $check?true:false;
    }

    /**
     * 通过日期和类型获取血压记录
     * @param array $req
     * @return array
     */
    public function getBloodLogByDateAndType(Array $req)
    {
        $userId = bus('tokenInfo')['userId'];
        $type = intval($req['type']);
        $createDay = intval($req['createDay']);
        $bloodInfo = server('Db')->getAll("select time,shrink,diastole,bpm,createDay from bloodpress where `userId`=$userId and `type`=$type and `createDay`=$createDay");
        return $bloodInfo?$bloodInfo:[];
    }

    /**
     * 通过日期获取血压折线图
     * @param $createDay
     * @param $day
     * 1:白天，0：晚上，折线图未用到，方便饼状图使用
     * @return array
     */
    public function getBloodLineGraphByDate($createDay,$day=null)
    {
        $userId = bus('tokenInfo')['userId'];
        $createDay = intval($createDay);
        //$peiChart是饼状图所查询条件，此处并未使用
        $peiChart = $day||$day===0?"and `day`=$day":'';
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
        return [];
    }

    /**
     * 通过日期获取血压柱状图
     * @param $createDay
     * @param $day
     * 1:白天，0：晚上，柱状图未用到，方便饼状图使用
     * @return array
     */
    public function getBloodBarGraphByDate($createDay,$day=null)
    {
        $bloodInfo=$this->getBloodLineGraphByDate($createDay,$day);
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
                'day'=>[
                    'shrink'=>140,
                    'diastole'=>90
                ],
                'night'=>[
                    'shrink'=>130,
                    'diastole'=>80
                ],
                'avg'=>[            //avg 平均  代表全天使用
                    'shrink'=>135,
                    'diastole'=>85
                ]
            ]
        ];
    }

    /**
     * 根据白天夜晚或全天获取饼状图
     * @param $createDay
     * @param $day
     * @return array
     */
    public function getPieChartByDay($createDay,$day='')
    {
        $dayDetail = $day?($day=='day'?'day':'night'):'avg';   //day 白天  night 晚上   avg  平均  代表全天计算
        if($dayDetail=='avg'){
            $bloodInfo = $this->getBloodBarGraphByDate($createDay);  //调用柱状图获取测量数据统计量   全天
        }else {
            $dayDetailNum = $dayDetail=='day'?1:0;   //数据库存储 1：白天  ，0：晚上  进行转换
            $bloodInfo = $this->getBloodBarGraphByDate($createDay, $dayDetailNum); //调用柱状图获取测量数据统计量   白天或晚上
        }
        if(!$bloodInfo) return [];
        $result = $this->pieChartAlgorithm($bloodInfo,$dayDetail);  //调用算法
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
                $key = floor($k/10);     //数据分割以10为单位
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
     * $day day/night/all
     * @return array
     */
    private function pieChartAlgorithm($bloodBarGraphByDate,$day)
    {
        if(!is_array($bloodBarGraphByDate)&&empty($bloodBarGraphByDate))return [];
        //读取饼状图比例分配标准方法
        $config = $this->PieChartConfig();
        $filed = $config['field'][$day];
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