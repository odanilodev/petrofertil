<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_tickets_model extends CI_Model
{

    public function inserir_ticket($dados)
    {
        $this->db->set($dados);
        $this->db->insert('p_tickets');
    }

    public function contar_tickets()
    {
        return $this->db->count_all('p_tickets'); //conta a quantidade de registros
    }

    public function edita_ticket($id, $dados)
    {
        $this->db->where('id', $id);
        $this->db->update('p_tickets', $dados);
    }

    public function recebe_tickets()
    {
        $this->db->limit(50);
        $this->db->order_by('data_entrada', 'ASC');
        $query = $this->db->get('p_tickets');
        return $query->result_array();
    }

    public function recebe_tickets_entre_datas($data_inicio, $data_fim)
    {
        $this->db->where('data_entrada >=', $data_inicio);
        $this->db->where('data_saida <=', $data_fim);
        $query = $this->db->order_by('data_entrada', 'ASC')->get('p_tickets');
        return $query->result_array();
    }

    public function recebe_ticket($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('p_tickets');
        return $query->row_array();
    }

    public function deleta_ticket($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_tickets');
    }

}