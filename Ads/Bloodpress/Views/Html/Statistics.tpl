<div class="container-fluid">
    <div class="col-sm-12 col-lg-12">
        <div class="col-sm-12">
            <h4 class="col-sm-3"><strong>测量记录管理</strong></h4>
        </div>
        <div class="col-sm-3">
            <div id='calendar' class="col-sm-10"></div>
        </div>
        <div class="col-sm-9">
            <h5 class="col-sm-12"><strong>7月份测量记录(默认当前月)</strong></h5>
            <div id="barGraph"></div>
            <div id="barGraph2"></div>
            <div id="barGraph3"></div>
            <h5 class="col-sm-12"><strong>7月11日测量记录(默认当天)</strong></h5>
            <div id="chart_line"></div>
            <h5 class="col-sm-12"><strong>7月11日测量记录(饼状图)</strong></h5>
            <div id="pieChart"></div>
            <div id="pieChart2"></div>
        </div>
    </div><!--/span12 -->
</div>
<script type="text/javascript" src="/assets/ui/js/highcharts.js"></script>
<script language="JavaScript">
    //调用饼状图
    $(document).ready(function() {
        barGraph('shrink',{$barGraph['shrink']},'shrink','barGraph','#4572A7');
        barGraph('diastole',{$barGraph['diastole']},'diastole','barGraph2','#89A54E');
        barGraph('bpm',{$barGraph['bpm']},'bpm','barGraph3','gray');
        pieChart('1111111',{$pieChart['shrink']['normal']},{$pieChart['shrink']['acceptable']},{$pieChart['shrink']['high']},'pieChart');
        pieChart('2222222',{$pieChart['diastole']['normal']},{$pieChart['diastole']['acceptable']},{$pieChart['diastole']['high']},'pieChart2')
        lineChart();
    });
    //折线图
    function lineChart(){
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'chart_line', //图表放置的容器，DIV
                defaultSeriesType: 'line', //图表类型line(折线图),
                zoomType: 'x'   //x轴方向可以缩放
            },
            credits: {
                enabled: false   //右下角不显示LOGO
            },
            title: {
                text: '某日动态测量图' //图表标题
            },
            subtitle: {
                text: '2011-07-11'  //副标题
            },
            xAxis: {  //x轴
                categories: [10,20,30,40,50,60,70,80,90,100,110,120,130,140,150,160,170,180,190,200], //x轴标签名称
                gridLineWidth: 1//设置网格宽度为1
            },
            yAxis: {  //y轴
                title: {
                    text: '测量值'
                }, //标题
                lineWidth: 1 //基线宽度
            },
            plotOptions:{ //设置数据点
                line:{
                    dataLabels:{
                        enabled:true  //在数据点上显示对应的数据值
                    },
                    enableMouseTracking: false //取消鼠标滑向触发提示框
                }
            },
            series: [{  //数据列
                name: 'shrink',
                data: {$lineChart['shrink']}
            },{
                name: 'diastole',
                data: {$lineChart['diastole']}

            },{
                name: 'bpm',
                data: {$lineChart['bpm']}
            }]
        });
    }
    //柱状图模板
    function barGraph(title,data,name,id,color) {
        var chart;
        // initialization chart and actions
        $(document).ready(function () {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: ''+id+'',
                    type: 'column'
                },
                title: {
                    text: '' +title+''
                },
                xAxis: {
                    categories:[10,20,30,40,50,60,70,80,90,100,110,120,130,140,150,160,170,180,190,200],
                    tickmarkPlacement:'on'
                },
                yAxis: {
                    title: {
                        text: '测量值'
                    }
                },
                credits: {
                    enabled: false // remove high chart logo hyper-link
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        pointWidth: 30
                    }
                },
                series: [{
                    name:name,
                    color:''+color+'',
                    data: data
                }]
            });
        });
    }
    //饼状图模板
    function pieChart (text,normal,accept,high,id){
        chart = new Highcharts.Chart({
            chart : {
                renderTo: ''+id+'',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title : {
                text: '' +text+''
            },
            tooltip : {
                pointFormat:{literal}'<b>{series.name}</b>: {point.percentage} %'{/literal}
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        color:'black',
                        enabled: true,
                        formatter:function(){
                            return '<b>'+this.point.name+'</b>:'+this.point.percentage.toFixed(2)+"%";
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'BloodPress',
                data: [
                    ['正常',normal],
                    {
                        name: '过高',
                        y:high,
                        sliced: true,
                        selected: true
                    },
                    ['可接受',accept]
                ]
            }]

        })
    }

</script>
