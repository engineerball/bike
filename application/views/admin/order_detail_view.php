<!DOCTYPE html>
<html lang="en">
    <head>  
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
                    <table class="table table-hover table-bordered">
                    <tr>
                        <td class="text-center"><strong>#</strong></td>
                        <td><strong>Order Number</strong></td>
                        <td><strong>Total</strong></td>
                        <td><strong>Order Date</strong></td>
                        <td><strong>Order First</strong></td>
                        <td><strong>Order Lastname</strong></td>
                        <td><strong>Order email</strong></td>
                        <td><strong>Order phone</strong></td>
                        <td><strong>Ship to firstname</strong></td>
                        <td><strong>Ship to lastename</strong></td>
                        <td><strong>Ship to email</strong></td>
                        <td><strong>Ship to phone</strong></td>
                        <td><strong>Ship to address1</strong></td>
                        <td><strong>Ship to address2</strong></td>
                        <td><strong>Ship to city</strong></td>
                        <td><strong>Ship to postcode</strong></td>
                        <td><strong>Bill to firstname</strong></td>
                        <td><strong>Bill to lastename</strong></td>
                        <td><strong>Bill to email</strong></td>
                        <td><strong>Bill to phone</strong></td>
                        <td><strong>Bill to address1</strong></td>
                        <td><strong>Bill to address2</strong></td>
                        <td><strong>Bill to city</strong></td>
                        <td><strong>Bill to postcode</strong></td>
                    </tr>
                    <?php if(is_array($order) && count($order) ) {
                        foreach($order as $loop){
                    ?>
                    <tr>
                        <td><?php echo $loop->id;?></td>
                        <td><?php echo $loop->order_number?></td>
                        <td><?php echo $loop->total;?></td>
                        <td><?php echo $loop->ordered_on;?></td>
                        <td><?php echo $loop->firstname;?></td>
                        <td><?php echo $loop->lastname;?></td>
                        <td><?php echo $loop->email;?></td>
                        <td><?php echo $loop->phone;?></td>
                        <td><?php echo $loop->ship_firstname;?></td>
                        <td><?php echo $loop->ship_lastname;?></td>
                        <td><?php echo $loop->ship_email;?></td>
                        <td><?php echo $loop->ship_phone;?></td>
                        <td><?php echo $loop->ship_address1;?></td>
                        <td><?php echo $loop->ship_address2;?></td>
                        <td><?php echo $loop->ship_city;?></td>
                        <td><?php echo $loop->ship_zip;?></td>
                        <td><?php echo $loop->bill_firstname;?></td>
                        <td><?php echo $loop->bill_lastname;?></td>
                        <td><?php echo $loop->bill_email;?></td>
                        <td><?php echo $loop->bill_phone;?></td>
                        <td><?php echo $loop->bill_address1;?></td>
                        <td><?php echo $loop->bill_address2;?></td>
                        <td><?php echo $loop->bill_city;?></td>
                        <td><?php echo $loop->bill_zip;?></td>

                    </tr>
                    <?php } 
                    }?>
                    </table>
                </div>
            </fieldset>
        </div>
        </div>
    </body>
</html>
