<?php
/* Smarty version 3.1.30, created on 2016-08-19 14:31:51
  from "E:\phpleague\Grace\GuangjuliStand\App\Views\Home\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57b6a7d771b9a5_12155976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa7f694a8e7785416333293941d38a1aa1d48861' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\App\\Views\\Home\\Index.tpl',
      1 => 1471588310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b6a7d771b9a5_12155976 (Smarty_Internal_Template $_smarty_tpl) {
?>
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

<?php echo smarty_function_widget(array('name'=>'adminNav'),$_smarty_tpl);?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?php echo smarty_function_widget(array('name'=>'adminNavLeft'),$_smarty_tpl);?>

        </div>
        <div class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- Breadcrumb -->
            <?php echo smarty_function_widget(array('name'=>'adminBreadcrumb'),$_smarty_tpl);?>

            <!-- Tip -->
            <?php echo smarty_function_widget(array('name'=>'adminTip'),$_smarty_tpl);?>

            <!-- menuthree -->

            <?php echo smarty_function_widget(array('name'=>'adminLevelthree'),$_smarty_tpl);?>

            <!-- content -->


            <!-- /content -->
            <?php echo smarty_function_widget(array('name'=>'adminFooter'),$_smarty_tpl);?>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<?php echo '<script'; ?>
 src="/assets/js/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/Sham.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(e) {
        $('#admintip').on('close.bs.alert', function () {
            alert('1');
        });
        $('#admintip').on('closed.bs.alert', function () {
            alert('2');
        });
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
