<?php
	if($this->session->flashdata('msg_error'))
	{
		echo $this->session->flashdata('msg_error');
	}

	echo form_open('renters/dologin');
	echo form_label('Username:', 'username').'<br />';
	echo form_error('username', '<font color=red>', '</font><br \>');
	echo form_input('username', set_value('username')).'<br />';
	echo form_label('Password:', 'password').'<br />';
	echo form_error('password', '<font color=red>', '</font><br \>');
	echo form_password('password', set_value('password')).'<br />';
	echo form_submit('submit', 'Log in');
?>
