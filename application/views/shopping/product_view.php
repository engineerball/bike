<?php 
	echo anchor('shopping/cart', 'Item in cart '); 
	echo ' | ';
        echo anchor('shopping', 'Select item ');
?> | 

<?php 
	if ( $this->cart->total_items() )
	{
		echo 'Item in cart : '.$this->cart->total_items().' |';
		echo 'Price : '. number_format($this->cart->total()).'Baht';
	} else {
		echo 'Not found';
	}
		echo '<br />';
		echo '<b>Shop</b> : ';
		echo anchor('shopping/index', 'All'). ' | ';
		foreach ($shops as $items){
			echo anchor('shopping/viewshop/'.$items->shop_id, $items->shop_name). ' | ';
		}
?>


<table>
  <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Price</td>
    <td>Image</td>
  </tr>
<?php
	foreach ($products as $items){
		echo "
    <tr>
      <td>".$items->bike_id."</td>
      <td>".$items->bike_name."</td>
      <td>".$items->bike_hourly_rate."</td>
      <td><img src=".base_url()."assets/uploads/files/bike/".$items->bike_photo." width='150' high='150' ></td>";
		if ( $items->bike_status == "available") {
			echo   "<td>".anchor('shopping/detail/'.$items->bike_id, 'Rent')."</td>";
		} else {
			echo "<td>Not available</td>";
		}
    echo "</tr>";
}
?>
</table>
