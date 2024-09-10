<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_model extends CI_Model
{

    public function insere_estoque($data)
    {

        $this->db->set($data);
        $this->db->insert('f_estoque');
    }

    public function inserir_fechamento($dados)
    {

        $this->db->set($dados);

        $this->db->insert('f_fechamento');
    }

    public function atualiza_fechamento($dados, $data)
    {

        $this->db->set($dados);
        $this->db->where('data_fechamento', $data);
        $this->db->update('f_fechamento');
    }

    public function recebe_estoque()
    {

        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('f_estoque');
        return $query->row_array();
    }

    public function recebe_estoque_new()
    {

        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('f_estoque_oleo_comum');
        return $query->row_array();
    }

    public function recebe_estoque_total()
    {

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('f_estoque');
        return $query->result_array();
    }

    public function busca_estoque($data)
    {

        $this->db->where('data_fechamento', $data);
        $query = $this->db->get('f_fechamento');
        return $query->row_array();
    }

    public function recebe_id()
    {

        $this->db->select_max('id');
        $query = $this->db->get('f_estoque');
        return $query->row_array();
    }

    public function recebe_id_new()
    {

        $this->db->select_max('id');
        $query = $this->db->get('f_estoque_oleo_comum');
        return $query->row_array();
    }


    public function atualiza_estoque($data)
    {

        $this->db->update('f_estoque', $data);
    }


    public function filtra_estoque_historico($data_final, $data_inicial)
    {
        $this->db->where('data_movimentacao BETWEEN "' . date('Y-m-d h:i:s', strtotime($data_final)) . '" and "' . date('Y-m-d h:i:s', strtotime($data_inicial)) . '"');
        $this->db->order_by('data_movimentacao', 'DESC');
        /* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_estoque');
        return $query->result_array();
    }

    public function filtra_estoque_historico_new($data_final, $data_inicial)
    {
        $this->db->where('dt_dia BETWEEN "' . date('Y-m-d h:i:s', strtotime($data_final)) . '" and "' . date('Y-m-d h:i:s', strtotime($data_inicial)) . '"');
        $this->db->order_by('dt_dia', 'DESC');
        /* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_estoque_oleo_comum');
        return $query->result_array();
    }

    public function filtra_estoque($data_inicial, $data_final)
    {
        $this->db->where('data_cadastro BETWEEN "' . date('Y-m-d h:i:s', strtotime($data_final)) . '" and "' . date('Y-m-d h:i:s', strtotime($data_inicial)) . '"');
        $this->db->order_by('data_cadastro', 'DESC');
        /* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_estoque');
        return $query->result_array();
    }

    public function filtra_estoque_new($data_inicial, $data_final)
    {
        $this->db->order_by('dt_dia', 'DESC');
        /* $this->db->where('media <>', 0);*/
        
        $this->db->limit(31);
        $query = $this->db->get('f_estoque_oleo_comum');
        return $query->result_array();
    }



    public function recebe_fechamentos()
    {

        $this->db->order_by('data_fechamento', 'DESC');
        $query = $this->db->get('f_fechamento');
        return $query->result_array();
    }
}
