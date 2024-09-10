<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculos_model extends CI_Model {

	public function inserir_veiculo($dados){
		      
        $this->db->set($dados);
        $this->db->insert('veiculos');
		redirect('veiculos');
		 
    }
	
	 public function edita_veiculo($dados,$id)
		{

            $this->db->where('id', $id);
            $this->db->update('veiculos', $dados);
			redirect('veiculos');
    }
	
	
	public function recebe_veiculos(){
		     
		   $this->db->order_by('placa', 'ASK');   
           $query = $this->db->get('veiculos');
           return $query->result_array();
		
    }
	
	 public function recebe_veiculo($id){
           
		   $this->db->where('id', $id);  
           $query = $this->db->get('veiculos');
           return $query->row_array();
    }
	
	 public function recebe_veiculo_placa($placa){
           
			$this->db->where('placa', $placa);  
           $query = $this->db->get('veiculos');
           return $query->row_array();
    }
	
	public function deleta_veiculo($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('veiculos');
			redirect('veiculos');
    
	}
	
}