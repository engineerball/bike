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
    
    function addshipoaddress()
    {
        $data['main_content'] = 'checkout/formaddress_view';
        $this->load->view('includes/template', $data);
    }

	function saveAddress()
	{
		$billaddress = array(
                'bill_firstname' => $this->input->post('firstname'),
                'bill_lastname' => $this->input->post('lastname'),
                'bill_email' => $this->input->post('email'),
                'bill_phone' => $this->input->post('phone'),
                'bill_address1' => $this->input->post('address1'),
                'bill_address2' => $this->input->post('address2'),
                'bill_city' => $this->input->post('city'),
                'bill_zip' => $this->input->post('zip'),
            );
                $this->session->set_userdata('billaddress', $billaddress);

        if ($this->input->post('ship') != false)
        {
        $shipaddress = array(
                'ship_firstname' => $this->input->post('firstname'),
                'ship_lastname' => $this->input->post('lastname'),
                'ship_email' => $this->input->post('email'),
                'ship_phone' => $this->input->post('phone'),
                'ship_address1' => $this->input->post('address1'),
                'ship_address2' => $this->input->post('address2'),
                'ship_city' => $this->input->post('city'),
                'ship_zip' => $this->input->post('zip')
                );
                $this->session->set_userdata('shipaddress', $shipaddress);
                redirect('checkout/step2');	
        }
        else
        {
            redirect('checkout/addshipaddress');
        }
	}
	
	function step2()
	{
		
		$data['main_content'] = 'checkout/showadddress_view';
		$data['cart'] = $this->cart->contents();
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
