<?php
/* Smarty version 3.1.30, created on 2016-10-12 16:20:45
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Setup\Views\Html\Dy.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fdf25def8325_86409017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b620dfa5a1e8c7cc041d0d261997a1cdb6f2ed94' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Setup\\Views\\Html\\Dy.tpl',
      1 => 1476236001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fdf25def8325_86409017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?setup/html/dy">
        <div class="col-md-6 ">

            <div class="page-header">
                <h5>单页内容索引</h5>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">  </label>
                <div class="col-sm-10">
                    <textarea name="Datadylist" class="form-control" rows="10"><?php echo $_smarty_tpl->tpl_vars['res']->value;?>
</textarea>
                    <p class="help-block">根据该索引，获取单页内容</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="groupId" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['groupId'];?>
">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>

    </form>
</div>
<?php }
}
