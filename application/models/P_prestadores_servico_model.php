<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_prestadores_servico_model extends CI_Model
{

    public function inserir_prestador($dados)
    {
        $this->db->set($dados);
        $this->db->insert('p_prestadores_servico');
    }

    public function edita_prestador($dados, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('p_prestadores_servico', $dados);
    }

    public function recebe_prestadores()
    {
        $query = $this->db->get('p_prestadores_servico');
        return $query->result_array();

    }

    public function recebe_prestadores_nome()
    {
        $this->db->select('nome');
        $query = $this->db->get('p_prestadores_servico');
        return $query->result_array();

    }

    public function recebe_prestador($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('p_prestadores_servico');
        return $query->row_array();
    }

    public function deleta_prestador($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_prestadores_servico');
    }

}