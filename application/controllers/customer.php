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

		if (!$this->Customer->check_email($this->input->post('email')))
		{
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

		    if (!$this->form_validation->run() == FALSE )
		    {
			    $this->load->view('signup_view');
            }    
            else 
            {
	            $this->Customer->add_customer($customer_data);
                redirect('customer/login');
		    }
		} else {
            redirect('customer/signup');
		}
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
        #$this->session->set_flashdata('redirectToCurrent', current_url());
        $data['main_content'] = 'checkout/formaddress_view';
        $this->load->view('includes/template', $data);
    }

    function add_shipaddress()
    {
        #$this->session->set_flashdata('redirectToCurrent', current_url());
        $data['main_content'] = 'checkout/formaddresscustomer_view';
        $this->load->view('includes/template', $data);
    }

    function save_billaddress()
    {
        $customerID = $this->Customer->get_customer_id($this->session->userdata('email'));
        $member = $this->Customer->get_customer($customerID);
        if($this->input->post('billaddress'))
        {
            $billaddress = array(
                'customer_id' => $customerID,
                'bill_firstname' => $member->firstname,
                'bill_lastname' => $member->lastname,
                'bill_email' => $member->email,
                'bill_phone' => $member->phone,
                'bill_address1' => $this->input->post('address1'),
                'bill_address2' => $this->input->post('address2'),
                'bill_city' => $this->input->post('city'),
                'bill_zip' => $this->input->post('zip'),
            );

            $result =  $this->Customer->save_address($customerID, $billaddress);
        }

        if($this->input->post('ship'))
            {
                echo "aaaa";
                $shipaddress = array(
                    'customer_id' => $customerID,
                    'ship_firstname' => $member->firstname,
                    'ship_lastname' => $member->lastname,
                    'ship_email' => $member->email,
                    'ship_phone' => $member->phone,
                    'ship_address1' => $this->input->post('address1'),
                    'ship_address2' => $this->input->post('address2'),
                    'ship_city' => $this->input->post('city'),
                    'ship_zip' => $this->input->post('zip'),
                );

        $result =  $this->Customer->save_address($customerID, $shipaddress);
 
                redirect('/');
            }

    }

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
