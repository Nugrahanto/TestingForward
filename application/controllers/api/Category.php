<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;

class Category extends RestController {
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelCategory');
    }

    public function index_get(){
        $product = $this->ModelCategory->get_category();
        $this->response($product, 200);
    }

    public function addCategory_post(){
        $name = $this->input->post('name');

        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[tb_category.name]');

        if ($this->form_validation->run() == FALSE) {
            $check = $this->db->where('name', $name)->get('tb_category')->row();
            if(empty($name)){
                $this->response(
                    [
                        "status" => 400,
                        "error" => null,
                        "messages" => [
                            "success" => 'All fields are needed'
                        ]
                    ], RestController::HTTP_BAD_REQUEST
                );
            } else {
                $this->response(
                    [
                        "status" => 400,
                        "error" => null,
                        "messages" => [
                            "success" => 'Name category is exist'
                        ]
                    ], RestController::HTTP_BAD_REQUEST
                );
            }
        } else {
            $data = [
                'name' => $name
            ];
            $category = $this->ModelCategory->post_category($data);
            if($category){
                $this->response(
                    [
                        "status" => 201,
                        "error" => null,
                        "messages" => [
                            "success" => 'Category added successfully'
                        ]
                    ], RestController::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        "status" => 500,
                        "error" => null,
                        "messages" => [
                            "success" => 'Failed to add category'
                        ]
                    ], RestController::HTTP_INTERNAL_SERVER_ERROR
                );
            }   
        }
    }

    public function updateCategory_put($id_cat){
        try
        {
            $this->form_validation->set_data($this->put());
            $this->form_validation->set_rules('name', 'Name', 'required');

            if(!$this->form_validation->run()) throw new Exception(validation_errors());

            $data = [
                'name' => $this->put('name')
            ];
            $category = $this->ModelCategory->put_category($id_cat, $data);
            if($category){
                $this->response(
                    [
                        "status" => 201,
                        "error" => null,
                        "messages" => [
                            "success" => 'Category update successfully'
                        ]
                    ], RestController::HTTP_OK
                );
            } else {
                throw new Exception('Update fail');
            }
        }
        catch(\Throwable $e)
        {
            $this->response(
                [
                    "status" => 400,
                    "error" => null,
                    "messages" => [
                        "success" => 'Field is empty'
                    ]
                ], RestController::HTTP_BAD_REQUEST
            );   
        }
    }

    public function deleteCategory_delete($id_cat){
        $category = $this->ModelCategory->del_category($id_cat);
        if($category > 0){
            $this->response(
                [
                    "status" => 201,
                    "error" => null,
                    "messages" => [
                        "success" => 'Category was deleted'
                    ]
                ], RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    "status" => 400,
                    "error" => null,
                    "messages" => [
                        "success" => 'Failed to delete category'
                    ]
                ], RestController::HTTP_BAD_REQUEST
            );   
        }
    }

}