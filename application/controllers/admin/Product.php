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
		$apiCat = base_url('api/category');
    if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
      $data['product'] = json_decode($this->curl->simple_get($this->api), true);
			$data['category'] = json_decode($this->curl->simple_get($apiCat), true);
      $data['title'] = 'Product';
      $data['main_view'] = 'admin/product';
      $this->load->view('admin/template', $data);
    } else {
			redirect('login','refresh');
		}
	}

	public function addProduct()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
			if ($this->input->post('submit')) {				
				if(!empty($_FILES['image']['name'])){
					$config = array(
							'upload_path' => "./uploads/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE
					);
					
					//Load upload library and initialize here configuration
					$this->load->library('upload',$config);
					if($this->upload->do_upload('image')) {
							$uploadData = $this->upload->data();
							$image = $uploadData['file_name'];
					} else {
							$image = '';
					}
				}else{
						$image = '';
				}
				$uploads = base_url('uploads/'.$image.'');
				$data = [
					'id_cat' => $this->input->post('id_cat'),
					'name' => $this->input->post('name'),
					'price' => $this->input->post('price'),
					'desc' => $this->input->post('desc'),
					'image' => $uploads
			];
				$insert = $this->curl->simple_post($this->api.'/add',$data,array(CURLOPT_BUFFERSIZE=>10));
				redirect('admin/product','refresh');
			}
		} else {
			redirect('login','refresh');
		}
	}

}