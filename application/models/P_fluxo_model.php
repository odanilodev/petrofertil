<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_fluxo_model extends CI_Model
{

	public function inserir_entrada_fluxo($dados)
	{
		try {
			$this->db->set($dados);
			$this->db->insert('p_fluxo');
		} catch (Exception $e) {
			echo "Erro ao inserir os dados: " . $this->db->error();
		}
	}

	public function atualiza_entrada_fluxo($id, $dados)
	{

		$this->db->where('id', $id);
		$this->db->update('f_fluxo', $dados);
	}


	public function recebe_fluxo()
	{
		$this->db->select('p_fluxo.id, p_fluxo.data_fluxo, p_fluxo.conta, p_fluxo.despesa, p_fluxo.valor, p_fluxo.observacao, p_fluxo.data_registro, p_fluxo.pago_recebido, p_clientes_petrofertil.nome_fantasia AS cliente_nome, p_contas_bancarias.descricao AS conta_nome');
		$this->db->from('p_fluxo');
		$this->db->join('p_clientes_petrofertil', 'p_clientes_petrofertil.id = p_fluxo.pago_recebido', 'left');
		$this->db->join('p_contas_bancarias', 'p_contas_bancarias.id = p_fluxo.conta', 'left');
		$this->db->limit(200);
		$this->db->order_by('p_fluxo.data_fluxo', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}


	public function recebe_fluxo_data($data_final, $data_inicial)
	{
		$this->db->select('p_fluxo.id, p_fluxo.data_fluxo, p_fluxo.conta, p_fluxo.despesa, p_fluxo.valor, p_fluxo.observacao, p_fluxo.data_registro, p_fluxo.pago_recebido, p_clientes_petrofertil.nome_fantasia AS cliente_nome, p_contas_bancarias.descricao AS conta_nome');
		$this->db->from('p_fluxo');
		$this->db->join('p_clientes_petrofertil', 'p_clientes_petrofertil.id = p_fluxo.pago_recebido', 'left');
		$this->db->join('p_contas_bancarias', 'p_contas_bancarias.id = p_fluxo.conta', 'left');
		$this->db->where('p_fluxo.data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('p_fluxo.data_fluxo', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function recebe_fluxo_data_conta($data_final, $data_inicial, $id_conta)
	{
		$this->db->select('p_fluxo.data_fluxo, p_fluxo.conta, p_fluxo.despesa, p_fluxo.valor, p_fluxo.observacao, p_fluxo.data_registro, p_fluxo.pago_recebido, p_clientes_petrofertil.nome_fantasia AS cliente_nome, p_contas_bancarias.descricao AS conta_nome');
		$this->db->from('p_fluxo');
		$this->db->join('p_clientes_petrofertil', 'p_clientes_petrofertil.id = p_fluxo.pago_recebido', 'left');
		$this->db->join('p_contas_bancarias', 'p_contas_bancarias.id = p_fluxo.conta', 'left');
		$this->db->where('p_fluxo.data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->where('p_fluxo.conta', $id_conta); // Filtrar pelo id_conta
		$this->db->order_by('p_fluxo.data_fluxo', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}


	public function recebe_fluxo_mensal($data_inicial, $data_final)
	{
		$this->db->where('data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_registro', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_fluxo');
		return $query->result_array();
	}

	public function seleciona_fluxo($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('p_fluxo');

		return $query->row_array();
	}


	public function deleta_fluxo($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('P_fluxo');
	}

	public function deleta_fluxo_relacao($id_relacao)
	{

		$this->db->where('id_relacao', $id_relacao);
		$this->db->delete('P_fluxo');
	}

}