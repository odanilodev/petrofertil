<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_pesagem extends CI_Controller {
	
public function inicio()
	{
		
		$this->load->model('F_pesagem_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['pesagem'] = $this->F_pesagem_model->recebe_pesagem();
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/pesagem');
		$this->load->view('financeiro/footer');
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
	
	public function edita_status()
	{
		
		$this->load->model('F_pesagem_model');
		
		$id = $this->uri->segment(3);
		
		$pesagem = $this->F_pesagem_model->recebe_dado($id);

		if($pesagem['status'] == 1){
			$pesagem['status'] = 0;
		}else{
			$pesagem['status'] = 1;
		}
				
		$this->F_pesagem_model->atualiza_status($id, $pesagem);

		redirect('F_pesagem/inicio/11');
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

		$usuario = $this->input->post('usuario');

	
		if($usuario == 'producao@petroecol.com.br'){
			$dados["status"] = 1;
		}else{
			$dados['status'] = 0;
		}

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
		$dados['ps'] = $this->input->post('ps');
		$dados['plastico_pp'] = $this->input->post('plastico_pp');
		$dados['plastico_m'] = $this->input->post('plastico_m');
		$dados['plastico_b'] = $this->input->post('plastico_b');
		$dados['pet'] = $this->input->post('pet');
		$dados['pead'] = $this->input->post('pead');
		$dados['sacaria'] = $this->input->post('sacaria');
		$dados['fita'] = $this->input->post('fita');
		$dados['lata'] = $this->input->post('lata');
		$dados['leite_tetra_park'] = $this->input->post('leite_tetra_park');
		$dados['caixas'] = $this->input->post('caixas');
		$dados['papelao_bom'] = $this->input->post('papelao_bom');
		$dados['papelao_misto'] = $this->input->post('papelao_misto');
		$dados['pvc'] = $this->input->post('pvc');
		$dados['rafia'] = $this->input->post('rafia');
		$dados['pet_garrafa'] = $this->input->post('pet_garrafa');
		$dados['pet_oleo'] = $this->input->post('pet_oleo');
		$dados['pp_duro'] = $this->input->post('pp_duro');
		$dados['cobre'] = $this->input->post('cobre');
		$dados['aluminio_grosso'] = $this->input->post('aluminio_grosso');
		$dados['metal'] = $this->input->post('metal');
		$dados['inox'] = $this->input->post('inox');
		$dados['aluminio_chapa'] = $this->input->post('aluminio_chapa');
		$dados['fio_misto'] = $this->input->post('fio_misto');
		$dados['papelao_cimento'] = $this->input->post('papelao_cimento');
		$dados['papelao_tubete'] = $this->input->post('papelao_tubete');
		$dados['isopor'] = $this->input->post('isopor');
		$dados['tambor'] = $this->input->post('tambor');
		$dados['abastecimento'] = $this->input->post('abastecimento');


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
		$ps = $this->input->post('ps') == '' ?  0 : $this->input->post('ps');
		$plastico_pp = $this->input->post('plastico_pp') == '' ?  0 : $this->input->post('plastico_pp');
		$plastico_m = $this->input->post('plastico_m') == '' ?  0 : $this->input->post('plastico_m');
		$plastico_b = $this->input->post('plastico_b') == '' ?  0 : $this->input->post('plastico_b');
		$pet = $this->input->post('pet') == '' ?  0 : $this->input->post('pet');
		$pead = $this->input->post('pead') == '' ?  0 : $this->input->post('pead');
		$sacaria = $this->input->post('sacaria') == '' ?  0 : $this->input->post('sacaria');
		$fita = $this->input->post('fita') == '' ?  0 : $this->input->post('fita');
		$lata = $this->input->post('lata') == '' ?  0 : $this->input->post('lata');
		$leite_tetra_park = $this->input->post('leite_tetra_park') == '' ?  0 : $this->input->post('leite_tetra_park');
		$caixas = $this->input->post('caixas') == '' ?  0 : $this->input->post('caixas');
		$papelao_bom = $this->input->post('papelao_bom') == '' ?  0 : $this->input->post('papelao_bom');
		$papelao_misto = $this->input->post('papelao_misto') == '' ?  0 : $this->input->post('papelao_misto');
		$pvc = $this->input->post('pvc') == '' ?  0 : $this->input->post('pvc');
		$rafia = $this->input->post('rafia') == '' ?  0 : $this->input->post('rafia');
		$pet_garrafa = $this->input->post('pet_garrafa') == '' ?  0 : $this->input->post('pet_garrafa');
		$pet_oleo = $this->input->post('pet_oleo') == '' ?  0 : $this->input->post('pet_oleo');
		$pp_duro = $this->input->post('pp_duro') == '' ?  0 : $this->input->post('pp_duro');
		$cobre = $this->input->post('cobre') == '' ?  0 : $this->input->post('cobre');
		$aluminio_grosso = $this->input->post('aluminio_grosso') == '' ?  0 : $this->input->post('aluminio_grosso');
		$metal = $this->input->post('metal') == '' ?  0 : $this->input->post('metal');
		$inox = $this->input->post('inox') == '' ?  0 : $this->input->post('inox');
		$aluminio_chapa = $this->input->post('aluminio_chapa') == '' ?  0 : $this->input->post('aluminio_chapa');
		$fio_misto = $this->input->post('fio_misto') == '' ?  0 : $this->input->post('fio_misto');
		$papelao_cimento = $this->input->post('papelao_cimento') == '' ?  0 : $this->input->post('papelao_cimento');
		$papelao_tubete = $this->input->post('papelao_tubete') == '' ?  0 : $this->input->post('papelao_tubete');
		$isopor = $this->input->post('isopor') == '' ?  0 : $this->input->post('isopor');
		$tambor = $this->input->post('tambor') == '' ?  0 : $this->input->post('tambor');
		$abastecimento = $this->input->post('abastecimento') == '' ?  0 : $this->input->post('abastecimento');


		
		$outros = $this->input->post('outros') == '' ?  0 : $this->input->post('outros');	
	
		$soma = $plastico + $papel + $vidro + $ferro + $farinaceos + $organico + $rejeito + $lixo + $ps + $plastico_pp + $plastico_m + $plastico_b + $pet + $pead + $sacaria + $fita + $lata + $caixas + $papelao_bom + $papelao_misto + $pvc + $rafia + $outros + $pet_oleo + $pet_garrafa + $leite_tetra_park + $pp_duro + $cobre + $aluminio_grosso + $metal + $inox + $aluminio_chapa + $fio_misto + $papelao_cimento + $papelao_tubete + $isopor + $tambor + $abastecimento;


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