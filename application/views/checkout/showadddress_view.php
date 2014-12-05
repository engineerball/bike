<?php

if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }
	$address = $this->session->userdata('address');
	
	foreach ( $address as $item) {
		echo $item . '<br />';
	}
	
	echo anchor('checkout/step3', 'Next');		
?>

