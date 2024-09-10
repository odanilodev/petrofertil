<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_motoristas extends CI_Controller {


	public function inicio()
	{
		
		$this->load->model('Motoristasp_model');
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();
		
		$data['pagina'] = $this->uri->segment(3);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/motoristas');
		$this->load->view('financeiro/footer');
	}
	
	public function afericao_motorista()
	{
		$this->load->model('Motoristasp_model');
		
		$this->load->model('F_afericao_model');
		
		$id = $this->uri->segment(3);
		
		$recebe_motorista = $this->Motoristasp_model->recebe_motorista($id);
		
		$motorista = $recebe_motorista['nome'];
		
		$data['motorista'] = $motorista;
		
		$data['pagina'] = '';
		
		$data['afericoes'] = $this->F_afericao_model->recebe_afericao_motorista($motorista);
		
		$data['afericoes_ajudante'] = $this->F_afericao_model->recebe_afericao_motorista_ajudante($motorista);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericao_motorista');
		$this->load->view('financeiro/footer');
	}
	

	public function formulario_usuario()
	{
		$this->load->model('Motoristasp_model');

		$id = $this->uri->segment(3);
		
		$data['motorista'] = $this->Motoristasp_model->recebe_motorista($id);
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_usuario_motorista');
		$this->load->view('financeiro/footer');
	}

	public function atualiza_cadastro()
	{
		$this->load->model('Motoristasp_model');

		
		$id = $this->input->post('id');
		$dados['usuario'] = strtolower($this->input->post('usuario'));
		$dados['senha'] = $this->input->post('senha');
		
		$this->Motoristasp_model->edita_motorista($dados, $id);	

		redirect('F_motoristas/inicio');
	
	}

	public function ver_documentos()
	{
		
		$this->load->model('Motoristasp_model');
		
		
		$id = $this->uri->segment(3);
		
		$data['motorista'] = $this->Motoristasp_model->recebe_motorista($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_documentos');
		$this->load->view('financeiro/footer');
	}

	public function cadastrar_documentos()
	{
		$this->load->model('Motoristasp_model');

		$id = $this->uri->segment(3);
		
		$data['motorista'] = $this->Motoristasp_model->recebe_motorista($id);
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_documentos');
		$this->load->view('financeiro/footer');
	}

	public function atualizar_documentos()
	{ 	
		$this->load->library('upload');
		
		$this->load->model('Motoristasp_model');
		
		$id = $this->input->post('id');
		

		$cpf = $_FILES['cpf'];
		$aso = $_FILES['aso'];
		$epi = $_FILES['epi'];
		$registro = $_FILES['registro'];
		$carteira_trabalho = $_FILES['carteira_trabalho'];
		$carteira_vacinacao = $_FILES['carteira_vacinacao'];
		$certificados = $_FILES['certificados'];


		if($cpf['name'] != ""){ //veio imagem	
		
		$this->load->library('upload');
		
		$configuracao = array(
			'upload_path'   => './uploads/cpf/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('cpf')){
			
        $img = $this->upload->data();		
        $dados['cpf'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		};

		
		if($aso['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/aso/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('aso')){
				
			$img = $this->upload->data();		
			$dados['aso'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
			};


			if($epi['name'] != ""){ //veio imagem	
		
				$this->load->library('upload');
				
				$configuracao = array(
					'upload_path'   => './uploads/epi/',
					'allowed_types' => '*',
					'overwrite' => TRUE,
					'max_size' => "180000",
				); 
				
				$this->upload->initialize($configuracao);
					
				if ($this->upload->do_upload('epi')){
					
				$img = $this->upload->data();		
				$dados['epi'] = $img['file_name'];
					
			   }
				else{
				  echo $this->upload->display_errors();
				}
			   
				};




		if($registro['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/ficha_registro/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('registro')){
				
			$img = $this->upload->data();		
			$dados['registro'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};


		if($carteira_trabalho['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/carteira_trabalho/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('carteira_trabalho')){
				
			$img = $this->upload->data();		
			$dados['carteira_trabalho'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		if($carteira_vacinacao['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/carteira_vacinacao/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('carteira_vacinacao')){
				
			$img = $this->upload->data();		
			$dados['carteira_vacinacao'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		if($certificados['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/certificados/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('certificados')){
				
			$img = $this->upload->data();		
			$dados['certificados'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		
		$this->Motoristasp_model->edita_motorista($dados, $id);
		
		redirect('F_motoristas/ver_documentos/'.$id);
	}



	public function download_cpf(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/cpf/').$arquivo ;
		
		$data = file_get_contents('uploads/cpf/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect('F_motoristas/ver_documentos');
    
	}

	public function download_aso(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/aso/').$arquivo ;
		
		$data = file_get_contents('uploads/aso/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect('F_motoristas/ver_documentos');
    
	}

	public function download_epi(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/epi/').$arquivo ;
		
		$data = file_get_contents('uploads/epi/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect('F_motoristas/ver_documentos');
    
	}
	
	public function download_registro(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/ficha_registro/').$arquivo ;
		
		$data = file_get_contents('uploads/ficha_registro/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect('F_motoristas/ver_documentos');
    
	}

	public function download_carteira_trabalho(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/carteira_trabalho/').$arquivo ;
		
		$data = file_get_contents('uploads/carteira_trabalho/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect('F_motoristas/ver_documentos');
    
	}

	public function download_carteira_vacinacao(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/carteira_vacinacao/').$arquivo ;
		
		$data = file_get_contents('uploads/carteira_vacinacao/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

    
	}

	public function download_certificados(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/certificados/').$arquivo ;
		
		$data = file_get_contents('uploads/certificados/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect('F_motoristas/ver_documentos');
    
	}
	
	
}
