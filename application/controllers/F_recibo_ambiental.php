<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_recibo_ambiental extends CI_Controller {
	
public function inicio()
	{

		
		$this->load->view('financeiro/recibo_ambiental');
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->setPaper('A4');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("Romaneio.pdf", array("Attachment"=> 0));
		
	}
	
	
	
	public function filtra_pesagem()
	{

		$this->load->model('F_pesagem_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		if($data_final == '' or $data_inicial == ''){
			
			redirect('F_pesagem/inicio/erro');
			
		}
		
		
		$data['pesagem'] = $this->F_pesagem_model->filtra_pesagem($data_inicial, $data_final);
		
		$data['pagina'] = 'filtrado';
		
		
		if(empty($data['pesagem'])){
		
			redirect('F_pesagem/inicio/erro');
			
		};
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/pesagem');
		$this->load->view('financeiro/footer');
		
	}
	
	
	public function lancar_pesagem()
	{
			
		$this->load->view('financeiro/header');
		$this->load->view('financeiro/formulario_pesagem');
		$this->load->view('financeiro/footer');
	}
	
	public function edita_pesagem()
	{
		
		$this->load->model('F_pesagem_model');
		
		$id = $this->uri->segment(3);
		
		$data['pesagem'] = $this->F_pesagem_model->recebe_dado($id);
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_edita_pesagem');
		$this->load->view('financeiro/footer');
	}
	
	
	public function inserir_pesagem(){
		
		$this->load->model('F_pesagem_model');
		
		
		$dados['id'] = $this->input->post('id');
		
		$dados['data'] = $this->input->post('data');
		$dados['empresa'] = $this->input->post('empresa');
		$dados['placa'] = $this->input->post('placa');
		$dados['motorista'] = $this->input->post('motorista');
		$dados['peso_saida'] = $this->input->post('peso_saida');
		$dados['peso_entrada'] = $this->input->post('peso_entrada');
		$dados['plastico'] = $this->input->post('plastico');
		$dados['papel'] = $this->input->post('papel');
		$dados['vidro'] = $this->input->post('vidro');
		$dados['ferro'] = $this->input->post('ferro');
		$dados['farinaceos'] = $this->input->post('farinaceos');
		$dados['organico'] = $this->input->post('organico');
		$dados['rejeito'] = $this->input->post('rejeito');
		$dados['lixo'] = $this->input->post('lixo');
		$dados['outros'] = $this->input->post('outros');
		$dados['oque'] = $this->input->post('oque');
		$dados['justificativa'] = $this->input->post('justificativa');
		
		$dados['peso_liquido'] = $dados['peso_entrada'] - $dados['peso_saida'];

 	
		$plastico = $this->input->post('plastico') == '' ?  0 : $this->input->post('plastico');
		$papel = $this->input->post('papel') == '' ?  0 : $this->input->post('papel');
		$vidro = $this->input->post('vidro') == '' ?  0 : $this->input->post('vidro');
		$ferro = $this->input->post('ferro') == '' ?  0 : $this->input->post('ferro');
		$farinaceos = $this->input->post('farinaceos') == '' ?  0 : $this->input->post('farinaceos');
		$organico = $this->input->post('organico') == '' ?  0 : $this->input->post('organico');
		$rejeito = $this->input->post('rejeito') == '' ?  0 : $this->input->post('rejeito');
		$lixo = $this->input->post('lixo') == '' ?  0 : $this->input->post('lixo');
		$outros = $this->input->post('outros') == '' ?  0 : $this->input->post('outros');
	
		
	
		$soma = $plastico + $papel + $vidro + $ferro + $farinaceos + $organico + $rejeito + $lixo + $outros;


		$dados['diferenca'] = $dados['peso_liquido'] - $soma;

		if($dados['id'] > 0){
			
			$this->F_pesagem_model->atualiza_pesagem($dados['id'], $dados);
			
		}else{
			$this->F_pesagem_model->inserir_pesagem($dados);
		}
		
		
		redirect('F_pesagem/inicio/11');
		
		
	}
	
	
	
	public function deleta_pesagem(){
		
		$this->load->model('F_pesagem_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_pesagem_model->deleta_pesagem($id);	
		
		redirect('F_pesagem/inicio/11');
		
	}
	
	
}
