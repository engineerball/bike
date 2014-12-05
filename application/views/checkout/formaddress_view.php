<?php

if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }

        echo form_open('checkout/saveAddress');
        echo form_label('Name:', 'fullname').'<br />';
        echo form_input('fullname', set_value('fullname')).'<br />';
        echo form_label('First Name:', 'firstname').'<br />';
	echo form_input('firstname', set_value('firstname')).'<br />';
        echo form_label('Last Name:', 'lastname').'<br />';
	echo form_input('lastname', set_value('lastname')).'<br />';
        echo form_label('E-mail:', 'email').'<br />';
	echo form_input('email', set_value('email')).'<br />';
        echo form_label('Tel.:', 'telephone').'<br />';
	echo form_input('telephone', set_value('telephone')).'<br />';
        echo form_label('Address 1:', 'address1').'<br />';
	echo form_input('address1', set_value('address1')).'<br />';
        echo form_label('Address2:', 'address2').'<br />';
        echo form_input('address2', set_value('address2')).'<br />';
        echo form_label('Province:', 'province').'<br />';
        echo form_input('province', set_value('province')).'<br />';
        echo form_label('Postcode:', 'postcode').'<br />';
        echo form_input('postcode', set_value('postcode')).'<br />';
        echo form_submit('submit', 'Continue');
?>

