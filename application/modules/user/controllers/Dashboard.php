<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	// function __construct() {
	// 	parent::__construct();
	// 	if (!$this->auth->getSessAdmin()) {
	// 		redirect('auth/user?ref='.$this->uri->uri_string());
	// 	}
	// }
	function index(){
		$this->load->view('view_dashboard');
	}
}