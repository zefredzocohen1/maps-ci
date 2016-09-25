<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!--include css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url().'public/asset/css/bootstrap.min.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/back-end/asset/css/main.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/asset/css/spinner.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/asset/css/font-awesome.css'?>"/>
        <link type="text/css" rel="stylesheet"  href="<?php echo base_url().'public/asset/css/bootstrap-datetimepicker.min.css'?>"/>
        <!--include js-->
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/jquery-1.12.4.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/modal.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/moment.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/bootstrap-datetimepicker.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'public/asset/js/spinner.js'?>"></script>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('front-end/template/header.php')?>
            <?php if(!empty($temp)):?> 
            <?php $this->load->view($temp,  isset($data)?$data:NULL)?>
            <?php else:?>
            <?php die();?>
            <?php endif;?>
            <div class="clearfix"></div>
            <?php $this->load->view('front-end/template/footer.php')?>
        </div>
        
    </body>
</html>
