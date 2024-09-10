<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_produtos_model extends CI_Model
{

    public function inserir_compra($data)
    {

        $this->db->set($data);
        $this->db->insert('compra_produto_estoque');
    }

    public function inserir_descarte($data)
    {

        $this->db->set($data);
        $this->db->insert('descarte_produto_estoque');
    }

    public function recebe_historicos()
    {
        $query = $this->db->get('compra_produto_estoque');
        return $query->result_array();
    }

    public function recebe_historicos_descarte()
    {
        $query = $this->db->get('descarte_produto_estoque');
        return $query->result_array();
    }

    public function deleta_compra($id){
		
		$this->db->where('id', $id);
		$this->db->delete('compra_produto_estoque');

	}

    public function deleta_descarte($id){
		
		$this->db->where('id', $id);
		$this->db->delete('descarte_produto_estoque');

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
