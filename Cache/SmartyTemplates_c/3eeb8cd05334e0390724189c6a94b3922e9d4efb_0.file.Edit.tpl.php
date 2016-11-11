<?php
/* Smarty version 3.1.30, created on 2016-09-14 17:12:59
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Usergroup\Views\Html\detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d9149bef4874_43514872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3eeb8cd05334e0390724189c6a94b3922e9d4efb' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Usergroup\\Views\\Html\\detail.tpl',
      1 => 1472637999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d9149bef4874_43514872 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?usergroup/html/edit">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">组名</label>
                <div class="col-sm-10">
                    <input name="groupName" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['groupName'];?>
" class="form-control" placeholder="组名">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">标识</label>
                <div class="col-sm-10">
                    <input name="groupChr" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['groupChr'];?>
" class="form-control" placeholder="标识">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <input  name="des" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['des'];?>
" class="form-control" placeholder="描述">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
" class="form-control" placeholder="排序">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>checked<?php }?>>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active" value="0"  <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] != 1) {?>checked<?php }?>>
                            关闭
                        </label>
                    </div>
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
