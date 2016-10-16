<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps pro | <?php echo !empty($title)?$title:'-------';?></title>

    <link href="<?php echo base_url()?>public/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/asset/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/asset/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/asset/css/style.css" rel="stylesheet">
    <?php if(!empty($plugin['css'])):?>
        <?php foreach ($plugin['css'] as $row):?>
            <link href="<?php echo base_url()?>public/asset/css/<?php echo $row?>" rel="stylesheet">
        <?php endforeach;?>
    <?php endif;?>
    
    <script src="<?php echo base_url() ?>public/asset/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>public/asset/js/bootstrap.min.js"></script>

</head>
<body class="gray-bg">
    
    <?php if(!empty($temp)):?>
        <?php $this->load->view($temp,!empty($temp)?$temp:null);?>
    <?php endif;?>
    
    <?php if(!empty($plugin['js'])):?>
    <?php foreach ($plugin['js'] as $row):?>
        <script src="<?php echo base_url()?>public/asset/js/<?php echo $row?>"></script>
    <?php endforeach;?>
    <?php endif;?>
</body>
</html>
