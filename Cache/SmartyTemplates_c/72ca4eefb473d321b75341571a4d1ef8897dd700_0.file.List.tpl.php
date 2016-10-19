<?php
/* Smarty version 3.1.30, created on 2016-09-28 17:17:39
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Config\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57eb8ab3e91c83_52641470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72ca4eefb473d321b75341571a4d1ef8897dd700' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Config\\Views\\Html\\List.tpl',
      1 => 1474452765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57eb8ab3e91c83_52641470 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- content -->
<div class="row">
    <div class="col-md-12 ">
        <!-- content -->

        <ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_g']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
            <li <?php if ($_GET['group'] == $_smarty_tpl->tpl_vars['key']->value) {?>class="active"<?php }?> role="presentation">
                <a href="/man/?config/html/list&group=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                    <span class=""></span>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

                </a>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ul>

<h2>配置</h2>
<?php if ($_GET['group'] != 0 && $_GET['group'] != '') {?>
        <form class="form-horizontal" method="post" action="/man/?config/html/list">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <div class="form-group class="col-sm-12">
                <input name='group' value='<?php echo $_GET['group'];?>
' type="hidden">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
<?php }?>

    </div>


</div>



<?php }
}
