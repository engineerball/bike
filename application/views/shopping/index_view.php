<?php
	if ( !$this->cart->total_items())
	{
		echo heading('Empty item', '1');
		echo anchor('shopping', 'Select item');
	} else {
		echo anchor('shopping', 'Select item') . '|';
		echo anchor('shopping/checkout', 'Confirm rent') . '|';
		echo anchor('shopping/destroy', 'Cancel rent');
?>

<table class="tg">
  <tr>
    <th class="tg-6sdi">ID</th>
    <th class="tg-6sdi">Name</th>
    <th class="tg-6sdi">Qty</th>
    <th class="tg-6sdi">Price</th>
    <th class="tg-6sdi">Total</th>
  </tr>
<?php
	foreach ($cart as $items):
?>
  <tr>
    <td class="tg-031e"><?php echo $items['id']; ?></td>
    <td class="tg-031e"><?php echo anchor('shopping/detail/'.$items['id'], $items['name']); ?></td>
    <td class="tg-031e"><?php echo $items['qty']; ?></td>
    <td class="tg-031e"><?php echo number_format($items['price'], 2); ?></td>
    <td class="tg-031e"><?php echo number_format($items['subtotal'], 2); ?></td>
    <td class="tg-031e"><?php echo anchor('shopping/remove/'.$items['rowid'], 'Delete'); ?></td>
  </tr>

<?php
	endforeach;
?>
  <tr>
    <td align="right">Total:</td>
    <td align="right"><b><?php echo number_format($this->cart->total()); ?></b></td>
  </tr>
</table>
<?php
	}
?>

