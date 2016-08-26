<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Data Manage</title>
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">
    <link href="/assets/css/dashboard.css" rel="stylesheet">
</head>
<body>

{widget name='adminNav'}

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            {widget name='adminNavLeft'}
        </div>
      <div class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <!-- Breadcrumb -->
            {widget name='adminBreadcrumb'}
            <!-- Tip -->
            {widget name='adminTip'}
            <!-- menuthree -->
            {widget name='adminLevelthree'}

        <div style="margin: 0px 0px 20px 0px;"></div>
		<!-- content -->
{literal}
<pre>
&lt;!DOCTYPE&#32;html&gt;<br>&lt;html&#32;lang="zh-CN"&gt;<br>&lt;head&gt;<br>&#32;&#32;&#32;&#32;&lt;meta&#32;charset="utf-8"&gt;<br>&#32;&#32;&#32;&#32;&lt;meta&#32;http-equiv="X-UA-Compatible"&#32;content="IE=edge"&gt;<br>&#32;&#32;&#32;&#32;&lt;meta&#32;name="viewport"&#32;content="width=device-width,&#32;initial-scale=1"&gt;<br>&#32;&#32;&#32;&#32;&lt;meta&#32;name="description"&#32;content=""&gt;<br>&#32;&#32;&#32;&#32;&lt;meta&#32;name="author"&#32;content=""&gt;<br>&#32;&#32;&#32;&#32;&lt;title&gt;Admin&#32;Data&#32;Manage&lt;/title&gt;<br>&#32;&#32;&#32;&#32;&lt;link&#32;href="/assets/bootstrap-3.3.5/css/bootstrap.min.css"&#32;rel="stylesheet"&gt;<br>&#32;&#32;&#32;&#32;&lt;link&#32;href="/assets/css/color.css"&#32;rel="stylesheet"&gt;<br>&#32;&#32;&#32;&#32;&lt;link&#32;href="/assets/css/dashboard.css"&#32;rel="stylesheet"&gt;<br>&lt;/head&gt;<br>&lt;body&gt;<br>widget&#32;name='adminNav'<br>&lt;div&#32;class="container-fluid"&gt;<br>&#32;&#32;&#32;&#32;&lt;div&#32;class="row"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;class="col-sm-3&#32;col-md-2&#32;sidebar"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;{widget&#32;name='adminNavLeft'}<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;class="list-group&#32;col-sm-9&#32;col-sm-offset-3&#32;col-md-10&#32;col-md-offset-2&#32;main"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;!--&#32;Breadcrumb&#32;--&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;{widget&#32;name='adminBreadcrumb'}<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;!--&#32;Tip&#32;--&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;{widget&#32;name='adminTip'}<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;!--&#32;menuthree&#32;--&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;{widget&#32;name='adminLevelthree'}<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;style="margin:&#32;0px&#32;0px&#32;20px&#32;0px;"&gt;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;!--&#32;content&#32;--&gt;<br>			
			 Hello World!<br><br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;!--&#32;content&#32;--&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;{widget&#32;name='adminFooter'}<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&lt;/div&gt;<br><br>&lt;!--&#32;Bootstrap&#32;core&#32;JavaScript&#32;--&gt;<br>&lt;script&#32;src="/assets/js/jquery-1.11.1.min.js"&gt;&lt;/script&gt;<br>&lt;script&#32;src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"&gt;&lt;/script&gt;<br>&lt;script&#32;src="/assets/js/Sham.js"&gt;&lt;/script&gt;<br>&lt;script&#32;type="text/javascript"&gt;<br>&#32;&#32;&#32;&#32;$(document).ready(function(e){<br>&#32;&#32;&#32;&#32;});<br>&lt;/script&gt;<br>&lt;/body&gt;<br>&lt;/html&gt;
</pre><!-- content -->
{/literal}
            {widget name='adminFooter'}
      </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/assets/js/Sham.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
    });
</script>
</body>
</html>
