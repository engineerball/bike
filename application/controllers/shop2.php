<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop2 extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper(array('url', 'html', 'form'));
            $this->load->library(array('cart', 'session'));
            $this->load->model(array('Product_model', 'Category_model'));
        }

        public function index()
        {
		$data['products'] = $this->Product_model->get_all_products();
#		$data['shops'] = $this->Shop->_getShopDropDown();
        $data['categories'] = $this->Category_model->get_categories();

		$data['main_content'] = 'shop/index_view';
		$this->load->view('includes/template', $data);
        }

       function product($id)
       {
           $data['product'] = $this->Product_model->get_product($id);

           if(!$data['product'] || $data['product']->enabled == 0)
           {
               show_404();
           }
 
           $data['base_url']     = $this->uri->segment_array();
           $data['page_title']   = $data['product']->name;
 
           if($data['product']->images == 'false')
           {
               $data['product']->images = array();
         
           }
           else
           {
               $data['product']->images = $data['product']->images;
           }

           $data['categories'] = $this->Category_model->get_categories();
           $data['main_content'] = 'shop/product_view';
           $this->load->view('includes/template', $data);
       }

        function category($id)
        {
            $data['category'] = $this->Category_model->get_category($id);
            
            //if (!$data['category'] || $data['category']->enable == 0)
            if (!$data['category'])
            {
                show_404();
            }

            $product_count = $this->Product_model->count_products($data['category']->id);
        #    $segments   = $this->uri->total_segments();
        #    $base_url   = $this->uri->segment_array();
            
            $data['products'] = $this->Product_model->get_products($data['category']->id);
            $data['categories'] = $this->Category_model->get_categories();
            $data['main_content'] = 'shop/category_view';
            $this->load->view('includes/template', $data);
        }

        function add_to_cart()
        {
            $product_id = $this->input->post('id');
            $quantity   = $this->input->post('quantity');

            $product    = $this->Product_model->get_cart_ready_product($product_id, $quantity);

            #if((bool)$product['track_stock'])
            if(true)
            {
                $stock  = $this->Product_model->get_product($product_id);
#                $items  = $this->cart->contents();
                $qty_count  = $quantity;
#                foreach($items as $item)
#                {
#                    if(intval($item['id']) == intval($product_id))
#                    {
#                        $qty_count = $qty_count + $item['quantity'];
#                    }
#                }

                if($stock->quantity < $qty_count)
                {
                    //we don't have this much in stock
                    $this->session->set_flashdata('error', sprintf(lang('not_enough_stock'), $stock->name, $stock->quantity));
                    $this->session->set_flashdata('quantity', $quantity);
                    $this->session->set_flashdata('option_values', $post_options);
                }

                $cart = array(
                    'id' => $product_id,
                    'name' => $product['name'],
                    'qty' => $quantity,
                    'price' => $product['price']

                );
                $this->cart->insert($cart);
                redirect('shop2/view_cart');
            }
        }

        function view_cart()
        {
            $data['page_title'] = 'View Cart';
            $data['main_content'] = 'shop/cart_view';
            $data['cart'] = $this->cart->contents();
            $data['categories'] = $this->Category_model->get_categories();
            $this->load->view('includes/template', $data);
        }

        function remove_item($key)
        {
            $data = array('rowid' => $key, 'quantity' => 0);
            $this->cart->update($data);
            redirect('shop2/cart');
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

#	public function addCart()
#	{
#		$cart = array( 
#		'id' => $this->input->post('code'),
#		'qty' => $this->input->post('qty'),
#		'price' => $this->input->post('price'),
#		'name' => $this->input->post('name')
#		);
#		$this->cart->insert($cart);
#		redirect('shopping/cart');
#	}

	public function destroy()
	{
		$this->cart->destroy();
		redirect('/');
	}

	public function remove($rowid)
	{
		$data = array('rowid' => $rowid, 'qty' => 0);
		$this->cart->update($data);
		redirect('/shop2/cart');
	}

	public function cart()
	{
		$data['cart'] = $this->cart->contents();
		$this->session->set_flashdata('redirectToCurrent', current_url());
		#$this->load->view('shopping/index_view', $data);

                $data['main_content'] = 'shop/checkout_view';
                $this->load->view('includes/template', $data);
       
	}

	public function checkout()
	{
#		if ($this->session->userdata('username'))
#		{
			if ($this->cart->total_items())
			{
				$cart_id = substr(number_format(time() * mt_rand(),0,'',''),0,9);
				$now = date("Y-m-d H:i:s");
				$items = $this->cart->contents();
#				foreach ($items as $item)
#				{
					//$this->Shop->_save($cart_id,$item['price'],$item['qty'], $item['Bikes_bike_id'], $item['Renters_renter_id'], $now);
#					$this->Shop->_save($cart_id,$item['price'],$item['qty'], $item['id'], '8', $now);
#				}
#				$this->cart->destroy();
				redirect('/checkout/step1');
			} else {
				echo 'Not found item in a order';
			}
#		} else {
#			redirect('renters/login');
#		}
	}
				
}
/* End of file shopping.php */
/* Location: ./application/controllers/shopping.php */

