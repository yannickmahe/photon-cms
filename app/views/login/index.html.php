<div class="container">
<h1>Login</h1>
<form action="<?php echo url_for('login','login') ?>" method="POST">

  <label class="control-label"  for="login">Login</label>
  <input type="text" id="login" name="login" placeholder="login" class="input-xlarge">

  <label class="control-label" for="password">Password</label>
  <input type="password" id="password" name="password" placeholder="password" class="input-xlarge">

  <label class="control-label" for="password">Go!</label>
  <input class="btn btn-success" type="submit" value="Login" />

</form>
</div>