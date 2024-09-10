<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_motoristas extends CI_Controller
{


	public function index()
	{
		$this->load->model('P_motoristas_model');

		$data['motoristas'] = $this->P_motoristas_model->recebe_motoristas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/motoristas');
		$this->load->view('petrofertil/footer');
	}

	public function ver_motorista()
	{

		$id = $this->uri->segment(3);

		$this->load->model('P_motoristas_model');

		$data['motorista'] = $this->P_motoristas_model->recebe_motorista($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/ver_motorista');
		$this->load->view('petrofertil/footer');
	}

	public function recebe_motoristas_transportador_veiculos()
	{

		$this->load->model('P_motoristas_model');
		$this->load->model('P_transportadores_model');
		$this->load->model('P_veiculos_model');

		$nome_transportador = $this->input->post('nome_transportador');

		$transportador = $this->P_transportadores_model->recebe_transportador_nome($nome_transportador);

		$motoristas = $this->P_motoristas_model->recebe_motoristas_transportador($nome_transportador);

		$veiculos = $this->P_veiculos_model->recebe_veiculos_transportador($transportador['id']);

		$option = '';
		$option_veiculo = '';

		$option .= '<option disabled>Selecione o motorista</option>';
		foreach ($motoristas as $motorista) {
			$option .= "<option class='' value='" . $motorista['nome'] . "'>" . $motorista['nome'] . "</option>";
		}


		$option_veiculo .= '<option disabled>Selecione a placa</option>';
		foreach ($veiculos as $veiculo) {
			$option_veiculo .= "<option class='' value='" . $veiculo['placa'] . "'>" . $veiculo['modelo'] . ' / ' . $veiculo['placa'] . "</option>";
		}


		$response = array(
			'option_motorista' => $option,
			'option_veiculo' => $option_veiculo,

		);

		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function formulario_motoristas()
	{
		$id = $this->uri->segment(3);

		$this->load->model('P_motoristas_model');

		$this->load->model('P_transportadores_model');

		$data['transportadores'] = $this->P_transportadores_model->recebe_transportadores();

		$data['motorista'] = $this->P_motoristas_model->recebe_motorista($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_motoristas');
		$this->load->view('petrofertil/footer');
	}


	public function cadastra_motorista()
	{
		$this->load->library('upload');

		$this->load->model('P_motoristas_model');

		$id = $this->input->post('id');


		$dados['nome'] = $this->input->post('nome');
		$dados['nome_antt'] = $this->input->post('nome_antt');
		$dados['transportador'] = $this->input->post('transportador');
		$dados['antt'] = $this->input->post('antt');
		$dados['placa'] = $this->input->post('placa');
		$dados['nome_conta'] = $this->input->post('nome_conta');
		$dados['agencia'] = $this->input->post('agencia');
		$dados['conta'] = $this->input->post('conta');
		$dados['cpf'] = $this->input->post('cpf');
		$dados['data_cadastro'] = date('d-m-y');

		$dados['cnh'] = $this->input->post('cnh');
		$dados['documento'] = $this->input->post('documento');

		$cnh = $_FILES['cnh'];
		//$documento = $_FILES['documento'];


		if ($cnh['name'] != "") { //veio imagem


			$this->load->library('upload');


			$configuracao = array(
				'upload_path' => './uploads/cnh/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			);


			$this->upload->initialize($configuracao);

			if ($this->upload->do_upload('cnh')) {

				$img = $this->upload->data();
				$dados['cnh'] = $img['file_name'];

			} else {
				echo $this->upload->display_errors();
			}

		}
		;



		if ($id > 0) {
			$this->P_motoristas_model->edita_motorista($dados, $id);
		} else {
			$this->P_motoristas_model->inserir_motorista($dados);
		}

		redirect("P_motoristas");


	}


	public function download_documento()
	{


		$this->load->helper('download');

		$arquivo = $this->uri->segment(3);

		$arquivoPath = base_url('uploads/documento/') . $arquivo;

		$data = file_get_contents('uploads/documento/' . $arquivo); // Read the file's contents

		force_download($arquivoPath, $data);


	}

	public function download_cnh()
	{


		$this->load->helper('download');

		$arquivo = $this->uri->segment(3);

		$arquivoPath = base_url('uploads/cnh/') . $arquivo;

		$data = file_get_contents('uploads/cnh/' . $arquivo); // Read the file's contents

		force_download($arquivoPath, $data);


	}

	public function recebe_motoristas_nome()
	{

		$this->load->model('P_motoristas_model');

		$motoristas = $this->P_motoristas_model->recebe_motoristas_nome();

		echo json_encode($motoristas);

	}

	public function deleta_motorista()
	{

		$id = $this->uri->segment(3);

		$this->load->model('P_motoristas_model');

		$veiculo = $this->P_motoristas_model->recebe_motorista($id);

		if ($veiculo[['documento']]) {
			unlink("./uploads/documento/" . $veiculo['documento']);
		}

		if ($veiculo[['cnh']]) {
			unlink("./uploads/cnh/" . $veiculo['cnh']);
		}

		$this->P_motoristas_model->deleta_motorista($id);

	}

}
