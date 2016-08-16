<?php
/* Smarty version 3.1.30, created on 2016-08-16 15:44:53
  from "E:\GuangjuliStand\Addons\V\Views\Token\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57b2c47581ee77_11485450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '135f6f60d415babd9119180cde49704e64657981' => 
    array (
      0 => 'E:\\GuangjuliStand\\Addons\\V\\Views\\Token\\Index.tpl',
      1 => 1471333447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b2c47581ee77_11485450 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="/v/token/accesstoken" method="post">
    <input type="text" name="time" value="1471276800">
    <input type="text" name="deviceId" value="dsaffsd">
    <input type="text" name="verify" value="<?php echo $_smarty_tpl->tpl_vars['verify']->value;?>
">
    <input type="submit" value="提交">
</form><?php }
}
