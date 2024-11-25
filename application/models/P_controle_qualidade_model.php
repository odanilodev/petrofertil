<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_controle_qualidade_model extends CI_Model
{

    public function inserir_controle_producao($dados)
    {

        $this->db->set($dados);
        $this->db->insert('p_controle_producao');

    }

    public function edita_controle_producao($dados, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('p_controle_producao', $dados);

    }

    public function recebe_controle_producao($data_inicio = null, $data_fim = null, $id_produto = null)
    {
        $this->db->select('
            p_controle_producao.*, 
            p_funcionarios.nome AS funcionario, 
            p_produtos.nome AS produto
        ');
        $this->db->from('p_controle_producao');
        $this->db->join('p_funcionarios', 'p_funcionarios.id = p_controle_producao.id_produto', 'left');
        $this->db->join('p_produtos', 'p_produtos.id = p_controle_producao.id_produto', 'left');

        // Verifica se as datas foram fornecidas
        if (!empty($data_inicio) && !empty($data_fim)) {
            // Filtra pelos intervalos de datas fornecidos
            $this->db->where('p_controle_producao.data >=', $data_inicio);
            $this->db->where('p_controle_producao.data <=', $data_fim);
        } else {
            // Caso nenhuma data seja fornecida, filtra pelo mês atual
            $this->db->where('MONTH(p_controle_producao.data)', date('m'));
            $this->db->where('YEAR(p_controle_producao.data)', date('Y'));
        }

        // Filtra pelo ID do produto, se fornecido
        if (!empty($id_produto)) {
            $this->db->where('p_controle_producao.id_produto', $id_produto);
        }

        $query = $this->db->get();

        return $query->result_array();
    }

    public function recebe_controle_producao_id($id)
    {
        $this->db->select('
        p_controle_producao.*, 
        p_funcionarios.nome AS funcionario, 
        p_produtos.nome AS produto
    ');
        $this->db->from('p_controle_producao');
        $this->db->join('p_funcionarios', 'p_funcionarios.id = p_controle_producao.id_funcionario', 'left'); // Ajustei aqui também o campo do funcionário para garantir que está correto
        $this->db->join('p_produtos', 'p_produtos.id = p_controle_producao.id_produto', 'left');
        $this->db->where('p_controle_producao.id', $id); // Adiciona o filtro WHERE pelo ID
        $query = $this->db->get();

        return $query->row_array();
    }

    public function deleta_controle($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('p_controle_producao');
    }

}