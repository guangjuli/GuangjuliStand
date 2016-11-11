<style type="text/css">
    .textCenter { text-align: center}
    .center { width: 80%; margin: 0 auto }
    .baseMargin { margin-bottom: 10px;}
    .title2 { position: relative; right: 20px; margin-bottom: 10px; }
    .content { position: relative; left: 20px; margin-bottom: 10px; }
    .bottom { margin-bottom: 20px;}
</style>
<h2 class="textCenter">{$data['trueName']}检查报告</h2>
<div class="textCenter">{$data['beginTime']}~{$data['endTime']}</div>
<div class="textCenter">
    <span>时间:{$data['time']}</span>
    <span style="margin-left: 50px;">机构:{$data['orgName']}</span>
</div>
<div class="center title2">基本检测：</div>
<div class="panel panel-default center bottom">
    <div class="panel-body">
        <div class="baseMargin">
            <span class="col-md-4">身高：{$data['height']}</span>
            <span class="col-md-4">体重：{$data['weight']}</span>
            <span class="col-md-4">BMI：{$data['bmi']}</span>
        </div>
        <div>
            <span class="col-md-4 baseMargin">腰围：{$data['waist']}</span>
            <span class="col-md-4 baseMargin">臀围：{$data['hipline']}</span>
        </div>
    </div>
</div>
<div class="center title2">检测项目：</div>
<div class="panel panel-default center bottom">
    <div class="panel-body">
        <div class="col-md-12">
            <div>单次血压</div>
            <div class="baseMargin center">
                <span class="col-md-4">收缩压 &nbsp; {$data['single']['shrink']}</span>
                <span class="col-md-4">舒张压 &nbsp; {$data['single']['diastole']}</span>
                <span class="col-md-4">脉率 &nbsp; {$data['single']['bpm']}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div>血压报告</div>
            <div style="float: right">医生 &nbsp; {$data['single']['doctorName']}</div>
        </div>
        <pre class="pre-scrollable bottom">
            {$data['single']['report']}
        </pre>
        <div class="col-md-12">动态血压</div>
        <pre>
            折线图待画
        </pre>
        <div class="col-md-12">
            <div>血压报告</div>
            <div style="float: right">医生 &nbsp; {$data['dynamic']['doctorName']}</div>
        </div>
        <pre class="pre-scrollable bottom">
            {$data['dynamic']['report']}
        </pre>
    </div>
</div>
<div class="center title2">总结报告：</div>
<pre class="pre-scrollable center bottom">
{$data['health']['Finalreport']}
</pre>
<div class="center title2">饮食建议：</div>
<pre class="pre-scrollable center bottom">
{$data['health']['eatSuggest']}
</pre>
<div class="center title2">运动计划：</div>
<pre class="pre-scrollable center bottom">
{$data['health']['sportPlan']}
</pre>
<div class="center title2">维护计划：</div>
<div class="center bottom">
    <table class="table table-striped table-hover">
        <tbody>
        <tr class="textCenter">
            <td>起止日期</td>
            <td>检测项目</td>
        </tr>
        {foreach from=$data['measurePlan'] key=$key item=$item}
            <tr class="textCenter">
                <td>{$item['beginTime']}~{$item['endTime']}</td>
                <td>{$item['project']}</td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>
<div class="center" style="margin-top: 20px;">
    <a class="btn btn-default"  href="/man/?Finalreport/html/personallist&patientId={$data['userId']}">返回</a>
</div>
