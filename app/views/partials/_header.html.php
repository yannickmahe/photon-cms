<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo url_for('pages'); ?>">Photon CMS</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <?php if(is_logged_in()): ?>
            <li <?php if(is_current('pages')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('pages'); ?>">Pages</a></li>
            <li <?php if(is_current('themes')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('themes'); ?>">Themes</a></li>
            <li <?php if(is_current('layout')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('layout'); ?>">Site layout</a></li>
            <li <?php if(is_current('users')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('users'); ?>">Users</a></li>
            <li><a href="<?php echo Context::getInstance()->appRoot; ?>/preview.php?url=/" target="_blank">Preview</a></li>
            <li <?php if(is_current('publish')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('publish'); ?>">Publish all</a></li>
            <li><a href="<?php echo url_for('login','logout'); ?>">Log out</a></li>
          <?php else: ?>
            <li <?php if(is_current('login')): ?> class="active" <?php endif; ?>><a href="<?php echo url_for('login'); ?>">Log in</a></li>
          <?php endif; ?>
        </ul>
         
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>