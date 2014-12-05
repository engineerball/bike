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
									<?php echo anchor('shopping/detail/'.$items['id'], $items['name']); ?>
								</td>
								<td>
									<?php echo number_format($items['qty'], 0); ?>
								</td>
								<td>
									<?php echo number_format($items['price'], 2); ?>
								</td>
								<td>
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
<div class="row clearfix">
		<div class="col-md-4 column">
			<h2>
				Shipping to
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
	<?php
		foreach ( $address as $item) {
                	echo $item . ' ';
        	}
	?>
					 <button type="button" class="btn btn-default">Confim</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
?>