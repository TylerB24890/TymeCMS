<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    
	<title><?php echo $meta_title; ?></title>
    
	<!-- Stylesheets -->
	<link href="<?php echo site_url('css/bootstrap.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('css/styles.css'); ?>" rel="stylesheet">
	
    <!-- Scripts -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?php echo site_url('js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo site_url('js/jquery.nivo.slider.js'); ?>"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>