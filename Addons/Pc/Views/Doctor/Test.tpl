<form action="/pc/doctor/Getpatientinfo" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="submit" value="提交">
</form>   {*获取患者信息*}

<form action="/pc/doctor/Getpatientcases" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>   {*获取患者病史*}

<form action="/pc/doctor/InsertSingledatades" method="post" accept-charset="UTF-8">
    <input type="text" name="bloodpressId" value="45">
    <input type="text" name="time" value="123456789">
    <input type="text" name="doctorName" value="">
    <input type="text" name="report" value="">
    <input type="submit" value="提交">
</form>   {*给单次测量添加描述*}

<form action="/pc/doctor/Geturgentnewsdata" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="text" name="time" value="2016-09-09 14:20:02">
    <input type="submit" value="提交">
</form>   {*获取测量计划内紧急消息未处理数据*}

<form action="/pc/doctor/Geturgentnewsalldata" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="text" name="time" value="2016-09-09 14:20:02">
    <input type="submit" value="提交">
</form>   {*获取测量计划内所有紧急消息数据*}

<form action="/pc/doctor/Inserturgencydatades" method="post" accept-charset="UTF-8">
    <input type="text" name="bloodpressId" value="48">
    <input type="text" name="time" value="123456789">
    <input type="text" name="doctorName" value="">
    <input type="text" name="report" value="">
    <input type="submit" value="提交">
</form>   {*给紧急消息添加描述*}


<form action="/pc/doctor/Getsingleaverage" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="planId" value="2">
    <input type="submit" value="提交">
</form>   {*获取测量计划内平均数据*}

<form action="/pc/doctor/Getsingledata" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="planId" value="2">
    <input type="submit" value="提交">222222222222
</form>   {*获取测量计划内单次血压源数据*}

<form action="/pc/doctor/Insertsinglereport" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="planId" value="2">
    <input type="text" name="doctorName" value="2">
    <input type="text" name="shrink" value="120">
    <input type="text" name="diastole" value="60">
    <input type="text" name="bpm" value="81">
    <input type="text" name="report" value="">
    <input type="submit" value="提交">
</form>   {*为测量计划生成单次测量报告*}生成单次测量报告

<form action="/pc/doctor/Getsinglereportdata" method="post" accept-charset="UTF-8">
    <input type="text" name="planId" value="2">
    <input type="submit" value="提交">
</form>   {*获取测量计划已生成报告的源数据*} 获取单次已生成报告的源数据

<form action="/pc/doctor/Getdynamicdata" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="planId" value="2">
    <input type="submit" value="提交">
</form>   {*获取测量计划内动态测量数据*}

<form action="/pc/doctor/Insertdynamicreport" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="planId" value="2">
    <input type="text" name="doctorName" value="">
    <input type="text" name="report" value="">
    <input type="submit" value="提交">
</form>   {*为测量计划生成动态测量报告*}生成动态测量报告

<form action="/pc/doctor/Getdynamicreportdata" method="post" accept-charset="UTF-8">
    <input type="text" name="planId" value="2">
    <input type="submit" value="提交">
</form>   {*获取测量计划已生成报告的源数据*} 获取动态测量已生成报告的源数据

<form action="/pc/doctor/Getdatashowpageuserinfo" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="submit" value="提交">
</form>   {*获取数据展示页面显示的患者信息*}

<form action="/pc/doctor/GetMeasureplancount" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="submit" value="提交">
</form>   {*获取正常情况下测量计划内测量次数*}

<form action="/pc/doctor/Insertfinalreport" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="planId" value="2">
    <input type="text" name="doctorName" value="">
    <input type="text" name="singleId" value="8">
    <input type="text" name="dynamicId" value="5">
    <input type="text" name="finalReport" value="">
    <input type="text" name="eatSuggest" value="">
    <input type="text" name="sportPlan" value="">
    <input type="text" name="addPlanId[]" value="4">
    <input type="text" name="addPlanId[]" value="5">
    <input type="text" name="addPlanId[]" value="6">
    <input type="submit" value="提交">
</form>   {*为测量计划生产最终报告*}


<form action="/pc/doctor/Getfinalreportlist" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="submit" value="提交">
</form>   {*获取正常情况下测量计划内测量次数*}

<form action="/pc/doctor/Getfinalreportdetail" method="post" accept-charset="UTF-8">
    <input type="text" name="reportId" value="8">
    <input type="submit" value="提交">获取最终报告详情
</form>   {*获取报告详情*}

<form action="/pc/doctor/Getpatientlist" method="post" accept-charset="UTF-8">
    <input type="text" name="orgId" value="1">
    <input type="text" name="doctorId" value="1">
    <input type="text" name="token" value="5593bee793517246f9d1f8772d8a20b5">
    <input type="text" name="page" value="1">
    <input type="text" name="num" value="10">
    <input type="text" name="field" value="createTime">
    <input type="text" name="sort" value="0">
    <input type="submit" value="提交">
</form>   {*获取患者列表*} 3333333333

<form action="/pc/doctor/Getnobeginmeasureplan" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>   {*获取未实施的测量计划*}

<form action="/pc/doctor/Getfinishmeasureplan" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>   {*获取已实施的测量计划*}

<form action="/pc/doctor/Searchfinalreport" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="time" value="20161026">
    <input type="submit" value="提交">
</form>   {*搜索最终报告*}

<form action="/pc/doctor/GetSinglereport" method="post" accept-charset="UTF-8">
    <input type="text" name="planId" value="1">
    <input type="submit" value="提交">获取一般页面单次报告
</form>   {*搜索最终报告*}

<form action="/pc/doctor/GetDynamicreport" method="post" accept-charset="UTF-8">
    <input type="text" name="planId" value="1">
    <input type="submit" value="提交">获取一般页面动态报告
</form>   {*搜索最终报告*}

<form action="/pc/doctor/Isallowededit" method="post" accept-charset="UTF-8">
    <input type="text" name="doctorId" value="57">
    <input type="text" name="newsId" value="1">
    <input type="submit" value="提交">
</form>   {*搜索最终报告*}

<form action="/pc/doctor/Gethealthdynamicreportdata" method="post" accept-charset="UTF-8">
    <input type="text" name="dynamicId" value="1">
    <input type="submit" value="提交">获取动态测量报告详情
</form>   {*健康页面获取动态测量报告行啊请*}

<form action="/pc/doctor/Gethealthsinglereportdata" method="post" accept-charset="UTF-8">
    <input type="text" name="singleId" value="1">
    <input type="submit" value="提交">获取动态测量报告详情
</form>   {*健康页面获取动态测量报告行啊请*}
