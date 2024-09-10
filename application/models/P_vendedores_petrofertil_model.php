<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_vendedores_petrofertil_model extends CI_Model
{

    public function cadastrar_vendedor($dados)
    {

        $this->db->set($dados);
        $this->db->insert('p_vendedores');

    }

    public function atualiza_vendedor($id, $dados)
    {

        $this->db->where('id', $id);
        $this->db->update('p_vendedores', $dados);
    }


    public function recebe_vendedores()
    {

        $query = $this->db->get('p_vendedores');
        return $query->result_array();

    }

    public function recebe_vendedores_nome()
    {

        $query = $this->db->get('p_vendedores');
        return $query->result_array();

    }

    public function recebe_vendedor($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('p_vendedores');
        return $query->row_array();

    }

    public function recebe_vendedor_nome()
    {
        $this->db->select('nome');
        $query = $this->db->get('p_vendedores');
        return $query->result_array();

    }
    

    public function recebe_vendedor_nome_individual($nome)
    {
        $this->db->where('nome', $nome);
        $query = $this->db->get('p_vendedores');
        return $query->row_array();

    }

    public function deleta_vendedor($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('p_vendedores');

    }

}