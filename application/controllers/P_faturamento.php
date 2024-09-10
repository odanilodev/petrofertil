<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_faturamento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }


    public function index()
    {
        $this->load->model('P_contas_model');
        $this->load->model('P_fluxo_model');
        $this->load->model('P_vendas_model');
        $this->load->model('P_cheques_model');
        $this->load->model('P_contas_pagar_model');
        $this->load->model('P_contas_receber_model');

        // Verificar se as datas foram recebidas por POST
        $data_inicial = $this->input->post('data_inicial');
        $data_final = $this->input->post('data_final');
        $faturamento = $this->input->post('faturamento');

        // Se não foram recebidas, definir para o mês atual
        if (empty($data_inicial) || empty($data_final)) {
            $data_inicial = date('Y-m-01'); // Primeiro dia do mês atual
            $data_final = date('Y-m-t');    // Último dia do mês atual
        }


        $data['data_inicial'] = $data_inicial;
        $data['data_final'] = $data_final;
        $data['faturamento'] = $faturamento;

        //calculo total a pagar
        $data['contas'] = $this->P_contas_pagar_model->recebe_contas_filtrada_data($data_inicial, $data_final);

        foreach ($data['contas'] as $c) {
            if ($c['status'] == 0) {
                $pagar += $c['valor'];
            }
        }
        $data['pagar_total'] = $pagar;


        //calculo contas a receber
        $data['contas'] = $this->P_contas_receber_model->recebe_contas_filtrada_data($data_inicial, $data_final);
        $contas = $data['contas'];

        $receber = 0;

        foreach ($contas as $c) {

            if ($c['status'] == 0) {

                $receber = $receber + $c['valor'];
            }

        }

        $data['receber_total'] = $receber;


        // Inicio Calculo total Fluxo
        $bancos = $this->P_contas_model->recebe_contas();
        $saldo = 0;
        foreach ($bancos as $b) {
            $saldo += $b['saldo'];
        }

        $data['saldo'] = $saldo;

        $fluxos = $this->P_fluxo_model->recebe_fluxo_data($data_inicial, $data_final);
        $data['fluxos'] = $fluxos;
        $total_entrada = 0;
        $total_saida = 0;

        foreach ($fluxos as $fluxo) {
            if ($fluxo['despesa'] == "Saída") {
                $total_saida += $fluxo['valor'];
            } else {
                $total_entrada += $fluxo['valor'];
            }
        }

        // Se faturamento for igual a Bruto, altera a forma de receber cheques e soma os valores ao total de entrada
        if ($faturamento == "Bruto") {
            $cheques = $this->P_cheques_model->recebe_cheques_sem_posse($data_inicial, $data_final);
            $data['cheques'] = $cheques;

            foreach ($cheques as $cheque) {
                $total_entrada += $cheque['valor']; // Supondo que 'valor' seja a chave do valor do cheque no array

            }
        } else {
            $data['cheques'] = $this->P_cheques_model->recebe_cheques_status($data_inicial, $data_final, 'Compensado');
        }

        $data['total_entrada'] = $total_entrada;
        $data['total_saida'] = $total_saida;
        $data['balanco'] = $data['total_entrada'] - $data['total_saida'];

        // Fim calculo total do fluxo

        // Inicio calculo de vendas 
        $vendas = $this->P_vendas_model->recebe_vendas_filtrada($data_inicial, $data_final);

        // Array para armazenar o total vendido por vendedor
        $totalPorVendedor = [];

        foreach ($vendas as $venda) {
            $vendedor = $venda['vendedor'];

            // Verificar se o vendedor já está no array
            if (isset($totalPorVendedor[$vendedor])) {
                // Se já existir, adiciona o valor da venda ao total
                $totalPorVendedor[$vendedor] += $venda['valor_total_venda'];
            } else {
                // Se não existir, cria uma entrada para o vendedor
                $totalPorVendedor[$vendedor] = $venda['valor_total_venda'];
            }
        }

        // Calcular o total vendido e o número de vendas globais
        $totalVendido = array_sum($totalPorVendedor);
        $numeroVendas = count($vendas);

        $data['total_vendido'] = $totalVendido;
        $data['numero_vendas'] = $numeroVendas;

        // Adicionar o total vendido por vendedor aos dados que serão enviados para o front-end
        $data['totalPorVendedor'] = $totalPorVendedor;
        $data['vendas'] = $vendas;
        // Fim calculo de vendas

        $data['contas_bancarias'] = $this->P_contas_model->recebe_contas();



        // Recebimento dos cheques já compensados

        $this->load->view('petrofertil/header', $data);
        $this->load->view('petrofertil/faturamento');
        $this->load->view('petrofertil/footer');
    }



}