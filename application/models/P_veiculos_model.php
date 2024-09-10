<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_veiculos_model extends CI_Model
{

    public function inserir_veiculo($dados)
    {

        $this->db->set($dados);
        $this->db->insert('p_veiculos');

    }

    public function edita_veiculo($dados, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('p_veiculos', $dados);
    }


    public function recebe_veiculos()
    {
        $query = $this->db->get('p_veiculos');
        return $query->result_array();
    }

    public function recebe_veiculo($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('p_veiculos');
        return $query->row_array();
    }

    public function recebe_veiculos_transportador($id_transportador)
    {
        $this->db->where('id_transportador', $id_transportador);
        $query = $this->db->get('p_veiculos');
        return $query->result_array();
    }

    public function recebe_veiculo_placa($placa)
    {
        $this->db->where('placa', $placa);
        $query = $this->db->get('p_veiculos');
        return $query->row_array();
    }

    public function deleta_veiculo($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_veiculos');
        redirect('p_veiculos');

    }

}