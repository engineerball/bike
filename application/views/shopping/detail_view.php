<h3><?php echo $product->name; ?></h3>
<table>
  <tr>
    <td>
      <b>ID</b>: <?php echo $products->code; ?> </ br>
      <b>Name</b>: <?php echo $products->name; ?> </ br>
      <b>Price</b>: <?php echo number_format($products->price, 2); ?> </ br>
    </td>
  </tr>
  <tr>
    <td>
      <?php
	echo form_open("shoping/addcart");
	echo form_hidden("code", $product->code);
	echo form_hidden("name", $product->name);
	echo form_hidden("price", $product->price);
	echo "<b>Total</b>:".form_dropdown('qty'. array('1'=>'1'));
	echo form_submit("submig", "Add");
	echo form_close();
      ?>	
    </td>
  </tr>
</table>
