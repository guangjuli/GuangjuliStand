<?php
/* Smarty version 3.1.30, created on 2016-09-13 11:56:06
  from "E:\phpleague\Grace\GuangjuliStand\App\Views\Ads\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d778d612ce69_05075169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd704eab397a98f7250933c8cd589df9ed4ce0fbd' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\App\\Views\\Ads\\Index.tpl',
      1 => 1472808411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d778d612ce69_05075169 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Data Manage</title>
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">
    <link href="/assets/css/dashboard.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/">ADM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="javacript:void(0)"><span aria-hidden="true"></span>列表</a>
                </li>
                <li>
                    <a href="/ads/download"><span aria-hidden="true"></span>下载</a>
                </li>
                <li>
                    <a href="/ads/makezip"><span aria-hidden="true"></span>打包</a>
                </li>
                <li>
                    <a href="/ads/upload"><span aria-hidden="true"></span>发布</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <!-- ul class="nav nav-sidebar">
                    <li ><a href=""> 说明</a></li>
            </ul -->

        </div>
        <div class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- Breadcrumb -->
            <div style="margin: 0px 0px 20px 0px;"></div>


            <table class="table table-striped table-hover">
                <thead>
                <th>功能包</th>
                <th>版本</th>
                <th>名称</th>
                <th>说明</th>
                <th>操作</th>
                </thead>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rc']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value, 'i', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</td>
                            <td><pre><?php echo $_smarty_tpl->tpl_vars['i']->value['des'];?>
</pre></td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['i']->value['isdownload'] != 1) {?>
                                    <a class="shamget" comfirm="下载?" rel="/ads/download/?target=<?php echo $_smarty_tpl->tpl_vars['i']->value['key'];?>
">下载</a>
                                <?php } else { ?>
                                    下载
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['i']->value['isdownload'] == 1 && $_smarty_tpl->tpl_vars['i']->value['islockfile'] != 1) {?>
                                    <a class="shamget" rel="/ads/install/?target=<?php echo $_smarty_tpl->tpl_vars['i']->value['key'];?>
">安装</a>
                                <?php } else { ?>
                                    安装
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['i']->value['islockfile'] == 1) {?>
                                    <a class="shamget" comfirm="删除操作会造成信息丢失,请谨慎操作" rel="/ads/uninstall/?target=<?php echo $_smarty_tpl->tpl_vars['i']->value['key'];?>
">卸载</a>
                                <?php } else { ?>
                                    卸载
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['i']->value['islockfile'] == 1) {?>
                                    <a class="shamboxnl" title="设置" rel="/ads/setup/?target=<?php echo $_smarty_tpl->tpl_vars['i']->value['key'];?>
">设置</a>
                                <?php } else { ?>
                                    设置
                                <?php }?>
                                API


                            </td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>


            <!-- /content -->
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript -->
<?php echo '<script'; ?>
 src="/assets/js/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/js/Sham.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(e) {
        $('#admintip').on('close.bs.alert', function () {
            alert('1');
        });
        $('#admintip').on('closed.bs.alert', function () {
            alert('2');
        });
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
