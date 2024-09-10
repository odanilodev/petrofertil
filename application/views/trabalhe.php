
	
		<div class="col-lg-12 ">
			<img class="img-fluid"  src="<?= base_url('assets/img/banner_trabalhe.jpg'); ?>">
		</div>
	

		
<div class="container">
	

	<div class=" row mb-4">
		
			
	<div class="row mt-5">
		<div class="section-title mb-5">
          <h2>Trabalhe Conosco</h2>
		<h5 style="margin-top: -10px">Veja as vagas disponíveis em nossa empresa e envie seu currículo para nós através do formulário de contato desta página</h5>
        </div>
	</div>
	
		
		<div align="center" class="col-md-6">
			<img class="img-fluid mb-4"  src="<?= base_url('assets/img/trabalho/motorista.jpg') ?>">
		</div>
		<div class="col-md-6">
			<h1>Motorista de Coleta</h1>
			<p>Nossos <b>Motoristas</b> são responsáveis em realizar para a empresa a coleta de resíduos para o setor de reciclagem, coleta de óleo usado em comércios ou residência para nosso setor de reciclagem de óleo usado</p></br>
		</div>
		
		
		
		<div class="mt-5 row">
		<div class="col-md-6">
			<h1>Atendimento</h1>
			<p>Para quem quiser fazer parte do atendimento da <b>Petroecol Soluções Ambientais</b> será necessario cuidar de todo atendimento ao cliente, fazer agendamentos de coleta por telefone, ouvir reclamações, passar informações relacionadas a coleta e básicas informações do funcionamento da empresa e gerar rotas para os motoristas conforme agendado.</p>

			
		</div>
		
		<div align="center" class="col-md-6">
			<img class="img-fluid mb-4"  src="<?= base_url('assets/img/trabalho/atendimento.jpg') ?>">
		</div>
		</div>
	
	
		<div class="mt-5 row">
			
		
			<div align="center" class="col-md-6">
				<img class="img-fluid mb-4"  src="<?= base_url('assets/img/trabalho/geral.jpg') ?>">
			</div>
			
			<div class="col-md-6">
			<h1>Serviços Gerais</h1>
			<p>Para quem trabalhar nos <b>Serviços Gerais</b>, será responsável de ajudar todo o setor de reciclagem, desde a organização e limpeza, até a separação de resíduos</p>

			
			</div>
			
		</div>
	
	
		<div class="mt-5 row">
			
			
			<div class="col-md-6">
			<h1>Tecnologia da Informação</h1>
			<p>Quem deseja trabalhar na área de tecnologia de informação da <b>Petroecol Soluções Ambientais</b> atuará na interface com e entre áreas a fim de assegurar o atendimento a todas as necessidades da empresa em termos de serviços e sistemas de computação. Este profissional ou estagiário será responsável por garantir que esses sistemas estejam dentro de padrões adequados de qualidade, eficiência e segurança da informação, desempenhando um papel ativo no gerenciamento de operações.</p>

			
			</div>
			
			<div align="center" class="col-md-6">
				<img class="img-fluid mb-4"  src="<?= base_url('assets/img/trabalho/ti.jpg') ?>">
			</div>
			
			
		</div>
	
	
		<div class="mt-5 row">
			
			<div align="center" class="col-md-6">
				<img class="img-fluid mb-4"  src="<?= base_url('assets/img/trabalho/seguranca.jpg') ?>">
			</div>
			
			<div class="col-md-6">
			<h1>Segurança de trabalho</h1>
			<p>Orientar e coordenar o sistema de <b>Segurança do Trabalho</b> da empresa, investigando riscos e causas de acidentes, analisando esquemas de prevenção, propor normas e dispositivos de segurança, sugerindo eventuais modificações nos equipamentos e instalações e verificando sua observância, para prevenir acidentes.</p>

			
			</div>
			
			
			
			
		</div>
	
	
		<div class="mt-5 row">
			
			
			<div class="col-md-6">
			<h1>Programa de estágio</h1>
			<p>Nossos <b>Estagiários</b> participam de treinamentos voltados ao seu desenvolvimento, cultura, valores e conduta da empresa. Em sua rotina de estágio são levados a pensar em melhorias de processos e em como aplicar a teoria em suas práticas diárias.</p>
			</div>
			
			
			<div align="center" class="col-md-6">
				<img class="img-fluid mb-4"  src="<?= base_url('assets/img/trabalho/estagio.jpg') ?>">
			</div>
			
			
		</div>
			
	
	
			
		
	</div>

	

</div>

<!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Envie seu curriculo</h2>
        </div>

        <div class="row">

         

          <div class="col-lg-12">
            <form action="<?php echo site_url('email/trabalhe') ?>" method="post" role="form"  enctype="multipart/form-data" class="php-email-form">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input type="text" name="nome" required class="form-control" placeholder="Nome" data-rule="minlen:4" data-msg="Digite o seu nome" />
                  <div class="validate"></div>
                </div>
                <div class="col-lg-6 form-group">
                  <input type="email" required class="form-control" name="email" placeholder="Email" data-rule="email" data-msg="Digite um endereço de email válido" />
                  <div class="validate"></div>
                </div>
             
             
                <div class="col-lg-6 form-group">
                  <input type="text" name="assunto" required class="form-control" placeholder="Assunto" data-rule="minlen:4" data-msg="Assunto da menssagem" />
                  <div class="validate"></div>
                </div>
				  
                <div class="col-lg-6 form-group">
                  <input style="padding: 7px" type="file" required class="form-control" name="arquivo" placeholder="Email" data-rule="email" />
                  <div class="validate"></div>
                </div>
              </div>
				
              <div class="form-group">
                <textarea required class="form-control" name="mensagem" rows="5" data-rule="required" data-msg="Digite a mensagem" placeholder="Mensagem"></textarea>
                <div class="validate"></div>
              </div>
				
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
            </form>
          </div>
			
        </div>

      </div>
		
		
    </section><!-- End Contact Us Section -->

       