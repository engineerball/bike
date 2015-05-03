			<div class="row clearfix">
				<div class="col-md-3 column">
                </div>
				<div class="col-md-6 column">
                <img alt="140x140" src="<?php echo base_url().'assets/uploads/files/products/'.$product->images; ?>" class="img-rounded" />
					<dl>
						<dt>
<?php echo $product->name; ?>
						</dt>
						<dd>
                            <strong>Price : </strong><?php echo $product->price; ?>	
						</dd>
						<dt>
                            <strong>Description</strong>
						</dt>
						<dd>
<?php echo $product->description; ?>
						</dd>
                        <dd>
<?php
    echo form_open("shop2/add_to_Cart");
    echo form_hidden("id", $product->id);
    echo form_hidden("name", $product->name);
    echo form_hidden("price", $product->price);
    $array = array();
    for ($i = 1; $i <= $product->quantity; $i++)
        $array[$i] = $i;
    echo "<b>Total</b>:".form_dropdown('quantity',$array,1);
?>
 
                        </dd>
					</dl> <!--<button type="button" class="btn btn-primary btn-default">Add</button> -->
<?php   
    echo form_submit("submit", "Add");
    echo form_close();
?> 
				</div>
				<div class="col-md-3 column">
				</div>
			</div>
		</div>
