<?php

if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }
    if (!$this->session->userdata('email') && !$this->session->userdata('logged'))
    {
        if (!$this->session->userdata('shipaddress'))
        {
            echo "<h3>Add address for shipping</h3>";
            echo form_open('checkout/saveAddress');
            echo form_label('First Name:', 'firstname').' ';
    	    echo form_input('firstname', set_value('firstname')).'<br />';
            echo form_label('Last Name:', 'lastname').' ';
	        echo form_input('lastname', set_value('lastname')).'<br />';
            echo form_label('Email:', 'email').' ';
	        echo form_input('email', set_value('email')).'<br />';
            echo form_label('Phone:', 'phone').'';
	        echo form_input('phone', set_value('phone')).'<br />';
            echo form_label('Address 1:', 'address1').'<br />';
	        echo form_textarea('address1', set_value('address1')).'<br />';
            echo form_label('Address2:', 'address2').'<br />';
            echo form_textarea('address2', set_value('address2')).'<br />';
            echo form_label('City:', 'city').' ';
            echo form_input('city', set_value('city')).'<br />';
            echo form_label('ZIP:', 'zip').' ';
            echo form_input('zip', set_value('zip')).'<br />';
            echo form_hidden('ship', TRUE);
            echo form_submit('submit', 'Continue');
        }
        else
        {
            echo "<h3>Add address for billing</h3>";
            echo form_open('checkout/saveAddress');
            echo form_label('First Name:', 'firstname').' ';
    	    echo form_input('firstname', set_value('firstname')).'<br />';
            echo form_label('Last Name:', 'lastname').' ';
	        echo form_input('lastname', set_value('lastname')).'<br />';
            echo form_label('Email:', 'email').' ';
	        echo form_input('email', set_value('email')).'<br />';
            echo form_label('Phone:', 'phone').'';
	        echo form_input('phone', set_value('phone')).'<br />';
            echo form_label('Address 1:', 'address1').'<br />';
	        echo form_textarea('address1', set_value('address1')).'<br />';
            echo form_label('Address2:', 'address2').'<br />';
            echo form_textarea('address2', set_value('address2')).'<br />';
            echo form_label('City:', 'city').' ';
            echo form_input('city', set_value('city')).'<br />';
            echo form_label('ZIP:', 'zip').' ';
            echo form_input('zip', set_value('zip')).'<br />';
            echo form_label('Ship to this address:', 'ship').' ';
            echo form_checkbox('ship', 'y', TRUE).'<br />';
            echo form_submit('submit', 'Continue');
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
        echo form_checkbox('ship', 'y', TRUE).'<br />';
        echo form_submit('submit', 'Continue');
    }
?>

