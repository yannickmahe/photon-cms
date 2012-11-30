<div class="container">
	<div class="page-header">
		<h1>Site layout</h1>
	</div>
	<form action="<?php echo url_for('layout','update'); ?>" method="post">

		<?php foreach($itemsArr as $item): ?>

		<label><?php echo ucfirst($item->name); ?></label>
	    <textarea rows="30" 
	    		  cols="12" 
	    		  id="item_<?php echo $item->id ?>" 
	    		  type="text" 
	    		  style="width: 100%;" 
	    		  name="items[<?php echo $item->id; ?>]" placeholder="<p>This page is my page</p>"><?php echo $item->html ?></textarea>


		<?php endforeach; ?>
		<label>Everything ok?</label>
		<input class="btn" type="submit" value="Submit" />
	</form>
</div>


<script src="http://localhost/photon-cms/backend/assets/js/codemirror.js"></script>
<script src="http://localhost/photon-cms/backend/assets/js/codemirror-mode/htmlmixed/htmlmixed.js"></script>
<script src="http://localhost/photon-cms/backend/assets/js/codemirror-mode/xml/xml.js"></script>
<script src="http://localhost/photon-cms/backend/assets/js/codemirror-mode/javascript/javascript.js"></script>
<script src="http://localhost/photon-cms/backend/assets/js/codemirror-mode/css/css.js"></script>
<script type="text/javascript">
<?php foreach($itemsArr as $item): ?>
  var editor<?php echo $item->id ?> = CodeMirror.fromTextArea(document.getElementById("item_<?php echo $item->id ?>"), {
    lineNumbers: true,
    matchBrackets: true,
    indentUnit: 4,
    indentWithTabs: true,
    enterMode: "keep",
  	mode: "text/html", 
  	tabMode: "indent"
 });
<?php endforeach; ?>
</script>