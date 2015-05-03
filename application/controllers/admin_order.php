<?php
class Admin_order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->model('Admin_model');
    }

    function index()
    {
/*        $this->grocery_crud->set_table('order_items');
        #$this->grocery_crud->set_relation_n_n('id','order_items','products','order_id','product_id','name','subtotal'); 
        $this->grocery_crud->set_relation_n_n('name','orders','products','id','id','name','subtotal'); 
        #$this->grocery_crud->set_relation('product_id', 'products', 'name' ); 
        
        $display = array('order_id','products.name','quantity','orders.firstname');

        #$this->grocery_crud->columns($display);
        $this->grocery_crud->set_theme('twitter-bootstrap');
        $data = $this->grocery_crud->render();
        $this->_example_output($data);
 */    
       # redirect('admin/order/display_order'
        $data['order'] = $this->Admin_model->getAllOrder();

        $this->load->view('admin/order_view.php', $data);

    }

    function _example_output($output = NULL)
    {
        $this->load->view('admin/template.php', $output);
    }

    function display_order()
    {
        $data['order'] = $this->Admin_model->getAllOrder();

        $this->load->view('admin/order_view.php', $data);
    } 

    function display_order_detail($ordernumber)
    {
        $data['order'] = $this->Admin_model->getOrders($ordernumber);

        $this->load->view('admin/order_detail_view.php', $data);

    }
}
