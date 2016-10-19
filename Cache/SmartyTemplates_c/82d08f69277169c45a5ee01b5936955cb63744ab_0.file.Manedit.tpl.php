<?php
/* Smarty version 3.1.30, created on 2016-10-11 15:47:46
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Config\Views\Html\Manedit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fc9922a6bd15_99736242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82d08f69277169c45a5ee01b5936955cb63744ab' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Config\\Views\\Html\\Manedit.tpl',
      1 => 1474452765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fc9922a6bd15_99736242 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?config/html/edit" accept-charset="utf-8">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">配置名称</label>
                <div class="col-sm-10">
                    <input name="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" class="form-control" placeholder="配置名称">
                </div>
            </div>

            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-10">
                    <select class="form-control" name="type">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['type']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['type'] == $_smarty_tpl->tpl_vars['key']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="group" class="col-sm-2 control-label">分组</label>
                <div class="col-sm-10">
                    <select class="form-control" name="group">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['group'] == $_smarty_tpl->tpl_vars['key']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">说明</label>
                <div class="col-sm-10">
                    <input name="title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" class="form-control" placeholder="说明">
                </div>
            </div>

            <div class="form-group">
                <label for="remark" class="col-sm-2 control-label">解释</label>
                <div class="col-sm-10">
                    <input  name="remark" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['remark'];?>
" class="form-control" placeholder="解释">
                </div>
            </div>

            <div class="form-group">
                <label for="extra" class="col-sm-2 control-label">可选值</label>
                <div class="col-sm-10">
                    <textarea  name="extra" rows="5" class="form-control" placeholder="可选值"><?php echo $_smarty_tpl->tpl_vars['row']->value['extra'];?>
</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="value" class="col-sm-2 control-label">值</label>
                <div class="col-sm-10">
                    <textarea  name="value" rows="5" class="form-control" placeholder="值"><?php echo $_smarty_tpl->tpl_vars['row']->value['value'];?>
</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
" class="form-control" placeholder="排序">
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['status'] == 1) {?>checked<?php }?>>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="status" value="0"  <?php if ($_smarty_tpl->tpl_vars['row']->value['status'] != 1) {?>checked<?php }?>>
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>

    </form>
</div>
<?php }
}
