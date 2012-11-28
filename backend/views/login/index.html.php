<div class="container">
<form class="form-horizontal" action="<?php echo url_for('login','login') ?>" method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Login</legend>
    </div>
    <div class="control-group">
      <!-- Login -->
      <label class="control-label"  for="login">Login</label>
      <div class="controls">
        <input type="text" id="login" name="login" placeholder="login" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="password" class="input-xlarge">
      </div>
    </div>
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <input class="btn btn-success" type="submit" value="Login" />
      </div>
    </div>
  </fieldset>
</form>
</div>