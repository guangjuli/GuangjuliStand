<?php
/* Smarty version 3.1.30, created on 2016-09-21 16:45:48
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Patient\Views\Html\Detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e248bc6688f8_10303591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf7194f8945c0033fdf4d11934fe6d0d4f4201ec' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Patient\\Views\\Html\\Detail.tpl',
      1 => 1474445302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e248bc6688f8_10303591 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-5">
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">用户Id</div>
            <div class="col-sm-8">
                <div><?php echo $_smarty_tpl->tpl_vars['row']->value['userId'];?>
</div>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">头像</div>
            <div class="col-sm-8">
                <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['gravatar'];?>
" style="width: 100px">
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="col-sm-10">
            <?php echo smarty_function_widget(array('ads'=>'patient/userinfo/Getpatientinfo'),$_smarty_tpl);?>

        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">描述</div>
            <div class="col-sm-8">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['des'];?>

            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">排序</div>
            <div class="col-sm-8">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>

            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">状态</div>
            <div class="col-sm-8">
                <div class="radio">
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>使用<?php } else { ?>未使用<?php }?>
                </div>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <a href="/man/?patient/html/list" class="btn btn-primary">返回</a>
            </div>
        </div>

    </div>
</div>
<style>
    .col-sm-7 div{
        margin-top: 7px;
    }
</style>

<?php }
}
