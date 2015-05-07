			<div class="row clearfix">
				<div class="col-md-1 column">
                </div>
				<div class="col-md-10 column">
					<div class="thumbnail-detail">
					    <a href="<?php echo base_url().'assets/uploads/files/products/'.$product->images; ?>"><img src="<?php echo base_url().'assets/uploads/files/products/'.$product->images; ?>" alt="image title" ></a>
					</div>
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
    echo form_submit("submit", "Add to cart");
    echo form_close();
?> 
				</div>
				<div class="col-md-1 column">
				</div>
			</div>
		</div>
