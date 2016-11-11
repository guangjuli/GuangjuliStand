<?php
/* Smarty version 3.1.30, created on 2016-09-18 16:51:57
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Devicetype\Views\Html\detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57de55ade41319_68403032',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c806cc4dc33801159256c22337431cc94c59436a' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Devicetype\\Views\\Html\\detail.tpl',
      1 => 1472808410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57de55ade41319_68403032 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?devicetype/html/edit">
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">设备类型</label>
                <div class="col-sm-10">
                    <input name="type" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
" class="form-control"  placeholder="设备类型">
                </div>
            </div>
            <div class="form-group">
                <label for="des" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <input  name="des" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['des'];?>
" class="form-control"  placeholder="描述">
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
" class="form-control"  placeholder="排序">
                </div>
            </div>
            <div class="form-group">
                <label for="active" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>checked<?php }?>>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] != 1) {?>checked<?php }?>>
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="deviceTypeId" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['deviceTypeId'];?>
">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>

    </form>
</div>
<?php }
}
