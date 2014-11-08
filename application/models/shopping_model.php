<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shopping_model extends CI_Model {
	function __construct()
	{
		parent:: __construct();
	}

	function _getAll()
	{
		$result = $this->db->get('Bikes')->result();
		return $result;
	}
	
	function _getDetail($code)
	{
		$result = $this->db->where('bike_id', $code)->get('Bikes');
	}

	function _save($cart_id, $code, $price, $qty)
	{
		$result = $this->db->set('cart_id', $cart_id)
				->set('code', $code)
				->set('price', $price)
				->set('qty', $qty)
				->insert('cart');
	}
}

/* End of file shopping_model.php */
/* Location: ./application/models/shopping_modes.php */

