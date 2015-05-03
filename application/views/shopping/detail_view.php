<h3><?php echo $products->bike_name; ?></h3>
<table>
  <tr>
    <td>
      <img src="<?php echo base_url(); ?>assets/uploads/files/bike/<?php echo $products->bike_photo; ?>" width='150' high='150' ><br />
      <b>ID</b>: <?php echo $products->bike_id; ?><br />
      <b>Name</b>: <?php echo $products->bike_name; ?><br />
      <b>Type</b>: <?php echo $products->bike_type; ?><br />
      <b>Store</b>: <?php echo $products->shop_name; ?><br />
      <b>Price</b>: <?php echo number_format($products->bike_price, 2); ?><br />
      <b>Description</b>: <p><?php echo $products->bike_desc; ?></p><br />
    </td>
  </tr>
  <tr>
    <td>
      <?php
	echo form_open("shopping/addCart");
	echo form_hidden("code", $products->bike_id);
	echo form_hidden("name", $products->bike_name);
	echo form_hidden("price", $products->bike_price);
	echo "<b>Total</b>:".form_dropdown('qty',array('1'=>'1','2'=>'2'),1);
	echo form_submit("submit", "Add");
	echo form_close();
      ?>	
    </td>
  </tr>
</table>
