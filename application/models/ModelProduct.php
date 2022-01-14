<?php

class ModelProduct extends CI_Model {
    public function get_product()
    {
        return $this->db->get('tb_product')
            ->result();
    }

    public function get_productById($id)
    {
        return $this->db->where('id', $id)
            ->get('tb_product')
            ->row();
    }

    public function post_product($data)
    {
        $this->db->insert('tb_product', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
