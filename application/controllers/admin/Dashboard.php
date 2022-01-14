<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
			$data['title'] = 'Dashboard';
			$data['main_view'] = 'admin/dashboard';
		  $this->load->view('admin/template', $data);
    } else {
			redirect('login','refresh');
		}
	}

}