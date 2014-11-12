			<div class="jumbotron">
				<h1>
					Hello, world!
				</h1>
				<p>
					This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
			<h3>
				h3. Lorem ipsum dolor sit amet.
			</h3>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<div class="row clearfix">
<?php
	foreach ($products as $items){
?>
						<div class="col-md-4 column">
							<img alt="140x140" src="<?php echo base_url()."assets/uploads/files/bike/".$items->bike_photo; ?>" />
							<dl>
								<dt>
									<?php echo $items->bike_name; ?>
								</dt>
								<dd>
									ID : <?php echo $items->bike_id; ?>	
								</dd>
								<dd>
									Rental rate : <?php echo $items->bike_hourly_rate; ?>
								</dd>
								<dt>
									Description	
								</dt>
								<dd>
									<?php echo $items->bike_desc; ?>
								</dd>
							</dl>
							<form action="<?php echo base_url().'shopping/detail/'.$items->bike_id; ?>" method="get">
<?php
	if ( $items->bike_status == "available") { 
echo   anchor('shopping/detail/'.$items->bike_id, 'Rent');
?>

							<button type="button" class="btn btn-primary">Rent</button>
<?php
	} else { 
?>
							<button type="button" class="btn btn-lg" disabled="disabled">Rent</button>
<?php }
?>
							</form>
						</div>
<?php	
	}
?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
