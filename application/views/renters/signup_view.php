<?php
	if($this->session->flashdata('msg_error'))
	{
		echo $this->session->flashdata('msg_error');
	}

	echo form_open('renters/dosignup');
	echo form_label('Name:', 'name').'<br />';
	echo form_error('name', '<font color=red>', '</font><br \>');
	echo form_input('name', set_value('name')).'<br />';

	echo form_label('ID Card:', 'idcard').'<br />';
	echo form_error('idcard', '<font color=red>', '</font><br \>');
	echo form_input('idcard', set_value('idcard')).'<br />';

	echo form_label('Mobile:', 'tel').'<br />';
	echo form_error('tel', '<font color=red>', '</font><br \>');
	echo form_input('tel', set_value('tel')).'<br />';

	echo form_label('Email:', 'email').'<br />';
	echo form_error('email', '<font color=red>', '</font><br \>');
	echo form_input('email', set_value('email')).'<br />';

	echo form_label('Username:', 'username').'<br />';
	echo form_error('username', '<font color=red>', '</font><br \>');
	echo form_input('username', set_value('username')).'<br />';

	echo form_label('Password:', 'password').'<br />';
	echo form_error('password', '<font color=red>', '</font><br \>');
	echo form_password('password', set_value('password')).'<br />';
	echo form_submit('submit', 'Signup');
	echo form_close();
?>
