<?php echo anchor('shopping/cart', 'Item in cart'); ?> | 
<?php 
	if ( $this->cart->total_items() )
	{
		echo 'Total'.$this->cart->total_itemes().' |';
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
      <td>".$items->code."</td>
      <td>".$items->name."</td>
      <td>".$items->price."</td>
      <td>".anchor('shopping/detail/'.$items->code, 'Buy')."</td>
    </tr>";
}
?>
</table>
