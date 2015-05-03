<?php
class Renters extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Renters_model','Renters');
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'html', 'form'));
		
		$this->load->library('grocery_CRUD');

	}

	function index()
	{
		if (! $this->session->userdata('logged'))
		{
			redirect('renters/login');
		} else {
			$this->load->view('renter/index_view');
		}
	}

	function signup()
	{
		 $this->load->view('signup_view');
	}
	
	function dosignup()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('idcard', 'ID Card', 'required');
		$this->form_validation->set_rules('tel', 'Mobile', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('clear_pass', 'Password', 'required');
 		$this->form_validation->set_error_delimiters('<font color=red>','</font>');

//		if ($this->input->post('submit'))
//		{
                $name = $this->input->post('name');
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
		print_r($member_data);

		if (!$this->form_validation->run() == FALSE )
		{
			$this->load->view('signup_view');
		} else {
	                $this->Renters->_addUser($member_data);
                        redirect('renters/login');
  
		}
//		} else {
//			echo "Not Post";
//		}
	}
	
	function login()
	{
		#$data['main_content'] = 'renters/form_view';
		$this->load->view('signin_view');
	}

	function dologin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<font color=red>','</font>');
		if ($this->input->post('submit'))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if ($this->form_validation->run())
			{
				$check = $this->Renters->_checkuser($username, $password);
				if ($check)
				{
					$data = array(
						'username' => $username,
						'logged' => TRUE
					);
					$this->session->set_userdata($data);
#					redirect('shopping');
					redirect($this->session->flashdata('redirectToCurrent'));
				} else {
					$this->session->set_flashdata('msg_error', 'Invalid password');
					$this->load->view('signin_view');
				}
			} else {
				redirect('renters/login');
			}
		}
	
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('shopping/index');
	}
}
