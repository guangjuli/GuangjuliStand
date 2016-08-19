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
                    <!-- content -->
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>
                    <!-- /content -->
                </div>
                <div class="col-md-6 ">
                    <!-- description -->
<h3>Code</h3>
{literal}
<pre>&lt;form&#32;class="form-horizontal"&gt;<br><br>&#32;&#32;&#32;&#32;&lt;div&#32;class="form-group"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;label&#32;for="inputEmail3"&#32;class="col-sm-2&#32;control-label"&gt;Email&lt;/label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;class="col-sm-10"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;input&#32;type="email"&#32;class="form-control"&#32;id="inputEmail3"&#32;placeholder="Email"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br><br>&#32;&#32;&#32;&#32;&lt;div&#32;class="form-group"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;label&#32;for="inputPassword3"&#32;class="col-sm-2&#32;control-label"&gt;Password&lt;/label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;class="col-sm-10"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;input&#32;type="password"&#32;class="form-control"&#32;id="inputPassword3"&#32;placeholder="Password"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br><br>&#32;&#32;&#32;&#32;&lt;div&#32;class="form-group"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;class="col-sm-offset-2&#32;col-sm-10"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;class="checkbox"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;input&#32;type="checkbox"&gt;&#32;Remember&#32;me<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br><br>&#32;&#32;&#32;&#32;&lt;div&#32;class="form-group"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;div&#32;class="col-sm-offset-2&#32;col-sm-10"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;button&#32;type="submit"&#32;class="btn&#32;btn-default"&gt;Sign&#32;in&lt;/button&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;<br>&lt;/form&gt;</pre>
{/literal}                    
                    
                    
                    
                  <!-- /description -->

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
