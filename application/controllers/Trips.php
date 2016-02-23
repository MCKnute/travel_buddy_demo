<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trips extends CI_Controller {

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

	public function addtrip()
	{
		$destination = $this->input->post('destination');
		$description = $this->input->post('description');
		$user_startedby_id = $this->input->post('user_startedby_id');
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$post = $this->input->post();

		// echo $startdate;
		// echo $enddate;
		// die();

		if($startdate < $enddate)
		{
		    $this->Trip->add_trip($post);
		    $this->session->set_flashdata("alert", "<div class='alert-success' role='alert'>
		        <strong>Well done!</strong> You successfully added a trip!
		        </div>");
		    redirect("/travels");
		} else {
		    $this->session->set_flashdata("alert", "<div class='alert-danger' role='alert'>
		        <strong>Ooops!</strong> Your start date is before your enddate!
		        </div>");
		   redirect("/travels/add");
		}
	}
	public function jointrip($id)
	{
		$post = $this->input->post();
		// var_dump($post);
		// die();
		$this->Trip->join_trip($post);
		$this->session->set_flashdata("alert", "<div class='alert-success' role='alert'>
		    <strong>Well done!</strong> You joined a trip!
		    </div>");
		redirect('/travels/');
	}
}
