<?php

if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }

?>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="col-md-6 column">
                    <?php
                        if ( !$this->session->userdata('logged'))
                        {
                            echo '<h2>Billing address</h2><br />';
                        	$billaddress = $this->session->userdata('billaddress');
                            echo '<p class="text-left">' . $billaddress['firstname'] . ' ' . $billaddress['lastname'] . '</p>';
                            echo '<p class="text-left">' . $billaddress['email'] . '</p>';
                            echo '<p class="text-left">' . $billaddress['bill_address1'] . '</p>';
                            echo '<p class="text-left">' . $billaddress['bill_address2'] . '</p>';
                            echo '<p class="text-left">' . $billaddress['bill_city'] . '</p>';
                            echo '<p class="text-left">' . $billaddress['bill_zip'] . '</p>';
                    ?>
                </div>
                <div class="col-md-6 column">
                    <?php
                            echo '<h2>Shipping address</h2><br />';
                        	$shipaddress = $this->session->userdata('shipaddress');
                            echo '<p class="text-left">' . $shipaddress['ship_firstname'] . ' ' . $shipaddress['ship_lastname'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress['ship_email'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress['ship_address1'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress['ship_address2'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress['ship_city'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress['ship_zip'] . '</p>';
                        }
                        else 
                        {
                            echo '<h2>Billing address</h2><br />';
                            echo '<p class="text-left">' . $billaddress[0]['bill_firstname'] . ' ' . $billaddress[0]['bill_lastname'] . '</p>';
                            echo '<p class="text-left">' . $billaddress[0]['bill_email'] . '</p>';
                            echo '<p class="text-left">' . $billaddress[0]['bill_address1'] . '</p>';
                            echo '<p class="text-left">' . $billaddress[0]['bill_address2'] . '</p>';
                            echo '<p class="text-left">' . $billaddress[0]['bill_city'] . '</p>';
                            echo '<p class="text-left">' . $billaddress[0]['bill_zip'] . '</p>';

                            
                    ?>
                </div>
                <div class="col-md-6 column">
                    <?php
                            echo '<h2>Shipping address</h2><br />';
                            $shipaddress = $this->session->userdata('shipaddress');
                            echo '<p class="text-left">' . $shipaddress[0]['ship_firstname'] . ' ' . $shipaddress[0]['ship_lastname'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress[0]['ship_email'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress[0]['ship_address1'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress[0]['ship_address2'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress[0]['ship_city'] . '</p>';
                            echo '<p class="text-left">' . $shipaddress[0]['ship_zip'] . '</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row clearfix">    
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
                                    <strong><?php echo number_format($this->cart->total(), 2); ?></strong>
                                </td>
                            </tr>
                        </tbody>
                        </table> <!--<button type="button" class="btn btn-default">Confim</button> -->
<?php 
	//echo anchor('checkout/submitorder', 'Submit Order');	
?>
                        <a class="btn btn-primary" href="/checkout/submitorder">Confirm</a>
                        <a class="btn btn-danger" href="/shop2/destroy">Cancel</a>
                </div>
            </div>
        </div>
