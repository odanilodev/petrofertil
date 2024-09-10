<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_fluxo extends CI_Controller
{

	public function inicio()
	{
		$this->load->model('S_fluxo_model');

		$data['pagina'] = $this->uri->segment(3);

		$id_registro = $this->S_fluxo_model->recebe_id();

		
		$data['caixa'] = $this->S_fluxo_model->recebe_caixa($id_registro['id']);

		$data['fluxo'] = $this->S_fluxo_model->recebe_fluxo();

		

		$this->load->view('saulo/header', $data);
		$this->load->view('saulo/fluxo');
		$this->load->view('saulo/footer');
	}

	public function filtra_fluxo_geral()
	{
		$this->load->model('S_fluxo_model');


		$id_registro = $this->S_fluxo_model->recebe_id();

		$data['caixa'] = $this->S_fluxo_model->recebe_caixa($id_registro['id']);


	
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		$data['fluxo'] = $this->S_fluxo_model->recebe_fluxo_filtrado($data_inicial, $data_final);



		$this->load->view('saulo/header', $data);
		$this->load->view('saulo/fluxo');
		$this->load->view('saulo/footer');
	}


	public function lancar_entrada()
	{
		$this->load->model('F_fluxo_model');


		$this->load->view('saulo/header');
		$this->load->view('saulo/formulario_fluxo_entrada');
		$this->load->view('saulo/footer');

	}


	public function ver_insumo()
	{
		$this->load->model('F_fluxo_model');

		$id = $this->uri->segment(3);

		$data['insumo'] = $this->F_fluxo_model->seleciona_fluxo($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visualizar_insumo');
		$this->load->view('financeiro/footer');
	}


	public function lancar_saida()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');
		$this->load->model('F_fornecedores_model');

		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();	

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['micros'] = $this->F_micro_model->recebe_micros();

		$this->load->view('saulo/header');
		$this->load->view('saulo/formulario_fluxo_saida');
		$this->load->view('saulo/footer');
	}



	public function inserir_entrada()
	{

		$this->load->model('S_fluxo_model');
		
		$id_edita = $this->input->post('edita');

		$dados['data_registro'] = date('Y-m-d H:i:s');
		$dados['data_movimentacao'] = $this->input->post('data');
		
		$dados['valor'] = $this->input->post('valor');
		$dados['tipo'] = 'Entrada';
	
		$dados['observacao'] = $this->input->post('observacao');

		
		$id_registro = $this->S_fluxo_model->recebe_id();


		$caixa_atual = $this->S_fluxo_model->recebe_caixa($id_registro['id']);

		$caixa_novo = $caixa_atual['valor'];

		$valor = $dados['valor'];

		$data['valor'] = $caixa_novo + $valor;

		$data['data_caixa'] = $dados['data_movimentacao'];


		$this->S_fluxo_model->inserir_entrada_caixa($data);

		$this->S_fluxo_model->inserir_entrada_fluxo($dados);



		redirect('S_fluxo/inicio');
	}

	public function inserir_saida()
	{

		$this->load->model('S_fluxo_model');
		

		$dados['data_registro'] = date('Y-m-d H:i:s');
		$dados['data_movimentacao'] = $this->input->post('data_movimentacao');
		
		$dados['valor'] = $this->input->post('valor');
		$dados['tipo'] = 'Saida';
		$dados['tipo_despesa'] = $this->input->post('tipo_despesa');

		$dados['observacao'] = $this->input->post('observacao');

		
		$id_registro = $this->S_fluxo_model->recebe_id();


		$caixa_atual = $this->S_fluxo_model->recebe_caixa($id_registro['id']);

		$caixa_novo = $caixa_atual['valor'];

		$valor = $dados['valor'];

		$data['valor'] = $caixa_novo - $valor;

		$data['data_caixa'] = $dados['data_movimentacao'];


		$this->S_fluxo_model->inserir_entrada_caixa($data);

		$this->S_fluxo_model->inserir_entrada_fluxo($dados);



		redirect('S_fluxo/inicio');

	}


	public function deleta_movimentacao()
	{

		$this->load->model('S_fluxo_model');

		$id = $this->uri->segment(3);

		$this->S_fluxo_model->deleta_movimentacao($id);

		redirect('S_fluxo/inicio/');
	}


	
	public function deleta_movimentacao_estoque()
	{

		$this->load->model('S_fluxo_model');

		$id = $this->uri->segment(3);

		$id_registro = $this->S_fluxo_model->recebe_id();
		$caixa_atual = $this->S_fluxo_model->recebe_caixa($id_registro['id']);

		$movimentacao = $this->S_fluxo_model->recebe_movimentacao($id);

		
		
		$caixa_novo = $caixa_atual['valor'];

		$valor = $movimentacao['valor'];

		if($movimentacao['tipo'] == 'Entrada'){
			
			$data['valor'] = $caixa_novo - $valor;

		}else{
			$data['valor'] = $caixa_novo + $valor;
		}


		$data['data_caixa'] = $movimentacao['data_movimentacao'];

		$this->S_fluxo_model->inserir_entrada_caixa($data);

		$this->S_fluxo_model->deleta_movimentacao($id);

		redirect('S_fluxo/inicio/');
	}

	public function deleta_caixa_fluxo()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');

		$id = $this->uri->segment(3);

		$caixa = $this->F_caixa_model->recebe_caixa();

		$fluxo = $this->F_fluxo_model->seleciona_fluxo($id);


		if ($fluxo['empresa'] == 'Óleo') {

			$caixa = $this->F_caixa_model->recebe_caixa();
		} else {

			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
		}


		if ($fluxo['despesa'] == 'entrada' and $fluxo['empresa'] == 'Óleo') {

			$data['caixa'] = $caixa['caixa'] - $fluxo['valor'];


			$this->F_caixa_model->atualiza_caixa($data);
		}

		if ($fluxo['despesa'] != 'entrada' and $fluxo['empresa'] == 'Óleo') {

			$data['caixa'] = $caixa['caixa'] + $fluxo['valor'];

			$this->F_caixa_model->atualiza_caixa($data);
		}

		if ($fluxo['despesa'] == 'entrada' and $fluxo['empresa'] == 'Reciclagem') {


			$data['caixa'] = $caixa['caixa'] - $fluxo['valor'];

			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}

		if ($fluxo['despesa'] != 'entrada' and $fluxo['empresa'] == 'Reciclagem') {

			$data['caixa'] = $caixa['caixa'] + $fluxo['valor'];

			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}



		$this->F_fluxo_model->deleta_fluxo($id);

		redirect('F_fluxo/inicio/7');
	}

}
