<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_jobs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('P_jobs_model');

	}
	
    public function lembrete_financeiro()
	{

        //Criar notificacao via email e whatsapp
        
		
	}
   
}