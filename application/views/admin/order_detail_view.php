<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bike Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content=""> 
        <link href="<?php echo base_url().'assets/';?>css/bootstrap.css" rel="stylesheet">
        <script src="<?php echo base_url().'assets/';?>js/jquery.js"></script>
        <script src="<?php echo base_url().'assets/';?>js/bootstrap.min.js"></script>
    </head> 
    <body>
        <div class="container">
            <?php if(isset($order)){?>
            <div class="row">            
            <div class="col-lg-12"><div class="alert alert-success"><a href="<?php echo base_url().'admin/category'; ?>">Category</a> | <a href="<?php echo base_url().'admin/product';?>">Bike</a> | <a href="<?php echo base_url().'admin/order'; ?>">Order</a></div></div>

            </div>
            <?php }?>
            <div class="row">
            <fieldset>
            <legend>Ordered Detail</legend>
                <div class="col-md-12">
                    <?php if(is_array($order) && count($order) ) {
                        foreach($order as $loop){
                    ?>
                    <table class="table table-hover table-condensed">
                    <tr><td class="text-left"><strong>#Order detail ID</strong></td><td><?php echo $loop->id;?></td></tr>
                    <tr><td><strong>Order Number</strong></td><td><?php echo $loop->order_number?></td></tr>
                    <tr><td><strong>Total</strong></td><td><?php echo $loop->total;?></td></tr>
                    <tr><td><strong>Order Date</strong></td><td><?php echo $loop->ordered_on;?></td></tr>
                    <tr><td><strong>Shipping Date</strong></td><td><?php echo $loop->shipped_on;?></td></tr>
                    <tr><td><strong>Order First</strong></td><td><?php echo $loop->firstname;?></td></tr>
                    <tr><td><strong>Order Lastname</strong></td><td><?php echo $loop->lastname;?></td></tr>
                    <tr><td><strong>Order email</strong></td><td><?php echo $loop->email;?></td></tr>
                    <tr><td><strong>Order phone</strong></td><td><?php echo $loop->phone;?></td></tr>
                    <tr><td><strong>Ship to firstname</strong></td><td><?php echo $loop->ship_firstname;?></td></tr>
                    <tr><td><strong>Ship to lastename</strong></td><td><?php echo $loop->ship_lastname;?></td></tr>
                    <tr><td><strong>Ship to email</strong></td><td><?php echo $loop->ship_email;?></td></tr>
                    <tr><td><strong>Ship to phone</strong></td><td><?php echo $loop->ship_phone;?></td></tr>
                    <tr><td><strong>Ship to address1</strong></td><td><?php echo $loop->ship_address1;?></td></tr>
                    <tr><td><strong>Ship to address2</strong></td><td><?php echo $loop->ship_address2;?></td></tr>
                    <tr><td><strong>Ship to city</strong></td><td><?php echo $loop->ship_city;?></td></tr>
                    <tr><td><strong>Ship to postcode</strong></td><td><?php echo $loop->ship_zip;?></td></tr>
                    <tr><td><strong>Bill to firstname</strong></td><td><?php echo $loop->bill_firstname;?></td></tr>
                    <tr><td><strong>Bill to lastename</strong></td><td><?php echo $loop->bill_lastname;?></td></tr>
                    <tr><td><strong>Bill to email</strong></td><td><?php echo $loop->bill_email;?></td></tr>
                    <tr><td><strong>Bill to phone</strong></td><td><?php echo $loop->bill_phone;?></td></tr>
                    <tr><td><strong>Bill to address1</strong></td><td><?php echo $loop->bill_address1;?></td></tr>
                    <tr><td><strong>Bill to address2</strong></td><td><?php echo $loop->bill_address2;?></td></tr>
                    <tr><td><strong>Bill to city</strong></td><td><?php echo $loop->bill_city;?></td></tr>
                    <tr><td><strong>Bill to postcode</strong></td><td><?php echo $loop->bill_zip;?></td></tr>
                    <tr><td><strong>Notes</strong></td><td><?php echo $loop->notes;?></td></tr>    
                    <?php } 
                    }?>
                    </table>
                </div>
            </fieldset>
        </div>
        </div>
    </body>
</html>
