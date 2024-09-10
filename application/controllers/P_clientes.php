<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_clientes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Login_model');
		$this->load->model('Clientesp_model');
	}

	public function teste()
	{
		$this->load->view('admin/cert');
	}

	public function index()
	{

		$data['clientes'] = $this->Clientesp_model->recebe_clientes();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/clientes_petro');
		$this->load->view('petrofertil/footer');

	}

	public function cadastra_cliente()
	{

		$this->load->model('Clientesp_model');

		$id = $this->uri->segment(3);

		$data['cliente'] = $this->Clientesp_model->recebe_cliente($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_clientes_petro');
		$this->load->view('petrofertil/footer');

	}

	public function ver_cliente()
	{

		$this->load->model('Clientesp_model');

		$id = $this->uri->segment(3);

		$data['cliente'] = $this->Clientesp_model->recebe_cliente($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/ver_cliente');
		$this->load->view('petrofertil/footer');

	}

	public function edita_cliente()
	{

		$this->load->model('Clientesp_model');

		$id = $this->uri->segment(3);

		$data['cliente'] = $this->Clientesp_model->recebe_cliente($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/edita_cliente');
		$this->load->view('petrofertil/footer');

	}

	public function insere_cliente()
	{

		$this->load->model('Clientesp_model');


		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['cnpj'] = $this->input->post('cnpj');
		$dados['inscricao'] = $this->input->post('inscricao');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['bairro'] = $this->input->post('bairro');
		$dados['estado'] = $this->input->post('estado');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['contato'] = $this->input->post('contato');
		$dados['localizacao'] = $this->input->post('localizacao');
		$dados['tipo_anexo'] = $this->input->post('tipo_anexo');

		$arquivo = $_FILES['arquivo'];



		if ($arquivo['name'] != "") { //veio imagem


			$this->load->library('upload');


			$configuracao = array(
				'upload_path' => './uploads/documentos_petrofertil/',
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
		;


		if ($id != '') {
			$this->Clientesp_model->atualiza_cliente($dados, $id);
			redirect('P_clientes');

		} else {
			$this->Clientesp_model->inserir_cliente($dados);
			redirect('P_clientes');
		}


	}


	public function download_arquivo()
	{

		$this->load->helper('download');

		$this->load->model('Clientesp_model');

		$id = $this->uri->segment(3);

		$cliente = $this->Clientesp_model->recebe_cliente($id);

		if ($cliente['arquivo'] == '') {

			redirect('Clientes_petro');

		}


		$arquivoPath = base_url('uploads/documentos_petrofertil/') . $cliente['arquivo'];

		$data = file_get_contents('uploads/documentos_petrofertil/' . $cliente['arquivo']); // Read the file's contents

		force_download($arquivoPath, $data);


	}


	public function painel()
	{

		$this->load->view('admin/header_petro');
		$this->load->view('admin/painel_dados');
		$this->load->view('admin/footer_petro');
	}

	public function recebe_clientes_nome()
	{

		$clientes = $this->Clientesp_model->recebe_clientes_nomes();

		echo json_encode($clientes);
	}

}