<?php
/* Smarty version 3.1.30, created on 2016-09-28 17:18:31
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Menu\Views\Html\Personallist.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57eb8ae7181578_63018424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd69556e6822088666c613130de3df0cad8ca8c10' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Menu\\Views\\Html\\Personallist.tpl',
      1 => 1474452765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57eb8ae7181578_63018424 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <form class="form-horizontal" method="post" action="/man/?menu/html/add">
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">title</label>
                <div class="col-sm-10">
                    <input name="title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" class="form-control"  placeholder="名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">parentId</label>
                <div class="col-sm-10">
                    <select class="form-control" name="parentId">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['option']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['parentId'] == $_smarty_tpl->tpl_vars['key']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
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
                <label for="inputPassword3" class="col-sm-2 control-label">ads</label>
                <div class="col-sm-10">
                    <input  name="ads" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ads'];?>
" class="form-control"  placeholder="资源ads">
                </div>
            </div>


            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">icon</label>
                <div class="col-sm-10">
                    <input name="icon" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['icon'];?>
" class="form-control"  placeholder="图标">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">sort</label>
                <div class="col-sm-10">
                    <input  name="sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
" class="form-control"  placeholder="排序">
                </div>
            </div>


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">package</label>
                <div class="col-sm-10">
                    <input  name="package" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['package'];?>
" class="form-control"  placeholder="package">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">des</label>
                <div class="col-sm-10">
                    <input  name="des" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['des'];?>
" class="form-control"  placeholder="描述">
                </div>
            </div>




            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">hidden</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="hidden"  value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['hidden'] == 1) {?>checked<?php }?>>
                            隐藏
                        </label>
                        <label>
                            <input type="radio" name="hidden"  value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['hidden'] != 1) {?>checked<?php }?>>
                            显示
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">添加</button>
                </div>
            </div>

        </div>

    </form>
</div>
<?php }
}
