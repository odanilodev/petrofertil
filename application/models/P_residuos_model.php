<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_residuos_model extends CI_Model
{

    public function inserir_residuos($dados)
    {
        $this->db->set($dados);
        $this->db->insert('p_residuos');
    }

    public function edita_residuo($dados, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('p_residuos', $dados);
    }

    public function recebe_residuos()
    {
        $this->db->where('status', 0);
        $query = $this->db->get('p_residuos');
        return $query->result_array();
    }


    public function recebe_prestadores_nome()
    {
        $this->db->select('nome');
        $query = $this->db->get('p_prestadores_servico');
        return $query->result_array();

    }

    public function recebe_residuo($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('p_residuos');
        return $query->row_array();
    }

    public function deleta_prestador($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_prestadores_servico');
    }

}