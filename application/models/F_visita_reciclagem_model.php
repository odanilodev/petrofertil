<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_visita_reciclagem_model extends CI_Model {

	public function inserir_visita($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_visitas_reciclagem');
		redirect('F_visitas_reciclagem/inicio/');
		 
    }
	
	
	
	public function recebe_visitas(){
		$this->db->order_by('data_visita', 'DESC'); 
		$this->db->limit('350');
        $query = $this->db->get('f_visitas_reciclagem');
			
        return $query->result_array();
		
    }
	
	
	
	public function seleciona_visita($id){
		
        	$this->db->where('id', $id);
			$query = $this->db->get('f_visitas_reciclagem');
		
			return $query->row_array();
    
	}
	
	 public function atualiza_visita($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_visitas_reciclagem', $dados);
			redirect('f_visitas_reciclagem/inicio');
    }
	
	
	public function deleta_visita($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_visitas_reciclagem');
			redirect('f_visitas_reciclagem/inicio');
    
	}
	
	
	
	public function filtra($data_final, $data_inicial){

           $this->db->where('data_visita BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
			$this->db->order_by('data_visita', 'DESC');  
		  /* $this->db->where('media <>', 0);*/
           $query = $this->db->get('f_visitas_reciclagem');
           return $query->result_array();
		
    }
	
	
	public function filtra_afericao_motorista($data_final, $data_inicial, $motorista){
			
		$this->db->where('motorista', $motorista);
        $this->db->where('data_afericao BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
		$this->db->order_by('data_afericao', 'DESC');  
		/* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_visitas_reciclagem');
        return $query->result_array();
		
    }
	
		

	
	
	
}