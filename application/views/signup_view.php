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
  <div class="row centered-form">
    <div class="col-md-12 column">
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo base_url(); ?>">Bike Shop</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?php
			if ($this->session->userdata('username')) {
                                echo 'Howdy! '.$this->session->userdata('username');
                        } else {
				echo 'Member';
                        }

		?>
		<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
		<?php
			if ($this->session->userdata('username')) {
				echo '<a href="'.base_url().'customer/logout">Log Out</a>';
			} else {
				echo '<a href="'.base_url().'customer/login">Log In</a>';
			}
		?>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        
      </nav>
<?php
        if($this->session->flashdata('msg_error'))
        {
                echo $this->session->flashdata('msg_error');
        }
?>
<?php if (isset($error) && $error): ?>
          <div class="alert alert-error">
            <a class="close" data-dismiss="alert" href="#">×</a><?php echo validation_errors('<p style="color:red">', ''); ?>
          </div>
<?php endif; ?>

			<?php echo form_open('customer/dosignup'); ?>
				<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                			<input type="text" name="firstname" id="firstname" class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>
			    			<div class="form-group">
			    				<input type="phone" name="phone" id="phone" class="form-control input-sm" placeholder="Mobile Phone Number">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" onkeyup="checkPass(); return false;">
			    					</div>
			    				</div>
			    			</div>
			    			<span id="confirmMessage" class="confirmMessage"></span>
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			<?php form_close(); ?>
<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password_confirmation');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  </script>
