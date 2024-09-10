<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eco extends CI_Controller
{

	public function index()
	{
		$this->load->view('financeiro/login_motoristas');
	}


	public function verifica_login() 
	{
		$this->load->model('Motoristasp_model');

		$login = strtolower($this->input->post('login'));
		$senha = $this->input->post('senha');

		$usuario = $this->Motoristasp_model->recebe_usuario($login);

		if ($senha == $usuario['senha'] and $senha != "") {

			$this->session->set_userdata('usuario', 'logado');
			$this->session->set_userdata('id_usuario', $usuario['id']);
			$this->session->set_userdata('nome_usuario', $usuario['nome']);
			$this->session->set_userdata('foto_perfil', $usuario['foto_perfil']);
			$this->session->set_userdata('funcao', $usuario['funcao']);

			redirect('eco/inicio');
		} else {

			$data['erro'] = '1';

			$this->load->view('financeiro/login_motoristas', $data);
		}
	}

	public function inicio()
	{

		$data['alerta'] = $this->uri->segment(3);

		$this->load->view('financeiro/header_motorista', $data);
		$this->load->view('financeiro/botoes_estoque');
		$this->load->view('financeiro/footer');
	}


	public function formulario_saida_motorista()
	{
		$this->load->model('Veiculos_model');
		
		$id = $this->uri->segment(3);

		$this->load->model('F_saida_motoristas_model');



		$data['saida'] = $this->F_saida_motoristas_model->recebe_saida_edit($id);

		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();


		if ($id != '') {
			$this->load->view('financeiro/header', $data);
		} else {
			$this->load->view('financeiro/header_motorista', $data);
		}

		$this->load->view('financeiro/formulario_saida_motorista');
		$this->load->view('financeiro/footer');
	}

	public function formulario_volta_motorista()
	{

		$id = $this->uri->segment(3);

		$this->load->model('F_volta_motoristas_model');

		$data['volta'] = $this->F_volta_motoristas_model->recebe_volta_edit($id);

		
		if ($id != '') {
			$this->load->view('financeiro/header', $data);
		} else {
			$this->load->view('financeiro/header_motorista', $data);
		}

		$this->load->view('financeiro/formulario_volta_motorista');
		$this->load->view('financeiro/footer');
	}

	public function cadastra_saida_motorista()
	{

		$this->load->model('F_estoque_tambores_model');
		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');
		$this->load->model('F_saida_motoristas_model');
		$this->load->model('Motoristasp_model');

		$dados['data_saida'] = date('Y-m-d H:i:s');
		$dados['id_motorista'] = $this->input->post('id_motorista');
		$dados['tambor'] = $this->input->post('tambor');
		$dados['oleo'] = $this->input->post('oleo');
		$dados['detergente'] = $this->input->post('detergente');
		$dados['veiculo'] = $this->input->post('veiculo');
		$dados['quilometragem'] = $this->input->post('quilometragem');
		$dados['observacao'] = $this->input->post('observacao');

		$estoque_tambor = $this->F_estoque_tambores_model->recebe_estoque();
		$estoque_oleo = $this->F_estoque_oleo_model->recebe_estoque();
		$estoque_detergente = $this->F_estoque_detergente_model->recebe_estoque();

		$foto_saida = $_FILES['foto_saida'];

		$motorista =  $this->Motoristasp_model->recebe_motorista($dados['id_motorista']);

		if ($foto_saida['name'] != "") { //veio imagem

			$this->load->library('upload');

			$configuracao = array(
				'upload_path'   => './uploads/saida_motoristas/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			);

			$this->upload->initialize($configuracao);

			if ($this->upload->do_upload('foto_saida')) {

				$img = $this->upload->data();
				$dados['foto_saida'] = $img['file_name'];
			} else {
				echo $this->upload->display_errors();
			}
		};

		$id = $this->input->post('id');

		if ($id != '') {

			$saida = $this->F_saida_motoristas_model->recebe_saida_edit($id);

			$estoque_t['quantidade'] = $estoque_tambor['quantidade'] - $dados['tambor'] + $saida['tambor'];
			$estoque_o['quantidade'] = $estoque_oleo['quantidade'] - $dados['oleo'] + $saida['oleo'];
			$estoque_d['quantidade'] = $estoque_detergente['quantidade'] - $dados['detergente'] + $saida['detergente'];

			$motorista['oleo'] = $motorista['oleo'] - $dados['oleo'] + $saida['oleo'];
			$motorista['detergente'] = $motorista['detergente'] - $dados['detergente'] + $saida['detergente'];
			$motorista['tambor'] = $motorista['tambor'] - $dados['tambor'] + $saida['tambor'];
		} else {
			$estoque_t['quantidade'] = $estoque_tambor['quantidade'] - $dados['tambor'];
			$estoque_o['quantidade'] = $estoque_oleo['quantidade'] - $dados['oleo'];
			$estoque_d['quantidade'] = $estoque_detergente['quantidade'] - $dados['detergente'];

			$motorista['oleo'] = $motorista['oleo'] + $dados['oleo'];
			$motorista['detergente'] = $motorista['detergente'] + $dados['detergente'];
			$motorista['tambor'] = $motorista['tambor'] + $dados['tambor'];
		}


		$this->F_estoque_detergente_model->atualiza_estoque($estoque_d);
		$this->F_estoque_oleo_model->atualiza_estoque($estoque_o);
		$this->F_estoque_tambores_model->atualiza_estoque($estoque_t);


		$this->Motoristasp_model->edita_motorista($motorista, $dados['id_motorista']);

		if ($id != '') {

			$this->F_saida_motoristas_model->atualiza_saida($dados, $id);
			redirect('F_estoque_motoristas/inicio/editado');
		} else {

			$this->F_saida_motoristas_model->inserir_saida($dados);
			redirect('Eco/inicio/saida');
		}
	}

	public function cadastra_volta_motorista()
	{

		$this->load->model('F_estoque_tambores_model');
		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');
		$this->load->model('F_volta_motoristas_model');
		$this->load->model('Motoristasp_model');

		$id = $this->input->post('id');

		if ($id == '') {
			$dados['data_volta'] = date('Y-m-d H:i:s');
		}

		$dados['id_motorista'] = $this->input->post('id_motorista');
		$dados['quantidade_tambor'] = $this->input->post('quantidade_tambor');
		$dados['quantidade_oleo'] = $this->input->post('quantidade_oleo');
		$dados['quantidade_detergente'] = $this->input->post('quantidade_detergente');
		$dados['quilometragem'] = $this->input->post('quilometragem');
		$dados['observacao'] = $this->input->post('observacao');
		
		$estoque_tambor = $this->F_estoque_tambores_model->recebe_estoque();
		$estoque_oleo = $this->F_estoque_oleo_model->recebe_estoque();
		$estoque_detergente = $this->F_estoque_detergente_model->recebe_estoque();

		$foto_volta = $_FILES['foto_volta'];

		if ($id != '') {
			 
			$volta = $this->F_volta_motoristas_model->recebe_volta_edit($id);
			$motorista =  $this->Motoristasp_model->recebe_motorista($volta['id_motorista']);
		}else{
			$motorista =  $this->Motoristasp_model->recebe_motorista($dados['id_motorista']);
		}


		if ($id == '') {
			$dados['volta_tambor'] = $motorista['tambor'] - $dados['quantidade_tambor'];
			$dados['volta_detergente'] = $motorista['detergente'] - $dados['quantidade_detergente'];
			$dados['volta_oleo'] = $motorista['oleo'] - $dados['quantidade_oleo'];
		}


		if ($foto_volta['name'] != "") { //veio imagem

			$this->load->library('upload');

			$configuracao = array(
				'upload_path'   => './uploads/volta_motoristas/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			);

			$this->upload->initialize($configuracao);

			if ($this->upload->do_upload('foto_volta')) {

				$img = $this->upload->data();
				$dados['foto_volta'] = $img['file_name'];
			} else {
				echo $this->upload->display_errors();
			}
		};

		
		if ($id != '') {

			$estoque_t['quantidade'] = $estoque_tambor['quantidade'] + $dados['quantidade_tambor'] - $volta['volta_tambor'];
			$estoque_o['quantidade'] = $estoque_oleo['quantidade'] + $dados['quantidade_oleo'] - $volta['volta_oleo'];
			$estoque_d['quantidade'] = $estoque_detergente['quantidade'] + $dados['quantidade_detergente'] - $volta['volta_detergente'];

			$motorista['oleo'] = $motorista['oleo'] + $dados['quantidade_oleo'] - $volta['volta_oleo'];
			$motorista['detergente'] = $motorista['detergente'] + $dados['quantidade_detergente'] - $volta['volta_detergente'];
			$motorista['tambor'] = $motorista['tambor'] + $dados['quantidade_tambor'] - $volta['volta_tambor'];

		} else {


			$estoque_t['quantidade'] = $estoque_tambor['quantidade'] + $dados['volta_tambor'];
			$estoque_o['quantidade'] = $estoque_oleo['quantidade'] + $dados['volta_oleo'];
			$estoque_d['quantidade'] = $estoque_detergente['quantidade'] + $dados['volta_detergente'];

			$motorista['oleo'] = $motorista['oleo'] - $dados['volta_oleo'] - $dados['quantidade_oleo'];
			$motorista['detergente'] = $motorista['detergente'] - $dados['volta_detergente'] - $dados['quantidade_detergente'];
			$motorista['tambor'] = $motorista['tambor'] - $dados['volta_tambor'] - $dados['quantidade_tambor'];
		}


		$this->F_estoque_detergente_model->atualiza_estoque($estoque_d);
		$this->F_estoque_oleo_model->atualiza_estoque($estoque_o);
		$this->F_estoque_tambores_model->atualiza_estoque($estoque_t);




		if ($id != '') {

			$dados['volta_tambor'] = $dados['quantidade_tambor'];
			$dados['volta_oleo'] = $dados['quantidade_oleo'];
			$dados['volta_detergente'] = $dados['quantidade_detergente'];
			
			$dados['quantidade_tambor'] = $volta['quantidade_tambor'];
			$dados['quantidade_oleo'] = $volta['quantidade_oleo'];
			$dados['quantidade_detergente'] = $volta['quantidade_detergente'];

			$this->F_volta_motoristas_model->atualiza_volta($dados, $id);
			redirect('F_estoque_motoristas/inicio/editado');
		} else {

			$this->Motoristasp_model->edita_motorista($motorista, $dados['id_motorista']);


			$this->F_volta_motoristas_model->inserir_volta($dados);
			redirect('Eco/inicio/volta');
		}
	}

	public function historico_motorista($id)
	{

		$this->load->model('F_saida_motoristas_model');
		$this->load->model('F_volta_motoristas_model');


		$id = $this->uri->segment(3);

		
		$id_saida = $this->F_saida_motoristas_model->recebe_saida($id);

		$data['saida'] = $this->F_saida_motoristas_model->recebe_saida_edit($id_saida['id']);


		$data['volta'] = $this->F_volta_motoristas_model->recebe_volta($id);

		

		$this->load->view('financeiro/header_motorista', $data);
		$this->load->view('financeiro/historico_motorista');
		$this->load->view('financeiro/footer');
	}

	public function historico_saida_motorista($id)
	{

		$this->load->model('F_saida_motoristas_model');
		$this->load->model('F_volta_motoristas_model');


		$id = $this->uri->segment(3);


		$data['saidas'] = $this->F_saida_motoristas_model->recebe_saida_motorista($id);

	

		$this->load->view('financeiro/header_motorista', $data);
		$this->load->view('financeiro/historico_volta_motorista');
		$this->load->view('financeiro/footer');
	}
}
