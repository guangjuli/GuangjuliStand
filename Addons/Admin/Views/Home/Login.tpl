<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" />

    <link href="/ui/css/login.css" rel="stylesheet">

    <script type="text/javascript" src="/assets/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            padding-top: 30px;
        }

        pbfooter {
            position:relative;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Jquery Validate Script -->
    <script type="text/javascript" src="/assets/jquery.validate.js"></script>

    <!-- Jquery Validate Script - Validation Fields -->
    <script type="text/javascript">

        $.validator.setDefaults({
            submitHandler: function() {
                //提交数据
                $.ajax({
                    type: "POST",
                    url: $('#signupForm').attr("action"),
                    data: $('#signupForm').serialize(),
                    dataType:'json',
                    success: function(data){
                        var JS = data.js;
                        eval(JS);
                    },
                    error : function() {
                        alert("异常！");
                    }
                });


                //window.open ('/admin/loginp','_self',false)
            }
        });

        $().ready(function() {
            // validate the comment form when it is submitted
            $("#commentForm").validate();

            // validate signup form on keyup and submit
            $("#signupForm").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    username: {
                        required: true,
                        minlength: 1
                    },
                    password: {
                        required: true,
                        minlength: 1
                    },
                    confirm_password: {
                        required: true,
                        minlength: 2,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    topic: {
                        required: "#newsletter:checked",
                        minlength: 2
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    username: {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 1 character"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 1 character long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    agree: "Please accept our policy"
                }
            });

            // propose username by combining first- and lastname
            $("#username").focus(function() {
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                if(firstname && lastname && !this.value) {
                    this.value = firstname + "." + lastname;
                }
            });

            //code to hide topic selection, disable for demo
            var newsletter = $("#newsletter");
            // newsletter topics are optional, hide at first
            var inital = newsletter.is(":checked");
            var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
            var topicInputs = topics.find("input").attr("disabled", !inital);
            // show when newsletter is checked
            newsletter.click(function() {
                topics[this.checked ? "removeClass" : "addClass"]("gray");
                topicInputs.attr("disabled", !this.checked);
            });
        });
    </script>

</head>

<style>

    .pbfooter {
        position:relative;
    }

</style>

<body style="background:url('/ui/images/bg.jpg') no-repeat center center; height:700px;">

<!-- NAVIGATION MENU -->



<div class="container">
    <div class="row">
        <div class="col-lg-offset-4 col-lg-4" style="margin-top:100px">
            <div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
                <img src="/ui/images/face80x80.jpg" alt="" class="img-circle">
                <br>
                <br>
                <form class="cmxform" id="signupForm" method="post" action="?z=admin/login">
                    <fieldset>
                        <p>
                            <input id="username" name="username" type="text" placeholder="Username">

                            <input id="password" name="password" type="password" placeholder="Password">
                        </p>
                        <input class="submit btn-success btn btn-large" type="submit" value="Login">
                    </fieldset>
                </form>
            </div>

        </div>


    </div>
</div>



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


</body></html>