<html>
    <head>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <!--include css-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'public/asset/css/bootstrap.min.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/back-end/asset/css/main.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/asset/css/spinner.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/asset/css/font-awesome.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/asset/css/bootstrap-datetimepicker.min.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/asset/css/style.min.css'?>"/>
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="<?php echo base_url() ?>public1/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public1/assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <style>
            .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
                padding-left: 5px;
                padding-right: 5px;
            }
        </style>
        <!--include js-->
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/jquery-1.12.4.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/globalString.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/modal.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/moment.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/bootstrap-datetimepicker.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/spinner.js'?>"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
        <script src="<?php echo base_url() ?>public1/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        
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
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('front-end/template/header.php')?>
            <div class="main-content">
                        <?php $this->load->view('front-end/sidebar');?>
                        <?php if(!empty($temp)):?> 
                        <?php $this->load->view($temp,  isset($data)?$data:NULL)?>
                        <?php endif;?>
            </div>
            <div class="clearfix"></div>
            <?php $this->load->view('front-end/template/footer.php')?>
        </div>
        
    </body>
</html>
