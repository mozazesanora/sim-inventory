<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->auth->getSessAdmin()) {
			redirect('auth/user?ref='.$this->uri->uri_string());
		}
	}
	public function index(){
		$data['alert']	= $this->session->userdata('alert');
		$data['data'] = $this->db->get('admin')->result();
		$this->load->view('view_admin',$data);
	}

	public function action($usr=null){
		$data['data'] = array();
		if($usr){
			$data['data'] = $this->db->get_where('admin',array('admin_username'=>$usr))->row();
			if(!empty($data['data'])){
			$data['url'] = base_url().'user/admin/update/'.$data['data']->admin_username;
			}else show_404();
		}else{
			$data['url'] = base_url().'user/admin/insert/';
		}
		$this->load->view('view_admin_form',$data);
	}
	
	public function insert(){
		$data = $this->input->post('post');
		$data['admin_password'] = encryptMe($data['admin_password']);
		$insert = $this->db->insert('admin',$data);
		if($insert){
			$response = array('status' => 'success','message' => 'Data Berhasil Ditambahkan!');
		}else{
			$response = array('status' => 'error','message' => 'Maaf Terjadi Kesalahan!');
		}
		$this->session->set_flashdata('alert', $response);
		redirect('user/admin');
	}
	public function update($id){
		$sess = $this->auth->getSessAdmin();
		$data = $this->input->post('post');
		$fedit = @$this->db->get_where('admin',array('admin_username'=>$id))->row();
		if(!empty($fedit)){
			$bp = $this->input->post('pass_lama');
			if ($bp != $data['admin_password']) {
				$data['admin_password'] = encryptMe($data['admin_password']);
			}
			$this->db->where('admin_username',$id);
			$update = $this->db->update('admin',$data);
			if($update){
				$response = array('status' => 'success', 'message' => 'Data Berhasil Diupdate!');
				if($sess['sess_user'] == $data['admin_username'] && $bp != $data['admin_password']){
					$this->session->set_flashdata('alert', $response);
					redirect('auth/user/?action=logout');
				} else {
					redirect('user/admin');
				}
			}else{
				$response = array('status' => 'error', 'message' => 'Maaf Terjadi Kesalahan!');
			}
			
		}
        $this->session->set_flashdata('alert', $response);
        redirect('user/admin');
	}
	public function delete($id){
		$cek = $this->db
				->get_where('admin', array('admin_username' => $id));
		if(@$cek->num_rows()>0){
			$dt = $cek->row();
			$delete = $this->db->delete('admin',array('admin_username' => $id));
			if($delete) {
				$response = array('status' => 'success', 'message' => 'Data Berhasil dihapus');
                $this->session->set_flashdata('alert', $response);
            }
			redirect('user/admin');
		}else show_404();
	}
}