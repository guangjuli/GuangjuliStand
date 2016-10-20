<?php
/* Smarty version 3.1.30, created on 2016-10-12 15:46:09
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Menu\Views\Widget\Nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fdea419d36f8_07621673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed63e1987792cf190401dd5d82c2ec136de64cca' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Menu\\Views\\Widget\\Nav.tpl',
      1 => 1476257879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fdea419d36f8_07621673 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/man/">ADM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_nav']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['active'] != 0) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><span class="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" aria-hidden="true"></span> <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                       <span class="glyphicon glyphicon-user"></span> 管理员 <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="?/pm/html/list"><span class=" glyphicon glyphicon-th-list" ></span> 管理</a></li>

                        <li><a href="#"><span class="glyphicon glyphicon-menu-hamburger" ></span> Help</a></li>

                        <li><a href="/man/logout"><span class="glyphicon glyphicon-off" ></span> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php echo $_smarty_tpl->tpl_vars['irones']->value;?>

<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

<?php }
}
