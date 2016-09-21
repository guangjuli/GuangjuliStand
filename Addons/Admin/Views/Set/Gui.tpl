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
                    <form class="form-horizontal" method="post" action="/admin/set/gui/">

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">面包屑</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="Breadcrumb" id="optionsRadios1" value="1" {if $Breadcrumb eq 1}checked{/if}>
                                        打开
                                    </label>
                                    <label>
                                        <input type="radio" name="Breadcrumb" id="optionsRadios1" value="0" {if $Breadcrumb neq 1}checked{/if}>
                                        关闭
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tip</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="Tip" id="optionsRadios1" value="1" {if $Tip eq 1}checked{/if}>
                                        打开
                                    </label>
                                    <label>
                                        <input type="radio" name="Tip" id="optionsRadios1" value="0" {if $Tip neq 1}checked{/if}>
                                        关闭
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Footer</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="Footer" id="optionsRadios1" value="1" {if $Footer eq 1}checked{/if}>
                                        打开
                                    </label>
                                    <label>
                                        <input type="radio" name="Footer" id="optionsRadios1" value="0" {if $Footer neq 1}checked{/if}>
                                        关闭
                                    </label>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">提交</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-6 ">
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
