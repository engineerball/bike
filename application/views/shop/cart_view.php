<?php
        if ( !$this->cart->total_items())
        {
            echo heading('Your cart is empty', '1');
 ?>
            <a class="btn btn-default" href="/shop2">Select item</a>
        <?php
        } else {
        	echo heading('Your item(s) in cart', '1');
?>

			<div class="row clearfix">
				<div class="col-md-12 column">
					<table class="table">
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									Name
								</th>
								<th>
									Quantity
								</th>
								<th>
									Price
								</th>
								<th>
										
								</th>
							</tr>
						</thead>
		<?php
			foreach ($cart as $items):
		?>
						<tbody>
							<tr>
								<td>
									#
								</td>
								<td>
									<?php echo anchor('shop2/product/'.$items['id'], $items['name']); ?>
								</td>
								<td>
									<?php echo number_format($items['qty'], 0); ?>
								</td>
								<td>
									<?php echo number_format($items['price'], 2); ?>
								</td>
								<td>
									<?php echo anchor('shop2/remove/'.$items['rowid'], 'x Remove item from cart'); ?>
								</td>
							</tr>
<?php
	endforeach;
?>
							<tr class="success">
								<td></td>
								<td></td>
								<td><strong>Total</strong></td>
								<td>
									<strong><?php echo number_format($this->cart->total(), 2); ?></strong>
								</td>
							</tr>
						</tbody>
					</table>
<?php 
                if ( !$this->cart->total_items())
        {
                echo heading('Empty item', '1');
        ?>
                <a class="btn btn-default" href="/shop2">Select item</a>
        <?php 	} else { ?>
        	<a class="btn btn-default" href="/shop2">Select item</a>
        	<a class="btn btn-primary" href="/shop2/checkout">Confirm</a>
        	<a class="btn btn-danger" href="/shop2/destroy">Cancel</a>
        	
        <?php }?>
				</div>
			</div>
		</div>

<?php
}
?>
