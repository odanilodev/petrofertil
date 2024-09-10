<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_funcionarios extends CI_Controller {


	public function inicio()
	{
		
		$this->load->model('P_funcionarios_model');
		
		$data['funcionarios'] = $this->P_funcionarios_model->recebe_funcionarios();
		
		$data['pagina'] = $this->uri->segment(3);
		
		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/funcionarios');
		$this->load->view('petrofertil/footer');
	}
	
	public function ver_funcionario()
	{
		$this->load->model('P_funcionarios_model');
		$this->load->model('P_solicitacao_servico_model');
		
		
		$id = $this->uri->segment(3);
		
		$data['id_funcionario'] = $id;
		
		$data['funcionario'] = $this->P_funcionarios_model->recebe_funcionario($id);

		$data['servicos'] =  $this->P_solicitacao_servico_model->recebe_servicos_funcionario($data['funcionario']['nome']);
		
		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/perfil_petrofertil');
		$this->load->view('petrofertil/footer');
	}


	public function edita_funcionario()
	{
		$this->load->model('P_funcionarios_model');

		$id = $this->uri->segment(3);

		$data['funcionario'] = $this->P_funcionarios_model->recebe_funcionario($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_edita_funcionario');
		$this->load->view('petrofertil/footer');
	}
	

	public function formulario_funcionario()
	{
		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/formulario_cadastro_funcionario');
		$this->load->view('petrofertil/footer');
	}

	
	public function cadastrar_funcionario()
	{ 	
		$this->load->library('upload');
	
		$this->load->model('P_funcionarios_model');

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
				'upload_path'   => './uploads/funcionarios_petrofertil/foto_perfil/',
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
			'upload_path'   => './uploads/funcionarios_petrofertil/cpf/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/aso/',
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
					'upload_path'   => './uploads/funcionarios_petrofertil/epi/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/ficha_registro/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/carteira_trabalho/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/carteira_vacinacao/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/certificados/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/cnh/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/ordem_servico/',
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

		
		$this->P_funcionarios_model->cadastrar_funcionario($dados);
		
		redirect('P_funcionarios/inicio/');
	}


	public function atualiza_funcionario()
	{ 	
		$this->load->library('upload');
	
		$this->load->model('P_funcionarios_model');

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
				'upload_path'   => './uploads/funcionarios_petrofertil/foto_perfil/',
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
			'upload_path'   => './uploads/funcionarios_petrofertil/cpf/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/aso/',
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
					'upload_path'   => './uploads/funcionarios_petrofertil/epi/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/ficha_registro/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/carteira_trabalho/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/carteira_vacinacao/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/certificados/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/cnh/',
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
				'upload_path'   => './uploads/funcionarios_petrofertil/ordem_servico/',
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

		
		$this->P_funcionarios_model->atualiza_funcionario($dados, $id);
		
		redirect('p_funcionarios/inicio/');
	}


	public function deleta_funcionario(){
		
		$this->load->model('P_funcionarios_model');
		
        $id = $this->uri->segment(3);
	
		$this->P_funcionarios_model->deleta_funcionario($id);
		
		redirect('p_funcionarios/inicio/deletado');
	}



	public function download_cpf(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/cpf/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/cpf/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);

    
	}

	public function download_aso(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/aso/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/aso/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_ordem_servico(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/ordem_servico/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/ordem_servico/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_ficha_epi(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/ficha_epi/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/ficha_epi/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}
	
	public function download_ficha_registro(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/ficha_registro/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/ficha_registro/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_carteira_trabalho(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/carteira_trabalho/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/carteira_trabalho/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_carteira_vacinacao(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/carteira_vacinacao/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/carteira_vacinacao/'.$arquivo); // Read the file's contents
		
		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_cnh(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/cnh/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/cnh/'.$arquivo); // Read the file's contents
		
		redirect($_SERVER['HTTP_REFERER']);
    
	}

	public function download_certificados(){
		
		$this->load->helper('download');
		
        $arquivo = $this->uri->segment(3);
		
		$arquivoPath = base_url('uploads/funcionarios_petrofertil/certificados/').$arquivo ;
		
		$data = file_get_contents('uploads/funcionarios_petrofertil/certificados/'.$arquivo); // Read the file's contents
		
		force_download($arquivoPath, $data);

		redirect($_SERVER['HTTP_REFERER']);
    
	}
	
	
}
