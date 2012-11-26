<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo url_for('pages'); ?>">Backend</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li <?php if(is_current('pages')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('pages'); ?>">Pages</a></li>
          <li <?php if(is_current('templates')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('dashboard'); ?>">Templates</a></li>
          <li <?php if(is_current('layout')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('layout'); ?>">Site layout</a></li>
          <li <?php if(is_current('users')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('users'); ?>">Users</a></li>
          <li><a href="./preview" target="_blank">Preview</a></li>
        </ul>
         <a class="btn pull-right" href="<?php echo url_for('publish'); ?>">Publish all</a>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>