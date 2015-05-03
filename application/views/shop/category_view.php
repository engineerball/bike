        <div class="jumbotron">
                <h1>
                มองหารถจักรยานอยู่หรือเปล่า?    
                </h1>
                <p>
                    เรามีหลายสิ่งที่คุณต้องการ ลองเลือกชมสินค้าของเราสิครับ
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="#">Go Go Go!</a>
                </p>
            </div>
			<h3>
			    Our products.	
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