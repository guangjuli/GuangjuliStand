<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 10:00
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Bloodpress implements ModelInterface
{
    public function depend()
    {
        return[
          'Server::Db'
        ];
    }

    /**
     * 按时间戳删除血压记录
     * @param int $time
     * @param int $userId
     * @return boolean
     */
    public function deleteBloodLogByTimestamp($time,$userId=null)
    {
        //参数校验
        $time = intval($time);
        $userId = $userId?:bus('tokenInfo')['userId'];
        $userId = intval($userId);
        if(empty($time)||empty($userId))return false;
        //执行sql
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `time`= $time");
        return $check?true:false;
    }

    /**
     * 按日期删除血压记录
     * @param int $createDay
     * @param int $userId
     * @return boolean
     */
    public function deleteBloodLogByDate($createDay,$userId=null)
    {
        //参数校验
        $createDay = intval($createDay);
        $userId = $userId?:bus('tokenInfo')['userId'];
        $userId = intval($userId);
        if(empty($createDay)||empty($userId)) return  false;
        //执行sql
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `createDay`= $createDay");
        return $check?true:false;
    }

    /**
     * 相同字段的数据批量插入(相同：字符，顺序，个数等都相同)
     * [['name'=>'test','age'=>18],['name'=>'hero','age'=>21]，['name'=>'hero','age'=>21]
     *      ，['name'=>'hero'],'name'=>'test']该函数会对键名：3,'name'进行过滤，即不会插入,其标准以键名0对应的键值数组为标准
     * @param array $req
     * @param string $table
     * @param int $userId
     * @return boolean
     */
    public function batchInsert(Array $req,$table,$userId)
    {
        //设置缓存key;
        $cacheKey = $userId.'bloodPress';
        //获取表的字段
        $field_names = server('Db')->getCol('DESC '.$table);
        if(empty($field_names)) return false;
        //待插入数据必须以数组的形式存在
        $firstData = current($req);   //插入字段是以第一个键值的键名为标准
        if(!is_array($firstData)||empty($firstData)) return false;
        //验证并拼装待插入字段
        $insertFields = array_keys($firstData);  //待插入字段组成的数组
        foreach($insertFields as $v){            //检查待插入字段存在性
            $v = trim(str_replace("'",'',$v));
            if(!in_array($v,$field_names)) return false;
        }
        $fields = '('.implode(',',$insertFields).')';
        $fields = str_replace("'",'`',$fields); // $fields待插入字段拼装成的字符串
        //拼装值组成的字符串
        $insert = array();
        //校验数据是否已经存入数据库
        $isExistData = array();
        //获取缓存
        $cacheValue = server('Cache')->get($cacheKey);
        $cacheValue = $cacheValue?:[];
        foreach($req as $k=>$v){
            if(is_array($v)){
                if(!in_array($v['time'],$cacheValue)){
                    $isExistData[] = $v['time'];
                    if(empty(array_diff_assoc($insertFields,array_keys($v)))){
                        $valueArray = array_values($v);
                        $valueString = '';
                        foreach($valueArray as $value){
                            $valueString.="'".$value."',";
                        }
                        $insert[] = '('.rtrim($valueString,',').')';
                    }
                }
            }  //对不是数组，及字段同标准字段不一致的进行过滤
        }
        $insert = implode(',',$insert);   //由待插入数据拼装成的字符串
        if(empty($insert)) return false;
        //拼装sql语句
        $sql = "insert into {$table}{$fields}values{$insert}";
        $check = server('Db')->query($sql);
        //如果数据插入成功则添加对应的数据id缓存，用来防止重复提交问题
        if($check){
            server('Cache')->set($cacheKey,array_merge($cacheValue,$isExistData));
        }
        return $check?true:false;
    }

    public function insertBloodLog(Array $req)
    {
        $userId = intval($req['userId'])?:bus('tokenInfo')['userId'];
        $insertData = array();
        $story= json_decode($req['story'],true);
        foreach($story as $v){
            $v['userId'] = $userId;
            $insertData[] = $v;
        }
        return $this->batchInsert($insertData,'bloodpress',$userId);
    }

    //根据时间戳更改信息的有效性
    public function updateIsvalidByTime($time,$isvalid,$userId)
    {
        $time = intval($time);
        $isvalid = intval($isvalid)==1?1:0;
        $userId = intval($userId);
        $check = server('Db')->query("update bloodpress set isvalid={$isvalid} where `time`={$time} and `userId`={$userId}");
        return $check?true:false;
    }

    /**
     * 通过日期和类型获取血压记录
     * @param array $req
     * $req 包含键名有：type,createDay,userId
     * @return array
     */
    public function getBloodLogByDateAndType(Array $req)
    {
        //校验参数
        $userId = $req['userId']?:bus('tokenInfo')['userId'];
        $userId = intval($userId);
        $type = intval($req['type']);
        $createDay = intval($req['createDay']);
        if(empty($userId)||empty($createDay)) return [];
        //执行sql
        $bloodInfo = server('Db')->getAll("select time,shrink,diastole,bpm,createDay,`day` from bloodpress where `userId`=$userId and `type`=$type and `createDay`=$createDay");
        return $bloodInfo?$bloodInfo:[];
    }

    public function getSingleBloodLogByPage($userId=null,$page,$num)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        $base = ($page-1)*$num;
        $bloodInfo = server('Db')->getAll("select time,shrink,diastole,bpm,createDay from bloodpress where `userId`={$userId} and `type`=0 limit $base,$num");
        return $bloodInfo?:[];
    }

    /**
     * 通过日期获取血压折线图
     * @param int $createDay
     * @param int $day
     * 1:白天，0：晚上，折线图未用到，方便饼状图使用
     * @param int $userId
     * @return array
     */
    public function getBloodLineGraphByDate($createDay,$day=null,$userId=null)
    {
        //参数处理
        $userId = $userId?:bus('tokenInfo')['userId'];
        $createDay = intval($createDay);
        if(empty($userId)||empty($createDay)) return [];
        $peiChart = $day||$day===0?"and `day`='$day'":'';
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
    public function getBloodBarGraphByDate($createDay,$day=null,$userId=null)
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
     * @param int $createDay
     * @param string $day
     * $day可选值：day,night,'',空代表全天
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

}