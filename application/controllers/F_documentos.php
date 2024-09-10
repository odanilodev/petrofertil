<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_documentos extends CI_Controller {


	public function inicio()
	{
		
		$this->load->model('F_funcionarios_model');
		$this->load->model('Documentos_petroecol_model');
		
		$data['funcionarios'] = $this->F_funcionarios_model->recebe_funcionarios();

		$data['documento'] = $this->Documentos_petroecol_model->recebe_documento();
		
		$data['pagina'] = $this->uri->segment(3);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/documentos');
		$this->load->view('financeiro/footer');
	}
	

	public function insere_documento()
	{ 	
		$this->load->library('upload');
		$this->load->model('Documentos_petroecol_model');

		$tipo_documento = $this->uri->segment(3);

		$data[$tipo_documento] = $_POST['data_vencimento'];

		$this->Documentos_petroecol_model->insere_documento($data);
	
		$tipos_imagem = ['jpg', 'jpeg', 'png', 'gif', 'pdf']; // tipos de dpc
		foreach ($tipos_imagem as $tipo) {
			$caminhos_imagem = glob('./uploads/documentos_petroecol/'.$tipo_documento.'/*.'.$tipo);
			foreach ($caminhos_imagem as $caminho_imagem) {
				unlink($caminho_imagem);
			}
		}

		$imagem_enviada =  $_FILES['file']['name'];
		
		$ext = end(explode('.', $imagem_enviada));
		
		$_FILES['file']['name'] = $tipo_documento.'.'.$ext;
		
		$configuracao = array(
			'upload_path'   => './uploads/documentos_petroecol/'.$tipo_documento,
			'allowed_types' => '*',
			'overwrite' => TRUE,
			'max_size' => "150000",
		); 
		
	    $this->upload->initialize($configuracao);	

		if ($this->upload->do_upload('file')){
        $img = $this->upload->data();		
       }
		else{
          echo $this->upload->display_errors();
        }
    
		redirect('F_documentos/inicio/');
	}


	public function download_documento(){
		
			
		$this->load->helper('download');
		
        $documento = $this->uri->segment(3);
			
		$arquivoPath = base_url('uploads/documentos_petroecol/').$documento.'/' ;

	
	// Define o caminho para a pasta de uploads
	$upload_path = './uploads/documentos_petroecol/'.$documento.'/';

	// Define o padrão de busca para qualquer arquivo na pasta de uploads
	$search_pattern = $upload_path . '*';

	// Usa a função glob() para obter uma lista de arquivos que correspondem ao padrão de busca
	$file_list = glob($search_pattern);

	// Verifica se há apenas um arquivo na lista de arquivos
	if (count($file_list) === 1) {
		// Obtém o nome e a extensão do arquivo usando a função pathinfo()
		$file_info = pathinfo($file_list[0]);
		$file_name = $file_info['filename'];
		$file_ext = $file_info['extension'];

		// Exibe o nome e a extensão do arquivo
		// echo 'Nome do arquivo: ' . $file_name . '<br>';
		// echo 'Extensão do arquivo: ' . $file_ext;
	} 

		$path = base_url('uploads/documentos_petroecol/').$documento.'/'.$file_name.'.'.$file_ext;
	
		$data = file_get_contents('uploads/documentos_petroecol/'.$documento.'/'.$file_name.'.'.$file_ext, true);

		$nome = $file_name.'.'.$file_ext;
		
		force_download($nome, $data);


		redirect('F_documentos/inicio/');

		
	}
	
}
