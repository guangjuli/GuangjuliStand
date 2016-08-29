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
<h3>nav</h3>
{widget ads='gui/home/Nav'}

<h3>navleft</h3>
{widget ads='gui/home/NavLeft'}

<h3>Levelthree</h3>
{widget ads='gui/home/Levelthree'}
<!-- content -->

<h3>Breadcrumb</h3>
<!-- Breadcrumb -->
{widget ads='gui/home/Breadcrumb'}

<h3>Tip</h3>
<!-- Tip -->
{widget ads='gui/home/Tip'}
<!-- menuthree -->

<h3>nr</h3>
{widget ads='gui/home/Footer'}

<h3>Footer</h3>
<!-- /content -->
{widget ads='gui/home/Footer'}

<!-- Bootstrap core JavaScript -->
<script src="/assets/js/jquery-1.11.1.min.js"></script>
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
