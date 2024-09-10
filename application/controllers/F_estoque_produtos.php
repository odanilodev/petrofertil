<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_produtos extends CI_Controller
{


	public function compra_inicio()
	{

		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');
		$this->load->model('F_estoque_produtos_model');

	
		$data['estoque_oleo'] = $this->F_estoque_oleo_model->recebe_estoque();
		$data['estoque_detergente'] = $this->F_estoque_detergente_model->recebe_estoque();

		$data['historico_compras'] = $this->F_estoque_produtos_model->recebe_historicos();


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/inicio_compra_estoque');
		$this->load->view('financeiro/footer');
	}

	public function descarte_inicio()
	{

		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');
		$this->load->model('F_estoque_produtos_model');

	
		$data['estoque_oleo'] = $this->F_estoque_oleo_model->recebe_estoque();
		$data['estoque_detergente'] = $this->F_estoque_detergente_model->recebe_estoque();

		$data['historico_descarte'] = $this->F_estoque_produtos_model->recebe_historicos_descarte();


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/inicio_descarte_estoque');
		$this->load->view('financeiro/footer');
	}

	public function adicionar_compra()
	{
		$this->load->model('Motoristasp_model');
	
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_compra_produto');
		$this->load->view('financeiro/footer');
	}

	public function adicionar_descarte()
	{
		$this->load->model('Motoristasp_model');
	
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_descarte_produto');
		$this->load->view('financeiro/footer');
	}


	public function deleta_compra()
	{
		$this->load->model('F_estoque_produtos_model');
	
		$id = $this->uri->segment(3);
		
		$this->F_estoque_produtos_model->deleta_compra($id);
		
		redirect('F_estoque_produtos/compra_inicio');
	}

	public function deleta_descarte()
	{
		$this->load->model('F_estoque_produtos_model');
	
		$id = $this->uri->segment(3);
		
		$this->F_estoque_produtos_model->deleta_descarte($id);
		
		redirect('F_estoque_produtos/descarte_inicio');
	}



	public function inserir_compra()
	{
		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');

		$this->load->model('F_estoque_produtos_model');


		$dados_oleo = $this->F_estoque_oleo_model->recebe_estoque();
		$dados_detergente = $this->F_estoque_detergente_model->recebe_estoque();


		$data['comprador'] = $this->input->post('comprador');
		$data['produto'] = $this->input->post('produto');
		$data['quantidade'] = $this->input->post('quantidade');
		$data['valor'] = $this->input->post('valor');
		$data['data_compra'] = $this->input->post('data_compra');




		if($data['produto'] == 'Óleo'){

			$dados_oleo['quantidade'] = $data['quantidade'] + $dados_oleo['quantidade'];

		
			$this->F_estoque_oleo_model->atualiza_estoque($dados_oleo);

		}else{

			$dados_detergente['quantidade'] = $data['quantidade'] + $dados_detergente['quantidade'];

			$this->F_estoque_detergente_model->atualiza_estoque($dados_detergente);

		}

		$this->F_estoque_produtos_model->inserir_compra($data);
		

		redirect('F_estoque_produtos/compra_inicio/');
	}

	public function inserir_descarte()
	{
		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');

		$this->load->model('F_estoque_produtos_model');


		$dados_oleo = $this->F_estoque_oleo_model->recebe_estoque();
		$dados_detergente = $this->F_estoque_detergente_model->recebe_estoque();


		$data['pessoa'] = $this->input->post('pessoa');
		$data['produto'] = $this->input->post('produto');
		$data['quantidade'] = $this->input->post('quantidade');
		$data['observacao'] = $this->input->post('observacao');
		$data['data_descarte'] = $this->input->post('data_descarte');


		if($data['produto'] == 'Óleo'){

			$dados_oleo['quantidade'] =  $dados_oleo['quantidade'] - $data['quantidade'] ;

		
			$this->F_estoque_oleo_model->atualiza_estoque($dados_oleo);

		}else{

			$dados_detergente['quantidade'] =  $dados_detergente['quantidade'] - $data['quantidade'];

			$this->F_estoque_detergente_model->atualiza_estoque($dados_detergente);

		}

		$this->F_estoque_produtos_model->inserir_descarte($data);
		

		redirect('F_estoque_produtos/descarte_inicio/');
	}

	public function entradas_saidas()
	{

		$this->load->model('F_estoque_tambores_model');
		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');

		$this->load->model('F_volta_motoristas_model');
		$this->load->model('F_saida_motoristas_model');
		$this->load->model('Motoristasp_model');

		$data['alerta'] = $this->uri->segment(3);

		$data['estoque_tambor'] = $this->F_estoque_tambores_model->recebe_estoque();
		$data['estoque_oleo'] = $this->F_estoque_oleo_model->recebe_estoque();
		$data['estoque_detergente'] = $this->F_estoque_detergente_model->recebe_estoque();

		$data['voltas'] = $this->F_volta_motoristas_model->recebe_voltas();
		$data['saidas'] = $this->F_saida_motoristas_model->recebe_saidas();
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/entradas_saidas');
		$this->load->view('financeiro/footer');
	}


	
	public function filtra_entradas_saidas()
	{
		
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$this->load->model('F_estoque_tambores_model');
		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');

		$this->load->model('F_volta_motoristas_model');
		$this->load->model('F_saida_motoristas_model');
		$this->load->model('Motoristasp_model');

		$data['alerta'] = $this->uri->segment(3);

		$data['estoque_tambor'] = $this->F_estoque_tambores_model->recebe_estoque();
		$data['estoque_oleo'] = $this->F_estoque_oleo_model->recebe_estoque();
		$data['estoque_detergente'] = $this->F_estoque_detergente_model->recebe_estoque();

		$data['voltas'] = $this->F_volta_motoristas_model->recebe_voltas_filtrada($data_inicial, $data_final);

	

		$data['saidas'] = $this->F_saida_motoristas_model->recebe_saidas_filtrada($data_inicial, $data_final);
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/inicio_estoque');
		$this->load->view('financeiro/footer');
	}


	


}
