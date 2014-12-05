<?php

class Renters_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function _checkUser($username, $password)
	{
		$result = $this->db->where('renter_username', $username)
				->where('renter_password', md5($password))
				->count_all_results('Renters');
		return $result > 0 ? TRUE : FALSE;
	}	
	
	function _addUser($member_data)
	{
/*		$name = $this->input->post('name');
		$idcard = $this->input->post('idcard');
		$tel = $this->input->post('tel');
		$username = $this->input->post('username');
		$clear_pass = $this->input->post('password');
		$email = $this->input->post('email');

		$member_data = array(
				'renter_name' => $name,
				'renter_id_card' => $idcard,
				'renter_phone' => $tel,
				'renter_username' => $username,
				'renter_email' => $email,
				'renter_password' => md5($clear_pass));
*/
		$result = $this->db->insert('Renters', $member_data);
		return $result;
	}
}
?>
