<div class="container">
	<div class="page-header">
		<h1>Pages</h1>
	</div>
	<a class="btn" href="<?php echo url_for('pages','edit') ?>">New</a>

	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>Title</th>
				<th>URL</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tr>
			<td>1</td>
			<td>About</td>
			<td>/about</td>
			<td>
				<a class="btn" href="#"><i class="icon-edit"></i> Edit</a>
				<a class="btn" href="#"><i class="icon-share"></i> Preview</a>
			</td>
		</tr>
	</table>

</div>
