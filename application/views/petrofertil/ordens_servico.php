<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {
    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');
$nome_usuario = $this->session->userdata('nome_usuario');
?>

<style>
    .service-option-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
        gap: 20px;
    }

    .service-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 400px;
        height: 300px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f5f5f5;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .service-option:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .service-option h3 {
        font-size: 2.0rem;
        color: #333;
        margin-bottom: 10px;
    }

    .service-option p {
        font-size: 1.5rem;
        color: #666;
    }

    .service-option a {
        text-decoration: none;
        color: inherit;
    }

    .service-option.disabled {
        background-color: #ddd;
        cursor: not-allowed;
    }

    .service-option.disabled:hover {
        transform: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .coming-soon {
        background-color: #d9534f;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 1.2rem;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="service-option-container">
            <!-- Ordem de Serviço para Veículos -->
            <div class="service-option">
                <a href="<?= base_url('P_ordem_servico/mostrar_ordens') ?>">
                    <h3>Ordem de Serviço para Veículos</h3>
                    <p>Gerar ordens de serviço para veículos.</p>
                </a>
            </div>

            <!-- Ordem de Serviço Predial (Em breve) -->
            <div class="service-option disabled">
                <h3>Ordem de Serviço Predial</h3>
                <div class="coming-soon">Em breve</div>
            </div>
        </div>
    </div>
</section>