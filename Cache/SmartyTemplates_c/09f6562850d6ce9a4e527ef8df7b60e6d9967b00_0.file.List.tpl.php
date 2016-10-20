<?php
/* Smarty version 3.1.30, created on 2016-09-21 16:09:05
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Patient\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e2402105c342_25478719',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09f6562850d6ce9a4e527ef8df7b60e6d9967b00' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Patient\\Views\\Html\\List.tpl',
      1 => 1474445302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e2402105c342_25478719 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- content -->
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>用户Id</th>
            <th>真实姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>地址</th>
            <th>手机号</th>
            <th>血压</th>
            <th>心电</th>
            <th>腕表</th>
            <th>排序</th>
            <th>active</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['userInfoId'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['trueName'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['item']->value['gender'] == 1) {?>男<?php } else { ?>女<?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['age'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['addr'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['item']->value['bloodpress'] == 1) {?>使用<?php } else { ?>*<?php }?></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['item']->value['ecg'] == 1) {?>使用<?php } else { ?>*<?php }?></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['item']->value['watch'] == 1) {?>使用<?php } else { ?>*<?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
</td>
                    <td>
                        <a href="/man/?patient/html/detail&userId=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
&patientId=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
">详情</a>
                        <a href="/man/?patient/html/edit&userId=<?php echo $_smarty_tpl->tpl_vars['item']->value['userId'];?>
">修改</a>
                        <a class="shamget" rel="/man/?patient/html/delete&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['userInfoId'];?>
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
