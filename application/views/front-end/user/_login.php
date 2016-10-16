<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ELCOM | Login Page</title>
        <link   href="<?php echo base_url() ?>public/asset/css/bootstrap.min.css" rel="stylesheet">
        <link   href="<?php echo base_url() ?>public/asset/css/font-awesome.css" rel="stylesheet">
        <link   href="<?php echo base_url() ?>public/asset/css/animate.css" rel="stylesheet">
        <link   href="<?php echo base_url() ?>public/asset/css/style.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>public/asset/js/jquery-1.12.4.min.js"></script>
        <script src="<?php echo base_url() ?>public/asset/js/jquery.validate.min.js"></script>
    </head>
    <body class="gray-bg">
        <div class="loginColumns animated fadeInDown">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="font-bold">Welcome to ELCOM</h2>
                    <p>
                        <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                    </p>

                </div>
                <div class="col-md-6">
                    <div class="ibox-content">
                        <form class="m-t" method="POST" role="form" id="login_form">
                            <div class="form-group">
                                <input type="text" id="username" class="form-control input-lg" placeholder="Username" name="username" required/>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control input-lg" placeholder="Password" name="password" required/>
                            </div>
                            <input type="submit" class="btn btn-primary block full-width m-b" value="Login">
                            <a href="#">
                                <small>Forgot password?</small>
                            </a>
                            <p class="text-muted text-center">
                                <small>Do not have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                        </form>
                        <p class="m-t">
                            <small>ELCOM 3 &copy; 2016</small>
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    Copyright Example Company
                </div>
                <div class="col-md-6 text-right">
                    <small>© 2016-2026</small>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#username').focus();
                $('#login_form').validate({// initialize the plugin
                    rules: {
                        username: {
                            required: true
                        },
                        password: {
                            required: true,
                            minlength: 3
                        }
                    },
                    messages: {
                        username: {
                            required: 'Trường không được để trống',
                        },
                        password: {
                            required: 'Trường không được để trống',
                            minlength: 'Độ dài mật khẩu phải lớn hơn 3'
                        }
                    },
                });
                $('#username,#password').on('keydown', function () {
                    $('.message_flash').hide();
                });
            });
            ;
        </script>
    </body>
</html>