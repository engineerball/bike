<?php
Class Category_model extends CI_Model
{
    function get_categories()
    {
        $this->db->select('id')->where('enable','1');
        $this->db->order_by('name', 'ASC');
        $result = $this->db->get('categories');

        $categories = array();
        foreach($result->result() as $cat)
        {
            $categories[] = $this->get_category($cat->id);
        }

        return $categories;
    }

    function get_category($id)
    {
        return $this->db->get_where('categories', array('id'=>$id))->row();

    }

    function get_category_products($id, $limit, $offset)
    {
        $result = $this->db->get_where('category_products', array('category_id'=>$id), $limit, $offset);
        $result = $result->result();
        $contents   = array();
        $count      = 1;
        foreach ($result as $product)
        {
            $result2    = $this->db->get_where('products', array('id'=>$product->product_id));
            $result2    = $result2->row();

            $contents[$count]   = $result2;
            $count++;
        }
        return $contents;
    }

}

