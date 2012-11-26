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
		<?php foreach ($pages as $page): ?>
			<tr>
				<td><?php echo $page->id; ?></td>
				<td><?php echo $page->title; ?></td>
				<td><?php echo $page->url; ?></td>
				<td>
					<a class="btn" href="<?php echo url_for('pages','edit',array('id' => $page->id)) ?>"><i class="icon-edit"></i> Edit</a>
					<a class="btn" href="preview<?php echo $page->url; ?>"><i class="icon-share"></i> Preview</a>
				</td>
			</tr>
		<?php endforeach; ?>

	</table>

</div>
