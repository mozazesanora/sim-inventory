<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct() {
		parent::__construct();
		// if (!$this->auth->getSessAdmin()) {
		// 	redirect('auth/user?ref='.$this->uri->uri_string());
		// }
        $this->load->model('mdl_mahasiswa','mmhs');
	}
	public function index(){
		$data['alert']	= $this->session->userdata('alert');
		$data['data'] = $this->db->get('mahasiswa')->result();
		$this->load->view('view_mahasiswa',$data);
	}
	public function action($id=null){
		$data['data'] = array();
		if($id){
			$data['data'] = $this->mmhs->searchMahasiswaById($id);
			if(!empty($data['data'])){
			$data['url'] = base_url().'user/mahasiswa/update/'.$data['data']->mahasiswa_id;
			}else show_404();
		}else{
			$data['url'] = base_url().'user/mahasiswa/insert/';
		}
		$this->load->view('view_mahasiswa_form',$data);
	}
	public function insert(){
		$data = $this->input->post('post');
		$wu = date('Y-m-d H i s');
		$config['upload_path'] 		= './uploads/mahasiswa/foto/';
		$config['allowed_types'] 	= 'png|jpg|jpeg';
		$config['max_size']			= '5000';
		$config['file_name'] 		= 'foto-'.@$data['mahasiswa_nim'].'-'.trim($wu);
		$response = $this->upload_it($config);
		if($response['data_file']){
			$data['mahasiswa_foto'] = $response['data_file'];
			$insert = $this->db->insert('mahasiswa',$data);
			if($insert){
				$response = array('status' => 'success', 'message' => 'Data Berhasil Ditambahkan!');
			}else{
				$response = array('status' => 'error', 'message' => 'Maaf Terjadi Kesalahan!');
			}
		}
		$this->session->set_flashdata('alert', $response);
		redirect('user/mahasiswa');
	}
	public function update($id){
		$data = $this->input->post('post');
		$fedit = @$this->db
						->select('mahasiswa_foto as files')
						->get_where('mahasiswa',array('mahasiswa_id'=>$id))->row();
		if(!empty($fedit)){
			$wu = date('Y-m-d H i s');
			$config['upload_path'] 		= './uploads/mahasiswa/foto/';
			$config['allowed_types'] 	= 'png|jpg|jpeg';
			$config['max_size']			= '5000';
			$config['file_name'] 		= 'foto-'.@$data['mahasiswa_nim'].'-'.trim($wu);
			$response = $this->upload_it($config,$fedit->files);
			if($response['data_file']){
				$this->db->where('mahasiswa_id',$id);
				$data['mahasiswa_foto'] = $response['data_file'];
				$update = $this->db->update('mahasiswa',$data);
				if($update){
					$response = array('status' => 'success', 'message' => 'Data Berhasil Diupdate!');
				}else{
					$response = array('status' => 'error', 'message' => 'Maaf Terjadi Kesalahan!');
				}
			}
		}
        $this->session->set_flashdata('alert', $response);
        redirect('user/mahasiswa');
	}
	public function delete($id){
		$cek = $this->db
				->get_where('mahasiswa', array('mahasiswa_id' => $id));
		if(@$cek->num_rows()>0){
			$dt = $cek->row();
			if (!empty($dt->mahasiswa_foto) && file_exists('./uploads/mahasiswa/foto/'.$dt->files)) {
				unlink('./uploads/mahasiswa/foto/'.$dt->files);
			}
			$delete = $this->db->delete('mahasiswa',array('mahasiswa_id' => $id));
			if($delete) {
				$response = array('status' => 'success', 'message' => 'Data Berhasil dihapus');
                $this->session->set_flashdata('alert', $response);
            }
			redirect('user/mahasiswa');
		}else show_404();
	}
	public function upload_it($config,$files=null){
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')  && $_FILES['file']['name']!=''){
			$response = array('status' => 'error','data_file'=>'',
				'message' => $this->upload->display_errors());
		}else{
			$upload_data = $this->upload->data();
			if (($config['upload_path'].$upload_data['file_name']) || $_FILES['file']['name'] == '' ) {
				if($_FILES['file']['name'] != ''){
					//check update or not
					if($files!=null && file_exists($config['upload_path'].$files)){
						unlink($config['upload_path'].$files);
					}
					$file = $upload_data['file_name'];
					$response = array('status' => 'success', 'message' => 'File Berhasil Diupload','data_file'=>$file);
				}else{
					if($files){
						$response = array('status' => 'success', 'message' => 'Tidak ada File yang diupdate','data_file'=>$files);
					}else{
						$response = array('status' => 'error', 'message' => 'Harap untuk Mengupload File','data_file'=>'');
					}
				}
			}else{
				$response = array('status' => 'error', 'message' => 'Berkas yang Anda unggah rusak, silakan upload ulang','data_file'=>'');
			}
		}
		return $response;
	}
}