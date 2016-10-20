<?php
/* Smarty version 3.1.30, created on 2016-09-19 09:50:39
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Api\Views\Html\Add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57df446f86c180_27750868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3794ef5af5aa2998555ecb8ca78b67183b5393d4' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Api\\Views\\Html\\Add.tpl',
      1 => 1474187573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57df446f86c180_27750868 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row">
    <form class="form-horizontal" method="post" action="/man/?/api/html/add">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" value="" class="form-control" id="" placeholder="名称">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">版本</label>
                <div class="col-sm-10">
                    <input name="v" value="" class="form-control" id="" placeholder="版本">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Api</label>
                <div class="col-sm-10">
                    <input  name="api" value="" class="form-control" id="" placeholder="api">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select  name="type" multiple class="form-control">
                        <option>POST</option>
                        <option>GET</option>
                        <option>PUT</option>
                        <option>DELETE</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active" id="" value="1">
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active" id="" value="0">
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>
        <div class="col-md-5 ">
            <!-- part1 -->

            <div class="form-group">
                <label for="exampleInputEmail1">说明</label>
                <textarea name="dis" class="form-control" rows="8"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">输入 Like</label>
                <textarea name="request" class="form-control" rows="8"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">输出 Like</label>
                <textarea name="response" class="form-control" rows="8"></textarea>
            </div>

        </div>
    </form>
</div><?php }
}
