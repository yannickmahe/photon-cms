<div class="container">
	<div class="page-header">
		<h1><?php echo $title; ?></h1>
	</div>
	<form method="POST" action"<?php echo url_for('pages','edit'); ?>">
		<input type="hidden" name="page[id]" value="<?php echo $page->id ?>">

		<label>Title</label>
	    <input type="text" class="input-xxlarge" name="page[title]" placeholder="Title" value="<?php echo $page->title ?>">

		<label>URL</label>
	    <input type="text" class="input-xxlarge" name="page[url]" placeholder="/path/to/page/"  value="<?php echo $page->url ?>">

		<label>Head HTML</label>
	    <textarea rows="30" 
	    		  cols="50" 
	    		  id="code" 
	    		  type="text" 
	    		  style="width: 100%;" 
	    		  name="page[head_html]" placeholder="<p>This page is my page</p>"><?php echo $page->head_html ?></textarea>

		<label>Body HTML</label>
	    <textarea rows="30" 
	    		  cols="50" 
	    		  id="code" 
	    		  type="text" 
	    		  style="width: 100%;" 
	    		  name="page[body_html]" placeholder="<p>This page is my page</p>"><?php echo $page->body_html ?></textarea>

		<label>Everything ok ?</label>		
	    <button type="submit" class="btn">Submit</button>
	</form>
</div>

<script src="<?php echo app_root(); ?>/assets/js/codemirror.js"></script>
<script src="<?php echo app_root(); ?>/assets/js/codemirror-mode/htmlmixed/htmlmixed.js"></script>
<script src="<?php echo app_root(); ?>/assets/js/codemirror-mode/xml/xml.js"></script>
<script src="<?php echo app_root(); ?>/assets/js/codemirror-mode/javascript/javascript.js"></script>
<script src="<?php echo app_root(); ?>/assets/js/codemirror-mode/css/css.js"></script>
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    matchBrackets: true,
    indentUnit: 4,
    indentWithTabs: true,
    enterMode: "keep",
  	mode: "text/html", 
  	tabMode: "indent"
 });
</script>