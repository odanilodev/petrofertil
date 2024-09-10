<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

	
	    public function email($email,$mensagem,$assunto,$nome)
	    {
			
            $config['smtp_host'] = 'mail.petroecol.com.br';
            $config['smtp_port'] = '587';
            $config['smtp_user'] = 'contato@petroecol.com.br';
            $config['smtp_pass'] = '@123contatopetroecol';
            $config['protocol'] = 'smtp';
		      	$config['wordwrap'] = TRUE;
            $config['validate'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
			
            $html = "<h2>Olá, $nome</h2>";
            
            $html .= $mensagem;
            
            $html .= "<h4>$email</h4>";
        
            $email2 = 'contato@petroecol.com.br';
        
            
        
 
        // Inicializa a library Email, passando os parâmetros de configuração
        $this->email->initialize($config);
        
        // Define remetente e destinatário
        $this->email->from('contato@petroecol.com.br', 'Petroecol Site'); // Remetente
        $this->email->to($email2, $nome); // Destinatário
		    $this->email->reply_to($email);
 
        // Define o assunto do email
        $this->email->subject($assunto);
		
		    $this->email->message($html); // conteudo para mensagem
 
        /*
         * Se o envio foi feito com sucesso, define a mensagem de sucesso
         * caso contrário define a mensagem de erro, e carrega a view home
         */
        
        if($this->email->send()){
         redirect('');
        }else{
          return 0;
        }
			
		}
	
	
	
	 public function email_trabalhe($email,$mensagem,$assunto,$nome,$arquivo)
	    {
		 
		 
			$this->load->library('upload');
				
		
			  $config = array(
				'upload_path'   => './uploads/',
				'allowed_types' => 'jpg|jpeg|png|bmp|doc|docx|pdf|raw',
				'max_size'      => '500000'
				 ); 
				
				 $this->upload->initialize($config);
				
				$this->upload->do_upload('arquivo');
				
			    $img = $this->upload->data();
			
				$caminho = './uploads/'.$img['file_name'];
			
            $config['smtp_host'] = 'mail.petroecol.com.br';
            $config['smtp_port'] = '587';
            $config['smtp_user'] = 'contato@petroecol.com.br';
            $config['smtp_pass'] = '@123contatopetroecol';
            $config['protocol'] = 'smtp';
			$config['wordwrap'] = TRUE;
            $config['validate'] = TRUE;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
			
            $html = "<h2>Curriculo de, $nome</h2>";
            
            $html .= $mensagem;
            
            $html .= "<h4>$email</h4>";
        
            $email2 = 'contato@petroecol.com.br';
        
            
        
			 
			
 
        // Inicializa a library Email, passando os parâmetros de configuração
        $this->email->initialize($config);
        
        // Define remetente e destinatário
        $this->email->from('contato@petroecol.com.br', 'Petroecol Site'); // Remetente
        $this->email->to($email2, $nome); // Destinatário
		    $this->email->reply_to($email);
		 $this->email->attach($caminho);
 
        // Define o assunto do email
        $this->email->subject($assunto);
		
		    $this->email->message($html); // conteudo para mensagem
 
        /*
         * Se o envio foi feito com sucesso, define a mensagem de sucesso
         * caso contrário define a mensagem de erro, e carrega a view home
         */
        
        if($this->email->send()){
         redirect('');
        }else{
          return 0;
        }
			
		}

	

	
}

