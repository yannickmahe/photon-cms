<!DOCTYPE html>
<html>
	<head>
		<title><?php include_partial('title'); ?></title>
		<link href="<?php echo app_root(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo app_root(); ?>/assets/css/codemirror.css" rel="stylesheet">
	    <style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
	      }
	      body > .navbar .brand {
			padding-right: 0;
			padding-left: 0;
			margin-left: 20px;
			float: right;
			font-weight: bold;
			color: black;
			text-shadow: 0 1px 0 rgba(255, 255, 255, .1), 0 0 30px rgba(255, 255, 255, .125);
			-webkit-transition: all .2s linear;
			-moz-transition: all .2s linear;
			transition: all .2s linear;
		  }
	    </style>
	</head>
	<body>
		<?php include_partial('header'); ?>
		<?php echo $content; ?>
		<?php include_partial('footer'); ?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?php echo app_root(); ?>/assets/js/bootstrap.min.js"></script>
	</body>
</html>