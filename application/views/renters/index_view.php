<?php
	echo 'Welcome, '.$this->session->userdata('username');
	echo '<br />'. anchor('renters/logout','Log out');
?>
