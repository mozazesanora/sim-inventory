<?php 
	/**
	* By : Maskur 
	* Email : maskur@umm.ac.id
	*/
	Class Logout extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$this->session->sess_destroy();
			session_destroy();
			redirect('/');
		}
	}
 ?>