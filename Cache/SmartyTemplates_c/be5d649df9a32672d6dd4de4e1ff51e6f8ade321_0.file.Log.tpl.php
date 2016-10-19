<?php
/* Smarty version 3.1.30, created on 2016-09-18 16:37:40
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Api\Views\Html\Log.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57de52540eac63_35516078',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be5d649df9a32672d6dd4de4e1ff51e6f8ade321' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Api\\Views\\Html\\Log.tpl',
      1 => 1474187573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57de52540eac63_35516078 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="/assets/css/table.css" rel="stylesheet">
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
</span> <a href="/man/?/api/html/log&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">/<?php echo $_smarty_tpl->tpl_vars['item']->value['v'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['api'];?>
</a>
                                    <?php } else { ?>
                                        <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</span> <a href="/man/?/api/html/log&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
                        <?php echo smarty_function_widget(array('ads'=>'api/html/apiview'),$_smarty_tpl);?>

                    </div>

                </div>
            </div>
<?php }
}
