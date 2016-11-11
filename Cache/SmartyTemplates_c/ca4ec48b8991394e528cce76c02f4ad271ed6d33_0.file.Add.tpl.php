<?php
/* Smarty version 3.1.30, created on 2016-09-19 10:35:11
  from "E:\phpleague\Grace\GuangjuliStand\Ads\User\Views\Html\Personallist.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57df4edf89eaf6_28121795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca4ec48b8991394e528cce76c02f4ad271ed6d33' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\User\\Views\\Html\\Personallist.tpl',
      1 => 1473817319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57df4edf89eaf6_28121795 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?user/html/add" id="addForm">
        <div class="col-md-7">
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">登录名</label>
                <div class="col-sm-7">
                    <input name="login" id="login" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['login'];?>
" class="form-control"  placeholder="登录名" onblur="checkLogin()">
                </div>
                <div class="col-sm-3 error"><?php echo $_smarty_tpl->tpl_vars['checkLogin']->value;?>
</div>
            </div>
            <div class="form-group">
                <label for="groupId" class="col-sm-2 control-label">用户组</label>
                <?php if (!empty($_smarty_tpl->tpl_vars['group']->value)) {?>
                    <div class="col-sm-7">
                        <select class="form-control" name="groupId">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['groupId'] == $_smarty_tpl->tpl_vars['key']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                <?php } else { ?>
                    <div class="col-sm-7">
                        <input name="groupId" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['groupId'];?>
" class="form-control"  placeholder="用户组">
                    </div>
                <?php }?>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-7">
                    <input name="password" id="password" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['password'];?>
" class="form-control"  placeholder="密码">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-7">
                    <input name="confirm_password" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['confirm_password'];?>
"  class="form-control"  placeholder="确认密码">
                </div>
                <div class="col-sm-3 error"></div>
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
                    <input type="hidden" name="type" value="add">
                    <a class="btn btn-default nscpostformerror" rel="#addForm">添加</a>
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
<?php echo '<script'; ?>
 type="text/javascript">
    function checkLogin(){
        var tag = '#login';
        $.ajax({
            type: "Post",
            url: "/man/?user/html/checklogin",
            data:{
                'login':$(tag).val()
            },
            dataType:"json",
            success: function(data){
                var param = eval(data.msg);
                showErrorMsg(param)
            },
            error : function() {

            }
        });
    }
    customValidate('addForm');

<?php echo '</script'; ?>
>
<?php }
}
