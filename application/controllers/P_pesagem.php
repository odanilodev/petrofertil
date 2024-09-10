<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_pesagem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('P_tickets_model');
    }

    public function index()
    {

        $data_inicial = $this->input->post('data_inicial');
        $data_final = $this->input->post('data_final');

        if (!empty($data_inicial) && !empty($data_final)) {
            $tickets = $this->P_tickets_model->recebe_tickets_entre_datas($data_inicial, $data_final);
        } else {
            $tickets = $this->P_tickets_model->recebe_tickets();
        }

        $total_tickets = count($tickets);

        $liquido_total = 0;

        foreach ($tickets as $ticket) {
            $liquido_total = $liquido_total + $ticket['liquido_final'];
        }

        $data['liquido_total'] = $liquido_total;
        $data['total_tickets'] = $total_tickets;
        $data['tickets'] = $tickets;

        $this->load->view('petrofertil/header', $data);
        $this->load->view('petrofertil/tickets_petrofertil');
        $this->load->view('petrofertil/footer');

    }

    public function formulario_ticket()
    {
        $this->load->model('P_contas_model');
        $this->load->model('P_vendedores_petrofertil_model');
        $this->load->model('Clientes_petrofertil_model');
        $this->load->model('P_motoristas_model');
        $this->load->model('P_produtos_model');
        $this->load->model('P_transportadores_model');

        $data['contas'] = $this->P_contas_model->recebe_contas();
        $data['clientes'] = $this->Clientes_petrofertil_model->recebe_clientes();
        $data['vendedores'] = $this->P_vendedores_petrofertil_model->recebe_vendedores();
        $data['motoristas'] = $this->P_motoristas_model->recebe_motoristas();
        $data['produtos'] = $this->P_produtos_model->recebe_produtos();
        $data['transportadores'] = $this->P_transportadores_model->recebe_transportadores();

        $this->load->view('petrofertil/header', $data);
        $this->load->view('petrofertil/formulario_ticket');
        $this->load->view('petrofertil/footer');

    }


    public function lancar_saida()
    {
        $id_ticket = $this->uri->segment('3');

        $this->load->model('P_contas_model');
        $this->load->model('P_vendedores_petrofertil_model');
        $this->load->model('Clientes_petrofertil_model');
        $this->load->model('P_motoristas_model');
        $this->load->model('P_produtos_model');
        $this->load->model('P_transportadores_model');

        $data['contas'] = $this->P_contas_model->recebe_contas();
        $data['clientes'] = $this->Clientes_petrofertil_model->recebe_clientes();
        $data['vendedores'] = $this->P_vendedores_petrofertil_model->recebe_vendedores();
        $data['motoristas'] = $this->P_motoristas_model->recebe_motoristas();
        $data['produtos'] = $this->P_produtos_model->recebe_produtos();
        $data['transportadores'] = $this->P_transportadores_model->recebe_transportadores();

        $data['ticket'] = $this->P_tickets_model->recebe_ticket($id_ticket);

        $this->load->view('petrofertil/header', $data);
        $this->load->view('petrofertil/formulario_ticket_saida');
        $this->load->view('petrofertil/footer');

    }


    public function gerador_ticket()
    {
        $this->load->model('P_tickets_model');
        $this->load->model('Clientes_petrofertil_model');
        $this->load->model('P_veiculos_model');

        $id_cliente = $this->input->post('cliente');

        $cliente = $this->Clientes_petrofertil_model->recebe_cliente($id_cliente);

        $data['cliente'] = $cliente['nome_fantasia'];
        $data['vendedor'] = $this->input->post('vendedor');
        $data['transportador'] = $this->input->post('transportador');
        $data['motorista'] = $this->input->post('motorista');

        // Ajuste para o fuso horário de São Paulo
        date_default_timezone_set('America/Sao_Paulo');
        $data['data_entrada'] = date('Y-m-d H:i');

        $data['placa'] = $this->input->post('placa');
        $data['produto'] = json_encode($this->input->post('produto'));
        $data['quantidade'] = json_encode($this->input->post('quantidade'));
        $data['peso_bruto'] = $this->input->post('peso-bruto');
        $data['tara'] = $this->input->post('tara');
        $data['peso_liquido'] = $this->input->post('peso-liquido');
        $data['descontos'] = $this->input->post('descontos');
        $data['liquido_final'] = $this->input->post('liquido-final');
        $data['documento'] = $cliente['documento'];
        $data['status'] = 1; // Define como patio o status

        $veiculo = $this->P_veiculos_model->recebe_veiculo_placa($data['placa']);

        if (!empty($veiculo)) {
            $data['tipo_veiculo'] = $veiculo['tipo_veiculo'];
        } else {
            $data['tipo_veiculo'] = '';
        }

        // Gera o ticket automaticamente
        $ticket_count = $this->P_tickets_model->contar_tickets();
        $novo_ticket_numero = $ticket_count + 1;
        $data['ticket'] = str_pad($novo_ticket_numero, 6, '0', STR_PAD_LEFT);

        $this->P_tickets_model->inserir_ticket($data);

        redirect('P_pesagem');
    }

    public function saida_ticket()
    {
        $this->load->model('P_tickets_model');
        $this->load->model('Clientes_petrofertil_model');

        $id = $this->input->post('id');

        // Ajuste para o fuso horário de São Paulo
        date_default_timezone_set('America/Sao_Paulo');
        $data['data_saida'] = date('Y-m-d H:i');

        $data['peso_bruto'] = $this->input->post('peso-bruto');
        $data['tara'] = $this->input->post('tara');
        $data['peso_liquido'] = $this->input->post('peso-liquido');
        $data['descontos'] = $this->input->post('descontos');
        $data['liquido_final'] = $this->input->post('liquido-final');
        $data['status'] = 2;

        $this->P_tickets_model->edita_ticket($id, $data);

        redirect('P_pesagem');
    }


    public function download_ticket()
    {
        $this->load->model('P_tickets_model');
        $this->load->model('Clientes_petrofertil_model');

        $id_ticket = $this->uri->segment(3);

        $data['ticket'] = $this->P_tickets_model->recebe_ticket($id_ticket);

        $this->load->view('petrofertil/ticket_download_pdf', $data);
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
        $this->pdf->set_paper('A4', 'landscape'); // 'landscape' for horizontal orientation
        $this->pdf->loadHtml($html);
        $this->pdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("ticket.pdf", array("Attachment" => 0));

    }

    public function deleta_ticket()
    {
        $this->load->model('P_tickets_model');

        $id = $this->uri->segment(3);

        $exclusao_sucesso = $this->P_tickets_model->deleta_ticket($id);

        if ($exclusao_sucesso) {
            redirect('P_pesagem');
        } else {
            redirect('P_pesagem');
        }
    }

    public function abrir_painel_balanca()
    {
        $this->load->library('PhpSerial'); // Carrega a biblioteca automaticamente

        $serial = new PhpSerial();
        $serial->deviceSet("COM3"); // Use COM3, já que foi identificada no Gerenciador de Dispositivos
        $serial->confBaudRate(9600); // Configuração comum, verifique a documentação da balança para a taxa correta
        $serial->confParity("none");
        $serial->confCharacterLength(8);
        $serial->confStopBits(1);
        $serial->deviceOpen();

        // Enviar o comando para abrir o painel da balança
        $serial->sendMessage("OPEN_PANEL"); // Substitua "OPEN_PANEL" pelo comando real que a balança entende

        // Fechar a comunicação serial após o envio do comando
        $serial->deviceClose();

        // Retornar uma resposta ao JavaScript que chamou essa função
        echo json_encode(['status' => 'success']);
    }

}