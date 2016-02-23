<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accesses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Access');
	}

	public function register(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim");
		$this->form_validation->set_rules("username", "Username", "trim|is_unique[users.username]");
		$this->form_validation->set_rules("password", "Password", "trim");
		$this->form_validation->set_rules("confirmpassword", "Confirm PW", "trim|matches[password]");
	    if ($this->form_validation->run() === FALSE){
	    	$this->session->set_flashdata("errors", validation_errors());
	    	redirect("/");
	    } else {
	    $post = $this->input->post();
	        $this->Access->register_user($post);
	        $this->session->set_flashdata("success", "
	            <strong>Well done!</strong> You successfully registered for Travel Buddy! Please log in now!");
	        redirect("/main");
	    }
	}

	public function login(){
    $username = $this->input->post('username');
	$password = $this->input->post('password');
	$user = $this->Access->check_user_login($username);

		if($user && $user['password'] == $password)
		{
		    $user = array(
		       'user_id' => $user['id'],
		       'realname' => $user['name'],
		       'username' => $user['username'],
		       'loginstatus' => true
		    );
		    $this->session->set_userdata($user);
		    redirect("/travels");
		}
		else
		{
	        $this->session->set_flashdata("errors", "We don't have a username and password like that!");
	       redirect("/main");
		}
	}

	public function logout()
	{
	    $this->session->sess_destroy();
	    $this->session->set_flashdata("success", "
	        <strong>Thanks for coming!</strong> You successfully logged out of Travel Buddy!");
	    redirect("/main");
	}
}
