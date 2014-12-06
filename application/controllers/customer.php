<?php
class Customer extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model','Customer');
		$this->load->library(array('cart','session', 'form_validation'));
		$this->load->helper(array('url', 'html', 'form'));
		
	}

	function index()
	{
		if (! $this->session->userdata('logged'))
		{
			redirect('customer/login');
		} else {
			$this->load->view('customer/index_view');
		}
	}

	function signup()
	{
		 $this->load->view('signup_view');
	}
	
	function dosignup()
	{
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('clear_pass', 'Password', 'required');
 		$this->form_validation->set_error_delimiters('<font color=red>','</font>');

//		if ($this->input->post('submit'))
//		{
                $firstname = $this->input->post('firstname');
                $lastname = $this->input->post('lastname');
                $phone = $this->input->post('phone');
                $clear_pass = $this->input->post('password');
                $email = $this->input->post('email');

                $customer_data = array(
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                                'phone' => $phone,
                                'email' => $email,
                                'password' => md5($clear_pass));
		print_r($customer_data);

		if (!$this->form_validation->run() == FALSE )
		{
			$this->load->view('signup_view');
        } 
        else 
        {
	        $this->Customer->add_customer($customer_data);
            redirect('customer/login');
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
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<font color=red>','</font>');
		if ($this->input->post('submit'))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->form_validation->run())
			{
				$check = $this->Customer->_checkuser($email, $password);
				if ($check)
				{
					$data = array(
						'email' => $email,
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
				redirect('customer/login');
			}
		}
	
	}

    function add_address()
    {
        $data['cart'] = $this->cart->contents();
        $this->session->set_flashdata('redirectToCurrent', current_url());
        $data['main_content'] = 'checkout/formaddress_view';
        $this->load->view('includes/template', $data);
    }
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
