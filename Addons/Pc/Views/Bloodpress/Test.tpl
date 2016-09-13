<form action="/v/bloodpress/Uploadbloodlog" method="post">
    <input type="text" name="token" value="833b6c3014973a05f07c3ebd6344391c">
    <input type="text" name="story[0]['type']" value="1">
    <input type="text" name="story[0]['createDay']" value="20160812">
    <input type="text" name="story[0]['time']" value="1471276800">
    <input type="text" name="story[0]['shrink']" value="102.5">
    <input type="text" name="story[0]['diastole']" value="19.6">
    <input type="text" name="story[0]['bpm']" value="103.4">
    <input type="text" name="story[0]['day']" value="0">

    <input type="submit" value="提交">
</form>


<form action="/v/bloodpress/Bloodlogbydateandtype" method="post">
    <input type="text" name="token" value="833b6c3014973a05f07c3ebd6344391c">
    <input type="text" name="createDay" value="20160812">
    <input type="text" name="type" value="1">
    <input type="submit" value="提交">
</form>

<form action="/v/bloodpress/Getpiechart" method="post">
    <input type="text" name="token" value="833b6c3014973a05f07c3ebd6344391c">
    <input type="text" name="createDay" value="20160812">

    <input type="submit" value="提交">
</form>
