<form action="/v/user/login" method="post">
    <input type="text" name="time" value="1471276800">
    <input type="text" name="deviceId" value="dsaffsd">
    <input type="text" name="login" value="18810487666">
    <input type="text" name="type" value="android">
    <input type="text" name="password" value="dsfsfdsfd">
    <input type="text" name="verify" value="{$verify}">
    <input type="submit" value="提交">
</form>

<form action="/v/User/userinfo" method="post">
    <input type="text" name="token" value="4fe073e1ebc828d51f9145e290126ca8">
    <input type="text" name="trueName" value="baby">
    <input type="text" name="gender" value=0>
    <input type="text" name="birthday" value="2016-8-19">
    <input type="submit" value="提交">
</form>

<form action="/v/user/upuserimage" method="post" enctype="multipart/form-data">
    <input type="text" name="token" value="dd605c4834c08c3f5d95130a66ef63ea">
   <input type="file" name="tfile">
    <input type="submit" value="提交">
</form>

<form action="/v/User/resetpassword" method="post">
    <input type="text" name="token" value="4fe073e1ebc828d51f9145e290126ca8">
    <input type="text" name="password" value="abc34Ac6">
    <input type="text" name="confirm_password" value="abc34Ac6">
    <input type="text" name="old_password" value="a12a456b">
    <input type="submit" value="提交">
</form>

<form action="/v/User/findpassword" method="post">
    {*验证客户端发送信息*}
    <input type="text" name="time" value="1471276800">
    <input type="text" name="deviceId" value="dsaffsd">
    <input type="text" name="phone" value="18810487612">
    <input type="text" name="verify" value="{$verify}">

    <input type="text" name="password" value="abc34Ac7">
    <input type="text" name="confirm_password" value="abc34Ac7">
    <input type="submit" value="提交">
</form>

<form action="/v/User/Register" method="post">
    <input type="text" name="phone" value="18810487612">
    <input type="text" name="password" value="a132135">
    <input type="text" name="deviceId" value="a132135">
    <input type="text" name="deviceType" value="1">
    <input type="text" name="type" value="android">
    <input type="text" name="time" value="1471276800">
    <input type="text" name="deviceId" value="dsaffsd">
    <input type="text" name="verify" value="{$verify}">
    <input type="submit" value="提交">
</form>

<form action="/v/User/Contacts" method="post">
    <input type="text" name="token" value="dd605c4834c08c3f5d95130a66ef63ea">
    <input type="submit" value="提交">
</form>

<form action="/v/User/Contacts/delete" method="post">
    <input type="text" name="token" value="dd605c4834c08c3f5d95130a66ef63ea">
    <input type="text" name="contactsId" value="1">
    <input type="submit" value="提交">
</form>

<form action="/v/User/Contacts/insert" method="post">
    <input type="text" name="token" value="dd605c4834c08c3f5d95130a66ef63ea">
    <input type="text" name="name" value="小静">
    <input type="text" name="phone" value="110">
    <input type="text" name="relationship" value="姐妹">
    <input type="submit" value="提交">
</form>
<form action="/v/User/Questionservey" method="post">
    <input type="text" name="token" value="dd605c4834c08c3f5d95130a66ef63ea">
    <input type="text" name="eatHabits" value="1">
    <input type="text" name="drinkwine" value="1">
    <input type="text" name="SBP" value="60">
    <input type="submit" value="提交">
</form>

<form action="/v/user/userinfosubmit" method="post" enctype="multipart/form-data">
    <input type="text" name="token" value="dd605c4834c08c3f5d95130a66ef63ea">
    <input type="text" name="trueName" value="123">
    <input type="text" name="gender" value="1">
    <input type="text" name="age" value="45">
    <input type="text" name="SBP" VALUE="34">


    <input type="submit" value="提交">
</form>

<form action="/v/user/login" method="post" enctype="multipart/form-data">
    <input type="text" name="token" value="dd605c4834c08c3f5d95130a66ef63ea">
    <input type="text" name="login" value="123">
    <input type="text" name="password" value="1">


    <input type="submit" value="提交">
</form>



