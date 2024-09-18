<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_ordem_servico extends CI_Controller
{

	public function index()
	{
		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/ordens_servico');
		$this->load->view('petrofertil/footer');
	}


	public function mostrar_ordens()
	{

		$this->load->model('P_ordem_model');

		$data['ordens'] = $this->P_ordem_model->recebe_ordens();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/ver_ordens');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_ordem_veiculos()
	{

		$this->load->model('P_veiculos_empresa_model');
		$data['carros'] = $this->P_veiculos_empresa_model->recebe_veiculos();

		$this->load->model('P_oficinas_model');
		$data['oficinas'] = $this->P_oficinas_model->recebe_oficinas_nomes();

		$this->load->model('P_motoristas_model');
		$data['motoristas'] = $this->P_motoristas_model->recebe_motoristas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_ordem_veiculos');
		$this->load->view('petrofertil/footer');
	}


	public function gerador()
	{


		$this->load->model('P_ordem_model');

		$data['veiculo'] = $this->input->post('modelo');

		$data['placa'] = $this->input->post('placa');

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


		$numero = $this->P_ordem_model->localiza_codigo();

		if ($numero['id'] == "") {

			$numero['id'] = 0;
		}

		$data['codigo'] = $numero['id'] . date("d");

		$dados['codigo'] = $data['codigo'];

		$this->P_ordem_model->inserir_ordem($dados);

		$this->load->view('petrofertil/ordem_servico', $data);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("ordem_servico.pdf", array("Attachment" => 0));

		return ('p_manutencao');
	}

	public function rever_ordem()
	{


		$this->load->model('P_ordem_model');
		$this->load->model('P_veiculos_empresa_model');

		$id = $this->uri->segment(3);

		$ordem = $this->P_ordem_model->recebe_ordem_codigo($id);

		$placa = $ordem['placa'];

		$data['veiculo'] = $this->P_veiculos_empresa_model->recebe_veiculo_placa($placa);

		$data['motorista'] = $ordem['motorista'];

		$data['data_reclamacao'] = $ordem['data_reclamacao'];

		$data['oficina'] = $ordem['oficina'];

		$data['reclamacao'] = $ordem['reclamacao'];

		$data['data_ordem'] = $ordem['data_ordem'];


		$data['codigo'] = $ordem['codigo'];


		$this->load->view('petrofertil/ordem_servico', $data);
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
