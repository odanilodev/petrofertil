<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_veiculos extends CI_Controller
{

	public function inicio()
	{

		$this->load->model('Veiculos_model');

		$data['carros'] = $this->Veiculos_model->recebe_veiculos();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/exibir_veiculos');
		$this->load->view('financeiro/footer');
	}

	public function exibir_combustivel()
	{
		$placa = $this->uri->segment(3);

		$this->load->model('Combustivel_model');

		$data['placa'] = $placa;

		$data['combustivel'] = $this->Combustivel_model->recebe_combustivel($placa);



		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_combustivel');
		$this->load->view('financeiro/footer');
	}


	public function exibir_combustivel_filtrado()
	{
		$placa = $this->uri->segment(3);

		$this->load->model('Combustivel_model');

		$data_final = $this->input->post('data_inicial');
		$data_inicial = $this->input->post('data_final');

		$data['placa'] = $placa;

		$data['combustivel'] = $this->Combustivel_model->filtra_combustivel($placa, $data_final, $data_inicial);



		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_combustivel');
		$this->load->view('financeiro/footer');
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

		$this->load->model('Veiculos_model');

		$id = $this->uri->segment(3);

		$data['veiculo'] = $this->Veiculos_model->recebe_veiculo($id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_veiculos');
		$this->load->view('admin/footer');
	}

	public function cadastra_veiculos()
	{
		$this->load->library('upload');

		$this->load->model('Veiculos_model');

		$id = $this->input->post('id');

		$cadastro = $this->Veiculos_model->recebe_veiculo($id);

		$dados['modelo'] = $this->input->post('modelo');
		$dados['placa'] = $this->input->post('placa');
		$dados['litros'] = $this->input->post('litros');
		$dados['arquivo'] = $this->input->post('arquivo');
		$dados['documento'] = $this->input->post('documento');

		$arquivo = $_FILES['arquivo'];
		$documento = $_FILES['documento'];



		if ($arquivo['name'] != "") { //veio imagem


			if ($cadastro['arquivo'] != "") { // tem imagem no banco de dados?

				unlink("./uploads/" . $cadastro['arquivo']);
			}



			$this->load->library('upload');


			$configuracao = array(
				'upload_path'   => './uploads/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			);


			$this->upload->initialize($configuracao);

			if ($this->upload->do_upload('arquivo')) {

				$img = $this->upload->data();
				$dados['arquivo'] = $img['file_name'];
			} else {
				echo $this->upload->display_errors();
			}
		}




		if ($documento['name'] != "") { //veio imagem


			if ($cadastro['documento'] != "") { // tem imagem no banco de dados?

				unlink("./uploads/documentos_veiculos/" . $cadastro['documento']);
			}
			$this->load->library('upload');


			$configuracao = array(
				'upload_path'   => './uploads/documentos_veiculos/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			);


			$this->upload->initialize($configuracao);

			if ($this->upload->do_upload('documento')) {

				$nome = $this->upload->data();
				$dados['documento'] = $nome['file_name'];
			} else {
				echo $this->upload->display_errors();
			}
		}


		if ($id >= 1) {

			if ($arquivo['name'] == "") {

				$dados['arquivo'] = $cadastro['arquivo'];
			}

			if ($documento['name'] == "") {

				$dados['documento'] = $cadastro['documento'];
			}


			$this->Veiculos_model->edita_veiculo($dados, $id);
		} else {



			$this->Veiculos_model->inserir_veiculo($dados);
		}
	}


	public function deleta_veiculo()
	{

		$id = $this->uri->segment(3);

		$this->load->model('Veiculos_model');

		$veiculo = $this->Veiculos_model->recebe_veiculo($id);

		unlink("./uploads/" . $veiculo['arquivo']);
		unlink("./uploads/documentos_veiculos/" . $veiculo['documento']);

		$this->Veiculos_model->deleta_veiculo($id);
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

	public function ver_veiculo()
	{

		$this->load->model('Manutencao_model');

		$placa = $this->uri->segment(3);

		$data['manutencao'] = $this->Manutencao_model->recebe_detalhe($placa);

		$data['placa'] = $placa;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/detalhe_veiculo');
		$this->load->view('financeiro/footer');
	}

	public function ver_veiculo_filtrado()
	{

		$this->load->model('Manutencao_model');

		$placa = $this->uri->segment(3);

		$data['placa'] = $placa;
		
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$data['manutencao'] = $this->Manutencao_model->filtra_manutencao($placa, $data_inicial, $data_final);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/detalhe_veiculo');
		$this->load->view('financeiro/footer');
	}

	public function ver_geral_veiculos()
	{

		$this->load->model('Manutencao_model');

		$data_inicial = date('Y-m-01');
		$data_final = date('Y-m-d');

		$data['alerta'] = $this->uri->segment(3);

		$data['manutencao'] = $this->Manutencao_model->recebe_manutencoes_mensal($data_final, $data_inicial);
		
		$data['data_inicial'] = $data_inicial;
		$data['data_final'] = $data_final;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/manutencao_geral_veiculos');
		$this->load->view('financeiro/footer');
	}

	public function ver_geral_veiculos_filtrado()
	{

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$this->load->model('Manutencao_model');

		$data['manutencao'] = $this->Manutencao_model->recebe_manutencoes_mensal($data_final, $data_inicial);

		if(empty($data['manutencao'])){

			redirect('F_veiculos/ver_geral_veiculos/nao_encontrado');

		}

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/manutencao_geral_veiculos');
		$this->load->view('financeiro/footer');
	}



	public function ver_manutencao()
	{

		$this->load->model('Manutencao_model');

		$this->load->model('Oficinas_model');

		$id = $this->uri->segment(3);

		$data['manutencao'] = $this->Manutencao_model->recebe_manutencao($id);


		$oficina = $data['manutencao']['oficina'];

		$data['oficina'] = $this->Oficinas_model->localiza_oficina($oficina);


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_mais');
		$this->load->view('financeiro/footer');
	}
}
