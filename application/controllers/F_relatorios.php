<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_relatorios extends CI_Controller {


	public function inicio()
	{
		$this->load->model('F_afericao_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/relatorios');
		$this->load->view('financeiro/footer');
	}


	public function relatorio_oleo()
	{
		$this->load->model('F_afericao_model');
		
		$data['pagina'] = "relatorio_geral";
		
		$data_inicial = date('Y/m/01');
		$data_final = date('Y/m/d');
		
		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);
	
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/relatorio_oleo');
		$this->load->view('financeiro/footer');
	}

	public function relatorio_oleo_filtrado()
	{
		$this->load->model('F_afericao_model');
		
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);
	
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/relatorio_oleo');
		$this->load->view('financeiro/footer');
	}

	public function relatorio_cidade()
	{
		$this->load->model('F_cidades_model');
		
		$data['cidades'] = $this->F_cidades_model->recebe_cidades();	

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/relatorio_cidade');
		$this->load->view('financeiro/footer');
	}

	public function gerar_relatorio_cidade()
	{
		$this->load->model('F_afericao_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$cidades = $this->input->post('cidades');

		$afericoes = $this->F_afericao_model->filtra_afericao_relatorio($cidades, $data_inicial, $data_final);

		$data['afericoes'] = $afericoes;
		$data['data_inicial'] = $data_inicial;
		$data['data_final'] = $data_final;

		$paga = 0;
        $aferido = 0;
        $gasto = 0;
		$contador = 0;

		foreach ($afericoes as $c) {

            $paga = $paga + $c['pago'];
            $aferido = $aferido + $c['aferido'];
            $gasto = $gasto + $c['gasto'];
			$contador++;
        }


		$data['media_dia'] = $aferido / $contador; 
		$data['pago'] = $paga;
		$data['aferido'] = $aferido;
		$data['gasto'] = $gasto;

		$data['custo'] =  round($gasto / $aferido, 2);;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/relatorio_afericao_cidades');
		$this->load->view('financeiro/footer');

	}

	public function relatorio_motoristas()
	{
		$this->load->model('F_afericao_model');
		
		$data_inicial = date('Y/m/01');
		$data_final = date('Y/m/d');

		$data['pagina'] = "relatorio_geral";	
		
		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);
	
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/relatorio_motorista');
		$this->load->view('financeiro/footer');
	}

	public function relatorio_motoristas_filtrado()
	{
		$this->load->model('F_afericao_model');
		
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');


		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);
		
	
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/relatorio_motorista');
		$this->load->view('financeiro/footer');
	}


	public function lancar_afericao()
	{
		$this->load->model('F_afericao_model');
		$this->load->model('Veiculos_model');
		$this->load->model('Motoristasp_model');
		$this->load->model('F_cidades_model');
		
		$id = $this->uri->segment(3);
		
		$data['afericao'] = $this->F_afericao_model->seleciona_afericao($id);
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();
		
		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();
		
		$data['cidades'] = $this->F_cidades_model->recebe_cidades();	

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_afericao');
		$this->load->view('financeiro/footer');
	}
	
	public function lancar_afericao_terceiros()
	{
		
		$this->load->model('F_afericao_model');
		$this->load->model('F_fornecedores_model');
		
		$id = $this->uri->segment(3);
		
		$data['afericao'] = $this->F_afericao_model->seleciona_afericao_terceiros($id);
		
		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_afericao_terceiros');
		$this->load->view('financeiro/footer');
	}
	
	
	public function inserir_afericao(){
		
		$this->load->model('F_afericao_model');
		$this->load->model('F_estoque_model');
		
		$id = $this->input->post('id');
		
		$dados['veiculo'] = $this->input->post('veiculo');
		$dados['data_afericao'] = $this->input->post('data_afericao');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['motorista'] = $this->input->post('motorista');
		$dados['ajudante'] = $this->input->post('ajudante');
		$dados['pago'] = $this->input->post('pago');
		$dados['aferido'] = $this->input->post('aferido');
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
		
		$custo = $dados['gasto'] / $dados['aferido'];
		
		$dados['custo'] = round($custo, 2);
		
		
		$id_estoque = $this->F_estoque_model->recebe_id();
		 
		$estoque = $this->F_estoque_model->recebe_estoque($id_estoque['id']);
		
		
		$dados['estoque_anterior'] = $estoque['quantidade'];
		
		
		if($id == ''){
			
			$data['quantidade'] = $estoque['quantidade'] + $dados['aferido'];
			
			$this->F_estoque_model->insere_estoque($data);	
			
			$this->F_afericao_model->inserir_afericao($dados);	
			
		}else{

			$afericao = $this->F_afericao_model->seleciona_afericao($id);	
			
			$atualizado = $estoque['quantidade'] - $afericao['aferido'];
			
			$data['quantidade'] = $atualizado + $dados['aferido'];
			
			$this->F_estoque_model->insere_estoque($data);
			
			$this->F_afericao_model->atualiza_afericao($dados, $id);	

		}
		
		
	}
	
	public function inserir_afericao_terceiro(){
		
		$this->load->model('F_afericao_model');
		$this->load->model('F_estoque_model');
		
		$id = $this->input->post('id');
		
		$dados['data_afericao'] = $this->input->post('data_afericao');
		$dados['fornecedor'] = $this->input->post('fornecedor');
		$dados['pago'] = $this->input->post('pago');
		$dados['aferido'] = $this->input->post('aferido');
		$dados['gasto'] = $this->input->post('gasto');
		
		
		$custo = $dados['gasto'] / $dados['aferido'];
		
		$dados['custo'] = round($custo, 2);
		
		$id_estoque = $this->F_estoque_model->recebe_id();
		
		$estoque = $this->F_estoque_model->recebe_estoque($id_estoque['id']);
		
		$dados['estoque_anterior'] = $estoque['quantidade'];
		
		
		if($id == ''){
			
			$data['quantidade'] = $estoque['quantidade'] + $dados['aferido'];
			
			
			
			$this->F_estoque_model->insere_estoque($data);	
			
			$this->F_afericao_model->inserir_afericao_terceiros($dados);	
			
		}else{
			
			$afericao = $this->F_afericao_model->seleciona_afericao_terceiros($id);	
			
			$atualizado = $estoque['quantidade'] - $afericao['aferido'];
			
			$data['quantidade'] = $atualizado + $dados['aferido'];
			
			$this->F_estoque_model->insere_estoque($data);	
			
			$this->F_afericao_model->atualiza_afericao_terceiros($dados, $id);	
			
		}
		
		
	}
	
	
	
	public function filtra_afericao_geral()
	{

		$this->load->model('F_afericao_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		if($data_final == '' or $data_inicial == ''){
			
			redirect('Financeiro/afericao/erro');
			
		}
		
		
		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);
		
		$data['afericoes_terceiros'] = $this->F_afericao_model->filtra_afericao_geral_terceiros($data_inicial, $data_final);
		
		
		if(empty($data['afericoes']) and empty($data['afericoes_terceiros'])){
		
			redirect('Financeiro/afericao/erro');
			
		};
		
		
		if(empty($data['afericoes_terceiros'])){
				
		};
	
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericao_filtrada');
		$this->load->view('financeiro/footer');
		
	}
	
	
	public function filtra_afericao_motorista()
	{

		$this->load->model('F_afericao_model');

		$motorista = $this->input->post('nome_motorista');
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		
		if($data_final == '' or $data_inicial == ''){
			
			redirect('Financeiro/afericao/erro');
			
		}
		
		
		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_motorista($data_inicial, $data_final, $motorista);
		
		$data['afericoes_ajudante'] = $this->F_afericao_model->filtra_afericao_motorista_ajudante($data_inicial, $data_final, $motorista);
		
		
		if(empty($data['afericoes'])){
		
			redirect('Financeiro/afericao/erro');
			
		};
		
		$data['motorista'] = $motorista;
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericao_filtrada_motorista');
		$this->load->view('financeiro/footer');
		
	}
	
	
	
	
	

	
	
}
