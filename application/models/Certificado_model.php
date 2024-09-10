<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificado_model extends CI_Model {

	public function inserir_certificado($dados){
		      
        $this->db->set($dados);
        $this->db->insert('certificado');
		 
    }
	
	public function localiza_numero(){
		      
		$this->db->select_max('id');
      	$query = $this->db->get('certificado');
		return $query->row_array();
		 
    }
	
	public function recebe_certificados($id_cliente){
		
		$this->db->where('id_cliente', $id_cliente); 
		$this->db->order_by('id', 'DESC'); 
        $query = $this->db->get('certificado', 9);
			
        return $query->result_array();
		
    }

	public function recebe_certificados_filtrados($id_cliente, $data_inicial, $data_final){
		
		$this->db->where('id_cliente', $id_cliente); 
		$this->db->where('data_cadastro BETWEEN "'. date('Y-m-d', strtotime($data_inicial)). '" and "'. date('Y-m-d', strtotime($data_final)).'"');
		$this->db->order_by('id_cliente', 'DESC'); 
        $query = $this->db->get('certificado');
			
        return $query->result_array();

		
    }
	
	 public function recebe_certificado($id){
           
		$this->db->where('id', $id);  
	 	$query = $this->db->get('certificado');
	 	return $query->row_array();
    }
	
	
	public function deleta_oficina($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('oficinas');
			redirect('oficinas');
    
	}
	
	
	
}