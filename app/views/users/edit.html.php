<div class="container">
	<div class="page-header">
		<h1><?php echo $title; ?></h1>
	</div>
    <form action="<?php echo url_for('users','edit'); ?>" method="post">
		<input type="hidden" name="user[id]" value="<?php echo $user->id ?>">
    <label>Login</label>
    <input type="text" name="user[login]" class="span3" value="<?php echo $user->login ?>" <?php if($user->id): ?>disabled="true"<?php endif; ?>>
    <label>Password</label>
    <input type="password" name="user[password]" class="span3">
    <label>Password confirmation</label>
    <input type="password" name="user[password_confirmation]" class="span3">
    <label>Everything ok?</label>
    <input type="submit" value="Submit" class="btn">
    </form>
</div>