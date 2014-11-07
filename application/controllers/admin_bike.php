<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_bike extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');

    }

    public function index()
    {
        $this->grocery_crud->set_table('Bikes');
        $output = $this->grocery_crud->render();

        $this->_example_output($output);

    }

    function _example_output($output = null)
    {
        $this->load->view('example.php',$output);
    }
}
