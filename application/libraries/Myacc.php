<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

class Myacc
{
	function get($arr){
		$this->_ci = & get_instance();
        $this->_ci->load->config('myacc');
        $data = $this->_ci->config->item('myacc');
		return $data[$arr];
	}
}