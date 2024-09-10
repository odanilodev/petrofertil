<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manutencao_Model extends CI_Model {

	public function inserir_manutencao($dados, $placa){
		      
        $this->db->set($dados);
        $this->db->insert('manutencoes');
		redirect('manutencoes');
		 
    }
	
	public function atualiza_manutencao($dados, $id){
		      
		 $this->db->where('id', $id);
         $this->db->update('manutencoes', $dados);
		redirect('manutencoes');
		 
    }
	
	public function recebe_manutencoes(){
		
		   $this->db->order_by('data', 'DESC');  
           $query = $this->db->get('manutencoes');
			
           return $query->result_array();
		
    }
	
	
	public function recebe_manutencoes_mensal($data_inicial, $data_final){
		
		  $this->db->where('data BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
			$this->db->order_by('data', 'DESC');  
		  /* $this->db->where('media <>', 0);*/
           $query = $this->db->get('manutencoes');
           return $query->result_array();
		
    }
	
	
		public function filtra_manutencao_geral($data_final, $data_inicial){

           $this->db->where('data BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
			$this->db->order_by('data', 'DESC');  
		  /* $this->db->where('media <>', 0);*/
           $query = $this->db->get('manutencoes');
           return $query->result_array();
		
    }
	
		
	public function filtra_manutencao($placa, $data_final, $data_inicial){

           $this->db->where('data BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
			$this->db->order_by('data', 'DESC');  
			$this->db->where('placa', $placa);  
           $query = $this->db->get('manutencoes');
           return $query->result_array();
		
    }
	
	
	 public function atualiza_status($id){
           
			$this->db->where('id', $id);
		 	$this->db->order_by('data');  
		 	$query = $this->db->get('manutencoes');
		 	return $query->row_array();
    }
	
	
	 public function recebe_manutencao($id){
		 
		 
           $this->db->order_by('id', 'ASK');  
		 	$this->db->where('id', $id);
		 	
		 	$query = $this->db->get('manutencoes');
		 	return $query->row_array();
    }
	
	 public function recebe_detalhe($placa){
             
		 $this->db->order_by('id', 'DESC');	
		 $this->db->where('placa', $placa);
		 	$query = $this->db->get('manutencoes');
          
		 	return $query->result_array();
    }
	
	 public function atualiza_oficina($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('oficinas', $dados);
			redirect('oficinas');
    }
	
	public function deleta_manutencao($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('manutencoes');
			redirect('manutencoes');
    
	}
	
}