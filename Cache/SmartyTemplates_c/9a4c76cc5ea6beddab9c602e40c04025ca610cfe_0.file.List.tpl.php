<?php
/* Smarty version 3.1.30, created on 2016-08-31 19:00:19
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Data\Views\Html\List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c6b8c3e59b32_95567809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a4c76cc5ea6beddab9c602e40c04025ca610cfe' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Data\\Views\\Html\\List.tpl',
      1 => 1472640768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c6b8c3e59b32_95567809 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- content -->
<div class="row">
    <div class="col-md-6 ">
        <table class="table table-hover" id="dt1">
            <tbody>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                    <td>[<?php echo $_smarty_tpl->tpl_vars['item']->value['ads'];?>
]</td>
                    <td>
                        <a href="/man/?menu/html/edit&topid=<?php echo $_GET['topid'];?>
&parentid=<?php echo $_GET['parentid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
">修改</a>
                        <a class="shamget" rel="/man/res?menu/html/delete&topid=<?php echo $_GET['topid'];?>
&parentid=<?php echo $_GET['parentid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['menuId'];?>
" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-6 ">
    </div>

</div>



<?php }
}
