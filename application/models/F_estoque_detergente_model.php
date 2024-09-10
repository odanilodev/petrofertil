<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_detergente_model extends CI_Model
{

    public function insere_estoque($data)
    {

        $this->db->set($data);
        $this->db->update('f_estoque_detergente');
    }

    public function recebe_estoque()
    {
        $query = $this->db->get('f_estoque_detergente');
        return $query->row_array();
    }

    public function busca_estoque($data)
    {

        $this->db->where('data_fechamento', $data);
        $query = $this->db->get('f_estoque_detergente');
        return $query->row_array();
    }

    public function recebe_id()
    {

        $this->db->select_max('id');
        $query = $this->db->get('f_estoque_detergente');
        return $query->row_array();
    }


    public function atualiza_estoque($data)
    {

        $this->db->update('f_estoque_detergente', $data);
    }


    public function filtra_estoque($data_inicial, $data_final)
    {
        $this->db->where('data_cadastro BETWEEN "' . date('Y-m-d h:i:s', strtotime($data_final)) . '" and "' . date('Y-m-d h:i:s', strtotime($data_inicial)) . '"');
        $this->db->order_by('data_cadastro', 'DESC');
        /* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_estoque');
        return $query->result_array();
    }


    public function recebe_fechamentos()
    {

        $this->db->order_by('data_fechamento', 'DESC');
        $query = $this->db->get('f_fechamento');
        return $query->result_array();
    }
}
