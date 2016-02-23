<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title><?=$title?> | Travel Buddy</title>
    <meta name="description" content="<?=$title?>">
    <meta name="author" content="Mollie Knute">
    <!-- <link rel="stylesheet" type="text/css" href="<?=site_url("assets/css/bootstrap.min.css");?>" />
	-->
    <link rel="stylesheet" type="text/css" href="<?=site_url("assets/css/main.css");?>" />
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?=site_url("assets/js/bootstrap.min.js");?>"></script> -->
</head>
<body>
<nav>
 	<a class="navbar-brand" href="/main">Travel Buddy</a>
    <div id="navbar">
      	<ul class="nav navbar-nav navbar-right">
        	<? if ($this->session->userdata('loginstatus') === TRUE) { ?>
          		<li><a href="/travels">Travel Dashboard</a></li>
          		<li><a href="/accesses/logout">Log Out</a></li>
        	<? } else {  }; ?> 
      	</ul>
    </div>
</nav>