<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_solicitacoes_servico extends CI_Controller
{

	public function pagina_solicitacao()
	{

		$this->load->model('F_solicitacoes_trello_model');

		$data['solicitacoes'] = $this->F_solicitacoes_trello_model->recebe_solicitacoes();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/solicitacoes_trello');
		$this->load->view('financeiro/footer');
	}

	public function formulario_solicitacao()
	{

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/solicitacoes_servico');
		$this->load->view('financeiro/footer');
	}

	public function deleta_solicitacao_trello($id)
	{

		$this->load->model('F_solicitacoes_trello_model');

		$id = $this->uri->segment(3);

		$this->F_solicitacoes_trello_model->deleta_solicitacao_trello($id);

		redirect('F_solicitacoes_servico/pagina_solicitacao');
	}


	public function enviar_trello()
	{

		$this->load->model('F_solicitacoes_trello_model');

		//$data será para fazer upload no banco de dados
		$data['name'] = $this->input->post('name');
		$data['descricao'] = $this->input->post('desc');
		$data['tipo'] = $this->input->post('tipo');
		$data['data_solicitacao'] = date('Y/m/d H:i:s');

		//$dados será utilizado para o curl, e registrar no trello
		$dados['token'] = '68f210490234e6a4d8d919b5cb0a8d697c99547f03e35d3aab180d2d2d4b6700';
		$dados['key'] = '7b97618ecb391225b2cd8963d3b8b10b';
		$dados['name'] = $this->input->post('name');
		$dados['desc'] = $this->input->post('desc');
		$tipo = $this->input->post('tipo');

		//Verifica qual tabela deve ser feito o registro
		switch ($tipo) {
			case '0':

				$dados['idList'] = '63235840b80bd800ed137b82';

				break;

			case '1':

				$dados['idList'] = '632472c5b9342400458d5d7e';

				break;
		}

		//Chamando API e utilizando o curl para consumir a API
		$ch = curl_init('https://api.trello.com/1/cards');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);


		$this->F_solicitacoes_trello_model->inserir_solicitacao($data); //insere $data no banco de dados

		redirect('F_solicitacoes_servico/pagina_solicitacao/servicos');
	}


	public function inicio()
	{
		$this->load->model('Motoristasp_model');

		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/solicitacoes_servico');
		$this->load->view('financeiro/footer');
	}

	public function ver_perfil()
	{

		$this->load->model('Motoristasp_model');

		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/perfil_petroecol');
		$this->load->view('financeiro/footer');
	}


	public function formulario_usuario()
	{
		$this->load->model('Motoristasp_model');

		$id = $this->uri->segment(3);

		$data['motorista'] = $this->Motoristasp_model->recebe_motorista($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_usuario_motorista');
		$this->load->view('financeiro/footer');
	}


	public function formulario_solicitacao_servico()
	{

		$this->load->model('F_funcionarios_model');

		$id = $this->uri->segment(3);

		$data['funcionario'] = $this->F_funcionarios_model->recebe_funcionario($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_solicitacao_servico');
		$this->load->view('financeiro/footer');
	}


	public function criar_solicitacao()
	{
		$this->load->model('F_solicitacao_servico_model');

		$id_funcionario = $this->input->post('id_funcionario');

		$dados['solicitante'] = $this->input->post('solicitante');
		$dados['para'] = $this->input->post('para');
		$dados['titulo'] = $this->input->post('titulo');
		$dados['descricao'] = $this->input->post('descricao');
		$dados['data_conclusao'] = $this->input->post('data_conclusao');
		$dados['status'] = 1;

		$this->F_solicitacao_servico_model->inserir_solicitacao($dados);

		redirect('f_funcionarios/ver_funcionario/' . $id_funcionario);
	}

	public function finaliza_servico()
	{
		$this->load->model('F_solicitacao_servico_model');

		$id = $this->uri->segment(3);

		$id_funcionario = $this->uri->segment(4);

		$dados['status'] = 2;

		$this->F_solicitacao_servico_model->atualiza_status_servico($dados, $id);

		redirect('f_funcionarios/ver_funcionario/' . $id_funcionario);
	}


	public function volta_servico()
	{
		$this->load->model('F_solicitacao_servico_model');

		$id = $this->uri->segment(3);

		$id_funcionario = $this->uri->segment(4);

		$dados['status'] = 1;

		$this->F_solicitacao_servico_model->atualiza_status_servico($dados, $id);

		redirect('f_funcionarios/ver_funcionario/' . $id_funcionario);
	}
}
