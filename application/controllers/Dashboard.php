<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->api = base_url('api/product');
		$this->load->library('Curl.php');
	}

	public function index()
	{
		$data['product'] = json_decode($this->curl->simple_get($this->api), true);
		$this->load->view('dashboard', $data);
	}
}
