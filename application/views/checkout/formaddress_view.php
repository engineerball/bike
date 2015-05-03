<?php
//print_r($this->session);

if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }
    if (!$this->session->userdata('email') && !$this->session->userdata('logged'))
    {
        echo "not email set and not logged";
        if (!$this->session->userdata('billaddress'))
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
            var_dump($this->session->userdata('billaddress'));
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
        echo form_open('customer/save_billaddress');
        echo form_label('Address 1:', 'address1').'<br />';
	    echo form_textarea('address1', set_value('address1')).'<br />';
        echo form_label('Address2:', 'address2').'<br />';
        echo form_textarea('address2', set_value('address2')).'<br />';
        echo form_label('City:', 'city').'<br />';
        echo form_input('city', set_value('city')).'<br />';
        echo form_label('ZIP:', 'zip').'<br />';
        echo form_input('zip', set_value('zip')).'<br />';
            echo form_label('Ship to this address:', 'ship').' ';
            echo "     <input type='checkbox' name='ship' value='yes'><br />";
        echo form_hidden('billaddress', 'yes');
        echo form_submit('submit', 'Continue');
    }
?>

