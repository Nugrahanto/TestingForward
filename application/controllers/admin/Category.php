<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->api = base_url('api/category');
		$this->load->library('Curl.php');
	}

	public function index()
	{
    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
      $data['category'] = json_decode($this->curl->simple_get($this->api), true);
      $data['title'] = 'Category';
      $data['main_view'] = 'admin/category';
      $this->load->view('admin/template', $data);
    } else {
			redirect('login','refresh');
		}
	}

	public function addCategory()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
			if ($this->input->post('submit')) {				
				$data = [
					'name_cat' => $this->input->post('name_cat')
				];
				$insert = $this->curl->simple_post($this->api.'/add',$data,array(CURLOPT_BUFFERSIZE=>10));
				redirect('admin/category','refresh');
			}
		} else {
			redirect('login','refresh');
		}
	}

	public function updateCategory()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
			if ($this->input->post('submit')) {				
				$id_cat = $this->input->post('id_cat');
				$data = [
					'name_cat' => $this->input->post('name_cat')
				];
				$update = $this->curl->simple_put($this->api.'/update/'.$id_cat,$data,array(CURLOPT_BUFFERSIZE=>10));
				redirect('admin/category','refresh');
			}
		} else {
			redirect('login','refresh');
		}
	}

	public function deleteCategory()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
			$id_cat = $this->uri->segment(4);
			$data['category'] = json_decode($this->curl->simple_delete($this->api.'/delete/'.$id_cat), true);
			redirect('admin/category','refresh');
		} else {
			redirect('login','refresh');
		}
	}

}