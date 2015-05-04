<?php

class Admin_model extends CI_Model {

    var $details;
	function __construct()
	{
		parent::__construct();
	}
	
    function getAllOrder($orderby, $sortby)
    {
        $sort_order = ($sortby == 'DESC') ? 'DESC' : 'ASC';
        $select = array('order_items.id AS `order_items_id`',
            'products.name',
            'products.price',
            'order_items.quantity',
            'order_items.subtotal',
            'orders.order_number',
            'orders.ordered_on',
            'orders.shipped_on',
            'orders.total',
            'orders.firstname',
            'orders.lastname',
            'orders.email',
            'orders.phone',
            'orders.ship_firstname',
            'orders.ship_lastname',
            'orders.ship_email',
            'orders.ship_phone',
            'orders.ship_address1',
            'orders.ship_address2',
            'orders.ship_city',
            'orders.ship_zip',
            'orders.bill_lastname',
            'orders.bill_firstname',
            'orders.bill_email',
            'orders.bill_phone',
            'orders.bill_address1',
            'orders.bill_address2',
            'orders.bill_city',
            'orders.bill_zip',
            'orders.notes',
            'orders.id AS `orders_id`');

        $result = $this->db->select($select)
            ->from('order_items')
            ->join('orders', 'orders.id = order_items.order_id')
            ->join('products', 'products.id = order_items.product_id')
            ->order_by($orderby, $sortby)
            ->get()
            ->result();
        return $result;
    }

 function getAllOrder2()
    {
        $select = array('order_items.id',
            'products.name',
            'products.price',
            'order_items.quantity',
            'order_items.subtotal',
            'orders.order_number',
            'orders.ordered_on',
            'orders.shipped_on',
            'orders.total',
            'orders.firstname',
            'orders.lastname',
            'orders.email',
            'orders.phone',
            'orders.ship_firstname',
            'orders.ship_lastname',
            'orders.ship_email',
            'orders.ship_phone',
            'orders.ship_address1',
            'orders.ship_address2',
            'orders.ship_city',
            'orders.ship_zip',
            'orders.bill_lastname',
            'orders.bill_firstname',
            'orders.bill_email',
            'orders.bill_phone',
            'orders.bill_address1',
            'orders.bill_address2',
            'orders.bill_city',
            'orders.bill_zip');

        $result = $this->datatables->select($select)
            ->from('order_items')
            ->join('orders', 'orders.id = order_items.order_id')
            ->join('products', 'products.id = order_items.product_id')
            ->generate();
        return $result;
    }

    function getOrders($ordernumber)
    {
        $select = array(
            '*'
        );

        $result = $this->db->select($select)
            ->from('orders')
            ->where('order_number =', $ordernumber)
            ->get()
            ->result();
        return $result;
    }

    function validate_user( $email, $password ) {
        // Build a query to retrieve the user's details
        // based on the received username and password
        $this->db->from('admin');
        $this->db->where('email',$email );
        $this->db->where( 'password', sha1($password) );
        $login = $this->db->get()->result();
        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if ( is_array($login) && count($login) == 1 ) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        }
        return false;
    }
    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'admin_id'=>$this->details->id,
                'admin_email'=>$this->details->email,
                'admin_isLoggedIn'=>true
            )
        );
    }
    function  create_new_user( $userData ) {
      $data['email'] = $userData['admin_email'];
      $data['password'] = sha1($userData['password1']);
      return $this->db->insert('user',$data);
    }
}
