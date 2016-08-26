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
                <form class="form-horizontal" method="post" action="/admin/api/list/add">
                    <div class="col-md-6 ">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" value="" class="form-control" id="" placeholder="名称">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">版本</label>
                            <div class="col-sm-10">
                                <input name="v" value="" class="form-control" id="" placeholder="版本">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Api</label>
                            <div class="col-sm-10">
                                <input  name="api" value="" class="form-control" id="" placeholder="api">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10">
                                <select  name="type" multiple class="form-control">
                                    <option>POST</option>
                                    <option>GET</option>
                                    <option>PUT</option>
                                    <option>DELETE</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Active</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="active" id="" value="1">
                                        打开
                                    </label>
                                    <label>
                                        <input type="radio" name="active" id="" value="0">
                                        关闭
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">修改</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 ">
                        <!-- part1 -->

                        <div class="form-group">
                            <label for="exampleInputEmail1">说明</label>
                            <textarea name="dis" class="form-control" rows="8"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">输入 Like</label>
                            <textarea name="request" class="form-control" rows="8"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">输出 Like</label>
                            <textarea name="response" class="form-control" rows="8"></textarea>
                        </div>

                    </div>
                </form>
            </div>



            <!-- 内容 -->
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
