<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;

class Product extends RestController {
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelProduct');
    }

    public function index_get(){
        $product = $this->ModelProduct->get_product();
        $this->response($product, 200);
    }

    public function productById_get($id){
        $product = $this->ModelProduct->get_productById($id);
        $this->response($product, 200);
    }

    public function addProduct_post(){
        $id_cat = $this->input->post('id_cat');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $desc = $this->input->post('desc');
        $image = $this->input->post('image');
        
        $this->form_validation->set_rules('id_cat', 'ID Category', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[tb_product.name]');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $check = $this->db->where('name', $name)->get('tb_product')->row();
            if(empty($id_cat) || empty($name) || empty($price) || empty($desc)){
                $this->response(
                    [
                        "status" => 400,
                        "error" => null,
                        "messages" => [
                            "error" => 'All fields are needed'
                        ]
                    ], RestController::HTTP_BAD_REQUEST
                );
            } else if ($check) {
                $this->response(
                    [
                        "status" => 400,
                        "error" => null,
                        "messages" => [
                            "error" => 'Name product must be unique'
                        ]
                    ], RestController::HTTP_BAD_REQUEST
                );
            }
        } else {
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
            if(!empty($id_cat) && !empty($name) && !empty($price) && !empty($desc) && !empty($image)){
                $data = [
                    'id_cat' => $id_cat,
                    'name' => $name,
                    'price' => $price,
                    'desc' => $desc,
                    'image' => $uploads
                ];
                $product = $this->ModelProduct->post_product($data);
                if($product){
                    $this->response(
                        [
                            "status" => 201,
                            "error" => null,
                            "messages" => [
                                "success" => 'Product added successfully'
                            ]
                        ], RestController::HTTP_OK
                    );
                } else {
                    $this->response(
                        [
                            "status" => 500,
                            "error" => null,
                            "messages" => [
                                "error" => 'Failed to add product'
                            ]
                        ], RestController::HTTP_INTERNAL_SERVER_ERROR
                    );
                }
            } else {
                $this->response(
                    [
                        "status" => 400,
                        "error" => null,
                        "messages" => [
                            "error" => 'Image are empty'
                        ]
                    ], RestController::HTTP_BAD_REQUEST
                );
            }
        }
    }
}