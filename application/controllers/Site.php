<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{


	public function index()
	{
		return redirect()->to('Inicio');
	}


	public function trabalhe()
	{
		$this->load->view('header2');
		$this->load->view('trabalhe');
		$this->load->view('footer');
	}

	public function solicitacao()
	{
		$this->load->view('header2');
		$this->load->view('solicitacao');
		$this->load->view('footer');
	}

	public function download_politica()
	{


		$this->load->helper('download');

		$arquivoPath = base_url('uploads/politicadeprivacidade.pdf');

		$data = file_get_contents('uploads/politicadeprivacidade.pdf'); // Read the file's contents

		force_download($arquivoPath, $data);


	}


}
