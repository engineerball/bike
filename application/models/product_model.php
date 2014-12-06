<?php
Class Product_model extends CI_Model
{
    function products($data=array(), $return_count=false)
    {
        if(empty($data))
        {
            $this->get_all_products();
        }
    }

    function get_all_products()
    {
        $this->db->order_by('name', 'ASC');
        $result = $this->db->get('products');

        return  $result->result();
    }   

    function get_product($id)
    {
        $result = $this->db->get_where('products', array('id'=>$id))->row();
        if(!$result)
        {
            return false;
        }

        return $result;
    }

    function get_product_categories($id)
    {
        return $this->db->where('product_id', $id)->join('categories', 'category_id = categories.id')->get('category_products')->result();
    }

    function get_cart_ready_product($id, $quantity=false)
    {
        $product = $this->db->get_where('products', array('id'=>$id))->row();
        if(!$product)
        {
            return false;
        }
        if(!$quantity || $quantity <= 0)
        {
            $product->quantity = 1;
        }
        else
        {
            $product->quantity = $quantity;
        }

        return (array)$product;
    }

}
