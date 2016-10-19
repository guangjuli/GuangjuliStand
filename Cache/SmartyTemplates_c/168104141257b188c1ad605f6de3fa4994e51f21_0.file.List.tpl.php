<?php
/* Smarty version 3.1.30, created on 2016-10-18 10:02:50
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Menu\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580582caeabfb5_61215643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '168104141257b188c1ad605f6de3fa4994e51f21' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Menu\\Views\\Html\\List.tpl',
      1 => 1476257879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580582caeabfb5_61215643 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- content -->
<div class="row">
    <div class="col-md-4">
        <table class="table table-hover" id="dt1">
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['toplist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr <?php if ($_smarty_tpl->tpl_vars['item']->value['menuId'] == $_GET['topid']) {?>class="info"<?php }?>>
                    <td><a href="/man/?menu/html/list&topid=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></td>
                    <td>[<?php echo $_smarty_tpl->tpl_vars['item']->value['ads'];?>
]</td>
                    <td>
                        <a href="/man/?menu/html/edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
">修改</a>
                        <a class="shamget" rel="/man/?menu/html/delete&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
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
    <div class="col-md-4">
    <?php if ($_GET['topid'] != '') {?>
        <table class="table table-hover" id="dt1">
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['seclist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr <?php if ($_smarty_tpl->tpl_vars['item']->value['menuId'] == $_GET['parentid']) {?>class="info"<?php }?>>
                    <td><a href="/man/?menu/html/list&topid=<?php echo $_GET['topid'];?>
&parentid=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></td>
                    <td>[<?php echo $_smarty_tpl->tpl_vars['item']->value['ads'];?>
]</td>
                    <td>
                        <a href="/man/?menu/html/edit&topid=<?php echo $_GET['topid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
">修改</a>
                        <a class="shamget" rel="/man/?menu/html/delete&topid=<?php echo $_GET['topid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
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
    <?php }?>
    </div>
    <div class="col-md-4 ">
        <?php if ($_GET['parentid'] != '') {?>
            <table class="table table-hover" id="dt1">
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                        <td>[<?php echo $_smarty_tpl->tpl_vars['item']->value['ads'];?>
]</td>
                        <td>
                            <a href="/man/?menu/html/edit&topid=<?php echo $_GET['topid'];?>
&parentid=<?php echo $_GET['parentid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
">修改</a>
                            <a class="shamget" rel="/man/?menu/html/delete&topid=<?php echo $_GET['topid'];?>
&parentid=<?php echo $_GET['parentid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
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
        <?php }?>
    </div>
</div>



<?php }
}
