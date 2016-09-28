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
            <div id="my_container"></div>
            <h5 class="col-sm-12"><strong>7月11日测量记录(默认当天)</strong></h5>
            <div id="chart_line"></div>
        </div>
    </div><!--/span12 -->
</div>
<script type="text/javascript" src="/assets/ui/js/highcharts.js"></script>
<script>
    //柱状图
    $(function() {
        var chart;
        // initialization chart and actions
        $(document).ready(function () {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'my_container',
                    type: 'column'
                },
                title: {
                    text: '血压柱状图记录'
                },
                xAxis: {
                    categories: {$arr['date']}
                },
                yAxis: {
                    title: {
                        text: '测量值'
                    }
                },
                credits: {
                    enabled: false // remove high chart logo hyper-link
                },
                series: [{
                    name: "shrink",
                    data: {$arr['shrink']}
                }, {
                    name: "diastole",
                    data: {$arr['diastole']}
                },{
                    name: "bpm",
                    data: {$arr['bpm']}
                }]
            });
        });
    });
    //折线图
    $(function() {
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
                categories: {$day['time']}, //x轴标签名称
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
                data: {$day['shrink']}
            },{
                name: 'diastole',
                data: {$day['diastole']}

            },{
                name: 'bpm',
                data: {$day['bpm']}
            }]
        });
    });
</script>
