<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_controle_qualidade extends CI_Controller
{

	public function inicio()
	{

		$this->load->model('P_controle_qualidade_model');

		$data['producao'] = $this->P_controle_qualidade_model->recebe_controle_producao();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/controle_qualidade');
		$this->load->view('petrofertil/footer');
	}

	public function filtra_destinacao_gera()
	{
		$this->load->model('Destinacao_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$data['destinacoes'] = $this->Destinacao_model->recebe_filtro_destinacoes_geral($data_inicial, $data_final);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/destinacao_geral');
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

		if ($id) {
			$this->P_controle_qualidade_model->edita_controle_producao($dados, $id);
		} else {
			$this->P_controle_qualidade_model->inserir_controle_producao($dados);

		}



		redirect('P_controle_qualidade/inicio/');
	}


	public function gera_destinacao()
	{

		$this->load->model('Clientesp_model');
		$this->load->model('Destinacao_model');
		$this->load->model('Certificado_model');

		$id = $this->input->post('id');

		$data_final = $this->input->post('data_final');
		$data_inicial = $this->input->post('data_inicial');

		$data['destinacao'] = $this->Destinacao_model->gera_destinacao($data_inicial, $data_final, $id);

		$contador = count($data['destinacao']);

		if ($contador == 0) {
			redirect('P_destinacao/inicio/' . $id . '/erro');
		}


		$dados['id_cliente'] = $id;
		$data['cliente'] = $this->Clientesp_model->recebe_cliente($id);
		$conteudo = $data['destinacao'];
		$dados['conteudo'] = json_encode($conteudo);
		$numero = $this->Certificado_model->localiza_numero();


		if ($numero['id'] == "") {

			$numero['id'] = 0;
		}

		$dados['numero'] = $numero['id'] . '/' . date("Y");


		$dados['data_cadastro'] = date('Y/m/d');
		$data['numero'] = $dados['numero'];


		$this->Certificado_model->inserir_certificado($dados);

		$this->load->view('admin/cert', $data);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("certificado.pdf", array("Attachment" => 1));
	}


	public function ver_certificado()
	{

		$this->load->model('Certificado_model');

		$this->load->model('Clientesp_model');


		$id = $this->uri->segment(3);



		$data['certificado'] = $this->Certificado_model->recebe_certificado($id);

		$id_cliente = $data['certificado']['id_cliente'];


		$data['cliente'] = $this->Clientesp_model->recebe_cliente($id_cliente);


		$this->load->view('admin/rever_certificado', $data);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("certificado.pdf", array("Attachment" => 1));
	}

	public function criar_certificado()
	{

		$this->load->model('Certificado_model');

		$this->load->model('Clientesp_model');


		$id = 581;



		$data['certificado'] = $this->Certificado_model->recebe_certificado($id);

		$id_cliente = $data['certificado']['id_cliente'];


		$data['cliente'] = $this->Clientesp_model->recebe_cliente($id_cliente);


		$this->load->view('admin/rever', $data);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);

		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("certificado.pdf", array("Attachment" => 1));
	}


	public function edita_destinacao()
	{

		$this->load->model('Destinacao_model');

		$id = $this->uri->segment(3);

		$data['destinacao'] = $this->Destinacao_model->recebe_destinacao($id);


		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/edita_destinacao');
		$this->load->view('petrofertil/footer');


	}


	public function atualiza_destinacao()
	{

		$this->load->model('Destinacao_model');

		$id = $this->input->post('id');

		$dados['id_cliente'] = $this->input->post('id_cliente');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['balanca'] = $this->input->post('balanca');
		$dados['nota'] = $this->input->post('nota');
		$dados['valor_frete'] = $this->input->post('valor_frete');
		$dados['plastico'] = $this->input->post('plastico');
		$dados['rafia'] = $this->input->post('rafia');
		$dados['valor_produto'] = $this->input->post('valor_produto');
		$dados['mtr'] = $this->input->post('mtr');
		$dados['data'] = $this->input->post('data');
		$dados['observacao'] = $this->input->post('observacao');
		$dados['custo'] = $this->input->post('custo');

		$this->Destinacao_model->atualiza_destinacao($id, $dados);

		redirect('P_destinacao/inicio/' . $dados['id_cliente']);

	}


	public function deleta_destinacao()
	{

		$this->load->model('Destinacao_model');

		$id = $this->uri->segment(3);

		$cliente = $this->uri->segment(4);

		$this->Destinacao_model->deleta_destinacao($id);

		redirect('P_destinacao/inicio/' . $cliente);

	}

	public function deleta_certificado()
	{

		$this->load->model('Destinacao_model');

		$id = $this->uri->segment(3);


		$cliente = $this->uri->segment(4);

		$this->Destinacao_model->deleta_certificado($id);

		redirect('P_destinacao/inicio/' . $cliente);
	}
}