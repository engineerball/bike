<?php
class Admin_category extends CI_Controller
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
        $this->grocery_crud->set_table('categories');
        $data = $this->grocery_crud->render();
        $this->_example_output($data);
      
    }

    function _example_output($output = NULL)
    {
        $this->load->view('example.php', $output);
    }

}
