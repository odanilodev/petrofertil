<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_advertencia_model extends CI_Model
{

    public function cadastrar_advertencia($dados)
    {
        $this->db->set($dados);
        $this->db->insert('f_advertencia');
    }

    public function recebe_advertencias($id)
    {
        $this->db->where('id_funcionario', $id);
        $query = $this->db->get('f_advertencia');
        return $query->result_array();
    }

    public function recebe_advertencia($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('f_advertencia');
        return $query->row_array();
    }

    public function deleta_funcionario($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('f_funcionarios');
    }

    public function deleta_advertencia($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('f_advertencia');
    }

}
