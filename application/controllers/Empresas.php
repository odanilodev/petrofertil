<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function empresa1()
	{
		$this->load->view('header');
		$this->load->view('empresa1');
		$this->load->view('footer');
	}
	
	public function empresa2()
	{
		$this->load->view('header');
		$this->load->view('empresa2');
		$this->load->view('footer');
	}
	
	public function empresa3()
	{
		$this->load->view('header');
		$this->load->view('empresa3');
		$this->load->view('footer');
	}
}
