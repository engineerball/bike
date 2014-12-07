<?php

if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }

?>
               <div class="row clearfix">
                    <h1>Thank you</h1>
                    <h2>we already save your order to our system.</h2>
            <h3>Your order number is : <?php echo $this->session->userdata['order']['order_number']; ?></h3>
<div class="col-md-6">
<?php
    if ( !$this->session->userdata('logged'))
    {
    echo '<strong>Billing address</strong><br />';
    $shipaddress = $this->session->userdata('billaddress');
    foreach ( $shipaddress as $item) {
        echo $item . '<br />';
    }
?>
                </div>
                <div class="col-md-6 column">
<?php
    echo '<strong>Shipping address</strong><br />';
    $shipaddress = $this->session->userdata('shipaddress');
    foreach ( $shipaddress as $item) {
        echo $item . '<br />';
    }
    }
    else
    {
    echo '<strong>Billing address</strong><br />';
    foreach ( $billaddress[0] as $item) {
         echo $item . '<br />';
   }
?>
                </div>
                <div class="col-md-6 column">
<?php
    echo '<strong>Shipping address</strong><br />';
    foreach ( $shipaddress['0'] as $item) {
        echo $item . '<br />';
    }

    }
?>

</div>
                <div class="col-md-12 column">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Product Name
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Total
                                </th>
                            </tr>
                        </thead>
        <?php
            foreach ($cart as $items):
        ?>
                        <tbody>
                            <tr>
                                <td>
<?php echo $items['id']; ?> 
                                </td>
                                <td>
                                    <?php echo $items['name']; ?>
                                </td>
                                <td>
                                    <?php echo number_format($items['qty'], 0); ?>
                                </td>
                                <td>
                                    <?php echo number_format($items['price'], 2); ?>
                                </td>
                                <td>
                                    <?php echo number_format($items['subtotal'], 2); ?>
                                </td>
                            </tr>
<?php
    endforeach;
?>
                            <tr class="success">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Grand total</strong></td>
                                <td>
                                    <strong><?php echo number_format($order['total'], 2); ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>                
                </div>
            </div>
        </div>
    </div>
</div>
