<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_controle_qualidade extends CI_Controller
{

	public function inicio()
	{
		$this->load->model('P_controle_qualidade_model');
		$this->load->model('P_produtos_model');


		// Recebe as datas via POST (ou define como null se não existirem)
		$data_inicial = $this->input->post('data_inicial') ?: null;
		$data_final = $this->input->post('data_final') ?: null;

		$id_produto = $this->input->post('id_produto') ?: null;

		// Chama o modelo com as datas (ou null)
		$producao = $this->P_controle_qualidade_model->recebe_controle_producao($data_inicial, $data_final, $id_produto);

		// Inicializa variáveis para os totais
		$total_organico = 0;
		$total_mineral = 0;
		$total_palha = 0;
		$total_outro = 0;

		// Array para guardar datas únicas
		$datas_unicas = [];

		// Processa os dados de produção
		foreach ($producao as $registro) {
			// Soma os valores de cada campo, garantindo que sejam numéricos
			$total_organico += is_numeric($registro['organico']) ? $registro['organico'] : 0;
			$total_mineral += is_numeric($registro['mineral']) ? $registro['mineral'] : 0;
			$total_palha += is_numeric($registro['palha']) ? $registro['palha'] : 0;
			$total_outro += is_numeric($registro['outro']) ? $registro['outro'] : 0;

			// Adiciona a data ao array de datas únicas
			$datas_unicas[$registro['data']] = true;
		}

		// Calcula o número de dias únicos
		$numero_de_dias = count($datas_unicas);

		// Calcula o total geral (diário)
		$total_diario = $total_organico + $total_mineral + $total_palha + $total_outro;

		// Prepara os dados para a view
		$data['producao'] = $producao;
		$data['total_organico'] = $total_organico;
		$data['total_mineral'] = $total_mineral;
		$data['total_palha'] = $total_palha;
		$data['total_outro'] = $total_outro;
		$data['total_diario'] = $total_diario; // Soma de tudo
		$data['numero_de_dias'] = $numero_de_dias;

		$data['produtos'] = $this->P_produtos_model->recebe_produtos();

		// Carrega as views
		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/controle_qualidade');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_controle()
	{

		$this->load->model('P_controle_qualidade_model');
		$this->load->model('P_funcionarios_model');
		$this->load->model('P_produtos_model');

		$id = $this->uri->segment(3);

		$data['funcionarios'] = $this->P_funcionarios_model->recebe_funcionarios();
		$data['producao'] = $this->P_controle_qualidade_model->recebe_controle_producao_id($id);
		$data['produtos'] = $this->P_produtos_model->recebe_produtos();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_controle');
		$this->load->view('petrofertil/footer');
	}

	public function cadastra_controle()
	{
		$this->load->model('P_controle_qualidade_model');

		$id = $this->input->post('id');
		$dados['data'] = $this->input->post('data');
		$dados['id_funcionario'] = $this->input->post('id_funcionario');
		$dados['id_produto'] = $this->input->post('id_produto');
		$dados['lote'] = $this->input->post('lote');
		$dados['organico'] = $this->input->post('organico');
		$dados['mineral'] = $this->input->post('mineral');
		$dados['palha'] = $this->input->post('palha');
		$dados['outro'] = $this->input->post('outro');
		$dados['obs'] = $this->input->post('obs');

		// Configuração para upload do arquivo
		$config['upload_path'] = './uploads/documentos_controle/';
		$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png'; // Tipos permitidos
		$config['max_size'] = 12048; // Tamanho máximo em KB (12MB)
		$config['encrypt_name'] = true; // Renomear o arquivo para um nome único

		// Criar o diretório se não existir
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0755, true);
		}

		$this->load->library('upload', $config);

		if (!empty($_FILES['arquivo']['name'])) {
			if ($this->upload->do_upload('arquivo')) {
				$uploadData = $this->upload->data();
				$dados['arquivo'] = $uploadData['file_name']; // Nome do arquivo salvo

				// Se for edição, excluir o arquivo anterior
				if ($id) {
					$controle_atual = $this->P_controle_qualidade_model->buscar_por_id($id); // Função que busca o registro pelo ID
					if (!empty($controle_atual['arquivo']) && file_exists($config['upload_path'] . $controle_atual['arquivo'])) {
						unlink($config['upload_path'] . $controle_atual['arquivo']); // Remove o arquivo antigo
					}
				}
			} else {
				// Retorna mensagem de erro em caso de falha no upload
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('P_controle_qualidade/inicio/');
				return;
			}
		} elseif ($id) {
			// Caso seja edição e nenhum arquivo novo seja enviado, mantém o arquivo anterior
			$controle_atual = $this->P_controle_qualidade_model->buscar_por_id($id);
			$dados['arquivo'] = isset($controle_atual['arquivo']) ? $controle_atual['arquivo'] : null;
		}

		// Salvar ou atualizar no banco
		if ($id) {
			$this->P_controle_qualidade_model->edita_controle_producao($dados, $id);
		} else {
			$this->P_controle_qualidade_model->inserir_controle_producao($dados);
		}

		// Redirecionar após o salvamento
		redirect('P_controle_qualidade/inicio/');
	}


	public function deleta_controle()
	{

		$this->load->model('P_controle_qualidade_model');

		$id = $this->uri->segment(3);

		$this->P_controle_qualidade_model->deleta_controle($id);

		redirect('P_controle_qualidade/inicio/');

	}
}