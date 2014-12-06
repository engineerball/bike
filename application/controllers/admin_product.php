<?php
class Admin_product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    function index()
    {
        $this->grocery_crud->set_table('products');
        $this->grocery_crud->set_relation('category_id', 'categories', 'name' ); 
        $this->grocery_crud->columns('products.name','category_id','price', 'quantity', 'enabled');
        $this->grocery_crud->display_as('category_id', 'Category');
        $this->grocery_crud->display_as('products.name', 'Product Name');
        $this->grocery_crud->set_field_upload('images', 'assets/uploads/files/products/');
        $this->grocery_crud->set_theme('twitter-bootstrap');
        $data = $this->grocery_crud->render();
        $this->_example_output($data);
      
    }

    function _example_output($output = NULL)
    {
        $this->load->view('admin/template.php', $output);
    }

}
