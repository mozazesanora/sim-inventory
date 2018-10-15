<?php 

	Class Mdl_mahasiswa extends CI_Model{

		public function searchMahasiswaByNim($nim){
			return $this->db->get_where('mahasiswa',array('mahasiswa_nim'=>$nim))->row();
		}
		public function searchMahasiswaById($id){
			return $this->db->get_where('mahasiswa',array('mahasiswa_id'=>$id))->row();
		}
	}