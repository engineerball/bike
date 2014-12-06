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
	foreach ($products as $item){
?>
						<div class="col-md-4 column">
							<img alt="140x140" src="<?php echo base_url()."assets/uploads/files/products/".$item->images; ?>" />
							<dl>
								<dt>
                                <a href="<?php echo base_url().'shop2/product/'.$item->id ; ?>" ><?php echo $item->name; ?></a>
								</dt>
								<dd>
									<?php echo "Price : ". $item->price; ?>
								</dd>
							</dl>
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
