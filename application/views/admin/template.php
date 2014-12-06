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
<ul>
<li><a href="<?php echo base_url().'admin/category'; ?>">Category</a></li>
<li><a href="<?php echo base_url().'admin/product'; ?>">Bike</a></li>
<li><a href="<?php echo base_url().'admin/order'; ?>">Order</a></li>
</ul>
</div>
	<div class="row clearfix">  
    <div class="col-md-2 column"></div>
    <div class="col-md-8 column">
		<?php echo $output; ?>
    </div>
    <div class="col-md-2 column"></div>
    </div>
    </div>
</body>
</html>
