<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_romaneios extends CI_Controller {
	
	public function inicio(){	

		$this->load->model('F_romaneio_model');
	
		$data['pagina'] = $this->uri->segment(3);
	
		$data['romaneios'] = $this->F_romaneio_model->recebe_romaneios();

	
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/romaneios');
		$this->load->view('financeiro/footer');
	
	}
	
	public function pagina_principal(){	

		$this->load->view('financeiro/header');
		$this->load->view('financeiro/principal_coletas');
		$this->load->view('financeiro/footer');
	
	}
	
	
	public function finalizar_romaneio()
	{
			
		$this->load->model('F_romaneio_model');
		
		
		$id_romaneio = $this->uri->segment(3);

			
		$romaneio = $this->F_romaneio_model->recebe_romaneio($id_romaneio);
		
		
		$conteudo = json_decode($romaneio['conteudo'], true	);
		

		foreach($conteudo['clientes'] as $key => $value){ // tras todas as cidades 
			$data['cidades'][] = $key; 
		}
	

		
		$data['motorista1'] = $conteudo['motorista1'];
		$data['motorista2'] = $conteudo['motorista2'];
		$data['placa'] = $conteudo['placa'];
		
		$data['clientes'] = $conteudo['clientes'];
		
		$data['data_romaneio'] = $conteudo['data_romaneio'];
		

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/finalizar_romaneio');
		$this->load->view('financeiro/footer');
	}
	
	
	public function inserir_romaneio()
	{
			
		$this->load->model('F_coleta_model');
		$this->load->model('F_clientes_reciclagem_model');

		
		$data['coletado'] = $this->input->post('coletado');
		$data['tipo'] = $this->input->post('tipo');
		$data['observacao'] = $this->input->post('observacao');
		$data['tipo_pagamento'] = $this->input->post('tipo_pagamento');
		$data['forma_pagamento'] = $this->input->post('forma_pagamento');
		$data['valor_quantidade'] = $this->input->post('valor_quantidade');
		$data['id_cliente'] = $this->input->post('id_cliente');
		$data_romaneio = $this->input->post('data_romaneio');
			
		
		//echo count($data['id_cliente']); exit;
	
		
		//echo '<pre>'; print_r($data['id_cliente']); exit;

		for($i=0; $i < count($data['id_cliente']); $i++){
	
				
			$dados['coletado'] = $data['coletado'][$i];
			$dados['tipo'] = $data['tipo'][$i];
			$dados['observacao'] = $data['observacao'][$i];
			$dados['tipo_pagamento'] = $data['tipo_pagamento'][$i];
			$dados['forma_pagamento'] = $data['forma_pagamento'][$i];
			$dados['valor_quantidade'] = $data['valor_quantidade'][$i];
			$dados['id_cliente'] = $data['id_cliente'][$i];
			
			 $cliente = $this->F_clientes_reciclagem_model->recebe_cliente($dados['id_cliente']);

			 $att['data_atendimento'] = date('d/m/Y', strtotime("+".$cliente['frequencia']." days",strtotime($data_romaneio)));	
			
			 $att['data_atendimento'] = date('Y-d-m', strtotime($att['data_atendimento'])); 
			
			
			 $id_cliente = $cliente['id'];
			
		
			
			 $this->F_clientes_reciclagem_model->atualiza_cliente($att, $id_cliente);
	

			$this->F_coleta_model->inserir_coleta($dados);
			
		}
		
		
		
	
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
	
	
	
	
	public function deleta_pesagem(){
		
		$this->load->model('F_pesagem_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_pesagem_model->deleta_pesagem($id);	
		
		redirect('F_pesagem/inicio/11');
		
	}
	
	
	public function rever_romaneio(){
		
		$this->load->model('F_romaneio_model');
		
		
		$id_romaneio = $this->uri->segment(3);

			
		$romaneio = $this->F_romaneio_model->recebe_romaneio($id_romaneio);
		
		
		$conteudo = json_decode($romaneio['conteudo'], true	);
		
		

		foreach($conteudo['clientes'] as $key => $value){ // tras todas as cidades 
			$data['cidades'][] = $key; 
		}
	

		
		$data['motorista1'] = $conteudo['motorista1'];
		$data['motorista2'] = $conteudo['motorista2'];
		$data['placa'] = $conteudo['placa'];
		
		$data['clientes'] = $conteudo['clientes'];
		
		$data['data_romaneio'] = $conteudo['data_romaneio'];
		

	
		
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
