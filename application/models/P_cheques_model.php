<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_cheques_model extends CI_Model {

	public function inserir_cheque($dados)
       {      
              $this->db->set($dados);
              $this->db->insert('p_cheques');
		 
       }
	
	 public function atualiza_cheque($dados,$id)
       {
              $this->db->where('id', $id);
              $this->db->update('p_cheques', $dados);
       }
	
	
       public function recebe_cheques()
       {
           $this->db->order_by('data_compensasao', 'desc'); 
           $query = $this->db->get('p_cheques');
           return $query->result_array();
       }

       public function recebe_cheques_sem_posse()
       {
           $this->db->order_by('data_compensasao', 'desc'); 
            $this->db->where('(posse_de IS NULL OR posse_de = "" OR posse_de = "petrofertil"  OR posse_de = "Petrofertil")');
           $query = $this->db->get('p_cheques');
           return $query->result_array();
       }

       public function recebe_cheques_compensar()
       {
           $data_hoje = date('Y-m-d');
       
           $this->db->order_by('data_compensasao', 'desc');
           $this->db->where('data_compensasao >', $data_hoje);
           $this->db->where('status', 'A compensar');
           $this->db->where('(posse_de IS NULL OR posse_de = "")');

           $query = $this->db->get('p_cheques');
           return $query->result_array();
       }       

       public function recebe_cheques_data($data_inicial, $data_final)
       {
           $this->db->where('data_compensasao >=', $data_inicial);
           $this->db->where('data_compensasao <=', $data_final);
           $this->db->order_by('data_compensasao', 'desc'); // 'asc' para ordem ascendente, 'desc' para ordem descendente
           $query = $this->db->get('p_cheques');
           return $query->result_array();
       }

       public function recebe_cheques_status($data_inicial, $data_final, $status)
       {
           $this->db->where('data_compensasao >=', $data_inicial);
           $this->db->where('data_compensasao <=', $data_final);
           $this->db->where('status', $status);
           $this->db->order_by('data_compensasao', 'desc'); // 'asc' para ordem ascendente, 'desc' para ordem descendente
           $query = $this->db->get('p_cheques');
           return $query->result_array();
       }
	
	 public function recebe_cheque($id)
        {
              $this->db->where('id', $id);  
              $query = $this->db->get('p_cheques');
              return $query->row_array();
       }
	
	public function deleta_cheque($id)
       {
        	$this->db->where('id', $id);
		$this->db->delete('p_cheques');
    
	}
	
}