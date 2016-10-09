<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8" />
        <title>Trang chủ</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="<?php echo base_url() ?>public1/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/theme/default.css" rel="stylesheet" id="theme" />

    </head>
    <body>
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
        <!-- ================== BEGIN BASE JS ================== -->
        <!--<script src="<?php echo base_url() ?>public1/assets/plugins/pace/pace.min.js"></script>-->
        <script>
            var context = "/its-omap";
            $(document).ready(function () {
                App.init();
            });
        </script>

        <style>
            .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
                padding-left: 5px;
                padding-right: 5px;
            }
        </style>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <div id="page-container" style="height: 100%;" class="fade page-sidebar-fixed page-header-fixed">
            <div id="sidebar" class="sidebar">
                <div data-scrollbar="true" data-height="100%">
                    <ul class="nav">
                        <li class="nav-profile">
                            <div class="image">
                                <a href="javascript:;"><img src="<?php echo base_url() ?>public1/assets/img/user-13.jpg" alt="" /></a>
                            </div>
                            <div class="info">
                                <%=username%>
                                <small><a href="logout.jsp">Thoát</a></small> 
                            </div>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-header"></li>
                        <li class="has-sub setActive expand" id="1">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-laptop"></i>
                                <span>Quản lý xe</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="setActive" id="1-1"><a href="<?php echo base_url() ?>public1/">Giám sát</a></li>
                                <li class="setActive" id="1-2"><a href="<?php echo base_url() ?>public1/transactions">Danh sách xe - OBU</a></li>
                            </ul>
                        </li>
                        <li class="has-sub setActive expand" id="21">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-flag-o"></i>
                                <span>Quản lý đội xe</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="setActive" id="21-1"><a href="<?php echo base_url() ?>public1/drivers">Danh sách lái xe</a></li>
                                <li class="setActive" id="21-2"><a href="<?php echo base_url() ?>public1/commands">Lệnh điều xe</a></li>
                            </ul>
                        </li>

                        <li class="has-sub setActive expand" id="3">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-laptop"></i>
                                <span>Báo cáo thống kê</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="setActive" id="3-1"><a href="<?php echo base_url() ?>public1/reports">Thống kê theo xe</a></li>
                                <li class="setActive" id="3-2"><a href="<?php echo base_url() ?>public1/report-drivers">Thống kê theo lái xe</a></li>
                                <li class="setActive" id="3-3"><a href="<?php echo base_url() ?>public1/report-departments">Thống kê theo phòng</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                                <i class="fa fa-angle-double-left">
                                </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-bg"></div>
            <jsp:include page="${requestScope.body}" />
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        </div>
    </body>
</html>