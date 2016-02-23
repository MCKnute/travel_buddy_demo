<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$headerinfo['title'] = "Welcome";
		$headerinfo['description'] = "Welcome to Mollie Knute's Travel Buddy App";
		$this->load->view('header', $headerinfo);
		$this->load->view('main_message');
		$this->load->view('footer');
	}
}
