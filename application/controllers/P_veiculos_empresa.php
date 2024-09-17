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

		$dados['modelo'] = $this->input->post('modelo');
		$dados['placa'] = $this->input->post('placa');

		if ($id >= 1) {

			$this->P_veiculos_empresa_model->edita_veiculo($dados, $id);

		} else {

			$this->P_veiculos_empresa_model->inserir_veiculo($dados);
		}

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
