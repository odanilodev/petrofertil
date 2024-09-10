<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_transportadores_model extends CI_Model
{

    public function inserir_transportador($dados)
    {

        $this->db->set($dados);
        $this->db->insert('p_transportadores');

    }

    public function edita_transportador($dados, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('p_transportadores', $dados);
    }


    public function recebe_transportadores()
    {

        $query = $this->db->get('p_transportadores');
        return $query->result_array();

    }

    public function recebe_transportadores_nome()
    {
        
        $this->db->select('nome');  
        $query = $this->db->get('p_transportadores');
        return $query->result_array();

    }

    public function recebe_transportador($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('p_transportadores');
        return $query->row_array();
    }

    public function recebe_transportador_nome($nome)
    {
        $this->db->where('nome', $nome);
        $query = $this->db->get('p_transportadores');
        return $query->row_array();
    }

    public function deleta_transportador($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_transportadores');
        redirect('P_transportadores');

    }

}