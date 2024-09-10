<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-4.jpg');">
          <div class="carousel-container">
            <div class="carousel-content container">
              <h2 class="animate__animated animate__fadeInDown">Bem Vindo ao Nosso Site</h2>
              <p class="animate__animated animate__fadeInUp">Explore todos os nossos serviços, soluções inovadoras que a PETROECOL oferece para a gestão de resíduos e sustentabilidade ambiental. Acesse nossa mala direta para uma visão abrangente sobre como podemos contribuir para o sucesso sustentável do seu negócio.</p>
              <!-- <a href="<?php base_url("assets/pdf/Apresentacao_petroecol.pdf") ?>" target="_blank" class="btn-get-started animate__animated animate__fadeInUp scrollto">Visualizar</a> -->
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url('assets/img/slide/slide-2.jpg');">
          <div class="carousel-container">
            <div class="carousel-content container">
              <h2 class="animate__animated animate__fadeInDown">Conheça os nossos serviços</h2>
              <p class="animate__animated animate__fadeInUp">A nossa empresa é especializada na coleta e destinação final de resíduos...</p>
              <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Veja Mais</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url('assets/img/slide/slide-3.jpg');">
          <div class="carousel-container">
            <div class="carousel-content container">
              <h2 class="animate__animated animate__fadeInDown">Conheça a nossa equipe</h2>
              <p class="animate__animated animate__fadeInUp">Deseja entrar em contato? Fale com a nossa equipe</p>
              <a href="#team" class="btn-get-started animate__animated animate__fadeInUp scrollto">Conhecer</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <!-- <a href="<?php base_url("assets/pdf/Apresentacao_petroecol.pdf") ?>" target="_blank" class=" play-btn mb-4"></a> -->
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>Quem Somos</h2>
              <p>A PETROECOL é uma empresa nacional, especializada na coleta e destino final, de resíduos sólidos, óleo de fritura vegetal/animal e derivado, recicláveis secos (metálicos e não metálicos), resíduos secos orgânicos animal/vegetal, prestação de serviços voltada a gestão de resíduos sólidos e limpeza de caixas coletoras de gorduras. Capaz de lhe dar um atendimento personalizado e diferenciado, com a finalidade de lhe oferecer soluções práticas e inteligentes, com qualidade e confiabilidade.</p>
            </div>

            <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-briefcase-alt"></i></div>
              <h4 class="title"><a href="">Descubra Nossos Serviços</a></h4>
              <p class="description">Conheça nossa ampla gama de serviços ambientais e encontre soluções sob medida para a gestão eficiente de resíduos na sua empresa. Deixe-nos ajudá-lo a alcançar suas metas de sustentabilidade com facilidade e eficácia.</p>
            </div>

            <!-- <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-book-reader"></i></div>
              <h4 class="title"><a href="">Veja Nossa Mala Direta</a></h4>
              <p class="description">Explore todos os nossos serviços, soluções inovadoras que a PETROECOL oferece para a gestão de resíduos e sustentabilidade ambiental. Acesse nossa mala direta para uma visão abrangente sobre como podemos contribuir para o sucesso sustentável do seu negócio.
            </div> -->

          </div>
        </div>

      </div>
    </section>

  <!-- Empresas Section -->
  <section id="empresa" class="services">
    <div class="container-fluid">

      <div class="section-title">
        <h2>Empresas</h2>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
          <div><img src="<?= base_url('assets/img/empresa1.png') ?>"></div>
          <h4 class="title mt-3"><a href="<?= site_url('empresas/empresa1') ?>">Ver Mais</a></h4>
          <p class="description">Empresa especializada na coleta e destinação final de resíduos de óleo vegetal/animal e derivados, respeitando sempre o meio ambiente</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
          <div><img src="<?= base_url('assets/img/empresa2.png') ?>"></div>
          <h4 class="title mt-3"><a href="<?= site_url('empresas/empresa2') ?>">Ver Mais</a></h4>
          <p class="description">Empresa especializada na coleta, triagem e destinação final de resíduos sólidos metálicos e não metálicos(residenciais, comerciais e industrial), com a finalidade de oferecer soluções ambientais práticas e inteligentes</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
          <div><img src="<?= base_url('assets/img/logo_coifas.png') ?>"></div>
          <h4 class="title mt-3"><a href="#">Ver Mais</a></h4>
          <p class="description">A Petroecol também é especializada na limpeza de coifas, dutos, e exaustores</p>
        </div>
        

      </div>

    </div>
  </section><!-- End Empresas Section -->



  <!-- End About Us Section -->

  <!-- ======= About Lists Section ======= -->
  <!--<section class="about-lists">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
            <span>01</span>
            <h4>Lorem Ipsum</h4>
            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span>02</span>
            <h4>Repellat Nihil</h4>
            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <span>03</span>
            <h4> Ad ad velit qui</h4>
            <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <span>04</span>
            <h4>Repellendus molestiae</h4>
            <p>Inventore quo sint a sint rerum. Distinctio blanditiis deserunt quod soluta quod nam mider lando casa</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
            <span>05</span>
            <h4>Sapiente Magnam</h4>
            <p>Vitae dolorem in deleniti ipsum omnis tempore voluptatem. Qui possimus est repellendus est quibusdam</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
            <span>06</span>
            <h4>Facilis Impedit</h4>
            <p>Quis eum numquam veniam ea voluptatibus voluptas. Excepturi aut nostrum repudiandae voluptatibus corporis sequi</p>
          </div>

        </div>

      </div>
    </section>-->
  <!-- End About Lists Section -->

  <!-- ======= Counts Section ======= -->
  <section class="counts section-bg">
    <div class="container">

      <div class="row">

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="count-box">
            <i class="icofont-water-drop" style="color: #90b84c;"></i>
            <span data-toggle="">1.650.000</span>
            <p>Litros de óleo recolhidos somente em 2020</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="count-box">
            <i class="icofont-trash" style="color: #90b84c;"></i>
            <span data-toggle="counter-up">1.100</span>
            <p>Toneladas de Reciclavel somente em 2020</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
          <div class="count-box">
            <i class="icofont-recycle" style="color: #90b84c;"></i>
            <span data-toggle="">Trilhões</span>
            <p>De litros de agua são salvos da poluição devido ao nosso trabalho</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
          <div class="count-box">
            <i class="icofont-users-alt-5" style="color: #90b84c;"></i>
            <span data-toggle="counter-up">2.000</span>
            <p>Clientes Petroecol distribuidos em todo o Brasil</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Nossos Serviços</h2>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
          <div class="icon"><i class="icofont-recycle"></i></div>
          <h4 class="title"><a href="">Limpeza</a></h4>
          <p class="description">Limpeza de coifas e caixas coletoras de gordura</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="icon"><i class="icofont-articulated-truck"></i></div>
          <h4 class="title"><a href="">Coleta e Transporte</a></h4>
          <p class="description">Recolhimento dos resíduos e transporte à unidade</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
          <div class="icon"><i class="icofont-user-suited"></i></div>
          <h4 class="title"><a href="">Gestão de Resíduos</a></h4>
          <p class="description">Profissionais treinados e capacitados para atender a demanda do cliente</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
          <div class="icon"><i class="icofont-tree-alt"></i></div>
          <h4 class="title"><a href="">Compostagem</a></h4>
          <p class="description">Reaproveitamento dos resíduos de matéria orgânica transformando-os em adubo</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
          <div class="icon"><i class="icofont-earth"></i></div>
          <h4 class="title"><a href="">Coleta Seletiva</a></h4>
          <p class="description">Segregação dos materiais que são passíveis de reciclagem</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
          <div class="icon"><i class="icofont-users-social"></i></div>
          <h4 class="title"><a href="">Projetos Sociais</a></h4>
          <p class="description">Clique aqui e veja alguns de nossos projetos pessoais</p>
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Our Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="section-title">
        <h2>Galeria</h2>
        <p>Conheça a nossa estrutura</p>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class=" filter-active">Todas</li>
            <li data-filter=".filter-app">Escritório</li>
            <li data-filter=".filter-web">Reciclagem</li>
            <li data-filter=".filter-card">Fachada</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/fachada1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Fachada</h4>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/fachada1.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-eye"></i></a>

              </div>
            </div>
          </div>
        </div>


      </div>

    </div>
  </section><!-- End Our Portfolio Section -->

  <!-- ======= Our Team Section ======= -->
  <section id="team" class="team">
    <div class="container">

      <div class="section-title">
        <h2>Nossa Equipe</h2>

      </div>

      <div class="row">

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
          <div class="member">
            <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
            <div class="member-info container">
              <h4>Zidane Augusto</h4>
              <span>Óleo (atendimento)</span>
              <div class="social">
                <p style="color: #fff">atendimento@petroecol.com.br</br>(14) 9 9714-4385</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
            <div class="member-info container">
              <h4>Catia Pereira</h4>
              <span>Reciclagem (atendimento)</span>
              <div class="social">
                <p style="color: white">reciclagem@petroecol.com.br</br>(14) 9 9167-7056</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
            <div class="member-info container">
              <h4>Leandro Cantaluppi</h4>
              <span>Administrativo / Compras</span>
              <div class="social">
                <p style="color:#fff ">manutencao@petroecol.com.br</br>(14) 9 9118-5386</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
            <div class="member-info container">
              <h4>Diego Carrascosa</h4>
              <span>Coordenador Comercial</span>
              <div class="social">
                <p style="color: #fff">comercial@petroecol.com.br</br>(14) 3208-7835</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Our Team Section -->



  <!-- ======= Contact Us Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contato</h2>
      </div>

      <div class="row">

        <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
          <div class="info-box">
            <div class="icon"><i class="icofont-map"></i></div>
            <h3 class="mt-3">Endereço</h3>
            <p>Rua Margarida Genaro 2, 189 - Loteamento LEB, Bauru - SP.</p>
          </div>
        </div>

        <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="info-box">
            <div class="icon"><i class="icofont-mail"></i></div>
            <h3 class="mt-3">E-mail</h3>

            <p>atendimento@petroecol.com.br</p>
            <p>comercial@petroecol.com.br</p>
          </div>
        </div>

        <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="info-box ">
            <div class="icon"><i class="icofont-phone"></i></div>
            <h3 class="mt-3">Telefone</h3>
            <p>(14) 3208-7835</br>(14) 99714-4385</br>(14) 3202-6027</p>
          </div>
        </div>

        <div class="col-lg-6">
          <form action="<?php echo site_url('email') ?>" method="post" role="form" class="php-email-form">
            <div class="row">
              <span style="display:none;visibility:hidden;">
                <label for="email">
                  Ignore este campo de texto. Ele está aqui para detectar spammers.
                  Se você entar qualquer valor neste campo, sua mensagem não será enviada.
                </label>
                <input type="text" name="email" size="1" value="" /></span>
              <div class="col-lg-6 form-group">
                <input type="text" name="nome" required class="form-control" placeholder="Nome" data-rule="minlen:4" data-msg="Digite o seu nome" />
                <div class="validate"></div>
              </div>
              <div class="col-lg-6 form-group">
                <input type="e-mail" required class="form-control" name="e-mail" placeholder="Email" data-rule="email" data-msg="Digite um endereço de email válido" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" required class="form-control" name="assunto" placeholder="Assunto" data-rule="minlen:4" data-msg="Digite o assunto" />
              <div class="validate"></div>
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
        <div class="col-lg-6"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.7472614146723!2d-49.06018110462015!3d-22.24966616589257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDE1JzAwLjAiUyA0OcKwMDMnMzAuMSJX!5e0!3m2!1spt-BR!2sbr!4v1603885855351!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
      </div>

    </div>


  </section><!-- End Contact Us Section -->

</main><!-- End #main -->