<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travels extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('loginstatus') !== TRUE)
		{
			redirect("/main");
			die();
		} else {
			$this->load->model('Trip');
		}
	}

	public function index()
	{
		$userid = $this->session->userdata('user_id');
		$mytrips = $this->Trip->get_started_trips($userid);
		$trips = $this->Trip->get_all_trips();
		$joinedtrips = $this->Trip->get_joined_trips($userid);
		$info['joinedtrips'] = $joinedtrips;
		$info['mytrips'] = $mytrips;
		$info['trips'] = $trips;
		$headerinfo['title'] = "Travel Dashboard";
		$headerinfo['description'] = "Welcome to the Travel Buddy Dashboard";
		$this->load->view('header', $headerinfo);
		$this->load->view('travels_message', $info);
		$this->load->view('footer');
	}

	public function add()
	{
		$headerinfo['title'] = "Add a Trip | Travel Dashboard";
		$headerinfo['description'] = "Add a trip to your Travel Buddy list!";
		$this->load->view('header', $headerinfo);
		$this->load->view('addtrip_message');
		$this->load->view('footer');
	}
	public function destination($id)
	{
		$thistrip = $this->Trip->get_one_trip($id);
		$info['thistrip'] = $thistrip;

		$joins = $this->Trip->get_all_joins($id);
		$info['joins'] = $joins;
		$headerinfo['title'] = "View A Trip | Travel Dashboard";
		$headerinfo['description'] = "View a trip in the Travel Buddy list!";
		$this->load->view('header', $headerinfo);
		$this->load->view('viewtrip_message', $info);
		$this->load->view('footer');
	}
}
