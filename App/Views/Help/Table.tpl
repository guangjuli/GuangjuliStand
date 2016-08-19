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
<div class="row">
    <div class="col-md-6 ">
 <table class="table table-striped table-hover">
                <thead>
                <th>123123123</th>
                <th>123123123</th>
                <th>123123123</th>
                <th>123123123</th>
                <th>123123123</th>
                </thead>
                <tr>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                </tr>
                <tr>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                </tr>
                <tr>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                </tr>
            </table>
            <ul class="pagination pagination-sm" style="margin: 0px 0;">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>    
    
    </div>
    <div class="col-md-6 ">

<h3>Code</h3>
{literal}
<pre>&lt;table&#32;class="table&#32;table-striped&#32;table-hover"&gt;<br>&#32;&#32;&#32;&#32;&lt;thead&gt;<br>&#32;&#32;&#32;&#32;&lt;th&gt;123123123&lt;/th&gt;<br>&#32;&#32;&#32;&#32;&lt;th&gt;123123123&lt;/th&gt;<br>&#32;&#32;&#32;&#32;&lt;th&gt;123123123&lt;/th&gt;<br>&#32;&#32;&#32;&#32;&lt;th&gt;123123123&lt;/th&gt;<br>&#32;&#32;&#32;&#32;&lt;th&gt;123123123&lt;/th&gt;<br>&#32;&#32;&#32;&#32;&lt;/thead&gt;<br>&#32;&#32;&#32;&#32;&lt;tr&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;td&gt;123123123&lt;/td&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;td&gt;123123123&lt;/td&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;td&gt;123123123&lt;/td&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;td&gt;123123123&lt;/td&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;td&gt;123123123&lt;/td&gt;<br>&#32;&#32;&#32;&#32;&lt;/tr&gt;<br>&lt;/table&gt;<br>&lt;ul&#32;class="pagination&#32;pagination-sm"&#32;style="margin:&#32;0px&#32;0;"&gt;<br>&#32;&#32;&#32;&#32;&lt;li&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;a&#32;href="#"&#32;aria-label="Previous"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;span&#32;aria-hidden="true"&gt;&amp;laquo;&lt;/span&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/a&gt;<br>&#32;&#32;&#32;&#32;&lt;/li&gt;<br>&#32;&#32;&#32;&#32;&lt;li&gt;&lt;a&#32;href="#"&gt;1&lt;/a&gt;&lt;/li&gt;<br>&#32;&#32;&#32;&#32;&lt;li&gt;&lt;a&#32;href="#"&gt;2&lt;/a&gt;&lt;/li&gt;<br>&#32;&#32;&#32;&#32;&lt;li&gt;&lt;a&#32;href="#"&gt;3&lt;/a&gt;&lt;/li&gt;<br>&#32;&#32;&#32;&#32;&lt;li&gt;&lt;a&#32;href="#"&gt;4&lt;/a&gt;&lt;/li&gt;<br>&#32;&#32;&#32;&#32;&lt;li&gt;&lt;a&#32;href="#"&gt;5&lt;/a&gt;&lt;/li&gt;<br>&#32;&#32;&#32;&#32;&lt;li&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;a&#32;href="#"&#32;aria-label="Next"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;span&#32;aria-hidden="true"&gt;&amp;raquo;&lt;/span&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/a&gt;<br>&#32;&#32;&#32;&#32;&lt;/li&gt;<br>&lt;/ul&gt;</pre>
{/literal}      
    
    </div>
</div>

           

            <!-- content -->
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
