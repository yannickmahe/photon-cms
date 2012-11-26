<div class="container">
	<div class="page-header">
		<h1><?php echo $title; ?></h1>
	</div>
	<form method="POST" action"<?php echo url_for('pages','edit'); ?>">
		<label>Title</label>
	    <input type="text" class="input-xxlarge" name="page[title]" placeholder="Title">

		<label>URL</label>
	    <input type="text" class="input-xxlarge" name="page[url]" placeholder="/path/to/page/">

		<label>HTML</label>
	    <textarea rows="20" cols="50" type="text" name="page[html]" class="input-xxlarge" placeholder="<p>This page is my page</p>"></textarea>

		<label>Everything ok ?</label>
	    <button type="submit" class="btn">Submit</button>

	</form>
</div>