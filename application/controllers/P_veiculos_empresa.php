<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_veiculos_empresa extends CI_Controller
{

	public function index()
	{

		$this->load->model('P_veiculos_empresa_model');

		$data['veiculos'] = $this->P_veiculos_empresa_model->recebe_veiculos();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/exibir_veiculos_empresa');
		$this->load->view('petrofertil/footer');
	}

	public function detalhe_veiculo()
	{

		$this->load->model('Veiculos_model');

		$id = $this->uri->segment(3);

		$data['veiculo'] = $this->Veiculos_model->recebe_veiculo($id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/detalhe_veiculo');
		$this->load->view('admin/footer');
	}


	public function formulario_veiculos()
	{

		$this->load->model('P_veiculos_empresa_model');

		$id = $this->uri->segment(3);

		$data['veiculo'] = $this->P_veiculos_empresa_model->recebe_veiculo($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_cadastro_veiculos');
		$this->load->view('petrofertil/footer');
	}

	public function cadastrar_veiculo()
	{
		$this->load->model('P_veiculos_empresa_model');

		$id = $this->input->post('id');

		// Dados do formulário
		$dados['modelo'] = $this->input->post('modelo');
		$dados['placa'] = $this->input->post('placa');

		// Carregar detalhes do veículo atual (se for edição)
		$veiculo_atual = $this->P_veiculos_empresa_model->get_veiculo_by_id($id);

		// Configurações de upload de arquivos
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';  // Tipos de arquivos permitidos
		$config['max_size'] = 2048; // Tamanho máximo de 2MB

		$this->load->library('upload', $config);

		// Upload do documento
		if (!empty($_FILES['documento']['name'])) {
			$config['upload_path'] = './uploads/documentos_veiculos/';
			$this->upload->initialize($config);
			if ($this->upload->do_upload('documento')) {
				// Apaga o documento antigo, se houver
				if (!empty($veiculo_atual['DOCUMENTO']) && file_exists('./uploads/documentos_veiculos/' . $veiculo_atual['DOCUMENTO'])) {
					unlink('./uploads/documentos_veiculos/' . $veiculo_atual['DOCUMENTO']);
				}
				$dados['DOCUMENTO'] = $this->upload->data('file_name');
			} else {
				// Exibe erro caso o upload falhe
				echo $this->upload->display_errors();
			}
		}

		// Upload da foto do veículo (ARQUIVO)
		if (!empty($_FILES['foto_veiculo']['name'])) {
			$config['upload_path'] = './uploads/veiculos/';
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto_veiculo')) {
				// Apaga a foto antiga, se houver
				if (!empty($veiculo_atual['ARQUIVO']) && file_exists('./uploads/veiculos/' . $veiculo_atual['ARQUIVO'])) {
					unlink('./uploads/veiculos/' . $veiculo_atual['ARQUIVO']);
				}
				$dados['ARQUIVO'] = $this->upload->data('file_name');
			} else {
				// Exibe erro caso o upload falhe
				echo $this->upload->display_errors();
			}
		}

		// Verifica se é uma edição ou um novo cadastro
		if ($id >= 1) {
			// Edição
			$this->P_veiculos_empresa_model->edita_veiculo($dados, $id);
		} else {
			// Novo cadastro
			$this->P_veiculos_empresa_model->inserir_veiculo($dados);
		}

		// Redireciona para a lista de veículos
		redirect('P_veiculos_empresa');
	}





	public function deleta_veiculo()
	{

		$id = $this->uri->segment(3);

		$this->load->model('P_veiculos_empresa_model');

		$this->P_veiculos_empresa_model->deleta_veiculo($id);

		redirect('P_veiculos_empresa');

	}


	public function download_documento()
	{

		$this->load->helper('download');

		$id = $this->uri->segment(3);


		$this->load->model('Veiculos_model');

		$veiculo = $this->Veiculos_model->recebe_veiculo($id);

		if ($veiculo['documento'] == '') {

			redirect('veiculos');

		}


		$arquivoPath = base_url('uploads/documentos_veiculos/') . $veiculo['documento'];

		$data = file_get_contents('uploads/documentos_veiculos/' . $veiculo['documento']); // Read the file's contents

		force_download($arquivoPath, $data);


	}




}
