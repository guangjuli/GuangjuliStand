<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }
        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body>

<div class="container">

    <form class="vu form-signin" >
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="请输入密码" required autofocus>
        <a class="adminlogin btn btn-lg btn-primary btn-block" >Sign in</a>
    </form>

</div> <!-- /container -->

<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/assets/js/Sham.js"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {


        $('.adminlogin').click(function(){
            var tag = '.vu';
            $.ajax({
                type: "POST",
                url: '/man/login?gui/html/login',
                data: $(tag).serialize(),
                dataType:'json',
                success: function(data){
                    if(data.code > 0){
                        var JS = data.js;
                        eval(JS);
                    }else{
                        alert(data.msg);
                    }
                },
                error : function() {
                    alert("异常！");
                }
            });
        });

    });
</script>

</body>
</html>
