<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_motoristas extends CI_Controller
{

	public function inicio()
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
		$this->load->view('financeiro/inicio_estoque');
		$this->load->view('financeiro/footer');
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


	public function gerar_controle()
	{
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_inicial');

		$data_dia = date('Y/m/d', strtotime("+1 days",strtotime($data_inicial))); 
		 


		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');
		$this->load->model('F_volta_motoristas_model');
		$this->load->model('F_saida_motoristas_model');
		$this->load->model('Motoristasp_model');

		$data['voltas'] = $this->F_volta_motoristas_model->recebe_voltas_filtrada($data_inicial, $data_final);
		$data['saidas'] = $this->F_saida_motoristas_model->recebe_saidas_filtrada($data_inicial, $data_final);
		$data['saidas_dia'] = $this->F_saida_motoristas_model->recebe_saidas_filtrada($data_dia, $data_dia);

		$data['estoque_oleo'] = $this->F_estoque_oleo_model->recebe_estoque();
		$data['estoque_detergente'] = $this->F_estoque_detergente_model->recebe_estoque();
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		

		$this->load->view('financeiro/controle', $data);
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->setPaper('A4');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("Controle.pdf", array("Attachment"=> 0));
		
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


	public function formulario_saida_motorista()
	{
		$this->load->view('financeiro/header_motorista');
		$this->load->view('financeiro/formulario_saida_motorista');
		$this->load->view('financeiro/footer');
	}

	public function formulario_volta_motorista()
	{
		$this->load->view('financeiro/header_motorista');
		$this->load->view('financeiro/formulario_volta_motorista');
		$this->load->view('financeiro/footer');
	}

	public function download_saida()
	{

		$this->load->helper('download');

		$arquivo = $this->uri->segment(3);

		$arquivoPath = base_url('uploads/saida_motoristas/') . $arquivo;

		$data = file_get_contents('uploads/saida_motoristas/' . $arquivo); // Read the file's contents

		force_download($arquivoPath, $data);
	}

	public function download_volta()
	{

		$this->load->helper('download');

		$arquivo = $this->uri->segment(3);

		$arquivoPath = base_url('uploads/volta_motoristas/') . $arquivo;

		$data = file_get_contents('uploads/volta_motoristas/' . $arquivo); // Read the file's contents

		force_download($arquivoPath, $data);
	}


	public function deleta_saida_motorista()
	{

		$this->load->model('F_saida_motoristas_model');

		$id = $this->uri->segment(3);

		$this->F_saida_motoristas_model->deleta_saida($id);

		redirect('F_estoque_motoristas/inicio/saida_deletada');
	}

	public function deleta_volta_motorista()
	{

		$this->load->model('F_volta_motoristas_model');

		$id = $this->uri->segment(3);

		$this->F_volta_motoristas_model->deleta_volta($id);

		redirect('F_estoque_motoristas/inicio/volta_deletada');
	}
}
