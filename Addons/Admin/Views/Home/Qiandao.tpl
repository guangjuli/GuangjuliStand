<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" />

    <!-- DATA TABLE CSS -->
    <link href="/ui/css/table.css" rel="stylesheet">

    <script type="text/javascript" src="/assets/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/ui/js/admin.js"></script>

    <style type="text/css">
        body {
            padding-top: 60px;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Google Fonts call. Font Used Open Sans -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <!-- DataTables Initialization -->
    <script type="text/javascript" src="/assets/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            $('#dt1').dataTable({
                "aLengthMenu": [[20, 25, 50, -1], [20, 25, 50, "All"]],
                "iDisplayLength":20
            });
        });
    </script>


</head>
<body>

<!-- NAVIGATION MENU -->

<div class="navbar-nav navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)">
                <img alt="Brand" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAUCAYAAABiS3YzAAAACXBIWXMAAAsTAAALEwEAmpwYAAABNmlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjarY6xSsNQFEDPi6LiUCsEcXB4kygotupgxqQtRRCs1SHJ1qShSmkSXl7VfoSjWwcXd7/AyVFwUPwC/0Bx6uAQIYODCJ7p3MPlcsGo2HWnYZRhEGvVbjrS9Xw5+8QMUwDQCbPUbrUOAOIkjvjB5ysC4HnTrjsN/sZ8mCoNTIDtbpSFICpA/0KnGsQYMIN+qkHcAaY6addAPAClXu4vQCnI/Q0oKdfzQXwAZs/1fDDmADPIfQUwdXSpAWpJOlJnvVMtq5ZlSbubBJE8HmU6GmRyPw4TlSaqo6MukP8HwGK+2G46cq1qWXvr/DOu58vc3o8QgFh6LFpBOFTn3yqMnd/n4sZ4GQ5vYXpStN0ruNmAheuirVahvAX34y/Axk/96FpPYgAAACBjSFJNAAB6JQAAgIMAAPn/AACA6AAAUggAARVYAAA6lwAAF2/XWh+QAAACRUlEQVR42ozUSWjWVxQF8F+SzwETq0RRCVVxFimFgtPCgIKLGogUaQzdOGAQSl0pboq0UCgUQQiCA4q4MLoSWxXcqcVGi4IWSgsOdUCjEmfj0MjXJm7OBx8x0Vz48+e9d98dzjn3VWw/0mgAa8AqHMVhFLP/OdbgOA72d7GASvT0c3YKtViA0fgL0/EZfsOJgaopoAkdONvnrBttCb4DO9GOr5MApqAXt7Keh9qqZc2zmtCC4biCIahKwnUJ8iLVPUcjxuImlgSWDqzFZnQXsA3/YCnmYBxe4g7q8R/+xFVMwngsx6dJPgErMBMH8EshVbThGDZgPYbhEvbiOmZhcaprxcf4BvNzf0/WHSVMS9aFn/AKX+ExvsC9JGjHGHyJiemgHfuigmI5UeXWk1Zn4xo+wVxMLmN/Iv7A3+GhvTygyKmvTcW0nJ3G/jDckv8hnAzuM/K9I6mhAbsLz4JRZVodgU5cQDXOxWdSCP0//kJqERcrE6ARP4aAp3gQ54pcrgrGNZFTMT6dGInV2JJkxUJEfjJS+T5Oo/AGT6KE2lTdE+Kqg3d9oDqDraUBKhF1Gd9hITZFr8NxI63fRx1e52xeOnyBn7H7feyfx5H8X2VK6oLlmyhhAn4NYQ1RyXvZr4tGi9iFlZHSRjTjdlTwbYbi0UAPSt9H5PfSZOShaA3Oc7J/PWfFPIn/fijokwDem3UF7uIHLAokH+FhJqqrv0r7tt8b7fWUrYXtmkzbQx+wSoOzsRndmsE4Dzboszx9rwfj/HYAl92e7KDhDE4AAAAASUVORK5CYII=">
            </a>
            <a class="navbar-brand" href="javascript:void(0)"> 后台管理 </a>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/admin/"><i class="icon-home icon-white"></i>用户管理</a></li>
                <li><a href="/admin/diaocha/"><i class="icon-th icon-white"></i>调查问卷</a></li>
                <li><a href="/admin/zhishi"><i class="icon-lock icon-white"></i>知识问答</a></li>
                <li class="active"><a href="/admin/qiandao"><i class="icon-user icon-white"></i>整点签到</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container-fluid">

