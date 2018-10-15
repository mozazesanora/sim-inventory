<?php 
	function encryptMe($string){
		$string = base64_encode($string);
		$string = $string.sha1($string).'HMVC-COBA';
		return md5(substr($string, 13).md5($string));
	}
	function adminLevel($lv){
		if($lv==1){
			return "SuperAdmin";
		}else if($lv==2){
			return "AdminFakultas";
		}else if($lv==3){
			return "AdminJurusan";
		}else{
			return "Undefined";
		}
	}
	function showAlertSuccess($kata=null){
		if(empty($kata)) $kata = 'Proses berhasil dieksekusi.';
		
		$str = '<div class="alert alert-success alert-dismissible slideup" role="alert">';
		$str .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$str .= '<strong>Berhasil!</strong> '.$kata.'</div>';
		return $str;
	}
	function showAlertDanger($kata=null){
		if(empty($kata)) $kata = 'Terjadi sesuatu kesalahan silakan coba lagi.';

		$str =  '<div class="alert alert-danger alert-dismissible slideup" role="alert">';
		$str .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$str .= '<strong>Kesalahan!</strong> '.$kata.'</div>';
		return $str;
	}
	function showAlert($response)
	{
		if(is_array($response)){
			if ($response['status'] == 'success') {
				return showAlertSuccess( (empty($response['message']) ? null : $response['message']) );
			} else {
				return showAlertDanger( (empty($response['message']) ? null : $response['message']) );
			}
		} else return null;
	}