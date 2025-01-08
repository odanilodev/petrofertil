<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_controle_recebimento_model extends CI_Model
{
    public function get_todos_recebimentos($data_inicial, $data_final)
    {
        $this->db->select('
            p_controle_recebimento.*,
            clientes_petrofertil.nome AS nome_empresa
        ');

        $this->db->from('p_controle_recebimento');
        $this->db->join('clientes_petrofertil', 'clientes_petrofertil.id = p_controle_recebimento.empresa', 'left');

        // Aplica o filtro de data
        $this->db->where('p_controle_recebimento.data_recebimento >=', $data_inicial);
        $this->db->where('p_controle_recebimento.data_recebimento <=', $data_final);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recebimento_por_id($id)
    {
        $this->db->select('
        p_controle_recebimento.*,
        clientes_petrofertil.nome AS nome_empresa
    ');

        $this->db->from('p_controle_recebimento');
        $this->db->join('clientes_petrofertil', 'clientes_petrofertil.id = p_controle_recebimento.empresa', 'left');

        // Filtro pelo ID
        $this->db->where('p_controle_recebimento.id', $id);

        $query = $this->db->get();
        return $query->row_array(); // Retorna apenas um registro como array associativo
    }


    public function get_recebimentos_por_empresa($data_inicial, $data_final, $id_empresa)
    {
        $this->db->select('
        p_controle_recebimento.*,
        clientes_petrofertil.nome AS nome_empresa
        ');

        $this->db->from('p_controle_recebimento');
        $this->db->join('clientes_petrofertil', 'clientes_petrofertil.id = p_controle_recebimento.empresa', 'left');

        // Aplica o filtro de data
        $this->db->where('p_controle_recebimento.data_recebimento >=', $data_inicial);
        $this->db->where('p_controle_recebimento.data_recebimento <=', $data_final);

        // Filtro pelo ID da empresa
        $this->db->where('p_controle_recebimento.empresa', $id_empresa);

        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_totais_recebimento($data_inicial, $data_final)
    {
        $this->db->select('
            SUM(p_controle_recebimento.organico) AS total_organico,
            SUM(p_controle_recebimento.mineral) AS total_mineral,
            SUM(p_controle_recebimento.palha) AS total_palha,
            SUM(p_controle_recebimento.outro) AS total_outro,
            COUNT(DISTINCT p_controle_recebimento.data_recebimento) AS numero_de_dias,
            (SUM(p_controle_recebimento.organico + p_controle_recebimento.mineral + p_controle_recebimento.palha + p_controle_recebimento.outro) / COUNT(DISTINCT p_controle_recebimento.data_recebimento)) AS total_diario
        ');

        $this->db->from('p_controle_recebimento');

        // Aplica o filtro de data
        $this->db->where('p_controle_recebimento.data_recebimento >=', $data_inicial);
        $this->db->where('p_controle_recebimento.data_recebimento <=', $data_final);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function inserir_controle_recebimento($dados)
    {

        $this->db->set($dados);
        $this->db->insert('p_controle_recebimento');

    }

    public function edita_controle_recebimento($dados, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('p_controle_recebimento', $dados);

    }

    public function deleta_controle($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_controle_recebimento');
    }

}