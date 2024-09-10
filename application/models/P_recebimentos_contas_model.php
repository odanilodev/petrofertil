<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_recebimentos_contas_model extends CI_Model {

	public function inserir_recebimento($dados){
		      
        $this->db->set($dados);
        $this->db->insert('P_recebimentos_contas');
		 
    }
	
	 public function edita_recebimento($dados,$id)
	{
        $this->db->where('id', $id);
        $this->db->update('P_recebimentos_contas', $dados);
    }
	
	public function recebe_recebimentos()
    {
        $query = $this->db->get('P_recebimentos_contas');
        return $query->result_array();
    }
	
	 public function recebe_recebimento($id)
     {   
		$this->db->where('id', $id);  
        $query = $this->db->get('P_recebimentos_contas');
        return $query->row_array();
    }

	public function deleta_recebimento($id)
    {
        $this->db->where('id', $id);
		$this->db->delete('P_recebimentos_contas');
    
	}
	
}