<?php
namespace Ads\Bloodpress\Controller\Html;



use Ads\Bloodpress\Traits\Statistics;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;
    use Statistics;
    public function __construct(){
        parent::__construct();
    }


    public function doList(){
        $list = server('Db')->getAll("select * from `bloodpress` group by `userId` order by bloodpressId desc");
        $map = server('db')->getAll("select `login`,`nickName`,`trueName` from user",'userId');
        return  server('Smarty')->ads('bloodpress/html/list')->fetch('',[
            'list' => $list,
            'map'  =>$map
        ]);
    }

    //获取统计图
    public function doStatistics()
    {
        /*$req = req('Get');
        $data = $this->getStatistics($req['time'],$req['userId'],$req['table']);
        return  server('Smarty')->ads('bloodpress/html/statistics')->fetch('',[
            'data' => $data
        ]);*/
        //柱状图
        //查询数据库这4列值有一行一个数据为空则排除
        $arr['date'] = ['2016-07-09', '2016-07-10', '2016-07-12','2016-07-13','2016-07-14','2016-07-15'];
        $arr['shrink'] = [120,87,75,120,87,75];
        $arr['diastole'] = [110,85,70,110,85,70];
        $arr['bpm'] = [115,89,120,115,89,120];
        foreach($arr as $k=>$v){
            if(is_array($v)){
                $v=json_encode($v);
                $arr[$k]=$v;
            }
        }
        //折线图
        $day['time'] = ['10:10', '10:20', '10:30', '10:40', '10:50', '11:00', '11:10', '11:20'];
        $day['shrink']= [115, 112, 123, 135, 134, 123, 123, 128];
        $day['diastole']= [ 81, 79, 72, 86, 84, 85, 88, 83] ;
        $day['bpm'] = [ 73,76, 71, 69, 75, 77, 78, 79] ;
        foreach($day as $k=>$v){
            if(is_array($v)){
                $v=json_encode($v);
                $day[$k]=$v;
            }
        }
        return  server('Smarty')->ads('bloodpress/html/statistics')->fetch('',[
            'arr'=>$arr,
            'day'=>$day
        ]);
    }

    //获取查询
    public function doSearch()
    {

    }

}
