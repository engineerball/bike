<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
                $this->load->helper(array('url','html','form'));
                $this->load->library(array('cart','session'));
                $this->load->model('Shopping_model','Shop');
		
		$this->load->library('grocery_CRUD');

        }

        public function index()
        {
		$data['products'] = $this->Shop->_getAll();
		$data['shops'] = $this->Shop->_getShopDropDown();
		#$this->load->view('shopping/product_view', $data);
		$data['main_content'] = 'shop/index_view';
		$this->load->view('includes/template', $data);
        }

	public function viewshop($shopid)
	{
		if ($shopid)
		{
			$data['products'] = $this->Shop->_getByShop($shopid);
			$data['shops'] = $this->Shop->_getShopDropDown();
			
			#$this->load->view('shopping/product_view', $data);
			$data['main_content'] = 'shop/index_view';
			$this->load->view('includes/template', $data);
		} else {
			redirect('shopping');
		}
	}

	public function addCart()
	{
		$cart = array( 
		'id' => $this->input->post('code'),
		'qty' => $this->input->post('qty'),
		'price' => $this->input->post('price'),
		'name' => $this->input->post('name')
		);
		$this->cart->insert($cart);
		redirect('shopping/cart');
	}

	public function destroy()
	{
		$this->cart->destroy();
		redirect('shopping');
	}

	public function remove($rowid)
	{
		$data = array('rowid' => $rowid, 'qty' => 0);
		$this->cart->update($data);
		redirect('shopping/cart');
	}

	public function cart()
	{
		$data['cart'] = $this->cart->contents();
		$this->session->set_flashdata('redirectToCurrent', current_url());
		#$this->load->view('shopping/index_view', $data);

                $data['main_content'] = 'shop/checkout_view';
                $this->load->view('includes/template', $data);
       
	}

	public function detail($code)
	{
		$data['products'] = $this->Shop->_getDetail($code);
		$data['main_content'] = 'shopping/detail_view';
		$this->load->view('includes/template', $data);
	}

	public function checkout()
	{
		if ($this->session->userdata('username'))
		{
			if ($this->cart->total_items())
			{
				$cart_id = $this->session->userdata('session_id');
				$now = date("Y-m-d H:i:s");
				$items = $this->cart->contents();
				foreach ($items as $item)
				{
					//$this->Shop->_save($cart_id,$item['price'],$item['qty'], $item['Bikes_bike_id'], $item['Renters_renter_id'], $now);
					$this->Shop->_save($cart_id,$item['price'],$item['qty'], $item['id'], '8', $now);
				}
				$this->cart->destroy();
				redirect('/', 'refresh');
				echo 'Add to cart successfull';
			} else {
				echo 'Not found item in a order';
			}
		} else {
			redirect('renters/login');
		}
	}
				
}
/* End of file shopping.php */
/* Location: ./application/controllers/shopping.php */

