<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class f_funcionarios extends CI_Controller {


	public function inicio()
	{
		
		$this->load->model('F_funcionarios_model');
		
		$data['funcionarios'] = $this->F_funcionarios_model->recebe_funcionarios();
		
		$data['pagina'] = $this->uri->segment(3);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/funcionarios');
		$this->load->view('financeiro/footer');
	}
	
	public function ver_funcionario()
	{
		$this->load->model('F_funcionarios_model');
		$this->load->model('F_advertencia_model');
		$this->load->model('F_solicitacao_servico_model');
	
		$id = $this->uri->segment(3);

		
		$data['id_funcionario'] = $id;
		
		$data['funcionario'] = $this->F_funcionarios_model->recebe_funcionario($id);

		$data['advertencias'] = $this->F_advertencia_model->recebe_advertencias($id);

		$data['servicos'] =  $this->F_solicitacao_servico_model->recebe_servicos_funcionario($data['funcionario']['nome']);
		

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/perfil_petroecol');
		$this->load->view('financeiro/footer');
	}


	public function edita_funcionario()
	{
		$this->load->model('F_funcionarios_model');

		$id = $this->uri->segment(3);

		$data['funcionario'] = $this->F_funcionarios_model->recebe_funcionario($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_edita_funcionario');
		$this->load->view('financeiro/footer');
	}
	

	public function formulario_funcionario()
	{
		$this->load->view('financeiro/header');
		$this->load->view('financeiro/formulario_cadastro_funcionario');
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

	public function cadastrar_funcionario()
	{ 	
		$this->load->library('upload');
	
		$this->load->model('F_funcionarios_model');

		$dados['nome'] = $_POST['nome'];
		$dados['data_nascimento'] = $_POST['data_nascimento'];
		$dados['grupo'] = $_POST['grupo'];
		$dados['opcao'] = $_POST['opcao'];
		$dados['sexo'] = $_POST['sexo'];
		$dados['tipo_cnh']= $_POST['tipo_cnh'];
		$dados['funcao'] = $_POST['funcao'];
		$dados['salario'] = $_POST['salario'];
		$dados['cpf'] = $_POST['cpf'];
		$dados['residencia'] = $_POST['residencia'];

		$foto_perfil = $_FILES['foto_perfil'];
		$doc_cpf = $_FILES['doc_cpf'];
		$aso = $_FILES['aso'];
		$epi = $_FILES['epi'];
		$ficha_registro = $_FILES['ficha_registro'];
		$carteira_trabalho = $_FILES['carteira_trabalho'];
		$carteira_vacinacao = $_FILES['carteira_vacinacao'];
		$certificados = $_FILES['certificados'];
		$doc_cnh = $_FILES['doc_cnh'];
		$ordem_servico = $_FILES['ordem_servico'];


		if($foto_perfil['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/foto_perfil/',
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
		   
			}else{
				
				if($dados['sexo'] == 'masculino'){
					$dados['foto_perfil'] = 'men_profile.png'; 
				}else{
					$dados['foto_perfil'] = 'woman_profile.png';
				};

			};



		if($doc_cpf['name'] != ""){ //veio imagem	
		
		$this->load->library('upload');
		
		$configuracao = array(
			'upload_path'   => './uploads/funcionarios/cpf/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('doc_cpf')){
			
        	$img = $this->upload->data();		
        	$dados['doc_cpf'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		};

		
		if($aso['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/aso/',
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
					'upload_path'   => './uploads/funcionarios/epi/',
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




		if($ficha_registro['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/ficha_registro/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('ficha_registro')){
				
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
				'upload_path'   => './uploads/funcionarios/carteira_trabalho/',
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
				'upload_path'   => './uploads/funcionarios/carteira_vacinacao/',
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
				'upload_path'   => './uploads/funcionarios/certificados/',
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

		if($doc_cnh['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/cnh/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('doc_cnh')){
				
			$img = $this->upload->data();		
			$dados['doc_cnh'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		if($ordem_servico['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/ordem_servico/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);

			if ($this->upload->do_upload('ordem_servico')){

			$img = $this->upload->data();		
			$dados['ordem_servico'] = $img['file_name'];
			
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		
		$this->F_funcionarios_model->cadastrar_funcionario($dados);
		
		redirect('F_funcionarios/inicio/');
	}


	public function atualiza_funcionario()
	{ 	
		$this->load->library('upload');
	
		$this->load->model('F_funcionarios_model');

		$id = $_POST['id'];
		$dados['nome'] = $_POST['nome'];
		$dados['data_nascimento'] = $_POST['data_nascimento'];
		$dados['grupo'] = $_POST['grupo'];
		$dados['opcao'] = $_POST['opcao'];
		$dados['sexo'] = $_POST['sexo'];
		$dados['tipo_cnh']= $_POST['tipo_cnh'];
		$dados['funcao'] = $_POST['funcao'];
		$dados['salario'] = $_POST['salario'];
		$dados['cpf'] = $_POST['cpf'];
		$dados['residencia'] = $_POST['residencia'];

		$foto_perfil = $_FILES['foto_perfil'];
		$doc_cpf = $_FILES['doc_cpf'];
		$aso = $_FILES['aso'];
		$epi = $_FILES['epi'];
		$ficha_registro = $_FILES['ficha_registro'];
		$carteira_trabalho = $_FILES['carteira_trabalho'];
		$carteira_vacinacao = $_FILES['carteira_vacinacao'];
		$certificados = $_FILES['certificados'];
		$doc_cnh = $_FILES['doc_cnh'];
		$ordem_servico = $_FILES['ordem_servico'];


		if($foto_perfil['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/foto_perfil/',
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
		   
			}else{
				
				

			};



		if($doc_cpf['name'] != ""){ //veio imagem	
		
		$this->load->library('upload');
		
		$configuracao = array(
			'upload_path'   => './uploads/funcionarios/cpf/',
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
	    $this->upload->initialize($configuracao);
			
		if ($this->upload->do_upload('doc_cpf')){
			
        	$img = $this->upload->data();		
        	$dados['doc_cpf'] = $img['file_name'];
			
       }
		else{
          echo $this->upload->display_errors();
        }
       
		};

		
		if($aso['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/aso/',
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
					'upload_path'   => './uploads/funcionarios/epi/',
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




		if($ficha_registro['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/ficha_registro/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('ficha_registro')){
				
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
				'upload_path'   => './uploads/funcionarios/carteira_trabalho/',
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
				'upload_path'   => './uploads/funcionarios/carteira_vacinacao/',
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
				'upload_path'   => './uploads/funcionarios/certificados/',
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

		if($doc_cnh['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/cnh/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('doc_cnh')){
				
			$img = $this->upload->data();		
			$dados['doc_cnh'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		if($ordem_servico['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/funcionarios/ordem_servico/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "150000",
			); 
			
			$this->upload->initialize($configuracao);

			if ($this->upload->do_upload('ordem_servico')){

			$img = $this->upload->data();		
			$dados['ordem_servico'] = $img['file_name'];
			
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		
		$this->F_funcionarios_model->atualiza_funcionario($dados, $id);
		
		redirect('f_funcionarios/inicio/');
	}


	public function deleta_funcionario(){
		
		$this->load->model('F_funcionarios_model');
		
        $id = $this->uri->segment(3);
	
		$this->F_funcionarios_model->deleta_funcionario($id);
		
		redirect('f_funcionarios/inicio/deletado');
	}



	public function download_cpf(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/cpf/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/cpf/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);

    
	}

	public function download_aso(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/aso/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/aso/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_ordem_servico(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/ordem_servico/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/ordem_servico/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_ficha_epi(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/ficha_epi/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/ficha_epi/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}
	
	public function download_ficha_registro(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/ficha_registro/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/ficha_registro/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_carteira_trabalho(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/carteira_trabalho/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/carteira_trabalho/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_carteira_vacinacao(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/carteira_vacinacao/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/carteira_vacinacao/'.$arquivo); // Read the file's contents
		
		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_cnh(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/cnh/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/cnh/'.$arquivo); // Read the file's contents
		
		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_certificados(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios/certificados/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios/certificados/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}


	public function formulario_advertencia()
	{

		$data['id'] = $this->uri->segment(3);


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_advertencia');
		$this->load->view('financeiro/footer');
	}


	public function ver_advertencia()
	{
		$this->load->model('F_advertencia_model');

		$id = $this->uri->segment(3);

		$data['advertencia'] = $this->F_advertencia_model->recebe_advertencia($id);

	
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_advertencia');
		$this->load->view('financeiro/footer');
	}


	public function inserir_advertencia()
	{ 	
		$this->load->library('upload');
	
		$this->load->model('F_advertencia_model');

		$dados['titulo'] =  $this->input->post('titulo');
		$dados['tipo'] =  $this->input->post('tipo');
		$dados['observacao'] =  $this->input->post('observacao');
		$dados['data'] =  $this->input->post('data');
		$dados['id_funcionario'] =  $this->input->post('id_funcionario');

		$arquivo = $_FILES['arquivo'];



		if($arquivo['name'] != ""){ //veio imagem	
		
			$this->load->library('upload');
			
			$configuracao = array(
				'upload_path'   => './uploads/advertencias/arquivo/',
				'allowed_types' => '*',
				'overwrite' => TRUE,
				'max_size' => "160000",
			); 
			
			$this->upload->initialize($configuracao);
				
			if ($this->upload->do_upload('arquivo')){
				
			$img = $this->upload->data();		
			$dados['arquivo'] = $img['file_name'];
				
		   }
			else{
			  echo $this->upload->display_errors();
			}
		   
		};

		
		$this->F_advertencia_model->cadastrar_advertencia($dados);
		
		redirect('F_funcionarios/inicio/');
	}


	public function deleta_advertencia(){

		$this->load->model('F_advertencia_model');

		$id = $this->uri->segment(3);

		$id_funcionario = $this->uri->segment(4);

		$this->F_advertencia_model->deleta_advertencia($id);

		redirect('F_funcionarios/ver_funcionario/'.$id_funcionario);

	}

	public function download_anexo(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/advertencias/arquivo/').$arquivo ;
		
		$data = file_get_contents('uploads/advertencias/arquivo/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}
	
	
}
