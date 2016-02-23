<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper">
	<div id="content">
	<h1>Welcome!</h1>
		<div class="row">
		  <h2 class="text-center">Register or Edit </h2>
		  <?
			$errors = $this->session->flashdata('errors');
			if ($errors !== null) {
			  	echo "<div class='alert-danger' role='alert'><strong>Ooops!</strong> ".$errors."</div>";
		  	
		    }
		    $success = $this->session->flashdata('success');
		  	if ($success !== null) {
		  		echo "<div class='alert-success' role='alert'>".$success."</div>";
		    } 
		    ?>
		    <div class="rowhalf">
		    <!-- Registration -->
		      <form class="form-left pull-right" method="post" action="/Accesses/register/">
		        <h3 class="form-heading">Register</h3>
			        <label for="name">Name:</label>
			          <input type="text" class="form-control" id="name" name="name" value="" autofocus minlength="3">
			        <label for="username">Username:</label>
			          <input type="text" class="form-control" id="username" name="username" value="" autofocus minlength="3">
			        <h5>* Passwords must be at least 8 characters!</h5>
		            <label for="password" class="">Password:</label>
		              <input type="password" id="password" class="form-control" name="password" minlength="8">
		            <label for="confirmpassword" class="">Confirm PW:</label>
		              <input type="password" id="confirmpassword" class="form-control" name="confirmpassword" minlength="8">
			        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		      </form>
		    <!-- End Registration -->
		  	  </div>
			  <div class="rowhalf">
			<!-- Login-->
			    <form class="form-right pull-left" method="post" action="/Accesses/login">
			      <h3 class="form-heading">Login</h3>
		            <label for="username-login" class="">Username:</label>
		              <input type="text" id="username-login" class="form-control" name="username" minlength="3">
		            <label for="password-login" class="">Password:</label>
		              <input type="password" id="password-login" class="form-control" name="password" minlength="8">
		            <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
		        </form>
		       <!-- End Login -->
		    </div>
		</div>
	</div>