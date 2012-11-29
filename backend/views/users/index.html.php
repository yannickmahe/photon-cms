<div class="container">
	<div class="page-header">
		<h1>Users</h1>
	</div>
	<a class="btn" href="<?php echo url_for('users','edit') ?>">New</a>
	<table class="table">
		<thead>
			<tr>
				<td>id</id>
				<td>Login</td>
				<td>Actions</td>
			</tr>
		</thead>
		<?php foreach($users as $user): ?>
		<tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->login; ?></td>
			<td>
				<a class="btn" href="<?php echo url_for('users','edit',array('id' => $user->id)) ?>"><i class="icon-edit"></i> Edit</a>
				<?php if($user->id != 1): ?>
					<a class="btn btn-danger" href="<?php echo url_for('users','delete',array('id' => $user->id)) ?>" class="btn"><i class="icon-white icon-remove-circle"></i> Delete</a>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>