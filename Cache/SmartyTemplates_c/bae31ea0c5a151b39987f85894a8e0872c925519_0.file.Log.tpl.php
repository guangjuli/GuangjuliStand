<?php
/* Smarty version 3.1.30, created on 2016-09-18 09:55:33
  from "E:\phpleague\Grace\GuangjuliStand\Addons\Admin\Views\Api\Log.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ddf415bbc882_71184570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bae31ea0c5a151b39987f85894a8e0872c925519' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Addons\\Admin\\Views\\Api\\Log.tpl',
      1 => 1472199646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ddf415bbc882_71184570 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link href="/assets/css/table.css" rel="stylesheet">
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


            <div style="margin: 0px 0px 20px 0px;"></div>
            <!-- content -->
            <div class="row">
                <div class="col-md-4 ">
                    <table class="table table-striped table-hover" id="dt1">
                        <thead>
                        <th>api</th>
                        <th>title</th>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <tr>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'POST') {?>
                                        <span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</span> <a href="?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['apiId'];?>
">/<?php echo $_smarty_tpl->tpl_vars['item']->value['v'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['api'];?>
</a>
                                    <?php } else { ?>
                                        <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</span> <a href="?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['apiId'];?>
">/<?php echo $_smarty_tpl->tpl_vars['item']->value['v'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['api'];?>
</a>
                                    <?php }?>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-8 ">
                    <div class="row">
                        <?php echo smarty_function_widget(array('name'=>'apiView'),$_smarty_tpl);?>

                    </div>

                </div>
            </div>
            <!-- 内容 -->
            <?php echo smarty_function_widget(array('name'=>'adminFooter'),$_smarty_tpl);?>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/Sham.js"><?php echo '</script'; ?>
>

<!-- Table -->
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#dt1').dataTable({
            "aaSorting": [[ 0, "desc" ]],
            "aLengthMenu": [[30, 50, -1], [30, 50, "All"]],
            "iDisplayLength":50,			//一页多少条
            "bAutoWidth": true,	//自动宽度
            "bStateSave": true,
            "bLengthChange": true, //改变每页显示数据数量

            "oLanguage": {
                "sLengthMenu": "每页显示 _MENU_ 条记录",
                "sZeroRecords": "抱歉， 没有找到",
                "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                "sInfoEmpty": "没有数据",
                "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "前一页",
                    "sNext": "后一页",
                    "sLast": "尾页"
                },
                "sZeroRecords": "没有检索到数据",
                "sProcessing": "<img src='./loading.gif' />"
            }
        });
    });
<?php echo '</script'; ?>
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
