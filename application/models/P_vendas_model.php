<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_vendas_model extends CI_Model {

	public function insere_venda($dados){
		      
        $this->db->set($dados);
        $this->db->insert('p_vendas');
		 
       }
	
	 public function atualiza_venda($dados,$id){
            $this->db->where('id', $id);
            $this->db->update('p_vendas', $dados);
       }
	
	public function recebe_vendas(){
		      
              $this->db->from('p_vendas as v');
              $this->db->join('p_clientes_petrofertil as c', 'v.cliente = c.id', 'left');

              $this->db->select('v.*, c.nome_fantasia');

              $query = $this->db->get();

              return $query->result_array();
	}

       public function recebe_vendas_filtrada($data_inicial, $data_final){

              $this->db->select('v.*, c.nome_fantasia');
              $this->db->from('p_vendas as v');
              $this->db->join('p_clientes_petrofertil as c', 'v.cliente = c.id', 'left');
              $this->db->where('v.data_venda BETWEEN "'. date('Y-m-d', strtotime($data_inicial)). '" and "'. date('Y-m-d', strtotime($data_final)).'"');
              $query = $this->db->get();
              return $query->result_array();
       }
          

       public function recebe_venda($id){
           
	       $this->db->where('id', $id);  
              $query = $this->db->get('p_vendas');
              return $query->row_array();
       }

       public function recebe_venda_codigo($codigo){
           
	       $this->db->where('codigo_venda', $codigo);  
              $query = $this->db->get('p_vendas');
              return $query->row_array();
       }

       public function recebe_vendas_vendedor($vendedor){
           
              $this->db->select('v.*, c.nome_fantasia');
              $this->db->from('p_vendas as v');
              $this->db->join('p_clientes_petrofertil as c', 'v.cliente = c.id', 'left');
	       $this->db->where('v.vendedor', $vendedor);  
              $query = $this->db->get();
              return $query->result_array();
       }
	
	public function deleta_venda($id){
		
        	$this->db->where('id', $id);
		$this->db->delete('p_vendas');
    
	}
	
}