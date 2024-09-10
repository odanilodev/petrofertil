<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_veiculos extends CI_Controller
{

    public function index()
    {
        $this->load->model('P_veiculos_model');

        $data['veiculos'] = $this->P_veiculos_model->recebe_veiculos();

        $this->load->view('petrofertil/header', $data);
        $this->load->view('petrofertil/veiculos');
        $this->load->view('petrofertil/footer');
    }

    public function ver_veiculos_transportador()
    {
        $id_transportador = $this->uri->segment(3);

        $this->load->model('P_veiculos_model');
        $this->load->model('P_transportadores_model');

        $data['transportador'] = $this->P_transportadores_model->recebe_transportador($id_transportador);

        $data['veiculos'] = $this->P_veiculos_model->recebe_veiculos_transportador($id_transportador);

        $this->load->view('petrofertil/header', $data);
        $this->load->view('petrofertil/veiculos_tranportador');
        $this->load->view('petrofertil/footer');
    }

    public function formulario_veiculos()
    {
        $id = $this->uri->segment(3);

        $this->load->model('P_veiculos_model');
        $this->load->model('P_transportadores_model');

        $data['transportadores'] = $this->P_transportadores_model->recebe_transportadores();

        $data['veiculo'] = $this->P_veiculos_model->recebe_veiculo($id);

        $this->load->view('petrofertil/header', $data);
        $this->load->view('petrofertil/formulario_veiculo');
        $this->load->view('petrofertil/footer');
    }

    public function cadastra_veiculo()
    {

        $this->load->model('P_veiculos_model');

        $id = $this->input->post('id');

        $dados['modelo'] = $this->input->post('modelo');
        $dados['marca'] = $this->input->post('marca');
        $dados['placa'] = $this->input->post('placa');
        $dados['id_transportador'] = $this->input->post('id_transportador');
        $dados['tipo_veiculo'] = $this->input->post('tipo_veiculo');


        if ($id > 0) {
            $this->P_veiculos_model->edita_veiculo($dados, $id);
        } else {
            $this->P_veiculos_model->inserir_veiculo($dados);
        }

        redirect('p_veiculos');

    }

    public function deleta_veiculo()
    {

        $id = $this->uri->segment(3);

        $this->load->model('P_veiculos_model');

        $this->P_veiculos_model->deleta_veiculo($id);

        return ('p_veiculos');
    }

}
