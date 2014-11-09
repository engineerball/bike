<h3><?php echo $products->bike_name; ?></h3>
<table>
  <tr>
    <td>
      <b>ID</b>: <?php echo $products->bike_id; ?> </ br>
      <b>Name</b>: <?php echo $products->bike_name; ?> </ br>
      <b>Price</b>: <?php echo number_format($products->bike_hourly_rate, 2); ?> </ br>
    </td>
  </tr>
  <tr>
    <td>
      <?php
	echo form_open("shopping/addCart");
	echo form_hidden("code", $products->bike_id);
	echo form_hidden("name", $products->bike_name);
	echo form_hidden("price", $products->bike_hourly_rate);
	echo "<b>Total</b>:".form_dropdown('qty',array('1'=>'1'));
	echo form_submit("submig", "Add");
	echo form_close();
      ?>	
    </td>
  </tr>
</table>
