<?php
class checkout extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Renters_model','Renters');
		$this->load->library(array('cart', 'session', 'form_validation'));
		$this->load->helper(array('url', 'html', 'form'));
		
		$this->load->library('grocery_CRUD');

	}

	function index()
	{
                $data['cart'] = $this->cart->contents();
                $this->session->set_flashdata('redirectToCurrent', current_url());
                #$this->load->view('shopping/index_view', $data);

                $data['main_content'] = 'checkout/formaddress_view';
                $this->load->view('includes/template', $data);

	}

	function step1()
	{
                $data['main_content'] = 'checkout/formaddress_view';
                $this->load->view('includes/template', $data);

	}

	function saveAddress()
	{
		$address = array(
                'fullname' => $this->input->post('fullname'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'telephone' => $this->input->post('telephone'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'province' => $this->input->post('province'),
                'postcode' => $this->input->post('postcode')
                );
                $this->session->set_userdata('address', $address);
                redirect('checkout/step2');	
	}
	
	function step2()
	{
		
		$data['main_content'] = 'checkout/showadddress_view';
                $this->load->view('includes/template', $data);

	}
	
	function step3()
	{
		$data['cart'] = $this->cart->contents();
		$data['address'] = $this->session->userdata('address');
                $this->session->set_flashdata('redirectToCurrent', current_url());

		$data['main_content'] = 'checkout/summary_view';
                $this->load->view('includes/template', $data);

	}

	function addSuccess()
	{

	}

}
