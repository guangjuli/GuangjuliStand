<?php
/* Smarty version 3.1.30, created on 2016-10-21 16:42:19
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Setup\Views\Html\Facade.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5809d4ebcf13f0_99243284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c34542e1a082b7f5057d92c5a3cf7ab57f3e3d60' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Setup\\Views\\Html\\Facade.tpl',
      1 => 1477039337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5809d4ebcf13f0_99243284 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- content -->
<form class="form-horizontal" method="post" action="/man/?setup/html/facade">

    <div class="row">
        <div class="col-md-12 ">
            <!-- content -->
            <ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chrlist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <li <?php if ($_GET['type'] == $_smarty_tpl->tpl_vars['item']->value) {?>class="active"<?php }?> role="presentation">
                        <a href="/man/?setup/html/facade&type=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

                        </a>
                    </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-lg-2 col-sx-2  col-sm-2">
            <ul class="nav nav-sidebar">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['llist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <li <?php if ($_smarty_tpl->tpl_vars['item']->value['chr'] == $_GET['chr']) {?>class="active"<?php }?>>
                    <a href="/man/?setup/html/facade&type=<?php echo $_GET['type'];?>
&chr=<?php echo $_smarty_tpl->tpl_vars['item']->value['chr'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['chr'];?>
</a>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
        <div class="col-md-5 col-lg-5 col-sx-5  col-sm-5">

            <?php if ($_smarty_tpl->tpl_vars['row']->value != '') {?>

            <div class="form-group">

                <div class="col-sm-6">
                    <label for="inputEmail3" class="control-label">CHR</label>
                    <input name="chr" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['chr'];?>
" class="form-control" placeholder="CHR" readonly>

                    <input type="hidden"  name="type" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
" class="form-control" placeholder="CHR" readonly>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">

                    <small>
                        数据源 :<span class="gray"><?php echo $_smarty_tpl->tpl_vars['row']->value['chr'];?>
</span>
                    </small>
                </div>
                <div class="col-sm-6">
                    <label for="inputEmail3" class="control-label">引用</label>
                    <input name="facede" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['facede'];?>
" class="form-control" placeholder="引用">
                    <small>
                        <span class="red">调用</span> :<span class="gray">fc('WEB_KEYWORD',$params)</span>
                    </small>
                </div>

                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">检索</label>
                    <input name="keywords" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['keywords'];?>
" class="form-control" placeholder="关键词">
                    <small>
                        <span class="gray">用于检索 分割符号";"</span>
                    </small>
                </div>

                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">描述</label>
                    <textarea class="form-control" rows="2" placeholder="描述" name="des"><?php echo $_smarty_tpl->tpl_vars['row']->value['des'];?>
</textarea>
                </div>

                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">缓存</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="cache" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['cache'] == 1) {?>checked<?php }?>>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="cache" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['cache'] != 1) {?>checked<?php }?>>
                            关闭
                        </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">缓存时间</label>
                    <input name="expire" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['expire'];?>
" class="form-control" placeholder="缓存时间">
                    <small>
                        <span class="gray">单位 :秒</span>
                    </small>
                </div>
                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">参数</label>
                    <input name="params" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['params'];?>
" class="form-control" placeholder="参数">
                    <small>
                        <span class="gray">参数的说明</span>
                    </small>
                </div>
                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">参数模拟</label>
                    <textarea name="plike" class="form-control" rows="3" placeholder="参数模拟"><?php echo $_smarty_tpl->tpl_vars['row']->value['plike'];?>
</textarea>
                    <small>
                        <span class="gray">输入模拟的参数,可以查看输出的数据</span>
                    </small>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-default">更新</button>
                    <a href="/man/?setup/html/facade&type=<?php echo $_GET['type'];?>
&chr=<?php echo $_GET['chr'];?>
&io=demo" class="btn btn-info">模拟输出</a>
                </div>
            </div>

            <?php }?>
        </div>
        <div class="col-md-5 col-lg-5 col-sx-5  col-sm-5">

            <?php if ($_GET['io'] == 'demo') {?>

            <h3>参数</h3>
            <small>
                <span class="gray"><?php echo $_smarty_tpl->tpl_vars['row']->value['params'];?>
</span> -> <span class="blue">调用
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['plike'] != '') {?>
                        fc("<?php echo $_smarty_tpl->tpl_vars['row']->value['facede'];?>
",$params})
                    <?php } else { ?>
                        fc("<?php echo $_smarty_tpl->tpl_vars['row']->value['facede'];?>
")
                    <?php }?>
                </span>
            </small>

            <pre><?php echo $_smarty_tpl->tpl_vars['_params']->value;?>
</pre>

            <h3>结果集</h3>
            <pre><?php echo $_smarty_tpl->tpl_vars['rc']->value;?>
</pre>
            <?php }?>
        </div>
    </div>




</form>






<?php }
}
