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
                cnickName: {
                    required: true,
                    minlength: 2
                },
                login : {
                    required : true,
                    minlength : 11,
                    // 自定义方法：校验手机号在数据库中是否存在
                    // checkPhoneExist : true,
                    isMobile : true
                },
                email: {
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6,
                    isPassword:true
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password",
                    isPassword:true
                },
                height:{
                    isHeight:true
                },
                mobile:{
                    isMobile:true
                }
            },
            messages: {
                cnickName: "请输入昵称",
                email: {
                    email: "请输入正确的email地址"
                },
                login : {
                    required : "请输入手机号",
                    minlength: "请正确输入",
                    isMobile : "请输入手机号码"
                },
                password: {
                    required: "请输入密码",
                    minlength: "不小于6个字符",
                    isPassword:"密码格式错误"
                },
                confirm_password: {
                    required: "请输入确认密码",
                    minlength: "不小于6个字符",
                    equalTo: "两次输入不一致",
                    isPassword:"密码格式错误"
                },
                height:{
                    isHeight:"请输入30-210的整数"
                },
                mobile:{
                    isMobile:"请输入正确的手机号"
                }
            }
        });
    });
}

//校验手机号
jQuery.validator.addMethod("isMobile", function(value, element) {
    var length = value.length;
    var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
    return this.optional(element) || (length == 11 && mobile.test(value));
}, "请正确填写您的手机号码");

//校验密码
jQuery.validator.addMethod("isPassword", function(value, element) {
    var password = /^[a-zA-Z]+[a-zA-Z0-9_]{5,19}$/;
    return this.optional(element) || (password.test(value));
}, "密码格式错误");

//验证身高
jQuery.validator.addMethod("isHeight", function(value, element) {
    var height = /^[0-9]{2,3}$/;
    return this.optional(element) || (height.test(value)&& value>30 && value<210);
}, "请输入30-210的数字");







function showErrorMsg(error){
    for( var o in error){
        $("input").each(
            function(){
                if($(this).attr("name")== o){
                    $(this).parent().next().children().remove();
                    $(this).parent().next().append("<div>"+error[o]+"</div>");
                }
            }
        );
    }
}
