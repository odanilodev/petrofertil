<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motoristas extends CI_Controller {
	
	
	public function index()
	{
		$this->load->model('Motoristasp_model');
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/motoristas_petroecol');
		$this->load->view('admin/footer');	
	}

	public function exibir_uso_veiculos()
	{
		$this->load->model('F_afericao_model');
		
		$data['afericao'] = $this->F_afericao_model->recebe_afericao();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_uso_veiculos');
		$this->load->view('admin/footer');
	}

	public function filtra_uso_veiculos()
	{
		$this->load->model('F_afericao_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		$data['afericao'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_uso_veiculos');
		$this->load->view('admin/footer');
	}
	
	
	
	public function formulario_motoristas()
	{
		
		$this->load->model('Veiculos_model');
		
		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/cadastro_motoristas');
		$this->load->view('admin/footer');	
	}
	
	public function edita_motorista()
	{
		
		$id = $this->uri->segment(3);
		
		
		$this->load->model('Veiculos_model');
		
		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();
		
		
		$this->load->model('Motoristasp_model');
		
		$data['motorista'] = $this->Motoristasp_model->recebe_motorista($id);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/edita_motorista');
		$this->load->view('admin/footer');	
	}
	
	
	public function cadastra_motorista()
	{ 	
		$this->load->library('upload');
		
		$this->load->model('Motoristasp_model');
		
		$id = $this->input->post('id');
		

		$dados['nome'] = $this->input->post('nome');
		$dados['carro'] = $this->input->post('carro');
		$dados['funcao'] = $this->input->post('funcao');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['data_cnh'] = $this->input->post('data_cnh');
		
		
		
		$foto_cnh = $_FILES['foto_cnh'];
		$foto_perfil = $_FILES['foto_perfil'];
		
		
		
		
		if($foto_cnh['name'] != ""){ //veio imagem
				
		
		$this->load->library('upload');
		
	
		$configuracao = array(
			'upload_path'   => './uploads/cnh_motoristas/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('foto_cnh')){
			
        $img = $this->upload->data();		
        $dados['foto_cnh'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		};
		
		
		if($foto_perfil['name'] != ""){ //veio imagem
				
		
		$this->load->library('upload');
		
	
		$configuracao = array(
			'upload_path'   => './uploads/foto_motoristas/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('foto_perfil')){
			
        $img = $this->upload->data();		
        $dados['foto_perfil'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		}
		

		
	
		
			if($id >= 1){
			
		
		
			$this->Motoristasp_model->edita_motorista($dados, $id);
			redirect('motoristas');
			
		}else{
			

			
		$this->Motoristasp_model->inserir_motorista($dados);
		}
		
	}
	


	
	public function download_cnh(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/cnh_motoristas/').$arquivo ;
		
		$data = file_get_contents('uploads/cnh_motoristas/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);
    
	}
	

	
	public function deleta_motorista(){
		
		$this->load->model('Motoristasp_model');
		
        $id = $this->uri->segment(3);

		$this->Motoristasp_model->deleta_motorista($id);
    
	}
	
	
	
}
