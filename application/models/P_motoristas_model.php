<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_motoristas_model extends CI_Model
{

    public function inserir_motorista($dados)
    {

        $this->db->set($dados);
        $this->db->insert('motoristas_petrofertil');

    }

    public function edita_motorista($dados, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('motoristas_petrofertil', $dados);

    }

    public function recebe_motoristas()
    {

        $query = $this->db->get('motoristas_petrofertil');
        return $query->result_array();

    }

    public function recebe_motoristas_nome()
    {

        $this->db->select('nome');
        $query = $this->db->get('motoristas_petrofertil');
        return $query->result_array();

    }

    public function recebe_motorista($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('motoristas_petrofertil');
        return $query->row_array();
    }

    public function recebe_motoristas_transportador($nome_transportador)
    {

        $this->db->where('transportador', $nome_transportador);
        $this->db->order_by('nome', 'ASC'); // Ordena por nome em ordem crescente
        $query = $this->db->get('motoristas_petrofertil');
        return $query->result_array();
    }

    public function deleta_motorista($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('motoristas_petrofertil');
        redirect('P_motoristas');

    }

}