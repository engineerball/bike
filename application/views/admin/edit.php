<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
	<div class="container">
<div class="navcontainer">

</div>
	<div class="row clearfix">  

	<?php echo anchor('/admin/order/orderlist', ">> Back <<"); ?>
	<br />
	<div class = "row clearfix" />
    <div class="col-md-2 column"></div>
    <div class="col-md-8 column">
		<?php echo $output; ?>
    </div>
    <div class="col-md-2 column"></div>
    </div>
    </div>
</body>
</html>