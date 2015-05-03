<?php
Class Customer_model extends CI_Model
{
    var $CI;

    function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->helper('url');
    }
    function get_customers($limit=0, $offset=0, $order_by='id', $direction='DESC')
    {
        $this->db->order_by($order_by, $direction);
        if($limit>0)
        {
            $this->db->limit($limit, $offset);
        }

        $result = $this->db->get('customers');
        return $result->result();
    }

    function count_customers()
    {
        return $this->db->count_all_results('customers');
    }

    function get_customer($id)
    {

        $result = $this->db->get_where('customers', array('id'=>$id));
        return $result->row();
    }

    function get_customer_id($email)
    {
        $result = $this->db->select('id')->get_where('customers', array('email'=>$email));
        return $result->row()->id;
    }

    function check_email($email)
    {
        $result = $this->db->get_where('customers', array('email'=>$email));
        if ($result->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	function get_address_list_id($id)
	{
		$query = $this->db->get_where('customers_address_bank', array('customer_id'=>$id));
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->customer_id;
			echo "This is from address list id ".$result."<br />";
			return $result;
		}
	}
    function get_address_list($id)
    {
        $addresses = $this->db->where('customer_id', $id)->get('customers_address_bank')->result_array();
        // unserialize the field data
        if($addresses)
        {
            foreach($addresses as &$add)
            {
                $add['field_data'] = unserialize($add['field_data']);
            }
        }

        return $addresses;
    }

    function get_address($address_id)
    {
        $address= $this->db->where('id', $address_id)->get('customers_address_bank')->row_array();
        if($address)
        {
            $address_info           = unserialize($address['field_data']);
            $address['field_data']  = $address_info;
            $address                = array_merge($address, $address_info);
        }
        return $address;
    }

    function get_billaddress($id)
    {
        $billaddress = $this->db->select('bill_firstname, bill_lastname, bill_email, bill_phone, bill_address1, bill_address2, bill_city, bill_zip')->where('customer_id', $id)->get('customers_address_bank')->result_array();
        if(!empty($billaddress))
        {
            return $billaddress;
        }
        
    }

    function get_shipaddress($id)
    {
        $shipaddress = $this->db->select('ship_firstname, ship_lastname, ship_email, ship_phone, ship_address1, ship_address2, ship_city, ship_zip')->where('customer_id', $id)->get('customers_address_bank')->result_array();
        if(!empty($shipaddress))
        {
            return $shipaddress;
        }
        
    }

   function save_address($customer_id, $data, $address_id)
    {
        // prepare fields for db insertion
        //$data['field_data'] = serialize($data['field_data']);
        // update or insert
        //  
        if($address_id)
        {
			echo "Update db if $address_id is not empty with <br />";
						var_dump($data);
						echo "<br />";
			$result = $this->db->where('customer_id', $customer_id)
								->update('customers_address_bank', $data);		
            return $customer_id;
        } else {
			echo "insert db if $address_id is empty with<br />";
			var_dump($data);
						echo "<br />";
            $this->db->insert('customers_address_bank', $data);
            return $this->db->insert_id();
        }
    }

    function delete_address($id, $customer_id)
    {
        $this->db->where(array('id'=>$id, 'customer_id'=>$customer_id))->delete('customers_address_bank');
        return $id;
    }

    function save($customer)
    {
        if ($customer['id'])
        {
            $this->db->where('id', $customer['id']);
            $this->db->update('customers', $customer);
            return $customer['id'];
        }
        else
        {
            $this->db->insert('customers', $customer);
            return $this->db->insert_id();
        }
    }

    /*
    these functions handle logging in and out
    */
    function logout()
    {
        $this->CI->session->unset_userdata('customer');
        //force expire the cookie
        $this->generateCookie('[]', time()-3600);
        //$this->go_cart->destroy(false);
    }

    private function generateCookie($data, $expire)
    {
        setcookie('Customer', $data, $expire, '/', $_SERVER['HTTP_HOST']);
    }

    function login($email, $password, $remember=false)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('active', 1);
        $this->db->where('password',  sha1($password));
        $this->db->limit(1);
        $result = $this->db->get('customers');
        $customer   = $result->row_array();

        if ($customer)
        {
            // Retrieve customer addresses
            $this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_billing_address']));
            $address = $this->db->get('customers_address_bank')->row_array();
            if($address)
            {
                $fields = unserialize($address['field_data']);
                $customer['bill_address'] = $fields;
                $customer['bill_address']['id'] = $address['id']; // save the addres id for future reference
            }

            $this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_shipping_address']));
            $address = $this->db->get('customers_address_bank')->row_array();
            if($address)
            {
                $fields = unserialize($address['field_data']);
                $customer['ship_address'] = $fields;
                $customer['ship_address']['id'] = $address['id'];
            } else {
                 $customer['ship_to_bill_address'] = 'true';
            }


          if($remember)
            {
                $loginCred = json_encode(array('email'=>$email, 'password'=>$password));
                $loginCred = base64_encode($this->aes256Encrypt($loginCred));
                //remember the user for 6 months
                $this->generateCookie($loginCred, strtotime('+6 months'));
            }

            // put our customer in the cart
            $this->session->set_userdata($customer);


            return true;
        }
        else
        {
            return false;
        }
    }

    function add_customer($customer_data)
    {
        $result = $this->db->insert('customers', $customer_data);
        return $result;

    }

    function _checkuser($email, $password)
    {
      $result = $this->db->where('email', $email)
                ->where('password', md5($password))
                ->count_all_results('customers');
        return $result > 0 ? TRUE : FALSE;
    }

}
