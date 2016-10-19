<?php
/* Smarty version 3.1.30, created on 2016-09-21 16:49:20
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Cases\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e24990578e82_82652574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfae1f09d862a41bfd6060ab692e059ac7112b32' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Cases\\Views\\Html\\List.tpl',
      1 => 1474367001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e24990578e82_82652574 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- content -->
<div class="row">
    <div class="col-md-9">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>登录名</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>地址</th>
            <th>病例总计</th>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['trueName'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['item']->value['gender'] == 1) {?>男<?php } else { ?>女<?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['age'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['addr'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['num'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
</td>
                    <td>
                        <a href="/man/?cases/html/detail&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
&patientId=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
">详情</a>
                        <a class="shamget" rel="/man/?cases/html/listdelete&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
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
