<?php echo anchor('shopping/cart', 'Item in cart'); ?> | 
<?php 
	if ( $this->cart->total_items() )
	{
		echo 'Total'.$this->cart->total_items().' |';
		echo '='. number_format($this->cart->total()).'Baht';
	} else {
		echo 'Not found';
	}
?>

<table>
  <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Price</td>
  </tr>
<?php
	foreach ($products as $items){
		echo "
    <tr>
      <td>".$items->bike_id."</td>
      <td>".$items->bike_name."</td>
      <td>".$items->bike_hourly_rate."</td>
      <td>".anchor('shopping/detail/'.$items->bike_id, 'Buy')."</td>
    </tr>";
}
?>
</table>
