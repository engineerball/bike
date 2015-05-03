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

	function _getByShop($shopid)
	{
		$cause = array('Shops_shop_id' => $shopid);
		$result = $this->db->get_where('Bikes', $cause )->result();
		return $result;
	}
	
	function _getDetail($code)
	{
		$result = $this->db->where('bike_id', $code)->join('Shops', 'Bikes.Shops_shop_id = Shops.shop_id', 'LEFT')->get('Bikes')->row();
		return $result;
	}
	
	function _getShopDropdown()
	{
		$query = $this->db->select('shop_id, shop_name')->get('Shops')->result();
/*		if ( $query->num_rows() > 0 ){
			foreach ($query->result() as $data){
				$items[$data->shop_name] = $data->shop_id;
			}
			$query->free_result();
		}

		return $items;
*/
		return $query;
	}

	function _save($cart_id, $price, $qty, $code, $member_id, $time)
	{
		$result = $this->db->set('cart_id', $cart_id)
				->set('Bikes_bike_id', $code)
				->set('price', $price)
				->set('qty', $qty)
				->set('Renters_renter_id', $member_id)
				->set('transaction_date', $time)
				->insert('Cart');
	}
}

/* End of file shopping_model.php */
/* Location: ./application/models/shopping_modes.php */

