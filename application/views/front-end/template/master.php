<html>
    <head>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <!--include css-->
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">-->
        <link href="<?php echo base_url()?>public/asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>public/asset/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="<?php echo base_url()?>public/asset/css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- Gritter -->
        <link href="<?php echo base_url()?>public/asset/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

        <link href="<?php echo base_url()?>public/asset/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url()?>public/asset/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper" style="background-color: #2f4050 !important">
            <?php $this->load->view('front-end/block/flash');?>
            <?php $this->load->view('front-end/sidebar'); ?>
            <div id="page-wrapper" class="gray-bg dashbard-1" >
                <div class="row border-bottom">
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin: 0px;padding: 0px;">
                        <div class="wrapper wrapper-content" style="margin: 0px;padding: 0px;">
                            <?php if (!empty($temp)): ?> 
                                <?php $this->load->view($temp, isset($data) ? $data : NULL) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        
    <!-- Mainly scripts -->
    <script src="<?php base_url()?>public/asset/js/jquery-2.1.1.js"></script>
    <script src="<?php base_url()?>public/asset/js/globalString.js"></script>
    <script src="<?php base_url()?>public/asset/js/bootstrap.min.js"></script>
    <script src="<?php base_url()?>public/asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php base_url()?>public/asset/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php base_url()?>public/asset/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php base_url()?>public/asset/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php base_url()?>public/asset/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php base_url()?>public/asset/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php base_url()?>public/asset/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php base_url()?>public/asset/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php base_url()?>public/asset/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php base_url()?>public/asset/js/inspinia.js"></script>
    <script src="<?php base_url()?>public/asset/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php base_url()?>public/asset/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php base_url()?>public/asset/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php base_url()?>public/asset/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php base_url()?>public/asset/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php base_url()?>public/asset/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php base_url()?>public/asset/js/plugins/toastr/toastr.min.js"></script>

    
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Maps .....', 'Welcome to Maps pro');
            }, 1300);
        });
    </script>
    </body>
</html>
