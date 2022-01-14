<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {

	public function cekAuth(){
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$level  		= 1;

		$query = $this->db->where('username', $username)
						  ->where('password', $password)
						  ->where('level', $level)
						  ->get('tb_user');

		if ($query->num_rows() > 0) {
			$data = array(
				'id_user' 	=> $query->row()->id_user,
				'username'  => $query->row()->username,
				'name'   	  => $query->row()->name,
        'level'   	  => $query->row()->level,
				'logged_in' => TRUE
				);
			$this->session->set_userdata($data);
			return TRUE;
		} else {
			return FALSE;
		}
	}
}