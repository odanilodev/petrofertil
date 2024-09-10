<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_vendas_produtos_model extends CI_Model {

       public function insere_venda($dados){
		      
              $this->db->set($dados);
              $this->db->insert('p_vendas_produtos');
       }
	
	public function atualiza_venda($dados,$id){
            $this->db->where('id', $id);
            $this->db->update('p_vendas_produtos', $dados);
       }
	
	
	public function recebe_vendas(){
		      
           $query = $this->db->get('p_vendas_produtos');
           return $query->result_array();
		
       }
	
	 public function recebe_venda($id){
           
	       $this->db->where('id', $id);  
              $query = $this->db->get('p_vendas_produtos');
              return $query->row_array();
       }
	
	public function deleta_venda($id){
		
        	$this->db->where('id', $id);
		$this->db->delete('p_vendas_produtos');
    
	}
	
}