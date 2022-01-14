<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Auth');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 1) {
					redirect('admin','refresh');
				} else {
					redirect('Login','refresh');
				}
		} else {
			$this->load->view('login');
		}
	}

	public function doLogin()
	{
		if ($this->input->post("submit")) {					
			if ($this->Auth->cekAuth() == TRUE) {
				if ($this->session->userdata('level') == 0) {
					redirect('admin','refresh');
				} else {
					$this->session->set_flashdata('message', '
						Gagal login, Silahkan coba lagi!');
					redirect('Login','refresh');
				}
			} else {
				$this->session->set_flashdata('message', '
					Gagal login, Silahkan coba lagi!');
				redirect('Login','refresh');
			}
		}
	}

}
