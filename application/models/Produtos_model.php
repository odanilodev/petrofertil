<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {

	public function inserir_produtos($dados){
		      
    $this->db->set($dados);
    $this->db->insert('produtos');
		 
    }
	
	public function recebe_produto($id){
		
		$this->db->where('id', $id);
        $query = $this->db->get('produtos');
			
        return $query->row_array();
		
    }
	
	public function recebe_produtos(){
		
        $this->db->order_by('id', DESC);
        $query = $this->db->get('produtos');
        return $query->result_array();
		
    }
	
	 public function edita_produtos($dados,$id){

        $this->db->where('id', $id);
        $this->db->update('produtos', $dados);
		redirect('produtos');
		 
    }
	
	public function deleta_produto($id){
		
        $this->db->where('id', $id);
		$this->db->delete('produtos');
		redirect('Estoque');
    
	}
	
	
	
}