<!-- CONTENT -->
<div class="row">
<div class="col-sm-12 col-lg-12">


<h4><strong>Data Table</strong></h4>

<table class="display" id="dt1">
<thead>
<tr>
    <th width="70">序号</th>
    <th width="180">问题</th>
    <th width="150">A</th>
    <th width="70">B</th>
    <th>C</th>
    <th>D</th>
    <th>答案</th>
    <th width="260">操作</th>
</tr>
</thead>
<tbody>
<tr class="odd gradeX">
    <td>1</td>
    <td>051113800189199</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center"> 4</td>
    <td>用户信息 签到 知识问答 调查问卷 积分</td>
</tr>
<tr class="even gradeC">
    <td>Trident</td>
    <td>Internet Explorer 5.0</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">5</td>
    <td class="center">C</td>
</tr>
<tr class="odd gradeA">
    <td>Trident</td>
    <td>Internet Explorer 5.5</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">5.5</td>
    <td class="center">A</td>
</tr>
<tr class="even gradeA">
    <td>Trident</td>
    <td>Internet Explorer 6</td>
    <td>Win 98+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">6</td>
    <td class="center">A</td>
</tr>
<tr class="odd gradeA">
    <td>Trident</td>
    <td>Internet Explorer 7</td>
    <td>Win XP SP2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">7</td>
    <td class="center">A</td>
</tr>
<tr class="even gradeA">
    <td>Trident</td>
    <td>AOL browser (AOL desktop)</td>
    <td>Win XP</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">6</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 1.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 1.5</td>
    <td>Win 98+ / OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 2.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 3.0</td>
    <td>Win 2k+ / OSX.3+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.9</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.0</td>
    <td>OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.5</td>
    <td>OSX.3+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape 7.2</td>
    <td>Win 95+ / Mac OS 8.6-9.2</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Browser 8</td>
    <td>Win 98SE+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Navigator 9</td>
    <td>Win 98+ / OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.1</td>
    <td>Win 95+ / OSX.1+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.2</td>
    <td>Win 95+ / OSX.1+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.2</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.3</td>
    <td>Win 95+ / OSX.1+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.3</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.4</td>
    <td>Win 95+ / OSX.1+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.4</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.5</td>
    <td>Win 95+ / OSX.1+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">1.5</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 2.0</td>
    <td>OSX.4+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">419.3</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 3.0</td>
    <td>OSX.4+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">522.1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>OmniWeb 5.5</td>
    <td>OSX.4+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">420</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>iPod Touch / iPhone</td>
    <td>iPod</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">420.1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>S60</td>
    <td>S60</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">413</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 7.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 7.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 8.0</td>
    <td>Win 95+ / OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 8.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeC">
    <td>Misc</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>PSP browser</td>
    <td>PSP</td>
    <td class="center">-</td>
    <td class="center">C</td>
</tr>
<tr class="gradeU">
    <td>Other browsers</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>Win 95+</td>
    <td>All others</td>
    <td>-</td>
    <td class="center">-</td>
    <td class="center">U</td>
</tr>
</tbody>
</table><!--/END SECOND TABLE -->

</div><!--/span12 -->
</div><!-- /row -->




</div> <!-- /container -->
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <!-- FOOTER -->
            <div id="footerwrap">
                <footer class="clearfix"></footer>
                <hr>
                <p>@Sham Copyright &copy;2016</p>
                </footer>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /footerwrap -->

</body></html>