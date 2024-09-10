<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientesp_model extends CI_Model
{

	public function inserir_cliente($dados)
	{

		$this->db->set($dados);
		$this->db->insert('clientes_petrofertil');

	}

	public function recebe_clientes()
	{

		$this->db->order_by('nome', 'DESC');
		$query = $this->db->get('clientes_petrofertil');

		return $query->result_array();

	}

	public function recebe_cliente($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('clientes_petrofertil');
		return $query->row_array();

	}

	public function recebe_cliente_nome($nome)
	{

		$this->db->where('nome', $nome);
		$query = $this->db->get('clientes_petrofertil');
		return $query->result_array();

	}


	public function atualiza_cliente($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('clientes_petrofertil', $dados);
	}

	public function recebe_detalhe($placa)
	{

		$this->db->where('placa', $placa);
		$query = $this->db->get('manutencoes');
		return $query->result_array();
	}



	public function deleta_cliente($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('clientes_petrofertil');
		redirect('admin_petro/inicio');

	}

}