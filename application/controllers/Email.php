<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function index()
	{ 
		
	$this->load->library('email');
		
    $this->load->model('Email_model');
    

    $spam = $this->input->post('email');

    if($spam != ''){

        redirect('https://www.google.com.br');

    }


    $email = $this->input->post('e-mail');
    $nome = $this->input->post('nome');
    $assunto = $this->input->post('assunto');
    $mensagem = $this->input->post('mensagem');
    
   /* $email = 'contato-danilo@hotmail.com';
    $nome = 'Danilo';
    $assunto = 'teste';
    $mensagem = 'teste mensagemmmmmm';*/
    
    $res = $this->Email_model->email($email,$mensagem,$assunto,$nome);
    
  
    
	}
	
	public function trabalhe()
	{ 
		
	$this->load->library('email');
		
    $this->load->model('Email_model');
    
    $email = $this->input->post('email');
    $nome = $this->input->post('nome');
    $assunto = $this->input->post('assunto');
	$arquivo = $this->input->post('arquivo');
    $mensagem = $this->input->post('mensagem');
    
   /* $email = 'contato-danilo@hotmail.com';
    $nome = 'Danilo';
    $assunto = 'teste';
    $mensagem = 'teste mensagemmmmmm';*/
    
    $res = $this->Email_model->email_trabalhe($email,$mensagem,$assunto,$nome,$arquivo);
    
  
    
	}
	
	
	
}
