<?php
/* Smarty version 3.1.30, created on 2016-10-12 15:46:25
  from "E:\phpleague\Grace\GuangjuliStand\Ads\User\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fdea511b5a51_44532260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a208ba256c8bb9bc000096d06524459a68d734bd' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\User\\Views\\Html\\List.tpl',
      1 => 1476257880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fdea511b5a51_44532260 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="/assets/css/table.css" rel="stylesheet">
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#dt2').dataTable({
            "aaSorting": [[ 0, "desc" ]],
            "aLengthMenu": [[30, 50, -1], [30, 50, "All"]],
            "iDisplayLength":50,			//一页多少条
            "bAutoWidth": true,	//自动宽度
            "bStateSave": false,
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
    <div class="col-md-8">
        <table class="table table-striped table-hover" id="dt2">
            <thead>
            <th>ID</th>
            <th>用户组</th>
            <th>登录名</th>
            <th>密码</th>
            <th>描述</th>
            <th>状态</th>
            <th>排序</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
</td>
                    <td><?php if (!empty($_smarty_tpl->tpl_vars['group']->value[$_smarty_tpl->tpl_vars['item']->value['groupId']])) {
echo $_smarty_tpl->tpl_vars['group']->value[$_smarty_tpl->tpl_vars['item']->value['groupId']];
} else {
echo $_smarty_tpl->tpl_vars['item']->value['groupId'];
}?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['password'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['des'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
</td>
                    <td>
                        <a href="/man/?user/html/edit&userId=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
">修改</a>
                        <a class="shamget" rel="/man/?user/html/delete&userId=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
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
    </div>
    <div class="col-md-6 ">
    </div>
</div>


<?php }
}
