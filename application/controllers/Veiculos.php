<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculos extends CI_Controller {

	public function index()
	{ 	
		
		$this->load->model('Veiculos_model');
		
		$data['carros'] = $this->Veiculos_model->recebe_veiculos();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_veiculos');
		$this->load->view('admin/footer');
	}
	
	public function detalhe_veiculo()
	{ 	
		
		$this->load->model('Veiculos_model');
		
		$id = $this->uri->segment(3);
		
		$data['veiculo'] = $this->Veiculos_model->recebe_veiculo($id);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/detalhe_veiculo');
		$this->load->view('admin/footer');
	}
	
	
	public function formulario_veiculos()
	{ 	
		
		$this->load->model('Veiculos_model');
		
		$id = $this->uri->segment(3);
		
		$data['veiculo'] = $this->Veiculos_model->recebe_veiculo($id);
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/formulario_veiculos');
		$this->load->view('admin/footer');
	}
	
	public function cadastra_veiculos()
	{ 	
		$this->load->library('upload');
		
		$this->load->model('Veiculos_model');
		
		$id = $this->input->post('id');
		
		$cadastro = $this->Veiculos_model->recebe_veiculo($id);

		$dados['modelo'] = $this->input->post('modelo');
		$dados['placa'] = $this->input->post('placa');
		$dados['litros'] = $this->input->post('litros');
		$dados['arquivo'] = $this->input->post('arquivo');
		$dados['documento'] = $this->input->post('documento');
		
		$arquivo = $_FILES['arquivo'];
		$documento = $_FILES['documento'];

		
	
			if($arquivo['name'] != ""){ //veio imagem
				
      
          if($cadastro['arquivo'] != ""){ // tem imagem no banco de dados?

            unlink("./uploads/".$cadastro['arquivo']);

          }
				
				
		
		$this->load->library('upload');
		
	
		$configuracao = array(
			'upload_path'   => './uploads/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('arquivo')){
			
        $img = $this->upload->data();		
        $dados['arquivo'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		}
		
		
		
		
		if($documento['name'] != ""){ //veio imagem
				
      
          if($cadastro['documento'] != ""){ // tem imagem no banco de dados?

            unlink("./uploads/documentos_veiculos/".$cadastro['documento']);

          }
		$this->load->library('upload');
		
	
		$configuracao = array(
			'upload_path'   => './uploads/documentos_veiculos/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('documento')){
			
        $nome = $this->upload->data();		
        $dados['documento'] = $nome['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		}
		
		
		if($id >= 1){
			
			if($arquivo['name'] == ""){
				
				$dados['arquivo'] = $cadastro['arquivo'];
			
			}
			
			if($documento['name'] == ""){
				
				$dados['documento'] = $cadastro['documento'];
			
			}
		
		
			$this->Veiculos_model->edita_veiculo($dados, $id);
			
		}else{
			

			
			$this->Veiculos_model->inserir_veiculo($dados);
		}
		
	}
	
	
	public function deleta_veiculo(){
		
        $id = $this->uri->segment(3);
		
		$this->load->model('Veiculos_model');
		
		$veiculo = $this->Veiculos_model->recebe_veiculo($id);
		
		unlink("./uploads/".$veiculo['arquivo']);
		unlink("./uploads/documentos_veiculos/".$veiculo['documento']);

		$this->Veiculos_model->deleta_veiculo($id);
    
	}
	
	
	public function download_documento(){
		
		$this->load->helper('download');
		
        $id = $this->uri->segment(3);
		
		
		$this->load->model('Veiculos_model');
		
		$veiculo = $this->Veiculos_model->recebe_veiculo($id);
		
		if($veiculo['documento'] == ''){
			
			redirect('veiculos');
			
		}
		
		
		$arquivoPath = base_url('uploads/documentos_veiculos/').$veiculo['documento'] ;
		
		$data = file_get_contents('uploads/documentos_veiculos/'.$veiculo['documento']); // Read the file's contents
		
		force_download($arquivoPath, $data);

    
	}
	
	
	
	
}
