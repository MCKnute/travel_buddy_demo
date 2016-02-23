<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper">
	<div id="content">
	<h1>Welcome, <?=$this->session->userdata('username')?>!</h1>

	<?
	$alert = $this->session->flashdata('alert');
	if ($alert !== null) {
	  echo $alert;
	}?>

		<div class="row">
			<h2>Your Trip Schedules</h2>

			<a type="button" href="travels/add"> + Add Travel Plans</a>

			<table class="schedules">
				<thead>
				<tr>
					<th>Destination</th>
					<th>Travel Start Date</th>
					<th>Travel End Date</th>
					<th>Description</th>
				</tr>
				</thead>
				<tbody>
				<? foreach($mytrips as $mytrip) { ?>
				<tr>
				  <td><strong>HOSTING: </strong><a href="travels/destination/<?=$mytrip['id']?>"><?=$mytrip['destination']?></a></td>
				  <td><?=date('F jS, Y', strtotime($mytrip['startdate']))?></td>
				  <td><?=date('F jS, Y', strtotime($mytrip['enddate']))?></td>
				  <td><?=$mytrip['description']?></td>
				</tr>
				<? } ?>
				
				<? foreach($joinedtrips as $joinedtrip) { ?>
				<tr>
				  <td><a href="travels/destination/<?=$joinedtrip['tripid']?>"><?=$joinedtrip['destination']?></a></td>
				  <td><?=date('F jS, Y', strtotime($joinedtrip['startdate']))?></td>
				  <td><?=date('F jS, Y', strtotime($joinedtrip['enddate']))?></td>
				  <td><?=$joinedtrip['description']?></td>
				</tr>
				<? } ?> 
			</table>

		</div>
		<div class="row">
			<h2>Other User's Travel Plans</h2>

			<table class="schedules">
				<thead>
				<tr>
					<th>Planned By</th>
					<th>Destination</th>
					<th>Travel Start Date</th>
					<th>Travel End Date</th>
					<th>Want To Join?</th>
				</tr>
				</thead>
				<tbody>
				<? foreach($trips as $trip) { ?>
				<tr>
					<td><?=$trip['startedbyname']?></a></td>
				  <td><a href="travels/destination/<?=$trip['tripid']?>"><?=$trip['destination']?></a></td>
				  <td><?=date('F jS, Y', strtotime($trip['startdate']))?></td>
				  <td><?=date('F jS, Y', strtotime($trip['enddate']))?></td>
				  <td>
				  	<form action="/Trips/jointrip/" method="post">
				  		<input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" />
				  		<input type="hidden" name="trip_id" value="<?=$trip['tripid']?>" />
				  	<button type="submit"> YES >></button>
					</form>
				  </td>
				</tr>
				<? } ?>

			</table>
		</div>
	</div>

