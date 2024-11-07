<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade"
    style="background-image: url(<?= base_url("assets/site/img/page-title-bg.jpg") ?>);">
    <div class="container position-relative">
      <h1>Solicitar Coleta</h1>
      <p>Preencha os detalhes abaixo para agendar a coleta de óleo ou reciclagem.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.html">Início</a></li>
          <li class="current">Solicitar Coleta</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Solicitar Coleta Section -->
  <section id="get-a-quote" class="get-a-quote section">
    <div class="container">
      <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-5 quote-bg" style="background-image: url(<?= base_url("assets/site/img/quote-bg.jpg") ?>)">
        </div>

        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
          <form action="forms/get-a-quote.php" method="post" class="php-email-form">
            <h3>Solicitar Coleta</h3>
            <p>Informe os detalhes para agendarmos a coleta.</p>

            <div class="row gy-4">
              <!-- Cidade de Coleta -->
              <div class="col-md-6">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" placeholder="Cidade de Coleta" required>
              </div>

              <!-- Tipo de Local (Empresa ou Residência) -->
              <div class="col-md-6">
                <label for="tipoLocal" class="form-label">Tipo de Local</label>
                <select name="tipoLocal" id="tipoLocal" class="form-select" required>
                  <option value="" disabled selected>Selecione</option>
                  <option value="empresa">Empresa</option>
                  <option value="residencia">Residência</option>
                </select>
              </div>

              <!-- Nome da Empresa (campo condicional) -->
              <div class="col-md-12" id="nomeEmpresaField" style="display: none;">
                <input type="text" name="nomeEmpresa" class="form-control" placeholder="Nome da Empresa">
              </div>

              <!-- Endereço de Coleta -->
              <div class="col-md-12">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" placeholder="Endereço de Coleta" required>
              </div>

              <!-- Tipo de Coleta (Reciclagem ou Óleo) -->
              <div class="col-md-6">
                <label for="tipoColeta" class="form-label">Tipo de Coleta</label>
                <select name="setorColeta" id="setorColeta" class="form-select" required>
                  <option value="" disabled selected>Selecione</option>
                  <option value="oleo">Óleo Usado</option>
                  <option value="reciclagem">Reciclagem</option>
                </select>
              </div>

              <!-- Disponibilidade para Coleta -->
              <div class="col-md-6">
                <label for="disponibilidade" class="form-label">Dias e Horários Disponíveis</label>
                <input type="text" name="disponibilidade" class="form-control"
                  placeholder="Ex: Seg a Sex, 09:00 - 17:00">
              </div>

              <!-- Detalhes Pessoais -->
              <div class="col-lg-12">
                <h4>Seus Dados Pessoais</h4>
              </div>

              <div class="col-6">
                <input type="text" name="name" class="form-control" placeholder="Nome">
              </div>

              <div class="col-6">
                <input type="text" name="phone" class="form-control" placeholder="Telefone">
              </div>

              <div class="col-12">
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>

              <div class="col-12">
                <textarea name="message" rows="6" class="form-control" placeholder="Mensagem"></textarea>
              </div>

              <!-- Botão de Envio -->
              <div class="col-12 text-center">
                <div class="loading">Carregando</div>
                <div class="error-message"></div>
                <div class="sent-message">Sua solicitação foi enviada com sucesso. Obrigado!</div>

                <button type="button" class="btn btn-primary" id="enviarButton">Solicitar Coleta via WhatsApp</button>
              </div>
            </div>
          </form>

        </div><!-- End Quote Form -->

      </div>
    </div>
  </section><!-- End Solicitar Coleta Section -->

</main>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const tipoLocal = document.getElementById("tipoLocal");
    const nomeEmpresaField = document.getElementById("nomeEmpresaField");
    const nomeEmpresaInput = document.querySelector("input[name='nomeEmpresa']");
    const setorColeta = document.getElementById("setorColeta");
    const nomeContato = document.querySelector("input[name='name']");
    const cidade = document.querySelector("input[name='cidade']"); // Campo Cidade
    const endereco = document.querySelector("input[name='endereco']"); // Campo Endereço
    const horarioPreferencial = document.querySelector("input[name='disponibilidade']");
    const enviarButton = document.getElementById("enviarButton");

    // Exibir/ocultar campo "Nome da Empresa" com base no tipo de local selecionado
    function toggleEmpresaField() {
      if (tipoLocal.value === "empresa") {
        nomeEmpresaField.style.display = "block";
        nomeEmpresaInput.setAttribute("required", "true");
      } else {
        nomeEmpresaField.style.display = "none";
        nomeEmpresaInput.removeAttribute("required");
        nomeEmpresaInput.value = "";
      }
    }

    // Adiciona o evento de mudança para o campo "Tipo de Local"
    tipoLocal.addEventListener("change", toggleEmpresaField);

    // Função para abrir o WhatsApp com a mensagem formatada
    enviarButton.addEventListener("click", function () {
      const tipo = tipoLocal.value === "empresa" ? "Empresa" : "Residência";
      const nomeEmpresa = nomeEmpresaInput.value; // Nome da empresa, se selecionado
      const nomeContatoValor = nomeContato.value; // Sempre o nome de contato
      const cidadeValor = cidade.value; // Valor da cidade
      const enderecoValor = endereco.value; // Valor do endereço
      const horario = horarioPreferencial.value;
      const setor = setorColeta.value;

      // Número do WhatsApp com base no setor escolhido
      let numeroWhatsApp;
      if (setor === "oleo") {
        numeroWhatsApp = "5514997144385";
      } else if (setor === "reciclagem") {
        numeroWhatsApp = "5514991677056";
      }

      // Montar a mensagem para o WhatsApp
      let mensagem = `Olá! Gostaria de solicitar uma coleta:\n\n`;
      if (tipoLocal.value) mensagem += `- Tipo de Local: ${tipo}\n`;
      if (nomeEmpresa) mensagem += `- Nome da Empresa: ${nomeEmpresa}\n`; // Inclui o nome da empresa, se disponível
      if (nomeContatoValor) mensagem += `- Nome do Contato: ${nomeContatoValor}\n`; // Sempre inclui o nome do contato
      if (cidadeValor) mensagem += `- Cidade: ${cidadeValor}\n`;
      if (enderecoValor) mensagem += `- Endereço: ${enderecoValor}\n`;
      if (setor) mensagem += `- Setor de Coleta: ${setor === "oleo" ? "Coleta de Óleo Usado" : "Coleta de Reciclagem Geral"}\n`;
      if (horario) mensagem += `- Horário Preferencial: ${horario}`;

      // Codifica a mensagem e abre o WhatsApp
      const mensagemCodificada = encodeURIComponent(mensagem);
      const urlWhatsApp = `https://api.whatsapp.com/send?phone=${numeroWhatsApp}&text=${mensagemCodificada}`;
      window.open(urlWhatsApp, "_blank");

    });
  });
</script>