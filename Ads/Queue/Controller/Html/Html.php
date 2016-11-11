<?php
namespace Ads\Queue\Controller\Html;

//需要有3个定时任务，1：清除active=0的无效信息，2:插入未测量项目，3：插入消息表一般正常


use Ads\Queue\Traits\Log;

class Html  {

    use \App\Traits\AjaxReturnHtml;
    use Log;

    public function __construct(){
    }

    public function doIndex()
    {
    }

    /**
     * @param int $channel
     * 任务频道
     */
    public function doChannel($data)
    {
        //todo

        return $data;
    }

    public function doTimerePost()
    {
/*
channel : 1,        //任务频道
begin   : 1,        //开始标记
pressstop : 1,
pressid : 0,
width   : 0,
num     : 0,
total   : 0,
msg     : '',
*/

        //==============================================
        //执行
        $data = $this->doChannel(req('Post'));

        //==============================================
        //$data['pressstop'] = 1;
        $data['msg'] = "执行完成";
        $data['delay'] = 1000;
        $data['num']++;
        $data['width'] = '60%';

        echo json_encode($data);
        exit;
    }

    public function doTimere()
    {
        return  server('Smarty')->ads('queue/html/Timere')->fetch('',[
        ]);
    }

    public function doList(){
        return  server('Smarty')->ads('queue/html/list')->fetch('',[
        ]);
    }
    //为检测项的定时任务
    public function doNodetectionPost()
    {

    }



    //timed task   消息定时任务ok
    public function doInsertnewsPost()
    {
        $time = date('Y-m-d h:i:sa');
        $this->getGeneralTotal()?$this->set('News',"{$time}  一般消息插入成功"):$this->set('News',"{$time}  一般消息没有要插入的数据！");
        $this->getNormalTotal()?$this->set('News',"{$time}  正常消息插入成功"):$this->set('News',"{$time}  正常消息没有要插入的数据！");
        $data['msg'] = "执行完成";
        $data['delay'] = 24*60*1000;
        $data['num']++;
        $data['width'] = '60%';
        echo json_encode($data);
        exit;
    }
    //定时任务统计一般  插入news表    一般newsType:1
    public function getGeneralTotal()
    {
        $check = false;
        $time = date('Ymd',time());
        $data = server('Db')->getAll("select planId,userId from measure_plan where endTime<'{$time}' and reportId=0");
        if($data){
            $existPlanId = $this->getNewsGeneral();
            $insert = array();
            foreach($data as $k=>$v){
                if(!in_array($v['planId'],$existPlanId)){
                    $insert[]['planId']=$data[$k]['planId'];
                    $insert[]['userId']=$data[$k]['userId'];
                    $insert[$k]['createTime']=time();
                    $insert[$k]['newsType']=1;
                }
            }
            if($insert){
                $check = $this->batchInsert($insert,'news');
            }
        }
        return $check;
    }
    //定时任务统计正常   插入news表   正常newsType:0
    public function getNormalTotal()
    {
        $check = false;
        $time = date('Ymd',time());
        $data = server('Db')->getAll("select planId,userId from measure_plan where beginTime<'{$time}' and endTime>'{$time}'");
        if($data){
            $existPlanId = $this->getNewsNormal();
            $insert = array();
            foreach($data as $k=>$v){
                if(!in_array($v['planId'],$existPlanId)){
                    $insert[]['planId']=$data[$k]['planId'];
                    $insert[]['userId']=$data[$k]['userId'];
                    $insert[$k]['createTime']=time();
                    $insert[$k]['newsType']=0;
                }
            }
            if($insert){
                $check = $this->batchInsert($insert,'news');
            }
        }
        return $check;
    }

    //获取消息列表一般情况的数据
    public function getNewsGeneral()
    {
        $array = server('Db')->getCol("select planId from news where newsType=1");
        return $array?:[];
    }
    //获取消息列表正常情况的数据
    public function getNewsNormal()
    {
        $array = server('Db')->getCol("select planId from news where newsType=0");
        return $array?:[];
    }
    public function batchInsert(Array $req,$table)
    {
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
        foreach($req as $k=>$v){
            if(is_array($v)){
                if(empty(array_diff_assoc($insertFields,array_keys($v)))){
                    $valueArray = array_values($v);
                    $valueString = '';
                    foreach($valueArray as $value){
                        $valueString.="'".$value."',";
                    }
                    $insert[] = '('.rtrim($valueString,',').')';
                }
            }  //对不是数组，及字段同标准字段不一致的进行过滤
        }
        $insert = implode(',',$insert);   //由待插入数据拼装成的字符串
        if(empty($insert)) return false;
        //拼装sql语句
        $sql = "insert into {$table}{$fields}values{$insert}";
        $check = server('Db')->query($sql);
        return $check?true:false;
    }

    //获取当前时间有测量计划的患者，测量计划时间不能重合

    //
}
