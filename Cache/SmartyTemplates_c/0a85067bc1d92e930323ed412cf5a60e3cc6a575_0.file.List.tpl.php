<?php
/* Smarty version 3.1.30, created on 2016-10-18 16:26:38
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Devicetype\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5805dcbe958136_09806479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a85067bc1d92e930323ed412cf5a60e3cc6a575' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Devicetype\\Views\\Html\\List.tpl',
      1 => 1474452765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5805dcbe958136_09806479 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- content -->
<div class="row">
    <div class="col-md-6">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>设备类型</th>
            <th>描述</th>
            <th>排序</th>
            <th>状态</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['deviceTypeId'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['des'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
</td>
                    <td>
                        <a href="/man/?devicetype/html/edit&deviceTypeId=<?php echo $_smarty_tpl->tpl_vars['item']->value['deviceTypeId'];?>
">修改</a>
                        <a class="shamget" rel="/man/?devicetype/html/delete&deviceTypeId=<?php echo $_smarty_tpl->tpl_vars['item']->value['deviceTypeId'];?>
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
