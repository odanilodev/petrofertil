<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_producao extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->load->model('F_producao_model');
	}

	public function inicio()
	{
		$data['empresas'] = $this->F_producao_model->recebe_clientes_producao();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/empresas_producao');
		$this->load->view('financeiro/footer');
	}


	public function formulario_cliente_producao()
	{
		$id = $this->uri->segment(3);

		$data['empresa'] = $this->F_producao_model->recebe_empresa($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_cliente_producao');
		$this->load->view('financeiro/footer');
	}

	public function inserir_empresa_producao()
	{

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['telefone'] = $this->input->post('telefone');


		if ($id != '') {


			$this->F_producao_model->atualizar_cliente_producao($dados, $id);
		} else {

			$this->F_producao_model->inserir_cliente_producao($dados);
		}


		redirect('F_producao/inicio/18');
	}

	public function ver_producao()
	{
		$data['status_busca'] = 'nao_filtrado';

		$id = $this->uri->segment(3);

		$data['alerta'] = $this->uri->segment(4);

		$data['producoes'] = $this->F_producao_model->recebe_producao_empresa($id);

		$data['empresa'] = $this->F_producao_model->recebe_empresa($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_producao_reciclagem');
		$this->load->view('financeiro/footer');
	}

	public function filtra_producao()
	{
		$id = $this->uri->segment(3);

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$data['status_busca'] = 'filtrado';

		$data['producoes'] = $this->F_producao_model->recebe_producao_empresa_filtrada($id, $data_inicial, $data_final);

		if(empty($data['producoes'])){
			redirect('F_producao/ver_producao/'.$id.'/erro_busca');
		}

		$data['alerta'] = 'success';

		$data['empresa'] = $this->F_producao_model->recebe_empresa($id);

		$data['total_fardo'] = 0;

		$dias_producao = 0;


		foreach($data['producoes'] as $producoes){
			
			$data['total_fardo'] = $data['total_fardo'] + $producoes['fardo']; 

			if(isset($diarias[$producoes['data']])){
			
			}else{
				$diarias[$producoes['data']] = $producoes['data'];
				$dias_producao ++;
			}
		}


		$data['media_diaria'] = $data['total_fardo'] / $dias_producao;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_producao_reciclagem');
		$this->load->view('financeiro/footer');
	}


	public function formulario_producao_reciclagem()
	{
		$id = $this->uri->segment(3);

		$data['empresa'] = $this->F_producao_model->recebe_empresa($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_producao_reciclagem');
		$this->load->view('financeiro/footer');
	}


	public function inserir_producao()
	{


		$id = $this->input->post('id');

		$dados['empresa'] = $this->input->post('empresa');
		$dados['data'] = $this->input->post('data');
		$dados['papelao'] = $this->input->post('papelao');
		$dados['plastico'] = $this->input->post('plastico');
		$dados['plastico_ps'] = $this->input->post('plastico_ps');
		$dados['plastico_pp'] = $this->input->post('plastico_pp');
		$dados['plastico_m'] = $this->input->post('plastico_m');
		$dados['plastico_b'] = $this->input->post('plastico_b');
		$dados['sacaria'] = $this->input->post('sacaria');
		$dados['papel'] = $this->input->post('papel');
		$dados['pead'] = $this->input->post('pead');
		$dados['fita'] = $this->input->post('fita');
		$dados['rafia'] = $this->input->post('rafia');
		$dados['latinha'] = $this->input->post('latinha');
		$dados['aluminio'] = $this->input->post('aluminio');
		$dados['lixo'] = $this->input->post('lixo');
		$dados['pet'] = $this->input->post('pet');
		$dados['prensa'] = $this->input->post('prensa');
		$dados['nome'] = strtoupper($this->input->post('nome'));
		$dados['observacao'] = $this->input->post('observacao');

		$papelao = $this->input->post('papelao') == '' ?  0 : $this->input->post('papelao');
		$plastico = $this->input->post('plastico') == '' ?  0 : $this->input->post('plastico');
		$plastico_ps = $this->input->post('plastico_ps') == '' ?  0 : $this->input->post('plastico_ps');
		$plastico_pp = $this->input->post('plastico_pp') == '' ?  0 : $this->input->post('plastico_pp');
		$plastico_m = $this->input->post('plastico_m') == '' ?  0 : $this->input->post('plastico_m');
		$plastico_b = $this->input->post('plastico_b') == '' ?  0 : $this->input->post('plastico_b');
		$sacaria = $this->input->post('sacaria') == '' ?  0 : $this->input->post('sacaria');
		$papel = $this->input->post('papel') == '' ?  0 : $this->input->post('papel');
		$pead = $this->input->post('pead') == '' ?  0 : $this->input->post('pead');
		$fita = $this->input->post('fita') == '' ?  0 : $this->input->post('fita');
		$rafia = $this->input->post('rafia') == '' ?  0 : $this->input->post('rafia');
		$latinha = $this->input->post('latinha') == '' ?  0 : $this->input->post('latinha');
		$aluminio = $this->input->post('aluminio') == '' ?  0 : $this->input->post('aluminio');
		$lixo = $this->input->post('lixo') == '' ?  0 : $this->input->post('lixo');
		$pet = $this->input->post('pet') == '' ?  0 : $this->input->post('pet');

		$dados['fardo'] = $papelao + $plastico + $plastico_ps + $plastico_pp + $plastico_m + $plastico_b + $sacaria + $papel + $pead + $fita + $rafia + $latinha + $aluminio + $lixo + $pet;


		if ($id != '') {

			$this->F_producao_model->atualizar_producao($dados, $id);
		} else {

			$this->F_producao_model->inserir_producao($dados);
		}



		redirect('F_producao/ver_producao/' . $dados['empresa']);
	}

	public function edita_producao()
	{
		$id = $this->uri->segment(3);

		$data['producao'] = $this->F_producao_model->recebe_producao_id($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_edita_producao_reciclagem');
		$this->load->view('financeiro/footer');
	}


	public function deleta_producao()
	{

		$id = $this->uri->segment(3);

		$producao = $this->F_producao_model->recebe_producao_id($id);

		$this->F_producao_model->deleta_producao($id);

		redirect('F_producao/ver_producao/' . $producao['empresa']);
	}

	public function deleta_empresa()
	{

		$id = $this->uri->segment(3);

		$this->F_producao_model->deleta_empresa_producao($id);

		redirect('F_producao/inicio/18');
	}
}
