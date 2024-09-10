<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_solicitacao_servico_model extends CI_Model {

	public function inserir_solicitacao($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_solicitacao_servico_interno');
		 
    }

	
	public function recebe_servicos_funcionario($nome){
		
        	$this->db->where('para', $nome);
			$query = $this->db->get('f_solicitacao_servico_interno');
		
			return $query->result_array();
    
	}
	
	
	public function deleta_pesagem($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_pesagem');
    
	}
	
	
	 public function atualiza_status_servico($dados,$id){
			$this->db->set($dados);
            $this->db->where('id', $id);
            $this->db->update('f_solicitacao_servico_interno', $dados);
    }
	
	
	
	
}