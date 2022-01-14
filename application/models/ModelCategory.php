<?php

class ModelCategory extends CI_Model {
    public function get_category()
    {
        return $this->db->order_by('id_cat', 'ASC')
                    ->get('tb_category')
                    ->result();
    }

    public function post_category($data)
    {
        $this->db->insert('tb_category', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function put_category($id_cat, $data)
    {
        $this->db->where('id_cat', $id_cat)
                 ->update('tb_category', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function del_category($id_cat)
    {
        return $this->db->where('id_cat', $id_cat)
                        ->delete('tb_category');
    }
}
