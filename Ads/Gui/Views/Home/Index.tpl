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
    <script src="/assets/js/jquery-1.11.1.min.js"></script>
    <style type="text/css">
        .error{
            color:red;
            font-weight: bold;
        }
    </style>
</head>
<body>

{widget ads=$gui_Nav}


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            {widget ads=$gui_Navleft}

        </div>
        <div class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- Breadcrumb -->

            {widget ads=$gui_Breadcrumb}
            <!-- Tip -->
            <!-- menuthree -->
            {widget ads=$gui_NavLevelThree}

            <div style="margin: 0px 0px 20px 0px;"></div>

            <!-- content -->

           {$gui_html}

            <!-- /content -->
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/assets/js/Sham.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#admintip').on('close.bs.alert', function () {
            alert('1');
        });
        $('#admintip').on('closed.bs.alert', function () {
            alert('2');
        });
    });
</script>
</body>
</html>
