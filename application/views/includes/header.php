<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bike Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="<?php echo base_url(); ?>assets/less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="<?php echo base_url(); ?>assets/less/responsive.less" type="text/css" /-->
	<!--script src="<?php echo base_url(); ?>assets/js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</head>

<body>
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo base_url(); ?>">Bikeshop</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
      <!--      <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bicycle Type<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">Type A</a>
                </li>
                <li>
                  <a href="#">Type B</a>
                </li>
                <li>
                  <a href="#">Type C</a>
                </li>               
              </ul>
            </li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="<?php echo base_url().'shop2/view_cart'; ?>">
		<?php 
			if ( $this->cart->total_items() ) {
				echo 'Item ('.$this->cart->total_items().')';
			} else {
				echo 'Your cart is empty';
			}
		?>
	      </a>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?php
			if ($this->session->userdata('email')) {
                                echo 'Howdy! '.$this->session->userdata('email');
                        } else {
				echo 'Member';
                        }

		?>
		<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
		<?php
			if ($this->session->userdata('email')) {
				echo '<a href="'.base_url().'customer/add_address">Address</a>';
				echo '<a href="'.base_url().'customer/logout">Log Out</a>';
			} else {
				echo '<a href="'.base_url().'customer/login">Log In</a>';
				echo '<a href="'.base_url().'customer/signup">Register</a>';
			}
		?>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        
      </nav>
<!--      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
          <a href="#">Library</a> <span class="divider">/</span>
        </li>
        <li class="active">
          Data
        </li>
      </ul>
-->
