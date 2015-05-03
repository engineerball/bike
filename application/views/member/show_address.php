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
                        if ($this->session->userdata('logged'))
                        {
                            echo '<h2>Billing address</h2><br />';
                            echo '<strong>Name : </strong><p class="text-left">' . $billaddress[0]['bill_firstname'] . ' ' . $billaddress[0]['bill_lastname'] . '</p>';
                            echo '<strong>E-mail : </strong><p class="text-left">' . $billaddress[0]['bill_email'] . '</p>';
                            echo '<strong>Address line 1 : </strong><p class="text-left">' . $billaddress[0]['bill_address1'] . '</p>';
                            echo '<strong>Address line 2 : </strong><p class="text-left">' . $billaddress[0]['bill_address2'] . '</p>';
                            echo '<strong>City : </strong><p class="text-left">' . $billaddress[0]['bill_city'] . '</p>';
                            echo '<strong>Post/Zip Code : </strong><p class="text-left">' . $billaddress[0]['bill_zip'] . '</p>';
                            echo '<a class="btn btn-default" href="/customer/action_billaddress">Edit Billing Address</a>';
                    ?>
                </div>
                <div class="col-md-6 column">
                    <?php
                            echo '<h2>Shipping address</h2><br />';
                        	$shipaddress = $this->session->userdata('shipaddress');
                            echo '<strong>Name : </strong><p class="text-left">' . $shipaddress[0]['ship_firstname'] . ' ' . $shipaddress[0]['ship_lastname'] . '</p>';
                            echo '<strong>E-mail : </strong><p class="text-left">' . $shipaddress[0]['ship_email'] . '</p>';
                            echo '<strong>Address line 1 : </strong><p class="text-left">' . $shipaddress[0]['ship_address1'] . '</p>';
                            echo '<strong>Address line 2 : </strong><p class="text-left">' . $shipaddress[0]['ship_address2'] . '</p>';
                            echo '<strong>City : </strong><p class="text-left">' . $shipaddress[0]['ship_city'] . '</p>';
                            echo '<strong>Post/Zip Code : </strong><p class="text-left">' . $shipaddress[0]['ship_zip'] . '</p>';
                            echo '<a class="btn btn-default" href="/customer/action_shipaddress">Edit Shipping Address</a>';
                        }?>
            </div>
        </div>
    </div>
