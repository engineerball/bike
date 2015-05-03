<?php
class checkout extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Order_model','Customer_model'));
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

        //login user
        if ( $this->session->userdata('logged'))
        {
			$customerid = $this->Customer_model->get_customer_id($this->session->userdata('email'));
            $billaddress = $this->Customer_model->get_billaddress($customerid);
            $shipaddress = $this->Customer_model->get_shipaddress($customerid);
            if (!empty($billaddress) && !empty($shipaddress))
			{	
				redirect('checkout/step2');
			}
			else
			{
                $data['error'] = $show_error;
				$data['main_content'] = 'checkout/formaddress_view';
                $this->load->view('includes/template', $data);
			}
        }
        else 
        {
            //not login
			if ( !$this->session->userdata('billaddress') || !$this->session->userdata('shipaddress'))
			{
                $data['error'] = $show_error;
                $data['main_content'] = 'checkout/formaddress_view';
                $this->load->view('includes/template', $data);
			}
			else
			{
				redirect('checkout/step2');
			}
        }
	}
    
    function addshipaddress()
    {
        $data['main_content'] = 'checkout/formaddress_view';
        $this->load->view('includes/template', $data);
    }

	function saveAddress()
	{

        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('address1', 'Address1', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('zip', 'Postcode', 'required');
       if ($this->form_validation->run())
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

            if (isset($this->input->post('ship')))
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
                $shipaddress = false;
                $this->session->set_userdata('shipaddress', $shipaddress);
                redirect('checkout/addshipaddress');
            }
        } else {
            $this->show_addressform(true);
        }
	}
	
	function step2()
	{
		

        if ($this->session->userdata('logged') && ($this->session->userdata('billaddress') && $this->session->userdata('shipaddress')))
        {
            $customerid = $this->Customer_model->get_customer_id($this->session->userdata('email'));
            $data['billaddress'] = $this->Customer_model->get_billaddress($customerid);
            $data['shipaddress'] = $this->Customer_model->get_shipaddress($customerid);
        }
        $data['cart'] = $this->cart->contents();   
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

    function submitorder()
    {
        if ($this->cart->total_items() && $this->session->userdata('billaddress') && $this->session->userdata('shipaddress') || $this->session->userdata('logged'))
        {
            if ( !$this->session->userdata('logged'))
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

            }
            else 
            {
                $customerid = $this->Customer_model->get_customer_id($this->session->userdata('email'));
                $customerdetail = $this->Customer_model->get_customer($customerid);
                $billaddress = $this->Customer_model->get_billaddress($customerid);
                $shipaddress = $this->Customer_model->get_shipaddress($customerid);
                $order = array(
                    'order_number' => substr(number_format(time() * mt_rand(), 0, '',''),0,9),
                    'ordered_on' => date("Y-m-d H:i:s"),
                    'customer_id' => $customerid,
                    'firstname' => $customerdetail->firstname,
                    'lastname' => $customerdetail->lastname,
                    'email' => $customerdetail->email,
                    'phone' => $customerdetail->phone
                );

                foreach($billaddress[0] as $item => $value){
                    $order[$item] = $value;
                }
                foreach($shipaddress[0] as $item => $value){
                    $order[$item] = $value;
                }
            }
            $order['total'] = $this->cart->total();
            $order['order_id'] = $this->Order_model->saveorder($order);
           
            $items = $this->cart->contents();
            foreach ($items as $item)
            {
                $this->Order_model->saveorderitems($item['id'], $order['order_id'], $item['qty'], $item['subtotal']);

            }
            $this->session->set_userdata('order', $order);
            redirect('checkout/addSuccess');

        }
    }

	function addSuccess()
	{

            $data['cart'] = $this->cart->contents();
            $data['order'] = $this->session->userdata('order');
            if($this->session->userdata('logged'))
            {
                $customerid = $this->Customer_model->get_customer_id($this->session->userdata('email'));
                $data['billaddress'] = $this->Customer_model->get_billaddress($customerid);
                $data['shipaddress'] = $this->Customer_model->get_shipaddress($customerid);
            }
            $this->cutStock($data['cart']);
            $this->cart->destroy();
            $data['main_content'] = 'checkout/summary_view';
            $this->load->view('includes/template', $data);
	}

    function cutStock($product)
    {
        foreach ($product as $item)
        {
            $productid = $item['id'];
            $orderqty = $item['qty'];
        }
        $query = $this->db->select('quantity')->get_where('products', array('id' => $productid));
        foreach ($query->result() as $row)
        {
                $quantity =  $row->quantity;
        }
        $remainqty = $quantity - $orderqty;
        $data = array(
            'quantity' => $remainqty
        );
        $this->db->where('id', $productid);
        $this->db->update('products', $data);
    }

    function show_addressform( $show_error = false ) {
        $data['error'] = $show_error;
        $this->load->helper('form');
        $data['main_content'] = 'checkout/formaddress_view';
        $this->load->view('includes/template', $data);
    }
}
