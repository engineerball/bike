<?php

class Admin_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
    function getAllOrder()
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

        $result = $this->db->select($select)
            ->from('order_items')
            ->join('orders', 'orders.id = order_items.order_id')
            ->join('products', 'products.id = order_items.product_id')
            ->order_by('order_items.id', 'ASC')
            ->get()
            ->result();
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
}
