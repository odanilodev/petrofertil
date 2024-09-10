<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_grupos_coleta extends CI_Controller {


	public function inicio(){
		
		
		$this->load->model('F_grupos_coleta_model');
		
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['grupos'] = $this->F_grupos_coleta_model->recebe_grupos();

		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/grupos_coleta');
		$this->load->view('financeiro/footer');
		
	}
	
	
	
	public function formulario_grupo(){
		
	
		$this->load->view('financeiro/header');
		$this->load->view('financeiro/formulario_grupo');
		$this->load->view('financeiro/footer');
			
		
	}
	
	public function formulario_romaneio(){
		
	
		$this->load->model('F_grupos_coleta_model');
		$this->load->model('Motoristasp_model');
		$this->load->model('Veiculos_model');
	
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['grupos'] = $this->F_grupos_coleta_model->recebe_grupos();
		
		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_romaneio');
		$this->load->view('financeiro/footer');
			
		
	}
	
	
	
	public function inserir_grupo(){
		
		$this->load->model('F_grupos_coleta_model');
		
		
		$dados['nome'] = $this->input->post('nome');
		$dados['observacao'] = $this->input->post('observacao');
		
		
		
		
		$this->F_grupos_coleta_model->inserir_grupo($dados);	
		
		$dd['log_acao'] = 'inserir';
			
		
        // Log
		$this->load->model('F_log_model');
		//$dd['log_acao'] = 'inserir';
		$dd['log_dados'] = json_encode($dados);
		$this->F_log_model->set_log($dd);
		// Fim Log
			
		redirect('F_grupos_coleta/inicio/14');
		
		
	}
	
	public function deleta_cliente(){
		
		$this->load->model('F_clientes_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_clientes_model->deleta_cliente($id);	
		
		redirect('F_clientes/inicio/5');
		
	}
	
	public function gerar_romaneio(){

		
		$this->load->model('F_grupos_coleta_model');
		$this->load->model('F_clientes_reciclagem_model');
		$this->load->model('F_romaneio_model');
		
		
		
		$grupos = $this->input->post('grupos');
		$data['motorista1'] = $this->input->post('motorista1');
		$data['motorista2'] = $this->input->post('motorista2');
		$data['placa'] = $this->input->post('placa');
		
		$data['data_romaneio'] = $this->input->post('data_romaneio');
		
		$clientes = $this->F_clientes_reciclagem_model->recebe_clientes_grupo($grupos);
		
		
		$data['dia_hora'] = date('d/m/Y h:i:s');
		
		
		foreach($clientes as $v){ // cria um array colocando o nome da cidade na chave do array
			$data['clientes'][strtoupper($v['cidade'])][] = $v; 
		}
		
		foreach($data['clientes'] as $key => $value){ // tras todas as cidades 
			$data['cidades'][] = $key; 
		}
		
		
		
		$dados['conteudo'] = json_encode($data);
		
		
		$this->F_romaneio_model->inserir_romaneio($dados);

		
		
		
		$this->load->view('financeiro/romaneio', $data);
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("Romaneio.pdf", array("Attachment"=> 0));
	
	}
	
}
