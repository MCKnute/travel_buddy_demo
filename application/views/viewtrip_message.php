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
			<h2>Trip Schedule for <?=$thistrip['destination']?></h2>



			<?php
			if (($thistrip['startedbyid'] == $this->session->userdata('user_id')) || ($thistrip['joinedusers'] == $this->session->userdata('user_id')))  {

			} else { ?>
			<form action="/Trips/jointrip/" method="post">
				<input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" />
				<input type="hidden" name="trip_id" value="<?=$thistrip['tripid']?>" />

			<button type="submit"> + Join Trip </button>
			</form>

			<? } ?>

			<ul class="tripdetails">
				<li><strong>Planned By:</strong> <?=$thistrip['startedbyname']?></li>
				<li><strong>Description</strong>: <?=$thistrip['description']?></li>
				<li><strong>Travel Start Date</strong>: <?=$thistrip['startdate']?></li>
				<li><strong>Travel End Date</strong>: <?=$thistrip['enddate']?></li>
			</ul>
				

			<h2>Other people joining the trip:</h2>
				<? foreach($joins as $join) { ?>
					<h4><?=$join['username']?></h4>
				<? } ?>
				



		</div>
	</div>

