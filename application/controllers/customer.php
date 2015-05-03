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
		/*
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
*/
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('clear_pass', 'Password', 'required');

 		$this->form_validation->set_error_delimiters('<font color=red>','</font>');
 		if ($this->form_validation->run())
 		{
			$firstname = $this->input->post('firstname');
	        $lastname = $this->input->post('lastname');
	        $phone = $this->input->post('phone');
	        $clear_pass = $this->input->post('password');
	        $email = $this->input->post('email');

	        if (!$this->Customer->check_email($this->input->post('email')))
			{
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
	            //redirect('customer/signup');
	            $this->show_signup(true);
			}
		} else {
			 $this->show_signup(true);
		}

	}
	
	function login()
	{
		#$data['main_content'] = 'renters/form_view';
		$this->load->view('signin_view');
	}

	function dologin()
	{
		//$this->form_validation->set_rules('email', 'Email', 'required');
		//$this->form_validation->set_rules('password', 'Password', 'required');
		//$this->form_validation->set_error_delimiters('<font color=red>','</font>');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if( $email && $password && $this->Customer->_checkuser($email,$password)) {
            // If the user is valid, redirect to the main view
            $data = array(
						'email' => $email,
						'logged' => TRUE
					);
			$this->session->set_userdata($data);
			redirect($this->session->flashdata('redirectToCurrent'));
        } else {
        	$this->show_login(true);
        }



		/*if ($this->input->post('submit'))
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
					redirect($this->session->flashdata('redirectToCurrent'));
				} else {
					$this->session->set_flashdata('msg_error', 'Invalid password');
					$this->load->view('signin_view');
				}
			} else {
				redirect('customer/login');
			}
		}*/
	
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

	function action_billaddress()
    {
    	$customerID = $this->Customer->get_customer_id($this->session->userdata('email'));
    	$billaddress = $this->Customer->get_billaddress($customerID);
    	if ($billaddress)
    	{
    		$data['address'] = $billaddress;
    		$data['main_content'] = 'checkout/formaddress_edit';
        	$this->load->view('includes/template', $data);
    	} else
    	{
    		$data['main_content'] = 'checkout/formaddress_view';
        	$this->load->view('includes/template', $data);
    	}
    }
	
	function action_shipaddress()
    {
    	$customerID = $this->Customer->get_customer_id($this->session->userdata('email'));
    	$shipaddress = $this->Customer->get_shipaddress($customerID);
    	if ($shipaddress)
    	{
    		$data['address'] = $shipaddress;
    		$data['main_content'] = 'checkout/formaddress_edit';
        	$this->load->view('includes/template', $data);
    	} else
    	{
    		$data['main_content'] = 'checkout/formaddress_view';
        	$this->load->view('includes/template', $data);
    	}
    }

    function showaddress()
    {
    	$customerID = $this->Customer->get_customer_id($this->session->userdata('email'));
    	$billaddress = $this->Customer->get_billaddress($customerID);
    	$shipaddress = $this->Customer->get_shipaddress($customerID);

    	$data['billaddress'] = $billaddress;
    	$data['shipaddress'] = $shipaddress;
    	$data['main_content'] = 'member/show_address';
        $this->load->view('includes/template', $data);
    }

    function save_customer_billaddress()
    {
    	$customerID = $this->Customer->get_customer_id($this->session->userdata('email'));
        $member = $this->Customer->get_customer($customerID);
		$address_id = $this->Customer->get_address_list_id($customerID);

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
		$result =  $this->Customer->save_address($customerID, $billaddress, $address_id);
		 redirect('/customer/showaddress');
    }

    function save_customer_shipaddress()
    {
    	$customerID = $this->Customer->get_customer_id($this->session->userdata('email'));
        $member = $this->Customer->get_customer($customerID);
		$address_id = $this->Customer->get_address_list_id($customerID);

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
		$result =  $this->Customer->save_address($customerID, $shipaddress, $address_id);
		 redirect('/customer/showaddress');
    }

    function save_billaddress()
    {
        $customerID = $this->Customer->get_customer_id($this->session->userdata('email'));
        $member = $this->Customer->get_customer($customerID);
		$address_id = $this->Customer->get_address_list_id($customerID);
		echo "Address id ===>".$address_id."<br />";
		
        if($this->input->post('billaddress') == 'yes')
        {
		echo "add bill<br />";
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

            $result =  $this->Customer->save_address($customerID, $billaddress, $address_id);
        }
        if($this->input->post('ship') == 'yes')
            {
			echo "add ship<br />";
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
			$address_id = $this->Customer->get_address_list_id($customerID);
			echo "Address id ===>".$address_id."<br />";

        $result =  $this->Customer->save_address($customerID, $shipaddress, $address_id);
 
                redirect('/');
            }

    }

    function show_login( $show_error = false ) {
        $data['error'] = $show_error;
        $this->load->helper('form');
        $this->load->view('signin_view',$data);
    }

    function show_signup( $show_error = false ) {
        $data['error'] = $show_error;
        $this->load->helper('form');
        $this->load->view('signup_view',$data);
    }

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
