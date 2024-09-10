<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_afericao_model extends CI_Model {

	public function inserir_afericao($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_afericao');
		redirect('financeiro/afericao');
		 
    }
	
	public function inserir_afericao_terceiros($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_afericao_terceiros');
		redirect('financeiro/afericao');
		 
    }
	
	public function recebe_afericao(){
		$this->db->order_by('data_afericao', 'DESC'); 
		$this->db->limit('200');
        $query = $this->db->get('f_afericao');
			
        return $query->result_array();
		
    }
	
	public function recebe_afericao_terceiros(){
		$this->db->order_by('data_afericao', 'DESC');   
		$this->db->limit('200');
        $query = $this->db->get('f_afericao_terceiros');
			
        return $query->result_array();
		
    }
	
	public function recebe_afericao_motorista($motorista){
		$this->db->where('motorista', $motorista);
		$this->db->order_by('data_afericao', 'DESC');   
        $query = $this->db->get('f_afericao');
			
        return $query->result_array();
		
    }
	
	
	public function recebe_afericao_motorista_ajudante($motorista){
		$this->db->where('ajudante', $motorista);
		$this->db->order_by('data_afericao', 'DESC');   
        $query = $this->db->get('f_afericao');
			
        return $query->result_array();
		
    }
	
	public function seleciona_afericao($id){
		
        	$this->db->where('id', $id);
			$query = $this->db->get('f_afericao');
		
			return $query->row_array();
    
	}
	
	public function seleciona_afericao_terceiros($id){
		
        	$this->db->where('id', $id);
			$query = $this->db->get('f_afericao_terceiros');
		
			return $query->row_array();
    
	}
	
	 public function atualiza_afericao($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_afericao', $dados);
			redirect('financeiro/afericao/editado');
    }
	
	 public function atualiza_afericao_terceiros($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_afericao_terceiros', $dados);
			redirect('financeiro/afericao/editado');
    }
	
	public function deleta_afericao($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_afericao');
			redirect('financeiro/afericao/deletado');
    
	}
	
	public function deleta_afericao_terceiros($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_afericao_terceiros');
			redirect('financeiro/afericao/deletado');
    
	}
	
	
	public function filtra_afericao_geral($data_final, $data_inicial){

           $this->db->where('data_afericao BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
			$this->db->order_by('data_afericao', 'DESC');
           $query = $this->db->get('f_afericao');
           return $query->result_array();
		
    }


	public function filtra_afericao_relatorio($cidades, $data_inicial, $data_final){

		
		$this->db->where('data_afericao BETWEEN "'. date('Y-m-d', strtotime($data_inicial)). '" and "'. date('Y-m-d', strtotime($data_final)).'"');
		$this->db->where_in('cidade', $cidades);
		$this->db->order_by('data_afericao', 'DESC');
		$query = $this->db->get('f_afericao');
		return $query->result_array();
	 
 }
	
	public function filtra_afericao_geral_terceiros($data_final, $data_inicial){

           $this->db->where('data_afericao BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
			$this->db->order_by('data_afericao', 'DESC');
           $query = $this->db->get('f_afericao_terceiros');
           return $query->result_array();
		
    }
	
	public function filtra_afericao_motorista($data_final, $data_inicial, $motorista){
			
		$this->db->where('motorista', $motorista);
        $this->db->where('data_afericao BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
		$this->db->order_by('data_afericao', 'DESC');
        $query = $this->db->get('f_afericao');
        return $query->result_array();
		
    }
	
		public function filtra_afericao_motorista_ajudante($data_final, $data_inicial, $motorista){
			
		$this->db->where('ajudante', $motorista);
        $this->db->where('data_afericao BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
		$this->db->order_by('data_afericao', 'DESC');  
		/* $this->db->where('media <>', 0);*/
        $query = $this->db->get('f_afericao');
        return $query->result_array();
		
    }
	
	public function busca_id_afericao($data_inicial){
			
        	$this->db->where('data_afericao', $data_inicial);
			$this->db->select_max('id');
			$query = $this->db->get('f_afericao');
		
			return $query->row_array();
    
	}
	
	public function busca_id_afericao_terceiros($data_inicial){
			
        	$this->db->where('data_afericao', $data_inicial);
			$this->db->select_max('id');
			$query = $this->db->get('f_afericao_terceiros');
		
			return $query->row_array();
    
	}
	
	
	
	
	
}