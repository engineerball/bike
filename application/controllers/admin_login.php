<?php

class Admin_login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model','Admin');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'html', 'form'));
        
    }

    function index() {

        if( $this->session->userdata('admin_isLoggedIn') ) {
            redirect('/admin/product');
        } else {
            $this->show_login(false);
        }
    }

    function login_user() {
        // Create an instance of the user model
       // $this->load->model('Admin_model');

        // Grab the email and password from the form POST
        $email = $this->input->post('email');
        $pass  = $this->input->post('password');

        //Ensure values exist for email and pass, and validate the user's credentials
        if( $email && $pass && $this->Admin->validate_user($email,$pass)) {
            // If the user is valid, redirect to the main view
            redirect('/admin/product');
        } else {
            // Otherwise show the login screen with an error message.
            $this->show_login(true);
        }
    }

    function show_login( $show_error = false ) {
        $data['error'] = $show_error;

        $this->load->helper('form');
        $this->load->view('admin/login',$data);
    }

    function logout_user() {
      $this->session->sess_destroy();
      $this->index();
    }

    function showphpinfo() {
        echo phpinfo();
    }


}
