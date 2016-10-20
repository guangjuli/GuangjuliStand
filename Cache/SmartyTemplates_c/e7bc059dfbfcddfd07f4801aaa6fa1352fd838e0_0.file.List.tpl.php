<?php
/* Smarty version 3.1.30, created on 2016-09-28 17:17:36
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Api\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57eb8ab0375298_24560842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7bc059dfbfcddfd07f4801aaa6fa1352fd838e0' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Api\\Views\\Html\\List.tpl',
      1 => 1474452764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57eb8ab0375298_24560842 (Smarty_Internal_Template $_smarty_tpl) {
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

<table class="table table-striped table-hover" id="dt1">
                <thead>
                <th>Id</th>
                <th>版本</th>
                <th>Type</th>
                <th>Api</th>
                <th>Title</th>
                <th>Active</th>
                <th width="150">操作</th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['v'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
                    <td><a href="/man/?/api/html/log&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['api'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                    <td>
                       <?php if ($_smarty_tpl->tpl_vars['item']->value['active'] == 1) {?>
                           <span class="label label-default">打开</span>
                       <?php } else { ?>
                           <span class="label label-danger">关闭</span>
                       <?php }?>
                    </td>
                    <td>
                        <a href="/man/?/api/html/log&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">日志</a>
                        <a href="/man/?/api/html/edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">修改</a>
                        <a class="shamget" rel="/man/?/api/html/delete&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
            </table>
<?php }
}
