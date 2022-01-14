<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->api = base_url('api/product');
		$this->load->library('Curl.php');
	}

	public function index()
	{
    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
      $data['product'] = json_decode($this->curl->simple_get($this->api), true);
      $data['title'] = 'Product';
      $data['main_view'] = 'admin/product';
      $this->load->view('admin/template', $data);
    } else {
			redirect('login','refresh');
		}
	}

}