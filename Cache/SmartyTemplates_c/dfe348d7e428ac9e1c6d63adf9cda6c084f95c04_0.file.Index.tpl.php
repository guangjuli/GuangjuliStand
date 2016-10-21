<?php
/* Smarty version 3.1.30, created on 2016-10-21 17:50:38
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Gui\Views\Home\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5809e4ee8dcf04_11564357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfe348d7e428ac9e1c6d63adf9cda6c084f95c04' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Gui\\Views\\Home\\Index.tpl',
      1 => 1477043436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5809e4ee8dcf04_11564357 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link href="/assets/reset.css" rel="stylesheet">
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">
    <link href="/assets/css/dashboard.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="/assets/js/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>

    <style type="text/css">
        .error{
            color:red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php echo smarty_function_widget(array('ads'=>$_smarty_tpl->tpl_vars['gui_Nav']->value),$_smarty_tpl);?>



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?php echo smarty_function_widget(array('ads'=>$_smarty_tpl->tpl_vars['gui_Navleft']->value),$_smarty_tpl);?>


        </div>
        <div class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- Breadcrumb -->
            <?php echo smarty_function_widget(array('ads'=>$_smarty_tpl->tpl_vars['gui_Breadcrumb']->value),$_smarty_tpl);?>


            <!-- Tip -->
            <?php echo smarty_function_widget(array('ads'=>$_smarty_tpl->tpl_vars['gui_Tip']->value),$_smarty_tpl);?>

            <!-- Tip -->

            <!-- menuthree -->
            <?php echo smarty_function_widget(array('ads'=>$_smarty_tpl->tpl_vars['gui_NavLevelThree']->value),$_smarty_tpl);?>


            <div style="margin: 0px 0px 20px 0px;"></div>

            <!-- content -->

           <?php echo $_smarty_tpl->tpl_vars['gui_html']->value;?>


            <!-- /content -->
            <?php echo smarty_function_widget(array('ads'=>$_smarty_tpl->tpl_vars['gui_Footer']->value),$_smarty_tpl);?>


        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
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
