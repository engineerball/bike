<?php
class Admin_promotion extends CI_Controller
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
        $this->grocery_crud->set_table('promotions');
        $this->grocery_crud->set_relation('products_id', 'products', '{name} - {price}' ); 
        $this->grocery_crud->columns('products_id','new_product_price','date_added','last_modified');
        $this->grocery_crud->display_as('products_id', 'Product Name with normal price');
        $this->grocery_crud->display_as('new_product_price', 'Promotion Price');
  #      $this->grocery_crud->display_as('products.name', 'Product Name');
        $this->grocery_crud->set_theme('twitter-bootstrap');
        $this->grocery_crud->add_fields('products_id','new_product_price');
        $this->grocery_crud->edit_fields('new_product_price');
        $this->grocery_crud->callback_update(array($this,'insertUpdateTime'));
        $this->grocery_crud->callback_insert(array($this,'insertAddedTime'));
        $data = $this->grocery_crud->render();
        $this->_example_output($data);
      
    }
    function insertUpdateTime($post_array, $primary_key)
    {
        $update_time = array(
            "id" => $primary_key,
            "last_modified" => date('Y-m-d H:i:s')
        );

        $this->db->update('promotions', $update_time);
    }

    function insertAddedTime($post_array)
    {
        $post_array['date_added'] = date('Y-m-d H:i:s');
        $post_array['last_modified'] = date('Y-m-d H:i:s');

        return $this->db->insert('promotions', $post_array);
    }

    function _example_output($output = NULL)
    {
        $this->load->view('admin/template.php', $output);
    }

}
