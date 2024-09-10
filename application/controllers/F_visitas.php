<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_visitas extends CI_Controller
{

	public function inicio()
	{

		$this->load->model('F_visita_model');


		$data['pagina'] = $this->uri->segment(3);

		$data['visitas'] = $this->F_visita_model->recebe_visitas();


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visitas');
		$this->load->view('financeiro/footer');
	}


	public function lancar_visita()
	{

		$this->load->model('F_visita_model');
		$this->load->model('Veiculos_model');
		$this->load->model('Motoristasp_model');

		$id = $this->uri->segment(3);

		$data['visita'] = $this->F_visita_model->seleciona_visita($id);

		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_visitas');
		$this->load->view('financeiro/footer');
	}



	public function inserir_visita()
	{

		$this->load->model('F_visita_model');

		$id = $this->input->post('id');

		$dados['veiculo'] = $this->input->post('veiculo');
		$dados['data_visita'] = $this->input->post('data_visita');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['motorista'] = $this->input->post('motorista');
		$dados['litragem'] = $this->input->post('litragem');
		$dados['visitas'] = $this->input->post('visitas');
		$dados['oque'] = $this->input->post('oque');

		$dados['clientes'] = $this->input->post('clientes') == '' ?  0 : $this->input->post('clientes');
		$dados['alimentacao'] = $this->input->post('alimentacao') == '' ?  0 : $this->input->post('alimentacao');
		$dados['combustivel'] = $this->input->post('combustivel') == '' ?  0 : $this->input->post('combustivel');
		$dados['estacionamento'] = $this->input->post('estacionamento') == '' ?  0 : $this->input->post('estacionamento');
		$dados['pedagio'] = $this->input->post('pedagio') == '' ?  0 : $this->input->post('pedagio');
		$dados['detergente'] = $this->input->post('detergente') == '' ?  0 : $this->input->post('detergente');
		$dados['oleo'] = $this->input->post('oleo') == '' ?  0 : $this->input->post('oleo');
		$dados['outros'] = $this->input->post('outros') == '' ?  0 : $this->input->post('outros');

		$dados['gasto'] = $dados['clientes'] + $dados['alimentacao'] + $dados['combustivel'] + $dados['estacionamento'] + $dados['pedagio'] + $dados['detergente'] + $dados['oleo'] + $dados['outros'];


		if ($id == '') {

			$this->F_visita_model->inserir_visita($dados);
			$dd['log_acao'] = 'inserir';
		} else {

			$this->F_visita_model->atualiza_visita($dados, $id);
			$dd['log_acao'] = 'atualizar';
		}

		// Log
		$this->load->model('F_log_model');
		//$dd['log_acao'] = 'inserir';
		$dd['log_dados'] = json_encode($dados);
		$this->F_log_model->set_log($dd);
		// Fim Log



		redirect('f_visitas/inicio');
	}

	public function visualizar_custos()
	{

		$this->load->model('F_visita_model');

		$id = $this->uri->segment(3);

		$data['visita'] = $this->F_visita_model->seleciona_visita($id);


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visualizar_custos_visitas');
		$this->load->view('financeiro/footer');
	}


	public function filtra_visitas()
	{

		$this->load->model('F_visita_model');

		$data['pagina'] = 16;

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$motorista = $this->input->post('motorista');


		if ($data_final == '' or $data_inicial == '') {

			redirect('F_visitas/inicio/erro');
		}

		if ($motorista != '') {
			$data['visitas'] = $this->F_visita_model->filtra_visita_motorista($data_inicial, $data_final, $motorista);
		} else {
			$data['visitas'] = $this->F_visita_model->filtra($data_inicial, $data_final);
		}



		$data['status_filtrado'] = 'filtrado';

		if (empty($data['visitas'])) {

			redirect('F_visitas/inicio/erro');
		};


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visitas');
		$this->load->view('financeiro/footer');
	}

	public function visita_motorista()
	{
		$this->load->model('F_visita_model');
		$this->load->model('Motoristasp_model');


		$id = $this->uri->segment(3);

		$recebe_motorista = $this->Motoristasp_model->recebe_motorista($id);

		$motorista = $recebe_motorista['nome'];

		$data['visitas'] = $this->F_visita_model->recebe_visitas_motorista($motorista);

		$data['motorista'] = $motorista;


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visitas');
		$this->load->view('financeiro/footer');
	}


	public function deleta_visita()
	{

		$this->load->model('F_visita_model');

		$id = $this->uri->segment(3);

		$this->F_visita_model->deleta_visita($id);
	}
}
