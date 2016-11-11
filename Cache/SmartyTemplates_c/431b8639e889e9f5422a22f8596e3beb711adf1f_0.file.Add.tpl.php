<?php
/* Smarty version 3.1.30, created on 2016-09-21 16:49:19
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Cases\Views\Html\Personallist.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e2498f1851d4_30278855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '431b8639e889e9f5422a22f8596e3beb711adf1f' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Cases\\Views\\Html\\Personallist.tpl',
      1 => 1474337619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e2498f1851d4_30278855 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\phpleague\\Grace\\GuangjuliStand\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<div class="row">
    <form class="form-horizontal" id="addForm" method="post" action="/man/?cases/html/add">
        <div class="col-md-8 ">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">查询患者</label>
                <div class="col-sm-5">
                    <input name="check" value="" class="form-control" placeholder="请输入患者手机号">
                </div>
                <div class="btn btn-primary col-sm-1" id="check">
                    查询
                </div>
                <div class="error col-sm-4" id="error"></div>
            </div>
            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">患者信息</label>
                <div class="col-sm-7" style="color: #8e8b8b; margin-top: 10px;">
                    <div class="col-sm-6">患者</div><div class="col-sm-6">&nbsp;</div>
                    <div class="col-sm-2">姓名：</div><span class="col-sm-4" id="trueName">*</span>
                    <div class="col-sm-2">手机号：</div><span class="col-sm-4" id="login">*</span>
                    <div class="col-sm-2">性别：</div><span class="col-sm-4" id="gender">*</span>
                    <div class="col-sm-2" >地址：</div><span class="col-sm-4" id="addr">*</span>
                    <div class="col-sm-12">&nbsp;</div>
                    <div class="col-sm-6">患者联系人</div><div class="col-sm-6">&nbsp;</div>
                    <div id="relationship">
                        <div class="col-sm-2">姓名：</div><span class="col-sm-4" id="name0">*</span>
                        <div class="col-sm-2">关系：</div><span class="col-sm-4" id="relationship0">*</span>
                        <div class="col-sm-2">手机号1：</div><span class="col-sm-4" id="phone10">*</span>
                        <div class="col-sm-2">手机号2：</div><span class="col-sm-4" id="phone20">*</span>
                        <div class="col-sm-2">姓名：</div><span class="col-sm-4" id="name1">*</span>
                        <div class="col-sm-2">关系：</div><span class="col-sm-4" id="relationship1">*</span>
                        <div class="col-sm-2">手机号1：</div><span class="col-sm-4" id="phone11">*</span>
                        <div class="col-sm-2">手机号2：</div><span class="col-sm-4" id="phone21">*</span>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label for="beginTime" class="col-sm-2 control-label">开始时间</label>
                <div class='col-sm-3'>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type="text" class="form-control" name="beginTime" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <label for="endTime" class="col-sm-2 control-label">结束时间</label>
                <div class='col-sm-3'>
                    <input name="endTime" value="" class="form-control" placeholder="结束时间">
                </div>
            </div>
            <div class="row form-group">
                <label for="error" class="col-sm-3 control-label" style="color: #8e8b8b;">除排序外以下信息均为必填</label>
            </div>
            <div class="row form-group">
                <label for="orgId" class="col-sm-2 control-label">医院</label>
                <div class="col-sm-7">
                    <select class="form-control" name="orgId">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value['org'], 'item', false, 'key');
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

            <div class="form-group">
                <label for="disease" class="col-sm-2 control-label">病情描述</label>
                <div class="col-sm-7">
                    <textarea  name="disease" class="form-control" cols="5"></textarea>
                </div>
                <div class="error col-sm-3"></div>
            </div>

            <div class="form-group">
                <label for="medication" class="col-sm-2 control-label">用药</label>
                <div class="col-sm-7">
                    <textarea  name="medication" class="form-control" cols="5"></textarea>
                </div>
                <div class="error col-sm-3"></div>
            </div>
            <div class="form-group">
                <label for="sideEffect" class="col-sm-2 control-label">副作用</label>
                <div class="col-sm-7">
                    <textarea  name="sideEffect" class="form-control" cols="5"></textarea>
                </div>
                <div class="error col-sm-3"></div>
            </div>
            <div class="form-group">
                <label for="doctorName" class="col-sm-2 control-label">诊断医生</label>
                <div class="col-sm-7">
                    <input  name="doctorName" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['doctorName'];?>
" class="form-control" placeholder="诊断医生">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-7">
                    <input  name="sort" value="" class="form-control" placeholder="排序">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a  class="btn btn-primary nscpostformerror" rel="#addForm" id="add">添加</a>
                </div>
            </div>

        </div>

    </form>
</div>

<link href="/assets/ui/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.zh-CN.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/assets/ui/js/jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
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
    //校验
    function customValidate(id){
        $(document).ready(function() {
            $("#"+id).validate({
                onfocusout: function(element) { $(element).valid(); },
                errorPlacement: function(error, element) {
                    // Append error within linked label
                    $(element).parent().next().children().remove();
                    $(element).parent().next().append( error);
                },
                rules: {
                    disease: {
                        required: true
                    },
                    medication: {
                        required: true
                    },
                    sideEffect:{
                        required:true
                    },
                    doctorName:{
                        required:true
                    }
                },
                messages: {
                    disease : {
                        required : "不能为空"
                    },
                    medication: {
                        required: "不能为空"
                    },
                    sideEffect: {
                        required: "不能为空"
                    },
                    doctorName:{
                        required: "不能为空"
                    }
                }
            });
        });
    }
    customValidate('addForm');
    //用户信息的遍历显示，和删除
    $(document).ready(function(){
        $('#check').click(function(){
            $.ajax({
                type: "POST",
                url: '/man/?cases/html/checkuser',
                data: {
                    'check':$('[name="check"]').val()
                },
                dataType:'json',
                success: function(data){
                    if(data.code==200){
                        $('#error').text(' ');
                        var detail = eval(data.msg);
                        for( var o in detail){
                            for( var oo in detail[o]) {
                                if (o == 'mysql') {
                                    $("span").each(
                                            function () {
                                                if ($(this).attr("id") == oo) {
                                                    $(this).text(detail[o][oo]);
                                                }
                                            }
                                    );
                                }else {
                                    for( var ooo in detail[o][oo]) {
                                        $("#relationship").children('span').each(
                                                function () {
                                                    if ($(this).attr("id") == ooo) {
                                                        $(this).text(detail[o][oo][ooo]);
                                                    }
                                                }
                                        );
                                    }
                                }
                            }
                        }
                        if(!detail['contacts']){
                            $("#relationship").children('span').each(
                                    function () {
                                        $(this).text('*');
                                    }
                            );
                        }
                    }
                    else {
                        $('#error').text(data.msg);
                        $('#trueName').text('*');
                        $('#login').text('*');
                        $('#gender').text('*');
                        $('#addr').text('*');
                        $("#relationship").children('span').each(
                                function () {
                                    $(this).text('*');
                                }
                        );
                    }
                },
                error : function() {
                    alert("异常！");
                }
            });
        });
    })
<?php echo '</script'; ?>
><?php }
}
