<?php
//print_r($this->session);

if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }
    if (!$this->session->userdata('email') && !$this->session->userdata('logged'))
    {
        if (!$this->session->userdata('address'))
        {
            echo "<h2>Add address for billing</h2>";
            if (isset($error) && $error):
                ?><div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">×</a><?php echo validation_errors('<p style="color:red">', ''); ?>
                </div>
            <?php endif;
            echo form_open('checkout/saveAddress'); ?>
         
                <!-- full-name input-->
                <div class="control-group">
                    <label class="control-label">First Name*</label>
                    <div class="controls">
                        <input type="text" name="firstname" id="lastname" class="form-control input-sm" placeholder="First Name">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Last Name*</label>
                    <div class="controls">
                        <input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Phone*</label>
                    <div class="controls">
                        <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Mobile phone">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="formgroup-label">E-mail*</label>
                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="E-mail address">               
                </div>
                <!-- address-line1 input-->
                <div class="form-group">
                    <label class="formgroup-label">Address Line 1*</label>
                    <input type="text" name="address1" id="address1" class="form-control input-sm" placeholder="Street address, P.O. box, company name, c/o">
                    <p class="help-block">Street address, P.O. box, company name, c/o</p>               
                </div>
                <!-- address-line2 input-->
                 <div class="form-group">
                    <label class="formgroup-label">Address Line 2</label>
                    <input type="text" name="address2" id="address2" class="form-control input-sm" placeholder="Apartment, suite , unit, building, floor, etc.">
                    <p class="help-block">Apartment, suite , unit, building, floor, etc.</p>               
                </div>
                <!-- city input-->
                <div class="control-group">
                    <label class="control-label">City / Town*</label>
                    <div class="controls">
                        <input id="city" name="city" type="text" placeholder="city" class="form-control input-sm">
                        <p class="help-block">eg. Bangsue, Bangken</p>
                    </div>
                </div>
                <!-- region input-->
                <div class="control-group">
                    <label class="control-label">State / Province / Region*</label>
                    <div class="controls">
                        <input id="region" name="region" type="text" placeholder="state / province / region"
                        class="form-control input-sm">
                        <p class="help-block">eg. Bangkok, Chiangmai</p>
                    </div>
                </div>
                <!-- postal-code input-->
                <div class="control-group">
                    <label class="control-label">Zip / Postal Code*</label>
                    <div class="controls">
                        <input id="postal-code" name="zip" type="text" placeholder="zip or postal code"
                        class="form-control input-sm">
                        <p class="help-block">eg. 10800</p>
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="ship" id="ship" type="checkbox"> Ship to this address?
                    </label>
                </div>
                <?php echo form_submit('submit', 'Continue');
                echo "<p class=\"help-bolck\">* is require filed</p>";
        }
        else if (!$this->session->userdata('shipaddress'))
        {
            echo "<h2>Add address for shipping</h2>";
            echo form_open('checkout/saveAddress');
if (isset($error) && $error):
                ?><div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">×</a><?php echo validation_errors('<p style="color:red">', ''); ?>
                </div>
            <?php endif;
            echo form_open('checkout/saveAddress'); ?>
         
                <!-- full-name input-->
                <div class="control-group">
                    <label class="control-label">First Name*</label>
                    <div class="controls">
                        <input type="text" name="firstname" id="lastname" class="form-control input-sm" placeholder="First Name">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Last Name*</label>
                    <div class="controls">
                        <input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Phone*</label>
                    <div class="controls">
                        <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Mobile phone">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="formgroup-label">E-mail*</label>
                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="E-mail address">               
                </div>
                <!-- address-line1 input-->
                <div class="form-group">
                    <label class="formgroup-label">Address Line 1*</label>
                    <input type="text" name="address1" id="address1" class="form-control input-sm" placeholder="Street address, P.O. box, company name, c/o">
                    <p class="help-block">Street address, P.O. box, company name, c/o</p>               
                </div>
                <!-- address-line2 input-->
                 <div class="form-group">
                    <label class="formgroup-label">Address Line 2</label>
                    <input type="text" name="address2" id="address2" class="form-control input-sm" placeholder="Apartment, suite , unit, building, floor, etc.">
                    <p class="help-block">Apartment, suite , unit, building, floor, etc.</p>               
                </div>
                <!-- city input-->
                <div class="control-group">
                    <label class="control-label">City / Town*</label>
                    <div class="controls">
                        <input id="city" name="city" type="text" placeholder="city" class="form-control input-sm">
                        <p class="help-block">eg. Bangsue, Bangken</p>
                    </div>
                </div>
                <!-- region input-->
                <div class="control-group">
                    <label class="control-label">State / Province / Region*</label>
                    <div class="controls">
                        <input id="region" name="region" type="text" placeholder="state / province / region"
                        class="form-control input-sm">
                        <p class="help-block">eg. Bangkok, Chiangmai</p>
                    </div>
                </div>
                <!-- postal-code input-->
                <div class="control-group">
                    <label class="control-label">Zip / Postal Code*</label>
                    <div class="controls">
                        <input id="postal-code" name="zip" type="text" placeholder="zip or postal code"
                        class="form-control input-sm">
                        <p class="help-block">eg. 10800</p>
                    </div>
                </div>
        <?php
            echo form_hidden('ship', 'yes');
            echo form_submit('submit', 'Continue');
        } else
        {
            echo "not found";
        }

    }
    else
    {
        echo "<h2>Edit bill address for member</h2>";
                if (isset($error) && $error):
                ?><div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">×</a><?php echo validation_errors('<p style="color:red">', ''); ?>
                </div>
            <?php endif;
        if (isset($address['0']['bill_email']))
        {
            $firstname = $address['0']['bill_firstname'];
            $lastname = $address['0']['bill_lastname'];
            $email = $address['0']['bill_email'];
            $phone = $address['0']['bill_phone'];
            $address1 = $address['0']['bill_address1'];
            $address2 = $address['0']['bill_address2'];
            $city = $address['0']['bill_city'];
            $zip = $address['0']['bill_zip'];
        } else {
            $firstname = $address['0']['ship_firstname'];
            $lastname = $address['0']['ship_lastname'];
            $email = $address['0']['ship_email'];
            $phone = $address['0']['ship_phone'];
            $address1 = $address['0']['ship_address1'];
            $address2 = $address['0']['ship_address2'];
            $city = $address['0']['ship_city'];
            $zip = $address['0']['ship_zip'];
        }

        if (isset($address['0']['bill_email']))
        {
            echo form_open('customer/save_customer_billaddress');
        } else {
            echo form_open('customer/save_customer_shipaddress');
        }?>
          <!-- full-name input-->
                <div class="control-group">
                    <label class="control-label">First Name*</label>
                    <div class="controls">
                        <input type="text" name="firstname" id="firstnameinput" class="form-control input-sm" placeholder="First Name" value="<?php echo $firstname;?>">
                        <p class="help-block" value="<"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Last Name*</label>
                    <div class="controls">
                        <input type="text" name="lastname" id="lastnameinput" class="form-control input-sm" placeholder="Last Name" value="<?php echo $lastname;?>">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Phone*</label>
                    <div class="controls">
                        <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Mobile phone" value="<?php echo $phone;?>">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="formgroup-label">E-mail*</label>
                    <input type="email" name="email" id="disabledInput" class="form-control" placeholder="<?php echo $email;?>" disabled>               
                </div>
                <!-- address-line1 input-->
                <div class="form-group">
                    <label class="formgroup-label">Address Line 1*</label>
                    <input type="text" name="address1" id="address1" class="form-control input-sm" placeholder="Street address, P.O. box, company name, c/o" value="<?php echo $address1;?>">
                    <p class="help-block">Street address, P.O. box, company name, c/o</p>               
                </div>
                <!-- address-line2 input-->
                 <div class="form-group">
                    <label class="formgroup-label">Address Line 2</label>
                    <input type="text" name="address2" id="address2" class="form-control input-sm" placeholder="Apartment, suite , unit, building, floor, etc." value="<?php echo $address2;?>">
                    <p class="help-block">Apartment, suite , unit, building, floor, etc.</p>               
                </div>
                <!-- city input-->
                <div class="control-group">
                    <label class="control-label">City / Town*</label>
                    <div class="controls">
                        <input id="city" name="city" type="text" placeholder="city" class="form-control input-sm" value="<?php echo $city;?>">
                        <p class="help-block">eg. Bangsue, Bangken</p>
                    </div>
                </div>
                <!-- region input-->
                <div class="control-group">
                    <label class="control-label">State / Province / Region*</label>
                    <div class="controls">
                        <input id="region" name="region" type="text" placeholder="state / province / region"
                        class="form-control input-sm">
                        <p class="help-block">eg. Bangkok, Chiangmai</p>
                    </div>
                </div>
                <!-- postal-code input-->
                <div class="control-group">
                    <label class="control-label">Zip / Postal Code*</label>
                    <div class="controls">
                        <input id="postal-code" name="zip" type="text" placeholder="zip or postal code"
                        class="form-control input-sm" value="<?php echo $zip;?>">
                        <p class="help-block">eg. 10800</p>
                    </div>
                </div>
        <?php echo form_submit('submit', 'Continue');
    }
?>

