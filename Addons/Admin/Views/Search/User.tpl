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
            <!-- content -->
            <div style="margin: 0px 0px 20px 0px;"></div>
            <!-- content -->
            <div class="row">
                <div class="col-md-6 ">

                    <div class="row">
                        <div class="col-md-12 ">
                            <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="用户名">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="电话">
                            </div>
                            <button type="submit" class="btn btn-danger usersearch">搜索</button>

                            </form>
                        </div>
                        <div class="col-md-12 " style="margin: 5px 0px 5px 0px;"></div>
                        <div class="col-md-12 ">
                            <a class="btn btn-primary changeusersearchstates" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                高级搜索
                            </a>
                            <div style="margin: 0px 0px 10px 0px;"></div>

                            <div id="collapseExample" class="collapse {if $smarty.cookies.changeusersearchstates eq 1}in{/if}">
                                <!-- part1 -->

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <h3>用户<small>[ 12 ]</small></h3>
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
                            </table>

                        </div>

                    </div>


                </div>
                <div class="col-md-6 ">
                    <pre>
搜索条件设置: 用户login / tel / other
结果 : 用户详细信息 / 血压信息 / 其他信息
                    </pre>
                </div>
            </div>

            <!-- /content -->
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
        $('.changeusersearchstates').click(function () {
            setc('changeusersearchstates');
        });
        $('.usersearch').click(function () {
            alert(1);
        });

    });
</script>
</body>
</html>
