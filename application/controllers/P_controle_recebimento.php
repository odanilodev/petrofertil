<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_controle_recebimento extends CI_Controller
{
	public function inicio()
	{
		$this->load->model('P_controle_recebimento_model');

		// Recupera as datas do filtro, ou usa o mês atual como padrão
		$data_inicial = isset($_POST['data_inicial']) && $_POST['data_inicial'] ? $_POST['data_inicial'] : date('Y-m-01');
		$data_final = isset($_POST['data_final']) && $_POST['data_final'] ? $_POST['data_final'] : date('Y-m-t');


		// Obtém os registros e os totais com base nas datas
		$recebimentos = $this->P_controle_recebimento_model->get_todos_recebimentos($data_inicial, $data_final);
		$totais = $this->P_controle_recebimento_model->get_totais_recebimento($data_inicial, $data_final);

		// Passa os valores individuais (para a tabela) e os totais para a view
		$data['recebimentos'] = $recebimentos; // Registros para a tabela
		$data['total_organico'] = $totais['total_organico'];
		$data['total_mineral'] = $totais['total_mineral'];
		$data['total_palha'] = $totais['total_palha'];
		$data['total_outro'] = $totais['total_outro'];
		$data['numero_de_dias'] = $totais['numero_de_dias'];
		$data['total_diario'] = $totais['total_diario'];
		$data['data_inicial'] = $data_inicial; // Mantém o valor para exibir no campo "De"
		$data['data_final'] = $data_final; // Mantém o valor para exibir no campo "Até"

		// Carrega as views
		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/controle_recebimento');
		$this->load->view('petrofertil/footer');
	}



	public function formulario_recebimento()
	{
		$this->load->model('P_controle_recebimento_model');
		$this->load->model('Clientesp_model');
		$this->load->model('P_residuos_model');

		$id = $this->uri->segment(3);

		$data['recebimento'] = $this->P_controle_recebimento_model->get_recebimento_por_id($id);

		$data['clientes'] = $this->Clientesp_model->recebe_clientes();
		$data['residuos'] = $this->P_residuos_model->recebe_residuos();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_recebimento');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_relatorio()
	{
		$this->load->model('Clientesp_model');
		$this->load->model('P_residuos_model');

		$data['clientes'] = $this->Clientesp_model->recebe_clientes();
		$data['residuos'] = $this->P_residuos_model->recebe_residuos();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_relatorio_recebimento');
		$this->load->view('petrofertil/footer');
	}

	public function cadastra_controle()
	{
		$this->load->model('P_controle_recebimento_model');

		// Pega os valores enviados pelo formulário
		$organico = (float) $this->input->post('organico');
		$mineral = (float) $this->input->post('mineral');
		$molhado = (float) $this->input->post('molhado');
		$latinha = (float) $this->input->post('latinha');
		$palha = (float) $this->input->post('palha');
		$outro = (float) $this->input->post('outro');

		// Calcula a soma dos valores
		$quantidade_total = $organico + $mineral + $molhado + $latinha + $palha + $outro;



		// Monta o array com os dados
		$dados = [
			'data_recebimento' => $this->input->post('data_recebimento'),
			'periodo' => $this->input->post('periodo'),
			'empresa' => $this->input->post('empresa'),
			'placa' => $this->input->post('placa'),
			'numero_nota' => $this->input->post('numero_nota'),
			'organico' => $organico,
			'mineral' => $mineral,
			'molhado' => $molhado,
			'latinha' => $latinha,
			'palha' => $palha,
			'area_descarregamento' => $this->input->post('area_descarregamento'),
			'outro' => $outro,
			'obs' => $this->input->post('obs'),
			'quantidade_total' => $quantidade_total // Adiciona a soma no array
		];

		$id = $this->input->post('id');

		// Salvar ou atualizar no banco
		if ($id > 0 && $id != '') {
			$this->P_controle_recebimento_model->edita_controle_recebimento($dados, $id);
		} else {
			$this->P_controle_recebimento_model->inserir_controle_recebimento($dados);
		}

		// Redirecionar após o salvamento
		redirect('P_controle_recebimento/inicio/');
	}

	public function gera_relatorio()
	{
		$this->load->model('P_controle_recebimento_model');

		$data_inicial = $this->input->post('data_inicio');
		$data_final = $this->input->post('data_fim');
		$id_empresa = $this->input->post('empresa');

		// Obtém os recebimentos filtrados por data e ID da empresa
		$recebimentos = $this->P_controle_recebimento_model->get_recebimentos_por_empresa($data_inicial, $data_final, $id_empresa);

		// Carrega a view com os dados obtidos
		$data['recebimentos'] = $recebimentos;
		$this->load->view('petrofertil/relatorio_recebimento', $data);

		// Gera o PDF
		$html = $this->output->get_output();
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		$this->pdf->stream("certificado.pdf", array("Attachment" => 1));
	}




	public function deleta_recebimento()
	{

		$this->load->model('P_controle_recebimento_model');

		$id = $this->uri->segment(3);

		$this->P_controle_recebimento_model->deleta_controle($id);

		redirect('P_controle_recebimento/inicio/');

	}
}