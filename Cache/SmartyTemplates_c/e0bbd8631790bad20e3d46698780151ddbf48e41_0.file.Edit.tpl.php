<?php
/* Smarty version 3.1.30, created on 2016-09-18 11:04:32
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Api\Views\Html\Edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57de04408154c0_04840139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0bbd8631790bad20e3d46698780151ddbf48e41' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Api\\Views\\Html\\Edit.tpl',
      1 => 1474167814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57de04408154c0_04840139 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?/api/html/edit">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" class="form-control" id="" placeholder="名称">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">版本</label>
                <div class="col-sm-10">
                    <input name="v" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['v'];?>
" class="form-control" id="" placeholder="版本">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Api</label>
                <div class="col-sm-10">
                    <input  name="api" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['api'];?>
" class="form-control" id="" placeholder="api">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select  name="type" multiple class="form-control">
                        <option <?php if ($_smarty_tpl->tpl_vars['row']->value['type'] == 'POST') {?>selected="selected"<?php }?>>POST</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['row']->value['type'] == 'GET') {?>selected="selected"<?php }?>>GET</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['row']->value['type'] == 'PUT') {?>selected="selected"<?php }?>>PUT</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['row']->value['type'] == 'DELETE') {?>selected="selected"<?php }?>>DELETE</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active" id="" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] == 1) {?>checked="checked"<?php }?>>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active" id="" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['active'] != 1) {?>checked="checked"<?php }?>>
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>
">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>
        <div class="col-md-5 ">
            <!-- part1 -->

            <div class="form-group">
                <label for="exampleInputEmail1">说明</label>
                <textarea name="dis" class="form-control" rows="8"><?php echo $_smarty_tpl->tpl_vars['row']->value['dis'];?>
</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">输入 Like</label>
                <textarea name="request" class="form-control" rows="8"><?php echo $_smarty_tpl->tpl_vars['row']->value['request'];?>
</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">输出 Like</label>
                <textarea name="response" class="form-control" rows="8"><?php echo $_smarty_tpl->tpl_vars['row']->value['response'];?>
</textarea>
            </div>

        </div>
    </form>
</div>
<?php }
}
