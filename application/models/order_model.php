<?php
Class order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_order($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('orders');

        $order = $result->row();
        $order->contents = $this->get_items($order->id);

        return $order;
    }

    function get_items($id)
    {
        $this->db->select('order_id, contents');
        $this->db->where('order_id', $id);
        $result = $this->db->get('order_items');

        $items  = $result->result_array();

        $return = array();
        $count  = 0;
        foreach($items as $item)
        {

            $item_content   = unserialize($item['contents']);

            //remove contents from the item array
            unset($item['contents']);
            $return[$count] = $item;

            //merge the unserialized contents with the item array
            $return[$count] = array_merge($return[$count], $item_content);

            $count++;
        }
        return $return;
    }

    function get_customer_orders($id, $offset=0)
    {
        $this->db->join('order_items', 'orders.id = order_items.order_id');
        $this->db->order_by('ordered_on', 'DESC');
        return $this->db->get_where('orders', array('customer_id'=>$id), 15, $offset)->result();
    }

    function count_customer_orders($id)
    {
        $this->db->where(array('customer_id'=>$id));
        return $this->db->count_all_results('orders');
    }
 
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('orders');

        $this->db->where('order_id', $id);
        $this->db->delete('order_items');
    }

    function save_order($data, $contents = false)
    {
        if (isset($data['id']))
        {
            $this->db->where('id', $data['id']);
            $this->db->update('orders', $data);
            $id = $data['id'];

            $order_number = $id;
        }
        else 
        {
            $this->db->insert('orders', $data);
            $id = $this->db->insert_id();

            $order = array('order_number'=> date('U').$id);

            $this->db->where('id', $id);
            $this->db->update('orders', $order);

            $order_number = $order['order_number'];

        }

        if($contents)
        {
            $this->db->where('order_id', $id)->delete('order_items');
            
            foreach($contents as $item)
            {
                $save = array();
                $save['contents'] = $item;
                $item = unserialize($item);
                $save['product_id'] = $item['id'];
                $save['quantity'] = $item['quantity'];
                $save['order_id'] = $id;
                $this->db->insert('order_items', $save); 

            }
        }

        return $order_number;
    }

    function saveorder($data)
    {
        $this->db->insert('orders', $data);
        $cause = array('order_number'=>$data['order_number']);
        $order_id = $this->db->select('id')->from('orders')->where($cause)->get()->row();
        return $order_id->id;
    }

    function saveorderitems($product_id, $order_id, $quantity, $subtotal)
    {
        $data = array(
            'product_id' => $product_id,
            'order_id' => $order_id,
            'quantity' => $quantity,
            'subtotal' => $subtotal
        );    
        $this->db->insert('order_items', $data);
    }

    function printOrder($data, $cart)
    {
        $order = $this->session->userdata('order');
        $message = '<h2>Billing address</h2><br />'.
        '<p class="text-left">' . $data['order']['firstname'] . ' ' . $data['order']['lastname'] . '</p>'.
        '<p class="text-left">' . $data['order']['email'] . '</p>'.
        '<p class="text-left">' . $data['order']['bill_address1'] . '</p>'.
        '<p class="text-left">' . $data['order']['bill_address2'] . '</p>'.
        '<p class="text-left">' . $data['order']['bill_city'] . '</p>'.
        '<p class="text-left">' . $data['order']['bill_zip'] . '</p>'.
        '<h2>Shipping address</h2><br />'.
        '<p class="text-left">' . $data['order']['ship_firstname'] . ' ' . $data['order']['ship_lastname'] . '</p>'.
        '<p class="text-left">' . $data['order']['ship_email'] . '</p>'.
        '<p class="text-left">' . $data['order']['ship_address1'] . '</p>'.
        '<p class="text-left">' . $data['order']['ship_address2'] . '</p>'.
        '<p class="text-left">' . $data['order']['ship_city'] . '</p>'.
        '<p class="text-left">' . $data['order']['ship_zip'] . '</p>';


        $message .=  '<table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                </tr>
                            </thead>';

                                foreach ($cart as $items):
        $message .=           '
                            <tbody>
                                <tr>
                                    <td>
                                        '. $items['id'] . ' 
                                    </td>
                                    <td>
                                         '. $items['name']. '
                                    </td>
                                    <td>
                                        ' . number_format($items['qty'], 0). '
                                    </td>
                                    <td>
                                        ' . number_format($items['price'], 2). '
                                    </td>
                                    <td>
                                        ' . number_format($items['subtotal'], 2) .'
                                    </td>
                                </tr>';
                                    endforeach;
        $message .=               '<tr class="success">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Grand total</strong></td>
                                    <td>
                                        <strong>' . number_format($order['total'], 2) . '</strong>
                                    </td>
                                </tr>
                            </tbody>
                    </table>';
        return $message;
    }
}
