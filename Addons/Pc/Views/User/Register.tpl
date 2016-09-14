<form action="/v/user/register" method="post">
    <input type="text" name="time" value="1471276800">
    <input type="text" name="deviceId" value="dsaffsd">
    <input type="text" name="phone" value="188">
    <input type="text" name="type" value="android">
    <input type="text" name="password" value="a12a456b">
    <input type="text" name="checkcode" value="23456">
    <input type="text" name="verify" value="{$verify}">
    <input type="text" name="deviceType" value="1">
    <input type="submit" value="提交">
</form>

<form action="/v/User/userinfo" method="post">
    <input type="text" name="token" value="833b6c3014973a05f07c3ebd6344391c">
    <input type="text" name="trueName" value="baby">
    <input type="text" name="gender" value=0>
    <input type="text" name="birthday" value="2016-8-19">
    <input type="submit" value="提交">
</form>

<form action="/v/user/upuserimage" method="post" enctype="multipart/form-data">
    <input type="text" name="token" value="833b6c3014973a05f07c3ebd6344391c">
   <input type="file" name="tfile">
    <input type="submit" value="提交">
</form>

<form action="/v/User/resetpassword" method="post">
    <input type="text" name="token" value="833b6c3014973a05f07c3ebd6344391c">
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

<form action="/v/User/Register/authcode" method="post">
    <input type="text" name="phone" value="18810487612">

    <input type="text" name="time" value="1471276800">
    <input type="text" name="deviceId" value="dsaffsd">
    <input type="text" name="verify" value="{$verify}">
    <input type="submit" value="提交">
</form>

