
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ELCOM | Login Page</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="<?php echo base_url() ?>public1/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN BASE JS ================== -->
        <script src="<?php echo base_url() ?>public1/assets/plugins/pace/pace.min.js"></script>
        <!-- ================== END BASE JS ================== -->
    </head>
    <body class="pace-top bg-white">
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->
        <!-- begin #page-container -->
        <div id="page-container" class="fade">
            <!-- begin login -->
            <div class="login login-with-news-feed">
                <!-- begin news-feed -->
                <div class="news-feed">
                    <div class="news-image">
                        <img src="<?php echo base_url() ?>public1/assets/img/login-bg/bg-7.jpg" data-id="login-cover-image" alt="" />
                    </div>
                    <div class="news-caption">
                    </div>
                </div>
                <!-- end news-feed -->
                <!-- begin right-content -->
                <div class="right-content">
                    <!-- begin login-header -->
                    <div class="login-header">
                        <div class="brand">
                            <span class="logo"></span> ELCOM INSIDE
                            <small>Login system</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sign-in"></i>
                        </div>
                    </div>
                    <!-- end login-header -->
                    <!-- begin login-content -->
                    <div class="login-content">
                        <form  method="POST" class="margin-bottom-0" id="login_form">
                            <div class="form-group m-b-15">
                                <input type="text" id="username" class="form-control input-lg" placeholder="Username" name="username" />
                            </div>
                            <div class="form-group m-b-15">
                                <input type="password" class="form-control input-lg" placeholder="Password" name="password"/>
                            </div>

                            <div class="login-buttons">
                                <button type="button" id="submit_login" class="btn btn-success btn-block btn-lg" onclick="submitLogin(this.form)">Sign in</button>
                            </div>

                            <hr />
                            <p class="text-center text-inverse">
                                &copy; Elcom Inside All Right Reserved 2016
                            </p>
                        </form>
                    </div>
                    <!-- end login-content -->
                </div>
                <!-- end right-container -->
            </div>
            <!-- end login -->

            <!-- begin theme-panel -->

        </div>
        <!-- end page container -->
        <!-- ================== BEGIN BASE JS ================== -->
        <script src="<?php echo base_url() ?>public1/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
                <script src="assets/crossbrowserjs/html5shiv.js"></script>
                <script src="assets/crossbrowserjs/respond.min.js"></script>
                <script src="assets/crossbrowserjs/excanvas.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url() ?>public1/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="<?php echo base_url() ?>public1/assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            var context = "/its-omap";
            $(document).ready(function () {
                App.init();
                $('#username').focus();
                $('#login_form').keydown(function (e) {
                    var key = e.which;
                    if (key == 13) {
                        // As ASCII code for ENTER key is "13"
                        submitLogin(this);
                    }
                });
            });
        </script>
    </body>
</html>
