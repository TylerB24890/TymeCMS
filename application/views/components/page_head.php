<!DOCTYPE html>
<html>
<head>

	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Tyler Bailey">
	<meta name="canonical" content="<?php echo site_url($this->uri->uri_string()); ?>" />	
  
	
	<!-- Facebook OpenGraph Meta Tags -->
	<meta property="og:title" content="<?php echo $meta_title; ?>"/>
	<meta property="og:url" content="<?php echo site_url($this->uri->uri_string()); ?>"/>
	<meta property="og:site_name" content="Tyme CMS"/>
	<meta property="og:image" content="<?php echo site_url(''); ?>"/>
	<meta property="og:description" content="A fully functioning content management system built using the CodeIgniter framework"/>
	<meta property="og:type" content=""/>
	
	<!-- Twitter Meta Tags -->
	<meta name="twitter:card" content="">
	<meta name="twitter:url" content="<?php echo site_url($this->uri->uri_string()); ?>">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
    
	<title><?php echo $meta_title; ?></title>
    
	<!-- Stylesheets -->
	<link href="<?php echo site_url('css/bootstrap.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('css/tyme.css'); ?>" rel="stylesheet"> <!-- Required for Tyme CMS -->
	<link href="<?php echo site_url('css/styles.css'); ?>" rel="stylesheet">
	
	<link rel="canonical" href="<?php echo site_url($this->uri->uri_string()); ?>" />
	
    <!-- Scripts -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?php echo site_url('js/bootstrap.min.js'); ?>"></script>
	
	<!-- Google Analytics -->
	<script>
		var _gaq = _gaq || [];
	 	var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
		_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
		_gaq.push(['_setAccount', 'UA-XXXXXXXX-XX']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

</head>