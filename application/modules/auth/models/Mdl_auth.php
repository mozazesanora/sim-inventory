<?php 
	/**
	* By : Maskur 
	* Email : maskur@umm.ac.id
	*/
	Class Mdl_auth extends CI_Model
	{
		public function getSessAdmin()
		{
			return $this->session->userdata('s_admin');
		}
		
		public function myLevel()
		{
			$sess = $this->getSessAdmin();
			return $sess['sess_level'];
		}
	}
