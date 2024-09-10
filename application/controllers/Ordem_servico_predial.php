<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ordem_servico_predial extends CI_Controller
{


	public function mostrar_ordens()
	{

		$this->load->model('ordem_predial_model');

		$data['ordens'] = $this->ordem_predial_model->recebe_ordens();

		$data['aviso'] = $this->uri->segment(3);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/mostrar_ordens_predial');
		$this->load->view('admin/footer');
	}

	public function formulario_servico()
	{

		$this->load->model('Veiculos_model');
		$this->load->model('Oficinas_model');
		$this->load->model('Motoristasp_model');
		$this->load->model('F_fornecedores_model');
		
		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();	

		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$data['placa'] = $this->uri->segment(3);

		$data['oficinas'] = $this->Oficinas_model->recebe_oficinas();

		$data['carros'] = $this->Veiculos_model->recebe_veiculos();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_servico_predial');
		$this->load->view('admin/footer');
	}


	public function gerador()
	{

		$this->load->model('ordem_predial_model');
		$this->load->model('F_fornecedores_model');

		$data['codigo'] = date('mdhs');
		$data['responsavel'] = $this->input->post('responsavel');
		$data['data_ordem'] = $this->input->post('data_ordem');
		$data['reclamacao'] = $this->input->post('reclamacao');
		$id_empresa = $this->input->post('empresa');

		$dados['empresa'] = $this->F_fornecedores_model->recebe_fornecedor($id_empresa);

		$data['empresa'] = $dados['empresa']['nome'];

		$this->ordem_predial_model->inserir_ordem($data);

		$data['empresa'] = $dados['empresa'];

		$this->load->view('admin/ordem_predial', $data);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("ordem_servico_predial.pdf", array("Attachment" => 0));
		
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

	public function deleta_ordem_predial()
	{
		$this->load->model('ordem_predial_model');

		$id = $this->uri->segment(3);

		$aviso = 'deletado';

		$this->ordem_predial_model->deleta_ordem_predial($id);

		redirect('Ordem_servico_predial/mostrar_ordens/'.$aviso);

	}
}
