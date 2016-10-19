<form action="/pc/nurse/getpatientlist" method="post">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>     {*患者列表*}


<form action="/pc/nurse/Searchpatient" method="post" accept-charset="UTF-8">
    <input type="text" name="orgId" value="1">
    <input type="text" name="trueName" value="">
    <input type="submit" value="提交">
</form>   {*搜索患者*}

<form action="/pc/nurse/Addpatient" method="post" accept-charset="UTF-8">
    <input type="text" name="orgId" value="1">
    <input type="text" name="login" value="">
    <input type="submit" value="提交">
</form>   {*添加患者*}

<form action="/pc/nurse/Validatelogin" method="post" accept-charset="UTF-8">
    <input type="text" name="orgId" value="1">
    <input type="text" name="login" value="">
    <input type="submit" value="提交">
</form>   {*验证手机号后注册用户*}

<form action="/pc/nurse/Addcontacts" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="name" value="">
    <input type="text" name="phone" value="">
    <input type="text" name="relationship" value="">
    <input type="submit" value="提交">
</form>   {*添加联系人*}

<form action="/pc/nurse/deletecontacts" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="contactsId" value="19">
    <input type="submit" value="提交">
</form>   {*删除联系人*}

<form action="/pc/nurse/Addmeasureplan" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="beginTime" value="2016-9-11">
    <input type="text" name="endTime" value="2016-10-30">
    <input type="text" name="single[day]" value="1">
    <input type="text" name="single[num]" value="5">
    <input type="text" name="dynamic[1][hour]" value="1">
    <input type="text" name="dynamic[1][minutes]" value="5">
    <input type="text" name="dynamic[2][hour]" value="7">
    <input type="text" name="dynamic[2][minutes]" value="8">
    <input type="submit" value="提交">
</form>  11111 {*添加测量计划*}

<form action="/pc/nurse/deletemeasureplan" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="planId" value="4">
    <input type="submit" value="提交">
</form>   {*删除测量计划*}

<form action="/pc/nurse/Registerpatient" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="trueName" value="小亮">
    <input type="text" name="age" value="43">
    <input type="text" name="gender" value="1">
    <input type="text" name="addr" value="北京dfsadfdsfdsg">
    <input type="text" name="height" value="4">
    <input type="text" name="weight" value="4">
    <input type="text" name="hipline" value="4">
    <input type="text" name="waist" value="4">
    <input type="text" name="bmi" value="4">
    <input type="text" name="smoke" value="1">
    <input type="text" name="drinkwine" value="1">
    <input type="text" name="nervous" value="1">
    <input type="text" name="SBP" value="4">
    <input type="text" name="DBP" value="4">
    <input type="text" name="bpm" value="67">
    <input type="submit" value="提交">
</form>   {*保存注册患者的所有信息*}

<form action="/pc/nurse/Savepatient" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="trueName" value="小亮">
    <input type="text" name="age" value="43">
    <input type="text" name="gender" value="1">
    <input type="text" name="addr" value="北京dfsadfdsfdsg">
    <input type="text" name="height" value="4">
    <input type="text" name="weight" value="4">
    <input type="text" name="hipline" value="4">
    <input type="text" name="waist" value="4">
    <input type="text" name="bmi" value="4">
    <input type="text" name="smoke" value="1">
    <input type="text" name="drinkwine" value="1">
    <input type="text" name="nervous" value="1">
    <input type="text" name="SBP" value="4">
    <input type="text" name="DBP" value="4">
    <input type="text" name="bpm" value="67">
    <input type="submit" value="提交">
</form>   {*保存注册患者的所有信息*}

<form action="/pc/nurse/Getpatientdetail" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="submit" value="提交">
</form>   {*获取用户信息*}

<form action="/pc/nurse/Getpatientcases" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>   {*获取患者病历*}

<form action="/pc/nurse/Getpatientcontacts" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="submit" value="提交">
</form>   {*获取患者联系人*}

<form action="/pc/nurse/Getpatientmeasureplan" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>   {*获取患者测量计划*}

<form action="/pc/nurse/Addcases" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="beginTime" value="2015-10-01">
    <input type="text" name="endTime" value="2016-10-01">
    <input type="text" name="disease" value="">
    <input type="text" name="orgId" value="1">
    <input type="text" name="medicineId[]" value="1">
    <input type="text" name="medicineId[]" value="2">
    <input type="submit" value="提交">
</form>   {*添加患者病历*}

<form action="/pc/nurse/Getpatientcases" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="97">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>   {*获取患者病历*}

<form action="/pc/nurse/Getnodetectiondetail" method="post" accept-charset="UTF-8">
    <input type="text" name="userId" value="69">
    <input type="text" name="orgId" value="1">
    <input type="submit" value="提交">
</form>   {*获取未检测详情*}

<form action="/pc/nurse/Searchmedicine" method="post" accept-charset="UTF-8">
    <input type="text" name="disease" value="69">
    <input type="text" name="name" value="1">
    <input type="submit" value="提交">
</form>   {*获取未检测详情*}
