<?php
/* Smarty version 3.1.30, created on 2016-10-21 14:41:00
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Setup\Views\Html\Yy.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5809b87c688387_00700059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb9a7e071710e7438e459eb30df7ab6213655281' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Setup\\Views\\Html\\Yy.tpl',
      1 => 1477032053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5809b87c688387_00700059 (Smarty_Internal_Template $_smarty_tpl) {
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
            "aLengthMenu": [[100, 200, -1], [100, 200, "All"]],
            "iDisplayLength":100,			//一页多少条
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
    <div class="col-md-12">
        <table class="table table-striped table-hover" id="dt2">
            <thead>
            <th>ID</th>
            <th>调用</th>
            <th>CHR</th>
            <th>关键词</th>
            <th>描述</th>
            <th>缓存?</th>
            <th>params</th>
            <th width="60">操作</th>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['facede'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['chr'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['keywords'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['des'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['cache'];?>
:<?php echo $_smarty_tpl->tpl_vars['item']->value['expire'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['params'];?>
</td>
                    <td>
                        <a href="/man/?setup/html/facade&type=<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value['chr'];?>
">查看</a>
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
