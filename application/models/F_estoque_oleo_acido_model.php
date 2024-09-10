<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_oleo_acido_model extends CI_Model
{

    public function inserir_estoque($dados)
    {
        $this->db->set($dados);
        $this->db->insert('f_estoque_oleo_acido');
    }

    public function atualiza_fechamento($dados, $data)
    {
        $this->db->set($dados);
        $this->db->where('data_fechamento', $data);
        $this->db->update('f_estoque_oleo_acido');
    }

    public function recebe_estoque()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('f_estoque_oleo_acido');
        return $query->row_array();
    }

    public function recebe_estoque_total()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('f_estoque_oleo_acido');
        return $query->result_array();
    }

    public function atualiza_estoque($data)
    {
        $this->db->update('f_estoque_oleo', $data);
    }


    public function filtra_estoque($data_inicial, $data_final)
    {
        $this->db->where('data_movimentacao BETWEEN "' . date('Y-m-d h:i:s', strtotime($data_final)) . '" and "' . date('Y-m-d h:i:s', strtotime($data_inicial)) . '"');
        $this->db->order_by('data_movimentacao', 'DESC');
        /* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_estoque_oleo_acido');
        return $query->result_array();
    }


    public function recebe_fechamentos()
    {

        $this->db->order_by('data_fechamento', 'DESC');
        $query = $this->db->get('f_fechamento');
        return $query->result_array();
    }
}
