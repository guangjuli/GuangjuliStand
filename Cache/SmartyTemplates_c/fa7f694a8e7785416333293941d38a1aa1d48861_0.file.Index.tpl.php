<?php
/* Smarty version 3.1.30, created on 2016-08-18 15:10:54
  from "E:\phpleague\Grace\GuangjuliStand\App\Views\Home\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57b55f7e73dc25_23949540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa7f694a8e7785416333293941d38a1aa1d48861' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\App\\Views\\Home\\Index.tpl',
      1 => 1471504252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b55f7e73dc25_23949540 (Smarty_Internal_Template $_smarty_tpl) {
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

            <h2>Title <small>des</small></h2>
            <hr>

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
                <tr>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                </tr>
                <tr>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                    <td>123123123</td>
                </tr>
            </table>
                <ul class="pagination pagination-sm" style="margin: 0px 0;">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>

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
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
