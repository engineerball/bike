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
            <div class="col-lg-12"><div class="alert alert-success"><a href="<?php echo base_url().'admin/category'; ?>">Category</a> | <a href="<?php echo base_url().'admin/product'; ?>">Bike</a> | <a href="<?php echo base_url().'admin/order'; ?>">Order</a></div></div>
            </div>
            <?php }?>
            <div class="row">
            <fieldset>
            <legend>Ordered List</legend>
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                    <tr>
                        <td class="text-center"><strong><?php echo anchor('admin/order/orderlist/id/'.(($sort_order == 'ASC' && $sort_by == 'id') ? 'DESC' : 'ASC'),'#');?></strong></td>
                        <td><strong>Product Name</strong></td>
                        <td><strong>Product Price</strong></td>
                        <td><strong>Quantity</strong></td>
                        <td><strong>Total</strong></td>
                        <td><strong>Order Total</strong></td>
                        <td><strong>Order Number</strong></td>
                        <td><strong><?php echo anchor('admin/order/orderlist/ordered_on/'.(($sort_order == 'ASC' && $sort_by == 'ordered_on') ? 'DESC' : 'ASC'),'Order Date');?></strong></td>
                        <td><strong><?php echo anchor('admin/order/orderlist/shipped_on/'.(($sort_order == 'ASC' && $sort_by == 'shipped_on') ? 'DESC' : 'ASC'),'Shipping Date');?></strong></td>
                        <td><strong>Comment</strong></td>
                    </tr>
                    <?php if(is_array($order) && count($order) ) {
                        foreach($order as $loop){
                    ?>
                    <tr>
                        <td><?php echo $loop->order_items_id;?></td>
                        <td><?php echo $loop->name;?></td>
                        <td><?php echo $loop->price;?></td>
                        <td><?php echo $loop->quantity;?></td>
                        <td><?php echo $loop->subtotal;?></td>
                        <td><?php echo $loop->total;?></td>
                        <td><?php echo '<a href ="' . base_url() . 'admin/order/display_order_detail/' . $loop->order_number.'">'.$loop->order_number.'</a>';?></td>
                        <td><?php echo $loop->ordered_on;?></td>
                        <td><?php echo anchor('admin/order/shipping/edit/'.$loop->orders_id, $loop->shipped_on);?></td>
                        <td><?php echo $loop->notes; ?></td>
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
