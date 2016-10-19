<?php
/* Smarty version 3.1.30, created on 2016-09-18 16:37:40
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Api\Views\Html\Apiview.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57de5254512dc7_55022012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b19f9e3ef0d7daac2b0384f44fe07d8c88848e1' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Api\\Views\\Html\\Apiview.tpl',
      1 => 1474187573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57de5254512dc7_55022012 (Smarty_Internal_Template $_smarty_tpl) {
if ($_GET['id'] != '') {?>

    <ul id="myTabs" class="nav nav-tabs" role="tablist">
        <li class="active" role="presentation">
            <a id="home-tab" aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" href="#home">日志</a>
        </li>
        <li class="" role="presentation">
            <a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" href="#profile" aria-expanded="false">信息</a>
        </li>
        <!-- li class="" role="presentation">
            <a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" href="#log" aria-expanded="false">模拟</a>
        </li -->

    </ul>
    <div id="myTabContent" class="tab-content">
        <div id="home" class="tab-pane fade active in" aria-labelledby="home-tab" role="tabpanel">



            <h3>日志</h3>
            <table class="table table-striped table-hover">
                <thead>
                <th>时间</th>
                <th>msg</th>
                <th>response.data</th>
                <th>request</th>
                <th></th>
                </thead>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['apiloglist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['time'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
:<?php echo $_smarty_tpl->tpl_vars['item']->value['msg'];?>
</td>
                        <td><pre><?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>
</pre></td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['_GET'] != '') {?>
                                <pre><?php echo $_smarty_tpl->tpl_vars['item']->value['_GET'];?>
</pre>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['item']->value['_POST'] != '') {?>
                                <pre><?php echo $_smarty_tpl->tpl_vars['item']->value['_POST'];?>
</pre>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['item']->value['_FILE'] != '') {?>
                                <pre><?php echo $_smarty_tpl->tpl_vars['item']->value['_FILE'];?>
</pre>
                            <?php }?>

                        </td>
                        <td></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>



        </div>

        <div id="profile" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">


            <h3>信息</h3>
            <table class="table table-striped table-hover">
                <thead>
                <th width="100"></th>
                <th></th>
                </thead>
                <tr>
                    <td>Title</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['apiview']->value['title'];?>
</td>
                </tr>
                <tr>
                    <td>版本</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['apiview']->value['v'];?>
</td>
                </tr>
                <tr>
                    <td>Api</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['apiview']->value['api'];?>
</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['apiview']->value['type'];?>
</td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['apiview']->value['active'];?>
</td>
                </tr>
                <tr>
                    <td>说明</td>
                    <td><pre><?php echo $_smarty_tpl->tpl_vars['apiview']->value['dis'];?>
</pre></td>
                </tr>
                <tr>
                    <td>Request</td>
                    <td><pre><?php echo $_smarty_tpl->tpl_vars['apiview']->value['request'];?>
</pre></td>
                </tr>
                <tr>
                    <td>Response</td>
                    <td><pre><?php echo $_smarty_tpl->tpl_vars['apiview']->value['response'];?>
</pre></td>
                </tr>
            </table>

        </div>
        <div id="log" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">

            <h3>模拟</h3>

            <table class="table table-striped table-hover">
                <thead>
                <th width="100"></th>
                <th></th>
                </thead>
                <tr>
                    <td>地址</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['apisite']->value;
echo $_smarty_tpl->tpl_vars['apiview']->value['v'];?>
/<?php echo $_smarty_tpl->tpl_vars['apiview']->value['api'];?>
</td>
                </tr>
                <tr>
                    <td>输入</td>
                    <td><textarea name="request" class="form-control" rows="8"><?php echo $_smarty_tpl->tpl_vars['apiview']->value['request'];?>
</textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a class="btn btn-primary" href="">提交</a>
                    </td>
                </tr>
                <tr>
                    <td>Response</td>
                    <td><pre>132123123</pre></td>
                </tr>
            </table>

        </div>
    </div>







<?php }
}
}
