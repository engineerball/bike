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
#	$this->grocery_crud->field_type('bike_status', 'enum', array('available', 'unavailable'));
#	$this->grocery_crud->field_type('bike_type', 'enum', array('Road', 'Touring', 'Hybrid', 'City', 'BMX', 'MTB', 'Fixed Gear', 'Child'));
	$this->grocery_crud->set_relation('Shops_shop_id', 'Shops', 'shop_name');
	$this->grocery_crud->display_as('Shops_shop_id', 'shop_name');
	$this->grocery_crud->set_field_upload('bike_photo', 'assets/uploads/files/bike/');
	
        $output = $this->grocery_crud->render();

        $this->_example_output($output);

    }

    function _example_output($output = null)
    {
        $this->load->view('example.php',$output);
    }
}
