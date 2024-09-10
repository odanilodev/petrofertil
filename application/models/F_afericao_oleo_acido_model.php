<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_afericao_oleo_acido_model extends CI_Model
{

    public function inserir_afericao($data)
    {
        $this->db->set($data);
        $this->db->insert('f_afericao_oleo_acido');
    }

    public function atualiza_afericao($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('f_afericao_oleo_acido');
    }   

    public function recebe_afericoes()
    {
        $this->db->order_by('data_entrada', 'DESC');
        $this->db->limit(50);
        $query = $this->db->get('f_afericao_oleo_acido');
        return $query->result_array();
    }

    
    public function recebe_afericoes_filtrado($data_inicial, $data_final)
    {
        $this->db->where('data_entrada BETWEEN "' . date('Y-m-d h:i:s', strtotime($data_final)) . '" and "' . date('Y-m-d h:i:s', strtotime($data_inicial)) . '"');
        $this->db->order_by('data_entrada', 'DESC');
        /* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_afericao_oleo_acido');
        return $query->result_array();
    }


    public function recebe_afericao($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('f_afericao_oleo_acido');
        return $query->row_array();
    }

    public function recebe_id()
    {

        $this->db->select_max('id');
        $query = $this->db->get('f_estoque_tambor');
        return $query->row_array();
    }


    public function atualiza_estoque($data)
    {
        $this->db->update('f_estoque_oleo', $data);
    }



    public function deleta_afericao($id){
		
        $this->db->where('id', $id);
        $this->db->delete('f_afericao_oleo_acido');

    }

}
