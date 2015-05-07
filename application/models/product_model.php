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
        $result = $this->db->select('*')->where('enabled =', 1)->where('quantity >', 0)->get('products');

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
    function get_products($id)
    {
        $product = $this->db->select('*')->from('products')->where('category_id', $id)->get()->result();
        return $product;

    }
    function count_products($id)
    {
        $count = $this->db->select('count(*) as Total')
                        ->from('products')
                        ->join('categories', 'categories.id = products.category_id', 'left')
                        ->group_by('categories.id')
                        ->get()
                        ->result();
        return $count;

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

    function get_search_results($term)
    {
        $query = $this->db->select('*')->where('enabled =', 1)->where('quantity >', 0)->or_like('name',$term)->or_like('description', $term)->get('products');

        // Return the results.
        return $query->result();
    }

}
