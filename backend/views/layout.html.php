<!DOCTYPE html>
<html>
	<head>
		<title><?php include_partial('title'); ?></title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	    <style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
	      }
	    </style>
	</head>
	<body>
		<?php include_partial('header'); ?>
		<?php echo $content; ?>
		<?php include_partial('footer'); ?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>