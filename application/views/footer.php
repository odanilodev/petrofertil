  <!-- ======= Footer ======= -->
  <footer id="footer">
    
	  
	  <!--Div do cookie-->
	
<?php
	  
	  if(isset($_COOKIE['cookie'])){
		  
		  
	  }else{ $_COOKIE['cookie'] = 'recusado'; }
	  
	  if($_COOKIE['cookie'] != "aceito") { ?> 
	<div class="container-fluid cookie mt-5">
		<div class="p-cookie">
			<div class="row">
				<div class=" col-md-8">
			<p class="p-3">Usamos cookies para oferecer melhor experiência de navegação, melhorar o desempenho, analisar como você interage em nosso site e personalizar conteúdo. Para dúvidas, consulte nossa <a href="<?= site_url('site/download_politica') ?>">política de privacidade.</a></p>
				</div>
				
				<div class="col-md-2 mt-4">
					<button type="button" class="btn btn-success active aceitar-cookie">Aceitar Cookies</button>
				</div>
				
				<div class="col-md-2 mt-4 ">
					<button type="button" class="btn btn-danger recusar-cookie">Recusar Cookies</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
	
	<!-- Final Div do cookie-->

	  
	  
	  <div id="zap"><a style="color:#fff;" href="https://api.whatsapp.com/send?l=pt_br&phone=5514997144385"><img id="whats" width="85" src="<?= base_url('assets/img/zapzap1.png') ?>" /></a></div>

    <div class="container">
      <div class="copyright">
         Copyright &copy; <strong><span>Petroecol </span></strong>| Todos os direitos reservados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Desenvolvido por <a href="https://centrodainteligencia.com.br">Centro da inteligência</a>
      </div>
    </div>
  </footer><!-- End Footer -->



<!-- Botao de subir ao topo --!>

<!--  <a href="#"  class="back-to-top"><i class="icofont-simple-up"></i></a>-->

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-sticky/jquery.sticky.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/venobox/venobox.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/counterup/counterup.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


<!--JavaScript do Cookie-->

<script> 
	$( ".aceitar-cookie" ).click(function() {
		
		var d = new Date();
		
    	d.setTime(d.getTime() + (365*24*60*60*1000));
		
		document.cookie="cookie=aceito; expires=" + d.toUTCString();
		
		$('.cookie').hide('slow');
	});
	
	$( ".recusar-cookie" ).click(function() {
        $('.cookie').hide('slow'); 
	});
</script>


<!--Final JavaScript do Cookie-->


</body>



</html>