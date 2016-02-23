<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper">
	<div id="content">
	<h1>Welcome, <?=$this->session->userdata('username')?>!</h1>
	    <div class="row">
	    	<h2>Start A Trip!</h2>

	    	<?
	    	$alert = $this->session->flashdata('alert');
	    	if ($alert !== null) {
	    	  echo $alert;
	    	}?>
	    <!-- Start a Trip! -->
	      <form class="form-center" method="post" action="/Trips/addtrip/">
		        <label for="destination">Destination:</label>
		          <input type="text" class="form-control" id="destination" name="destination" value="" autofocus required>
		          <label for="description">Description:</label>
		            <input type="text" class="form-control" id="description" name="description" value="" required>

		        
		        <label for="startdate">Travel Start Date:</label>
		          <input type="date" class="form-control" id="startdate" name="startdate" min="<?=date('Y-m-d')?>" value ="<?=date('Y-m-d')?>" required>
	            <label for="enddate" class="">Travel End Date:</label>
	              <input type="date" id="enddate" class="form-control" name="enddate" min="<?=date('Y-m-d')?>" value ="<?=date('Y-m-d')?>" required>
	             <input type="hidden" id="user_startedby_id" name="user_startedby_id" value="<?=$this->session->userdata('user_id')?>" required>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
	      </form>
	    </div>
	</div>

