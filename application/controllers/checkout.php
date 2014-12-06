<?php
class checkout extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model','order');
		$this->load->library(array('cart', 'session', 'form_validation'));
		$this->load->helper(array('url', 'html', 'form'));
        $this->load->database();
		
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
        if (!$this->session->userdata('billaddress') || !$this->session->userdata('shipaddress'))
        {
                $data['main_content'] = 'checkout/formaddress_view';
                $this->load->view('includes/template', $data);
        }
        else
        {
            redirect('checkout/step2');
        }
	}
    
    function addshipaddress()
    {
        $data['main_content'] = 'checkout/formaddress_view';
        $this->load->view('includes/template', $data);
    }

	function saveAddress()
	{
		$billaddress = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
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

        if ($this->input->post('ship') != false || $this->session->userdata('shipaddress'))
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

    function submitorder()
    {
        if ($this->cart->total_items() && $this->session->userdata('billaddress') && $this->session->userdata('shipaddress'))
        {
            $order = array();
            $order['order_number'] = substr(number_format(time() * mt_rand(), 0, '',''),0,9); 
            $order['ordered_on'] = date("Y-m-d H:i:s");
            $order['firstname'] = $this->session->userdata['billaddress']['firstname'];
            $order['lastname'] = $this->session->userdata['billaddress']['lastname'];
            $order['email'] = $this->session->userdata['billaddress']['email'];
            $order['phone'] = $this->session->userdata['billaddress']['phone'];

            $order['bill_firstname'] = $this->session->userdata['billaddress']['bill_firstname'];
            $order['bill_lastname'] = $this->session->userdata['billaddress']['bill_lastname'];
            $order['bill_email'] = $this->session->userdata['billaddress']['bill_email'];
            $order['bill_phone'] = $this->session->userdata['billaddress']['bill_phone'];
            $order['bill_city'] = $this->session->userdata['billaddress']['bill_city'];
            $order['bill_zip'] = $this->session->userdata['billaddress']['bill_zip'];
            $order['bill_address1'] = $this->session->userdata['billaddress']['bill_address1'];
            $order['bill_address2'] = $this->session->userdata['billaddress']['bill_address2'];

            $order['ship_firstname'] = $this->session->userdata['shipaddress']['ship_firstname'];
            $order['ship_lastname'] = $this->session->userdata['shipaddress']['ship_lastname'];
            $order['ship_email'] = $this->session->userdata['shipaddress']['ship_email'];
            $order['ship_phone'] = $this->session->userdata['shipaddress']['ship_phone'];
            $order['ship_city'] = $this->session->userdata['shipaddress']['ship_city'];
            $order['ship_zip'] = $this->session->userdata['shipaddress']['ship_zip'];
            $order['ship_address1'] = $this->session->userdata['shipaddress']['ship_address1'];
            $order['ship_address2'] = $this->session->userdata['shipaddress']['ship_address2'];

            $order['total'] = $this->cart->total();


            $order['order_id'] = $this->order->saveorder($order);

            $items = $this->cart->contents();
            foreach ($items as $item)
            {
                $this->order->saveorderitems($item['id'], $order['order_id'], $item['qty'], $item['subtotal']);

            }
            $this->session->set_userdata('order', $order);
            redirect('checkout/addSuccess');

        }
    }

	function addSuccess()
	{

            $data['cart'] = $this->cart->contents();
            $data['order'] = $this->session->userdata('order');
            $this->cart->destroy();
            $data['main_content'] = 'checkout/summary_view';
            $this->load->view('includes/template', $data);
	}

}
