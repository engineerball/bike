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
            <div class="col-lg-12"><div class="alert alert-success"><a href="<?php echo base_url().'admin/category'; ?>">Category</a> | <a href="<?php echo base_url().'admin/product'; ?>">Bike</a> | <a href="<?php echo base_url().'admin/order'; ?>">Order</a></div></div>
            </div>
            <?php }?>
            <div class="row">
            <fieldset>
            <legend>Ordered List</legend>
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                    <tr>
                        <td class="text-center"><strong>#</strong></td>
                        <td><strong>Product Name</strong></td>
                        <td><strong>Product Price</strong></td>
                        <td><strong>Quantity</strong></td>
                        <td><strong>Total</strong></td>
                        <td><strong>Order Total</strong></td>
                        <td><strong>Order Number</strong></td>
                        <td><strong>Order Date</strong></td>
                    </tr>
                    <?php if(is_array($order) && count($order) ) {
                        foreach($order as $loop){
                    ?>
                    <tr>
                        <td><?php echo $loop->id;?></td>
                        <td><?php echo $loop->name;?></td>
                        <td><?php echo $loop->price;?></td>
                        <td><?php echo $loop->quantity;?></td>
                        <td><?php echo $loop->subtotal;?></td>
                        <td><?php echo $loop->total;?></td>
                        <td><?php echo '<a href ="' . base_url() . 'admin/order/display_order_detail/' . $loop->order_number.'">'.$loop->order_number.'</a>';?></td>
                        <td><?php echo $loop->ordered_on;?></td>
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
