<div class="container">
	<div class="page-header">
		<h1>Themes</h1>
	</div> 
	<form method="post" action="<?php echo url_for('themes','update'); ?>">
	<table class="table">
		<thead>
			<tr>
				<th>Selected</th>
				<th>Name</th>
				<th>Valid</th>
			</tr>
		</thead>
		<?php foreach($themes as $theme => $valid): ?>
			<tr>
				<td>
					<input type="radio" 
						   name="theme" 
						   value="<?php echo $theme; ?>" 
						   <?php if($theme == $currentTheme): ?>checked="checked"<?php endif; ?>
						   <?php if(!$valid): ?>disabled<?php endif; ?>
					/>
				</td>
				<td><?php echo $theme; ?></td>
				<td><?php if($valid): ?><span class="label label-success">Valid</span><?php else: ?><span class="label label-important">Invalid</span><?php endif; ?></td>
			<tr>
		<?php endforeach; ?>
	</table>
	<input class="btn" type="submit" value="Save" />
	</form>
</div>