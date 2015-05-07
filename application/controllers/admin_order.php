<?php
class Admin_order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->model('Admin_model');
    }

    function index($orderby = null, $sortby = null)
    {
        redirect('/admin/order/orderlist');
    }

    function orderlist($sort_by = null, $sort_order = null)
    {
          if (!isset($sort_by))
        {
            $order = 'order_items_id';
        } else
        {
            $order = $sort_by;
        }

        if (!isset($sort_order))
        {
            $sort = 'ASC';
        } else
        {
            $sort = $sort_order;
        }
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $data['order'] = $this->Admin_model->getAllOrder($order, $sort);

        $this->load->view('admin/order_sort_view.php', $data);
    }

    function _example_output($output = NULL)
    {
        $this->load->view('admin/template.php', $output);
    }

    function display_order($orderby = null, $sortby = null)
    {
        if (!isset($orderby))
        {
            $order = 'order_items.id';
        } else
        {
            $order = $orderby;
        }

        if (!isset($sortby))
        {
            $sort = 'ASC';
        } else
        {
            $sort = $sortby;
        }

        $data['order'] = $this->Admin_model->getAllOrder($sortby);

        $this->load->view('admin/order_view.php', $data);
    } 

    function display_order_detail($ordernumber)
    {
        $data['order'] = $this->Admin_model->getOrders($ordernumber);

        $this->load->view('admin/order_detail_view.php', $data);

    }

    function test_datatables()
    {
              //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">' );
        $this->table->set_template($tmpl); 
        
        $this->table->set_heading('First Name','Last Name','Email');

        //$data['order'] = $this->Admin_model->getAllOrder2();

        //$this->load->view('admin/test-datatables', $data);
        $this->load->view('admin/test-datatables');
    }

    function datatable()
    {
        $this->datatables->select('id,firstname,lastname,email')
            ->unset_column('id')
            ->from('orders');
 
        echo $this->datatables->generate('json');
    }

    function shipping()
    {
        $this->grocery_crud->set_table('orders');
       // $this->grocery_crud->set_theme('twitter-bootstrap');
        $this->grocery_crud->edit_fields('shipped_on', 'notes');
        #$this->grocery_crud->unset_jquery();
        $this->grocery_crud->set_lang_string('update_success_message',
     'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the list page.
     <script type="text/javascript">
      window.location = "/admin/order/orderlist";
     </script>
     <div style="display:none">'
);
        $this->grocery_crud->unset_back_to_list();
        $data = $this->grocery_crud->render();
        //$this->_example_output($data);
        $this->load->view('admin/edit.php', $data);
    }

    function redirect($url)
    {
        redirect($url);
    }
}
