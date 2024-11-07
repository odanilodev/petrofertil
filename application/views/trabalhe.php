<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade"
    style="background-image: url(<?= base_url("assets/site/img/page-title-bg.jpg") ?>);">
    <div class="container position-relative">
      <h1>Trabalhe Conosco</h1>
      <p>Junte-se à nossa equipe na Petroecol! Estamos sempre em busca de profissionais dedicados e talentosos para
        ajudar a construir um futuro mais sustentável.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.html">Início</a></li>
          <li class="current">Trabalhe Conosco</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Contact Section -->
  <section id="work-with-us" class="contact section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <!-- Informações de Contato -->
        <div class="col-lg-4">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Endereço</h3>
              <p>Avenida das Indústrias, 500, Bauru, SP - 17013-160</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Telefone</h3>
              <p>+55 14 4002 8922</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email</h3>
              <p>rh@petroecol.com.br</p>
            </div>
          </div>
        </div>

        <!-- Formulário de Trabalhe Conosco -->
        <div class="col-lg-8">
          <form action="forms/workwithus.php" method="post" class="php-email-form" enctype="multipart/form-data"
            data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <!-- Nome e Email -->
              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Seu Nome" required>
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Seu Email" required>
              </div>

              <!-- Telefone -->
              <div class="col-md-6">
                <input type="text" class="form-control" name="phone" placeholder="Telefone" required>
              </div>

              <!-- Vagas Disponíveis por Área -->
              <div class="col-md-6">
                <select name="position" class="form-control" required>
                  <option value="">Selecione a Posição Desejada</option>

                  <!-- Opções de Vagas Operacionais -->
                  <optgroup label="Operacional">
                    <option value="motorista_coleta">Motorista de Coleta</option>
                    <option value="servicos_gerais">Serviços Gerais</option>
                  </optgroup>

                  <!-- Opções de Vagas Administrativas -->
                  <optgroup label="Administrativo">
                    <option value="assistente_administrativo">Assistente Administrativo</option>
                    <option value="analista_rh">Analista de RH</option>
                  </optgroup>

                  <!-- Opções de Vagas Comerciais -->
                  <optgroup label="Comercial">
                    <option value="vendedor">Vendedor</option>
                    <option value="assistente_comercial">Assistente Comercial</option>
                  </optgroup>

                  <!-- Opções de Vagas Técnicas -->
                  <optgroup label="Técnico">
                    <option value="tecnico_manutencao">Técnico de Manutenção</option>
                    <option value="engenheiro_ambiental">Engenheiro Ambiental</option>
                  </optgroup>
                </select>
              </div>

              <!-- Anexar Currículo -->
              <div class="col-md-12">
                <label for="resume" class="form-label">Anexe seu Currículo (PDF)</label>
                <input type="file" name="resume" class="form-control" accept=".pdf" required>
              </div>

              <!-- Mensagem -->
              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6"
                  placeholder="Fale um pouco sobre você e suas qualificações" required></textarea>
              </div>

              <!-- Botão de Enviar -->
              <div class="col-md-12 text-center">
                <div class="loading">Enviando...</div>
                <div class="error-message"></div>
                <div class="sent-message">Sua candidatura foi enviada. Obrigado!</div>

                <button type="submit">Enviar Candidatura</button>
              </div>
            </div>
          </form>
        </div><!-- Fim do Formulário de Trabalhe Conosco -->

      </div>

    </div>
  </section><!-- Fim da Seção Trabalhe Conosco -->


</main>