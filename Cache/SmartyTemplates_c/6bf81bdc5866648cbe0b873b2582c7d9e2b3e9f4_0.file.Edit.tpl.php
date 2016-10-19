<?php
/* Smarty version 3.1.30, created on 2016-09-18 16:42:03
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Patient\Views\Html\Edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57de535bba95b5_18911602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bf81bdc5866648cbe0b873b2582c7d9e2b3e9f4' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Patient\\Views\\Html\\Edit.tpl',
      1 => 1474187840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57de535bba95b5_18911602 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\phpleague\\Grace\\GuangjuliStand\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?patient/html/edit" id="editForm" enctype="multipart/form-data">
        <div class="col-md-7">
            <div class="form-group">
                <label for="userId" class="col-sm-2 control-label">用户Id</label>
                <div class="col-sm-7">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['userId'];?>

                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="row form-group">
                <label for="headImage" class="col-sm-2 control-label">头像</label>
                <div class="col-sm-2">
                    <?php echo smarty_function_widget(array('ads'=>'patient/crop/Uploadimage'),$_smarty_tpl);?>

                </div>
            </div>
            <div class="form-group">
                <label for="trueName" class="col-sm-2 control-label">真实姓名</label>
                <div class="col-sm-7">
                    <input name="trueName" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['trueName'];?>
" class="form-control"  placeholder="真实姓名">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label">性别</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['gender'] == 1) {?>checked<?php }?>>
                            男
                        </label>
                        <label>
                            <input type="radio" name="gender"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['gender'] != 1) {?>checked<?php }?>>
                            女
                        </label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">出生日期</label>
                <div class='col-sm-7'>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type="text" class="form-control" name="birthday" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="height" class="col-sm-2 control-label">身高</label>
                <div class="col-sm-7">
                    <input name="height" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['height'];?>
" class="form-control"  placeholder="身高,单位cm">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="mobile" class="col-sm-2 control-label">手机</label>
                <div class="col-sm-7">
                    <input name="mobile" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
" class="form-control"  placeholder="手机">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-7">
                    <input name="email" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" class="form-control"  placeholder="邮箱">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="qq" class="col-sm-2 control-label">QQ</label>
                <div class="col-sm-7">
                    <input name="qq" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['qq'];?>
" class="form-control"  placeholder="QQ">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="weixin" class="col-sm-2 control-label">微信</label>
                <div class="col-sm-7">
                    <input name="weixin" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['weixin'];?>
" class="form-control"  placeholder="微信">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="weibo" class="col-sm-2 control-label">微博</label>
                <div class="col-sm-7">
                    <input name="weibo" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['weibo'];?>
" class="form-control"  placeholder="微博">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="signer" class="col-sm-2 control-label">是否婚配</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="signer"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>checked<?php }?>>
                            已婚
                        </label>
                        <label>
                            <input type="radio" name="signer"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] != 1) {?>checked<?php }?>>
                            未婚
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="zone" class="col-sm-2 control-label">区域</label>
                <div class="col-sm-7">
                    <input name="zone" id="zone" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['zone'];?>
" class="form-control"  placeholder="区域">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="addr" class="col-sm-2 control-label">地址</label>
                <div class="col-sm-7">
                    <input name="addr" id="addr" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['addr'];?>
" class="form-control"  placeholder="地址">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="bloodpress" class="col-sm-2 control-label">血压</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="bloodpress"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>checked<?php }?>>
                            使用
                        </label>
                        <label>
                            <input type="radio" name="bloodpress"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] != 1) {?>checked<?php }?>>
                            未使用
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="ecg" class="col-sm-2 control-label">心电</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="ecg"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>checked<?php }?>>
                            使用
                        </label>
                        <label>
                            <input type="radio" name="ecg"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] != 1) {?>checked<?php }?>>
                            未使用
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="watch" class="col-sm-2 control-label">腕表</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="watch"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>checked<?php }?>>
                            使用
                        </label>
                        <label>
                            <input type="radio" name="watch"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] != 1) {?>checked<?php }?>>
                            未使用
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="des" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-7">
                    <input  name="des" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['des'];?>
"  class="form-control"  placeholder="描述">
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-7">
                    <input  name="sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
" class="form-control"  placeholder="排序">
                </div>
            </div>
            <div class="form-group">
                <label for="active" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-7">
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
                <div class="col-sm-offset-2 col-sm-7">
                    <input type="hidden" name="userId" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['userId'];?>
">
                    <a class="btn btn-primary nscpostformerror" rel="#editForm" id="edit">编辑</a>
                </div>
            </div>

        </div>

    </form>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="/assets/ui/js/jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/ui/js/custom-validate.js"><?php echo '</script'; ?>
>

<link href="/assets/ui/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.zh-CN.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    customValidate('addForm');

    //日历
    customCalender('datetimepicker1');
    function customCalender(id){
        $(document).ready(function () {
            $('#'+id).datepicker({
                format: 'yyyy-mm-dd',
                language:'zh-CN'
            });
        });
    }

<?php echo '</script'; ?>
>
<?php }
}
