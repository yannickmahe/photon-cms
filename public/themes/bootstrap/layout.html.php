<!DOCTYPE html>
<head>
	<title><?php echo $page_title; ?></title>
	<?php include_theme_css(); ?>
	<?php include_theme_partial('head'); ?>
	<?php echo $page_head; ?>
</head>
<body>
	<?php include_theme_partial('header'); ?>
	<div class="container">
		<?php echo $page_content; ?>
	</div>
	<div class="container">
		<?php include_theme_partial('footer'); ?>
	</div>
	<?php include_theme_js(); ?>
</body>