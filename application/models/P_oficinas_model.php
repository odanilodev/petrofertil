<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_oficinas_model extends CI_Model
{

    public function inserir_oficina($dados)
    {

        $this->db->set($dados);
        $this->db->insert('p_oficinas');

    }

    public function edita_oficina($dados, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('p_oficinas', $dados);
    }


    public function recebe_oficinas()
    {

        $query = $this->db->get('p_oficinas');
        return $query->result_array();

    }

    public function recebe_oficinas_nomes()
    {

        $this->db->select('nome');
        $query = $this->db->get('p_oficinas');
        return $query->result_array();

    }

    public function recebe_oficina($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('p_oficinas');
        return $query->row_array();
    }

    public function recebe_oficina_nome($nome)
    {
        $this->db->where('nome', $nome);
        $query = $this->db->get('p_oficinas');
        return $query->row_array();
    }

    public function deleta_oficina($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_oficinas');

    }

}