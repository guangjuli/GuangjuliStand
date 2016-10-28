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
        $map = fc("getPatientBaseInfoList");
        return  server('Smarty')->ads('bloodpress/html/list')->fetch('',[
            'list' => $list,
            'map'  =>$map
        ]);
    }

    //获取统计图
    public function doStatistics()
    {
        //$req = req('Get');
        $data = $this->getStatistics('20160909',58,'day');
        //柱状图数据
        $bargraph=json_decode($data['bargraph'],true);
        foreach($bargraph as $k=>$v){
            if(is_array($v)){
                $v=json_encode($v);
                $bargraph[$k]=$v;
            }
        }
        //饼状图数据
        $pieChart = json_decode($data['piecharts'],true);
        //折线图数据
        $linechart=json_decode($data['linechart'],true);
        foreach($linechart as $k=>$v){
            if(is_array($v)){
                $v=json_encode($v);
                $linechart[$k]=$v;
            }
        }
        //D($linechart);
        return  server('Smarty')->ads('bloodpress/html/statistics')->fetch('',[
            'pieChart' => $pieChart,
            'barGraph'=>$bargraph,
            'lineChart'=>$linechart
        ]);
    }

    //获取查询
    public function doSearch()
    {
        //饼状图
        //$data = $this->getPieChartByDay('20160909',null,58);
        //柱状图
        /*$data = $this->getBloodBarGraphByDate('20160909',null,58);
        $newData = array();
        foreach($data as $k=>$v){
            for($i=10;$i<180;$i+=10){
                foreach($v as $kk=>$vv){
                    if($kk==$i)
                    {$newData[$k][]=$vv;
                        continue;

                    };
                }
                $newData[$k][]=0;
            }
        }
        $newData = json_encode($newData);*/
        //折线图
        $data = $this->getBloodLineGraphByDate('20160909',null,58);
        $data = json_encode($data);
        D($data);
        return  server('Smarty')->ads('bloodpress/html/search')->fetch('',[
        ]);
    }

}
