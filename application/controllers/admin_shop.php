<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_shop extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');

    }

    public function index()
    {
        $this->grocery_crud->set_table('Shops');
//	$this->grocery_crud->field_type('bike_status', 'enum', array('available', 'unavailable'));
//	$this->grocery_crud->field_type('bike_type', 'enum', array('Road', 'Touring', 'Hybrid', 'City', 'BMX', 'MTB', 'Fixed Gear', 'Child'));
        $output = $this->grocery_crud->render();

        $this->_example_output($output);

    }

    function _example_output($output = null)
    {
        $this->load->view('example.php',$output);
    }
}
