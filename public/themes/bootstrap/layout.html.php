<!DOCTYPE html>
<head>
	<title><?php echo $page_title; ?></title>
	<?php include_theme_css(); ?>
	<?php include_theme_partial('head'); ?>
	<?php echo $page_head; ?>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="nav-collapse collapse">
			<?php include_theme_partial('header'); ?>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
	<div class="container">
		<?php echo $page_content; ?>
	</div>
	<div class="container">
		<?php include_theme_partial('footer'); ?>
	</div>
	<?php include_theme_js(); ?>
</body>