<?php
/* Smarty version 3.1.30, created on 2016-10-18 14:40:27
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Pm\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5805c3dbafe7b0_64080674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3770fecbb73d6a14de2951a675c4dd5d8943c2f' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Pm\\Views\\Html\\List.tpl',
      1 => 1476770028,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5805c3dbafe7b0_64080674 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
    <li class="active" role="presentation">
        <a href="/man/?/pm/html/list">
            <span class="glyphicon glyphicon-home"></span>
            列表
        </a>
    </li>
    <li role="presentation">
        <a href="/man/?/pm/html/setup">
            <span class="glyphicon glyphicon-home"></span>
            设置
        </a>
    </li>
    <li role="presentation">
        <a href="/man/?/pm/html/guisetup">
            <span class="glyphicon glyphicon-home"></span>
            界面设置
        </a>
    </li>

</ul>


<div class="row">
    <div class="col-md-12" >

        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>本地查看</th>
            <th>远程信息</th>
            <th>状态</th>
            <th>操作</th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
                    <td>
                        <a class="shamboxnl" rel="/man/res/?/pm/read/readme&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Readme</a>
                        <a class="shamboxnl" rel="/man/?/pm/read/Help&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Help</a>
                        -
                        <a class="shamboxnl" rel="/man/?/pm/read/Installsql&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Install.sql</a>
                        <a class="shamboxnl" rel="/man/?/pm/read/UnInstallsql&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">UnInstall.sql</a>
                         -
                        <a class="shamboxnl" rel="/man/?/pm/read/Api&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Api</a>
                        <a class="shamboxnl" rel="/man/?/pm/read/Menu&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Menu</a>
                        <a class="shamboxnl" rel="/man/?/pm/read/Depend&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Depend</a>
                        <a class="shamboxnl" rel="/man/?/pm/read/Dependtable&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Dependtable</a>

                        <a class="shamboxnl" rel="/man/?/pm/read/Version&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Version</a>

                    </td>
                    <td>
                        View
                    </td>
                    <td>
                        <span class="label <?php if ($_smarty_tpl->tpl_vars['dir']->value[$_smarty_tpl->tpl_vars['item']->value]) {?>label-info<?php }?>">Dir</span>
                        <span class="label <?php if ($_smarty_tpl->tpl_vars['file']->value[$_smarty_tpl->tpl_vars['item']->value]) {?>label-warning<?php }?>">Lock</span>
                        <span class="label <?php if ($_smarty_tpl->tpl_vars['zip']->value[$_smarty_tpl->tpl_vars['item']->value]) {?>label-danger<?php }?>">Zip</span>
                    </td>
                    <td>
                        <!--
                        <a href="/?/pm/html/up&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">上传</a>
                        下载
                        安装
                        卸载
                        -->
                        <a class="shamget" rel="/man/?/pm/html/inmenu&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" comfirm="更新菜单?">安装菜单</a>
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
</div><?php }
}
