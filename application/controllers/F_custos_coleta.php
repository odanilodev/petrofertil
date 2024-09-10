<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_custos_coleta extends CI_Controller {
	

	public function geral_custos()
	{
		$this->load->model('F_afericao_model');


		$data_inicial = date('Y/m/01');
		
		$data_final = date('Y/m/d');

		$diferenca = strtotime($data_final) - strtotime($data_inicial);
   		$data['dias'] = floor($diferenca / (60 * 60 * 24)); 


		$data['pagina'] =  $this->uri->segment(3);
		
		$data['afericao'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);

		$data['quantidade_afericoes'] = 0;
		$data['total_pago'] = 0;
		$data['total_aferido'] = 0;
		$data['gasto_total'] = 0;
		$data['gasto_clientes'] = 0;
		$data['gasto_alimentacao'] = 0;
		$data['gasto_combustivel'] = 0;
		$data['gasto_estacionamento'] = 0;
		$data['gasto_pedagio'] = 0;
		$data['gasto_detergente'] = 0;
		$data['gasto_oleo'] = 0;
		$data['gasto_outros'] = 0;

		foreach($data['afericao'] as $a){


			$data['total_pago'] = $data['total_pago'] + $a['pago'];
			$data['total_aferido'] = $data['total_aferido'] + $a['aferido'];
			$data['gasto_total'] = $data['gasto_total'] + $a['gasto'];
			$data['gasto_clientes'] = $data['gasto_clientes'] + $a['clientes'];
			$data['gasto_alimentacao'] = $data['gasto_alimentacao'] + $a['alimentacao'];
			$data['gasto_combustivel'] = $data['gasto_combustivel'] + $a['combustivel'];
			$data['gasto_estacionamento'] = $data['gasto_estacionamento'] + $a['estacionamento'];
			$data['gasto_pedagio'] = $data['gasto_pedagio'] + $a['pedagio'];
			$data['gasto_detergente'] = $data['gasto_detergente'] + $a['detergente'];
			$data['gasto_oleo'] = $data['gasto_oleo'] + $a['oleo'];
			$data['gasto_outros'] = $data['gasto_outros'] + $a['outros'];
			$data['quantidade_afericoes'] = $data['quantidade_afericoes'] + 1;
 		}

		 $data['media_dia_gasto'] = $data['gasto_total'] / $data['dias'];
		 $data['media_gasto_afericoes'] = $data['gasto_total'] / $data['quantidade_afericoes'];
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/geral_custos_coleta');
		$this->load->view('financeiro/footer');
	}

	
	public function geral_custos_filtrado()
	{ 
		$this->load->model('F_afericao_model');

		$data_inicial = $this->input->post('data_inicial');

		$data_final = $this->input->post('data_final');

		$diferenca = strtotime($data_final) - strtotime($data_inicial);
   		$data['dias'] = floor($diferenca / (60 * 60 * 24)); 


		$data['pagina'] =  $this->uri->segment(3);
		
		$data['afericao'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);

		$data['quantidade_afericoes'] = 0;
		$data['total_pago'] = 0;
		$data['total_aferido'] = 0;
		$data['gasto_total'] = 0;
		$data['gasto_clientes'] = 0;
		$data['gasto_alimentacao'] = 0;
		$data['gasto_combustivel'] = 0;
		$data['gasto_estacionamento'] = 0;
		$data['gasto_pedagio'] = 0;
		$data['gasto_detergente'] = 0;
		$data['gasto_oleo'] = 0;
		$data['gasto_outros'] = 0;

		foreach($data['afericao'] as $a){


			$data['total_pago'] = $data['total_pago'] + $a['pago'];
			$data['total_aferido'] = $data['total_aferido'] + $a['aferido'];
			$data['gasto_total'] = $data['gasto_total'] + $a['gasto'];
			$data['gasto_clientes'] = $data['gasto_clientes'] + $a['clientes'];
			$data['gasto_alimentacao'] = $data['gasto_alimentacao'] + $a['alimentacao'];
			$data['gasto_combustivel'] = $data['gasto_combustivel'] + $a['combustivel'];
			$data['gasto_estacionamento'] = $data['gasto_estacionamento'] + $a['estacionamento'];
			$data['gasto_pedagio'] = $data['gasto_pedagio'] + $a['pedagio'];
			$data['gasto_detergente'] = $data['gasto_detergente'] + $a['detergente'];
			$data['gasto_oleo'] = $data['gasto_oleo'] + $a['oleo'];
			$data['gasto_outros'] = $data['gasto_outros'] + $a['outros'];
			$data['quantidade_afericoes'] = $data['quantidade_afericoes'] + 1;
 		}

		 $data['media_dia_gasto'] = $data['gasto_total'] / $data['dias'];
		 $data['media_gasto_afericoes'] = $data['gasto_total'] / $data['quantidade_afericoes'];
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/geral_custos_coleta');
		$this->load->view('financeiro/footer');
	}


	public function geral_custos_visita()
	{
		$this->load->model('F_visita_model');


		$data_inicial = date('Y/m/01');
		
		$data_final = date('Y/m/d');

		$diferenca = strtotime($data_final) - strtotime($data_inicial);
   		$data['dias'] = floor($diferenca / (60 * 60 * 24)); 


		$data['pagina'] =  $this->uri->segment(3);
		
		$data['visitas'] = $this->F_visita_model->filtra($data_inicial, $data_final);

	

		$data['quantidade_afericoes'] = 0;
		$data['total_pago'] = 0;
		$data['total_aferido'] = 0;
		$data['gasto_total'] = 0;
		$data['gasto_clientes'] = 0;
		$data['gasto_alimentacao'] = 0;
		$data['gasto_combustivel'] = 0;
		$data['gasto_estacionamento'] = 0;
		$data['gasto_pedagio'] = 0;
		$data['gasto_detergente'] = 0;
		$data['gasto_oleo'] = 0;
		$data['gasto_outros'] = 0;

		foreach($data['visitas'] as $a){


			$data['total_pago'] = $data['total_pago'] + $a['pago'];
			$data['total_aferido'] = $data['total_aferido'] + $a['aferido'];
			$data['gasto_total'] = $data['gasto_total'] + $a['gasto'];
			$data['gasto_clientes'] = $data['gasto_clientes'] + $a['clientes'];
			$data['gasto_alimentacao'] = $data['gasto_alimentacao'] + $a['alimentacao'];
			$data['gasto_combustivel'] = $data['gasto_combustivel'] + $a['combustivel'];
			$data['gasto_estacionamento'] = $data['gasto_estacionamento'] + $a['estacionamento'];
			$data['gasto_pedagio'] = $data['gasto_pedagio'] + $a['pedagio'];
			$data['gasto_detergente'] = $data['gasto_detergente'] + $a['detergente'];
			$data['gasto_oleo'] = $data['gasto_oleo'] + $a['oleo'];
			$data['gasto_outros'] = $data['gasto_outros'] + $a['outros'];
			$data['quantidade_afericoes'] = $data['quantidade_afericoes'] + 1;
 		}

		 $data['media_dia_gasto'] = $data['gasto_total'] / $data['dias'];
		 $data['media_gasto_afericoes'] = $data['gasto_total'] / $data['quantidade_afericoes'];
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/geral_custos_visita');
		$this->load->view('financeiro/footer');
	}

	public function geral_custos_visita_filtrado()
	{
		$this->load->model('F_visita_model');


		$data_inicial = $this->input->post('data_inicial');

		$data_final = $this->input->post('data_final');

		$diferenca = strtotime($data_final) - strtotime($data_inicial);
   		$data['dias'] = floor($diferenca / (60 * 60 * 24)); 


		$data['pagina'] =  $this->uri->segment(3);
		
		$data['visitas'] = $this->F_visita_model->filtra($data_inicial, $data_final);


		$data['quantidade_afericoes'] = 0;
		$data['total_pago'] = 0;
		$data['total_aferido'] = 0;
		$data['gasto_total'] = 0;
		$data['gasto_clientes'] = 0;
		$data['gasto_alimentacao'] = 0;
		$data['gasto_combustivel'] = 0;
		$data['gasto_estacionamento'] = 0;
		$data['gasto_pedagio'] = 0;
		$data['gasto_detergente'] = 0;
		$data['gasto_oleo'] = 0;
		$data['gasto_outros'] = 0;

		foreach($data['visitas'] as $a){


			$data['total_pago'] = $data['total_pago'] + $a['pago'];
			$data['total_aferido'] = $data['total_aferido'] + $a['aferido'];
			$data['gasto_total'] = $data['gasto_total'] + $a['gasto'];
			$data['gasto_clientes'] = $data['gasto_clientes'] + $a['clientes'];
			$data['gasto_alimentacao'] = $data['gasto_alimentacao'] + $a['alimentacao'];
			$data['gasto_combustivel'] = $data['gasto_combustivel'] + $a['combustivel'];
			$data['gasto_estacionamento'] = $data['gasto_estacionamento'] + $a['estacionamento'];
			$data['gasto_pedagio'] = $data['gasto_pedagio'] + $a['pedagio'];
			$data['gasto_detergente'] = $data['gasto_detergente'] + $a['detergente'];
			$data['gasto_oleo'] = $data['gasto_oleo'] + $a['oleo'];
			$data['gasto_outros'] = $data['gasto_outros'] + $a['outros'];
			$data['quantidade_afericoes'] = $data['quantidade_afericoes'] + 1;
 		}

		 $data['media_dia_gasto'] = $data['gasto_total'] / $data['dias'];
		 $data['media_gasto_afericoes'] = $data['gasto_total'] / $data['quantidade_afericoes'];
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/geral_custos_visita');
		$this->load->view('financeiro/footer');
	}

	
	
}
