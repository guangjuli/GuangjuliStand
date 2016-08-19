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
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <!-- /content -->
                </div>
                <div class="col-md-6 ">
                    <!-- description -->
                    <h3>Code</h3>
{literal}
<pre>&lt;form&gt;<br>&#32;&#32;&#32;&#32;&lt;!--&#32;part1&#32;--&gt;<br>&#32;&#32;&#32;&#32;&lt;div&#32;class="form-group"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;label&#32;for="exampleInputEmail1"&gt;Email&#32;address&lt;/label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;input&#32;type="email"&#32;class="form-control"&#32;id="exampleInputEmail1"&#32;placeholder="Email"&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;!--&#32;part1&#32;--&gt;<br>&#32;&#32;&#32;&#32;&lt;div&#32;class="form-group"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;label&#32;for="exampleInputPassword1"&gt;Password&lt;/label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;input&#32;type="password"&#32;class="form-control"&#32;id="exampleInputPassword1"&#32;placeholder="Password"&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;!--&#32;part1&#32;--&gt;<br>&#32;&#32;&#32;&#32;&lt;div&#32;class="form-group"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;label&#32;for="exampleInputFile"&gt;File&#32;input&lt;/label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;input&#32;type="file"&#32;id="exampleInputFile"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;p&#32;class="help-block"&gt;Example&#32;block-level&#32;help&#32;text&#32;here.&lt;/p&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;!--&#32;part1&#32;--&gt;<br>&#32;&#32;&#32;&#32;&lt;div&#32;class="checkbox"&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;label&gt;<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;input&#32;type="checkbox"&gt;&#32;Check&#32;me&#32;out<br>&#32;&#32;&#32;&#32;&#32;&#32;&#32;&#32;&lt;/label&gt;<br>&#32;&#32;&#32;&#32;&lt;/div&gt;<br>&#32;&#32;&#32;&#32;&lt;!--&#32;part1&#32;--&gt;<br>&#32;&#32;&#32;&#32;&lt;button&#32;type="submit"&#32;class="btn&#32;btn-default"&gt;Submit&lt;/button&gt;<br>&lt;/form&gt;</pre>
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
