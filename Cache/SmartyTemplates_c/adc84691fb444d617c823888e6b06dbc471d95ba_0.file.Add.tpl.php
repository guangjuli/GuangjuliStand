<?php
/* Smarty version 3.1.30, created on 2016-09-21 16:13:32
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Patient\Views\Html\Add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e2412cdd7cf4_85406572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adc84691fb444d617c823888e6b06dbc471d95ba' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Patient\\Views\\Html\\Add.tpl',
      1 => 1474445302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e2412cdd7cf4_85406572 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\phpleague\\Grace\\GuangjuliStand\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?patient/html/add" id="addForm" enctype="multipart/form-data">
        <div class="col-md-7">
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">登录名</label>
                <div class="col-sm-7">
                    <input name="login" id="login" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['login'];?>
" class="form-control"  placeholder="登录名即手机号">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-7">
                    <input name="password" id="password" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['password'];?>
" class="form-control"  placeholder="密码：首字母+字母数字下划线">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-7">
                    <input name="confirm_password" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['confirm_password'];?>
"  class="form-control"  placeholder="确认密码：首字母+字母数字下划线">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="groupId" class="col-sm-2 control-label">用户类型</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['patientGroupId']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <label><input type="radio" name="groupId"  value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value == 'Android') {?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</label>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label for="orgId" class="col-sm-2 control-label">医院</label>
                <div class="col-sm-7">
                    <select class="form-control" name="orgId">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['org']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value == $_smarty_tpl->tpl_vars['row']->value['orgId']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-11" style="font-weight: bold; color: #2c2c29">基本信息</div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="row form-group">
                    <div class="col-sm-2 control-label">头像</div>
                    <div class="col-sm-2">
                        <?php echo smarty_function_widget(array('ads'=>'patient/crop/Uploadimage'),$_smarty_tpl);?>

                    </div>
                    <div style="color: #8e8b8b; margin-top: 10px;">
                        提示：上传头像后会自动创建用户,之后仍需编辑其他信息，请根据提示前往编辑页面
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">真实姓名</div>
                    <div class="col-sm-7">
                        <input name="trueName" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['trueName'];?>
" class="form-control"  placeholder="真实姓名">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">性别</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender"  value="1">
                                男
                            </label>
                            <label>
                                <input type="radio" name="gender"  value="0">
                                女
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div  class="col-sm-2 control-label">出生日期</div>
                    <div class='col-sm-3'>
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
                    <div class="col-sm-2 control-label">身高</div>
                    <div class="col-sm-7">
                        <input name="height" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['height'];?>
" class="form-control"  placeholder="身高,单位cm">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">体重</div>
                    <div class="col-sm-7">
                        <input name="weight" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['weight'];?>
" class="form-control"  placeholder="体重，单位kg">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">邮箱</div>
                    <div class="col-sm-7">
                        <input name="email" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" class="form-control"  placeholder="邮箱">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">QQ</div>
                    <div class="col-sm-7">
                        <input name="qq" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['qq'];?>
" class="form-control"  placeholder="QQ">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">微信</div>
                    <div class="col-sm-7">
                        <input name="weixin" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['weixin'];?>
" class="form-control"  placeholder="微信">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">是否婚配</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="signer"  value="1">
                                已婚
                            </label>
                            <label>
                                <input type="radio" name="signer"  value="0">
                                未婚
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">地址</div>
                    <div class="col-sm-7">
                        <input name="addr" id="addr" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['addr'];?>
" class="form-control"  placeholder="地址">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-11" style="font-weight: bold; color: #2c2c29">详细信息</div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="form-group">
                    <div class="col-sm-2 control-label">身份证</div>
                    <div class="col-sm-7">
                        <input name="identityCard" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['identityCard'];?>
" class="form-control"  placeholder="身份证">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">饮食习惯</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="eatHabits"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['eatHabits'] == '0') {?>checked<?php }?>>
                                偏淡
                            </label>
                            <label>
                                <input type="radio" name="eatHabits"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['eatHabits'] == '1') {?>checked<?php }?>>
                                适中
                            </label>
                            <label>
                                <input type="radio" name="eatHabits"  value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['eatHabits'] == '2') {?>checked<?php }?>>
                                偏咸
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">是否饮酒</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="drinkwine"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['drinkwine'] == '0') {?>checked<?php }?>>
                                从不
                            </label>
                            <label>
                                <input type="radio" name="drinkwine"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['drinkwine'] == '1') {?>checked<?php }?>>
                                偶尔
                            </label>
                            <label>
                                <input type="radio" name="drinkwine"  value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['drinkwine'] == '2') {?>checked<?php }?>>
                                经常
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">精神紧张</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="nervous"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['nervous'] == '0') {?>checked<?php }?>>
                                从不
                            </label>
                            <label>
                                <input type="radio" name="nervous"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['nervous'] == '1') {?>checked<?php }?>>
                                偶尔
                            </label>
                            <label>
                                <input type="radio" name="nervous"  value="2" <?php if ($_smarty_tpl->tpl_vars['row']->value['nervous'] == '2') {?>checked<?php }?>>
                                经常
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">疾病</div>
                    <div class="col-sm-7">
                        <div class="checkbox">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['disease']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <label class="col-sm-3"><input  type="checkbox" name="diseaseList"  value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</label>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">臀围</div>
                    <div class="col-sm-7">
                        <input name="hipline" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['hipline'];?>
" class="form-control"  placeholder="臀围">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">腰围</div>
                    <div class="col-sm-7">
                        <input name="waist" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['waist'];?>
" class="form-control"  placeholder="腰围">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">工作环境</div>
                    <div class="col-sm-7">
                        <input name="workEnv" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['workEnv'];?>
" class="form-control"  placeholder="工作环境">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">收缩压</div>
                    <div class="col-sm-7">
                        <input name="SBP" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['SBP'];?>
" class="form-control"  placeholder="收缩压">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>

                <div class="form-group">
                    <div  class="col-sm-2 control-label">舒张压</div>
                    <div class="col-sm-7">
                        <input name="DBP" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['DBP'];?>
" class="form-control"  placeholder="舒张压">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-11" style="font-weight: bold; color: #2c2c29">使用设备</div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="form-group">
                    <div class="col-sm-2 control-label">血压</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="bloodpress"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['bloodpress'] == 1) {?>checked<?php }?>>
                                使用
                            </label>
                            <label>
                                <input type="radio" name="bloodpress"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['bloodpress'] != 1) {?>checked<?php }?>>
                                未使用
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">心电</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="ecg"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['ecg'] == 1) {?>checked<?php }?>>
                                使用
                            </label>
                            <label>
                                <input type="radio" name="ecg"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['ecg'] != 1) {?>checked<?php }?>>
                                未使用
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">腕表</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="watch"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['watch'] == 1) {?>checked<?php }?>>
                                使用
                            </label>
                            <label>
                                <input type="radio" name="watch"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['watch'] != 1) {?>checked<?php }?>>
                                未使用
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-11" style="font-weight: bold; color: #2c2c29">联系人</div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="form-group">
                    <div class="col-sm-2 control-label">联系人1</div>
                    <div class="col-sm-7">
                        <label for="contact_trueName" class="col-sm-3 control-label">姓名</label>
                        <div class="col-sm-9">
                            <input name="contact_trueName" value="" class="form-control"  placeholder="联系人姓名">
                        </div>
                        <label for="contact_relationship" class="col-sm-3 control-label">关系</label>
                        <div class="col-sm-9">
                            <input name="contact_relationship" value="" class="form-control"  placeholder="与患者亲属关系">
                        </div>
                        <label for="contact_phone" class="col-sm-3 control-label">手机号</label>
                        <div class="col-sm-9">
                            <input name="contact_phone" value="" class="form-control"  placeholder="联系人手机号">
                        </div>
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
                <label for="active" class="col-sm-2 control-label">状态</label for="active">
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active"  value="1" checked>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active"  value="0">
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    <a class="btn btn-primary nscpostformerror" rel="#addForm" id="add">添加</a>
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
