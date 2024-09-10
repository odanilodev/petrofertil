<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motoristas_petro extends CI_Controller {
	
	
	public function index()
	{
		
		$this->load->model('P_motoristas_model');
		
		$data['motoristas'] = $this->Motoristas_model->recebe_motoristas();
		
		$this->load->view('admin/header_petro', $data);
		$this->load->view('admin/motoristas');
		$this->load->view('admin/footer');	
	}
	
	
	public function ver_motorista()
	{
		
		$id = $this->uri->segment(3);
		
		$this->load->model('P_motoristas_model');
		
		$data['motorista'] = $this->Motoristas_model->recebe_motorista($id);
		
		$this->load->view('admin/header_petro', $data);
		$this->load->view('admin/ver_motorista');
		$this->load->view('admin/footer');	
	}
	
	public function formulario_motoristas()
	{
		$this->load->view('admin/header_petro');
		$this->load->view('admin/formulario_motoristas');
		$this->load->view('admin/footer');	
	}
	
	
	public function cadastra_motorista()
	{ 	
		$this->load->library('upload');
		
		$this->load->model('P_motoristas_model');
		
		$id = $this->input->post('id');
		

		$dados['nome'] = $this->input->post('nome');
		$dados['nome_antt'] = $this->input->post('nome_antt');
		$dados['antt'] = $this->input->post('antt');
		$dados['placa'] = $this->input->post('placa');
		$dados['nome_conta'] = $this->input->post('nome_conta');
		$dados['agencia'] = $this->input->post('agencia');
		$dados['conta'] = $this->input->post('conta');
		$dados['cpf'] = $this->input->post('cpf');
		$dados['data_cadastro'] = date('d-m-y');
		
		
		$dados['comprovante'] = $this->input->post('comprovante');
		$dados['cnh'] = $this->input->post('cnh');
		$dados['documento'] = $this->input->post('documento');
		
		$cnh = $_FILES['cnh'];
		$documento = $_FILES['documento'];
		
		
		
		
		if($cnh['name'] != ""){ //veio imagem
				
		
		$this->load->library('upload');
		
	
		$configuracao = array(
			'upload_path'   => './uploads/cnh/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('cnh')){
			
        $img = $this->upload->data();		
        $dados['cnh'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		};
		
		
		if($documento['name'] != ""){ //veio imagem
				
		
		$this->load->library('upload');
		
	
		$configuracao = array(
			'upload_path'   => './uploads/documento/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('documento')){
			
        $img = $this->upload->data();		
        $dados['documento'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		}
		

		$this->Motoristas_model->inserir_motorista($dados);
		
	
	}
	
	
	public function download_documento(){
		
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/documento/').$arquivo ;
		
		$data = file_get_contents('uploads/documento/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

    
	}
	
	public function download_cnh(){
		
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/cnh/').$arquivo ;
		
		$data = file_get_contents('uploads/cnh/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

    
	}
	
	public function deleta_motorista(){
		
        $id = $this->uri->segment(3);
		
		$this->load->model('Motoristas_model');
		
		$veiculo = $this->Motoristas_model->recebe_motorista($id);
		
		unlink("./uploads/documento/".$veiculo['documento']);
		
		unlink("./uploads/cnh/".$veiculo['cnh']);

		$this->Motoristas_model->deleta_motorista($id);
    
	}
	
	
	
}
