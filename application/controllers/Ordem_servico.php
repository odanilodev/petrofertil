<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ordem_servico extends CI_Controller
{

	public function index()
	{
		$this->load->view('admin/ordem_servico');
	}


	public function mostrar_ordens()
	{

		$this->load->model('Ordem_model');

		$data['ordens'] = $this->Ordem_model->recebe_ordens();


		$this->load->view('admin/header', $data);
		$this->load->view('admin/mostrar_ordens');
		$this->load->view('admin/footer');
	}

	public function formulario_servico()
	{

		$this->load->model('Veiculos_model');

		$this->load->model('Oficinas_model');

		$this->load->model('Motoristasp_model');


		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$data['placa'] = $this->uri->segment(3);

		$data['oficinas'] = $this->Oficinas_model->recebe_oficinas();

		$data['carros'] = $this->Veiculos_model->recebe_veiculos();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_servico');
		$this->load->view('admin/footer');
	}


	public function gerador()
	{

		$this->load->model('Veiculos_model');

		$this->load->model('Ordem_model');


		$placa = $this->input->post('placa');

		$data['veiculo'] = $this->Veiculos_model->recebe_veiculo_placa($placa);

		$dados['placa'] = $placa;

		$dados['status'] = 1;

		$dados['motorista'] = $this->input->post('motorista');

		$dados['data_reclamacao'] = $this->input->post('data_reclamacao');

		$dados['data_ordem'] = $this->input->post('data_ordem');

		$dados['oficina'] = $this->input->post('oficina');

		$dados['reclamacao'] = $this->input->post('reclamacao');

		$data['motorista'] = $this->input->post('motorista');

		$data['data_reclamacao'] = $this->input->post('data_reclamacao');

		$data['data_ordem'] = $this->input->post('data_ordem');

		$data['oficina'] = $this->input->post('oficina');

		$data['reclamacao'] = $this->input->post('reclamacao');


		$numero = $this->Ordem_model->localiza_codigo();


		if ($numero['id'] == "") {

			$numero['id'] = 0;
		}

		$data['codigo'] = $numero['id'] . date("d");

		$dados['codigo'] = $data['codigo'];

		$this->Ordem_model->inserir_ordem($dados);

		$this->load->view('admin/ordem_servico', $data);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("ordem_servico.pdf", array("Attachment" => 0));

		return ('admin/inicio');
	}

	public function rever_ordem()
	{

		$this->load->model('Veiculos_model');

		$this->load->model('Ordem_model');

		$id = $this->uri->segment(3);

		$ordem = $this->Ordem_model->recebe_ordem_codigo($id);

		if ($id == 0) {

			redirect('manutencoes');
		}


		$placa = $ordem['placa'];

		$data['veiculo'] = $this->Veiculos_model->recebe_veiculo_placa($placa);



		$data['motorista'] = $ordem['motorista'];


		$data['data_reclamacao'] = $ordem['data_reclamacao'];

		$data['oficina'] = $ordem['oficina'];

		$data['reclamacao'] = $ordem['reclamacao'];

		$data['data_ordem'] = $ordem['data_ordem'];


		$data['codigo'] = $ordem['codigo'];


		$this->load->view('admin/ordem_servico', $data);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("ordem_servico.pdf", array("Attachment" => 1));
	}


	public function atualiza_status()
	{
		$id = $this->uri->segment(3);

		$this->load->model('Ordem_model');

		$data = $this->Ordem_model->recebe_ordem($id);

		$data['status'] = 0;

		$this->Ordem_model->edita_ordem($data, $id);
	}
}
