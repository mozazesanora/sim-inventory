<?php 
	
	/**
	* By : Maskur 
	* Email : maskur@umm.ac.id
	*/
	class Auth extends MX_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			redirect('auth/user');
		}
		public function user(){
			$action = $this->input->get('action');
			if ($action == 'auth') {
				$post  = $this->input->post();
				/* get superadmin from source */
				$uname = $this->myacc->get('super_name');
				$upass = $this->myacc->get('super_pass');
				
				$check = $this->db->get_where('admin', array('admin_username' => $post['username'], 'admin_password' => encryptMe($post['password'])));
				if ($check->num_rows() > 0) {
					$sess = array(
						'sess_user' 	=> $check->row()->admin_username,
						'sess_nama' 	=> $check->row()->admin_alias,
						'sess_level' 	=> $check->row()->admin_level_id,
						);
					$this->session->set_userdata('s_admin', $sess);
					// print_r($this->session->sess_user);
					$ref = $this->input->post('ref');
					if(empty($ref)) {
						redirect('user/dashboard');
					} else {
						redirect($this->input->post('ref'));
					}
				}else if ($post['username'] == $uname && $post['password'] == $upass) {
					$sess = array(
						'sess_user' 	=> 'superadmin',
						'sess_nama' 	=> 'SuperAdmin',
						'sess_level' 	=> 1,
						);
					$this->session->set_userdata('s_admin', $sess);
					$ref = $this->input->post('ref');
					if(empty($ref)) {
						redirect('user/dashboard');
					} else {
						redirect($this->input->post('ref'));
					}
				}else  {
					$this->session->set_flashdata('alert', 'Username atau Password Anda salah').
					redirect('auth/user');
				}
				exit;
			} else if ($action == 'logout') {
				$this->session->unset_userdata('s_admin');
				redirect('auth/user');
			}
			$data['alert'] = $this->session->alert;
			$this->load->view('view_admin',$data);
		}
	}


 ?>