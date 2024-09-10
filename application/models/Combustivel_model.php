<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Combustivel_model extends CI_Model {

	public function inserir_combustivel($dados, $placa){
		      
        $this->db->set($dados);
        $this->db->insert('combustivel');
		return $this->db->insert_id();
		
		 
    }
	
	 public function edita_combustivel($dados,$id)
		{
		 
		
            $this->db->where('id', $id);
            $this->db->update('combustivel', $dados);
			
    }
	
	
	
	public function filtra_combustivel($placa, $data_final, $data_inicial){

           $this->db->where('data_cadastro BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
		
			$this->db->where('carro', $placa);  
           $query = $this->db->get('combustivel');
           return $query->result_array();
		
    }
	
	
	
	public function filtra_combustivel_geral($data_final, $data_inicial){

           $this->db->where('data_cadastro BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
		  /* $this->db->where('media <>', 0);*/
           $query = $this->db->get('combustivel');
           return $query->result_array();
		
    }
	
	public function recebe_combustivel_edit($id){
		      
            
		   $this->db->where('id', $id);  
           $query = $this->db->get('combustivel');
           return $query->row_array();
		
    }
	
	 public function recebe_combustivel_geral(){
           
		    $this->db->select('c.*,v.litros as LITROS');
		    $this->db->from('combustivel as c');
			$this->db->limit(50);
		    $this->db->join('veiculos as v',"c.carro = v.placa","left");
		    $this->db->order_by('c.data_cadastro', 'DESC');
		    $query = $this->db->get();
		    return $query->result_array();
		
		 
           /*$query = $this->db->get('combustivel');
           return $query->result_array();*/
    }
	
	
	public function recebe_combustivel_mensal($data_inicial, $data_final){
		
		  $this->db->where('data_cadastro BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
			$this->db->order_by('data_cadastro', 'DESC');  
		  /* $this->db->where('media <>', 0);*/
           $query = $this->db->get('combustivel');
           return $query->result_array();
		
    }
	
	
	
	
	 public function recebe_combustivel($placa){
		 	
		 $this->db->select('c.*, v.litros');
		 $this->db->from('combustivel as c');
		 $this->db->join('veiculos as v','c.carro = v.placa', 'left');
		 $this->db->order_by('c.data_cadastro', 'DESC');
		 $this->db->order_by('c.km','DESC');
		 $this->db->where('c.carro', $placa);
		 $this->db->limit(30);
		 /*$this->db->where('c.media <>', 0); */
		 $query = $this->db->get();
		 
		 return $query->result_array();
    }
	
	public function deleta_combustivel($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('combustivel');
			redirect('combustivel');
    
	}
	
}