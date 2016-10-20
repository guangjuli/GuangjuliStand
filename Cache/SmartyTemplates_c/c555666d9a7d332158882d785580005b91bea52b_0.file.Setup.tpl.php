<?php
/* Smarty version 3.1.30, created on 2016-10-12 16:20:28
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Pm\Views\Html\Setup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fdf24ce73d05_25310016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c555666d9a7d332158882d785580005b91bea52b' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Pm\\Views\\Html\\Setup.tpl',
      1 => 1476257880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fdf24ce73d05_25310016 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
    <li role="presentation">
        <a href="/man/?/pm/html/list">
            <span class="glyphicon glyphicon-home"></span>
            列表
        </a>
    </li>
    <li class="active" role="presentation">
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

    <form  class="form-horizontal" method="post" action="/man/?pm/html/setup">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">本地程序包</label>
            <div class="col-sm-8">
                <textarea name="pmsetup" class="form-control" rows="10"><?php echo $_smarty_tpl->tpl_vars['pmsetup']->value;?>
</textarea>
            </div>
            <div class="col-sm-2">
    <pre></pre>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="提交">
            </div>
        </div>
    </form>

</div>
</div><?php }
}
