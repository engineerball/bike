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
									Rent Price
								</th>
								<th>
									Deposit
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
									<?php echo number_format($items['price'], 2); ?>
								</td>
								<td>
									<?php echo number_format($items['price'], 2); ?>
								</td>
							</tr>
<?php
	endforeach;
?>
							<tr class="success">
								<td>
									Total
								</td>
								<td></td>
								<td></td>
								<td>
									<strong><?php echo number_format($this->cart->total()); ?></strong>
								</td>
							</tr>
						</tbody>
					</table> <button type="button" class="btn btn-default">Confim</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
?>
