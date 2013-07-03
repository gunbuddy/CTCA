<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Backend | Porque comparar es necesario!</title>

  <?php print HTML::style("asset/foundation.min.css") ?>
  <?php print HTML::style("asset/backend.private.css") ?>
  <script src="js/vendor/custom.modernizr.js"></script>
</head>
<body>

	<header>
		<div class="row" style="max-width:80em">
			<div class="large-2 columns">
				<img src="<?php print asset("img/backend.png") ?>" width="120" />
			</div>

			<div class="large-7 columns">
				<nav id="mainNav">
					<a href="escritorio.html">Escritorio</a>
					<a href="escritorio.html">Contenido</a>
					<a href="escritorio.html">Miembros</a>
					<a href="escritorio.html">Facturas</a>
					<a href="escritorio.html">Herramientas</a>
				</nav>
			</div>

			<div class="large-3 columns">
				<div class="search">

				</div>
			</div>
		</div>
	</header>

	<section class="secondary-nav">

		<div class="row" style="max-width:80em">
			<div class="large-2 columns">
				<a href="<?php echo action("Backend\ProductController@index"); ?>" class="active">Categorias</a>
			</div>

			<div class="large-2 columns">
				<a href="<?php echo action("Backend\CompanyController@index"); ?>">Compañias</a>
			</div>

			<div class="large-2 columns">
				<a href="#">Estadisticas</a>
			</div>

			<div class="large-6 columns">
			</div>
		</div>
	</section>

	<div class="row" style="max-width:80em">
		<div class="large-12 columns">

			<section class="white-row">
				<div class="row collapse">
					<div class="large-3 columns">
						<div class="right-column">

							<!-- Right column -->
							<div class="row" style="margin-left: 0;margin-right: 0;">
								<div class="large-12 columns">
									<div class="header">
										<div class="row">
											<div class="large-8 columns">
												<h3>Categorias</h3>
											</div>

											<div class="large-4 columns" align="center">
												<a href="resume.html"><span class="icon">&#10078;</span></a>
											</div>
										</div>
									</div>

									<div class="white-search">
										<input type="text" name="search" />
									</div>

									<div class="categories-navigation">
										<nav>
											<?php foreach($categories as $category): ?>
											<a href="#">
												<div class="row" style="margin-left: 0;margin-right: 0;">
													<div class="large-4 columns picto" align="center">
														<span class="icon">&#9889;</span>
													</div>

													<div class="large-8 columns text">
														<?php echo $category->name; ?>
													</div>
												</div>
											</a>
											<?php endforeach; ?>
										</nav>
									</div>
								</div>
							</div>
							<!-- Ends right column -->

						</div>
					</div>
					<div class="large-9 columns">
						<div class="header" style="height:60px;margin-bottom:0px">
							<div class="row">
								<div class="large-8 columns">
									<span class="text">Mostrando <strong><?php echo $count; ?> productos</strong></span>
								</div>

								<div class="large-4 columns" align="center">
									<a href="#" class="button" style="margin-top:6px;width:140px">Crear</a>
								</div>
							</div>
						</div>

						<div class="categories-headers">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Nombre
								</div>

								<div class="large-2 columns">
									Compañia
								</div>

								<div class="large-2 columns" align="center">
									Mensajes
								</div>

								<div class="large-2 columns" align="center">
									Internet
								</div>

								<div class="large-2 columns" align="center">
									Minutos
								</div>

								<div class="large-2 columns"></div>
							</div>
						</div>

						<!-- Product list -->
						<?php foreach($products as $product): ?>
						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									<?php echo ucfirst(strtolower($product->name)); ?>
								</div>

								<div class="large-2 columns">
									<span class="company"><?php echo $product->company->name; ?></span>
								</div>

								<div class="large-2 columns" align="center">
									<?php echo $product->messages; ?>
								</div>

								<div class="large-2 columns" align="center">
									<?php echo $product->internet; ?>MB
								</div>

								<div class="large-2 columns" align="center">
									<?php echo $product->minutes_toany + $product->minutes_tosame + $product->minutes_toother + $product->minutes_tolocal; ?>
								</div>

								<div class="large-2 columns">
									<a href="<?php echo action("Backend\ProductController@index"); ?>" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>
						<?php endforeach; ?>

						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Telcel plus 400
								</div>

								<div class="large-2 columns">
									<span class="company">Telcel</span>
								</div>

								<div class="large-2 columns" align="center">
									200
								</div>

								<div class="large-2 columns" align="center">
									1024MB
								</div>

								<div class="large-2 columns" align="center">
									230
								</div>

								<div class="large-2 columns">
									<a href="#" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>

						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Telcel plus 400
								</div>

								<div class="large-2 columns">
									<span class="company">Telcel</span>
								</div>

								<div class="large-2 columns" align="center">
									200
								</div>

								<div class="large-2 columns" align="center">
									1024MB
								</div>

								<div class="large-2 columns" align="center">
									230
								</div>

								<div class="large-2 columns">
									<a href="#" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>

						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Telcel plus 400
								</div>

								<div class="large-2 columns">
									<span class="company">Telcel</span>
								</div>

								<div class="large-2 columns" align="center">
									200
								</div>

								<div class="large-2 columns" align="center">
									1024MB
								</div>

								<div class="large-2 columns" align="center">
									230
								</div>

								<div class="large-2 columns">
									<a href="#" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>

						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Telcel plus 400
								</div>

								<div class="large-2 columns">
									<span class="company">Telcel</span>
								</div>

								<div class="large-2 columns" align="center">
									200
								</div>

								<div class="large-2 columns" align="center">
									1024MB
								</div>

								<div class="large-2 columns" align="center">
									230
								</div>

								<div class="large-2 columns">
									<a href="#" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>

						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Telcel plus 400
								</div>

								<div class="large-2 columns">
									<span class="company">Telcel</span>
								</div>

								<div class="large-2 columns" align="center">
									200
								</div>

								<div class="large-2 columns" align="center">
									1024MB
								</div>

								<div class="large-2 columns" align="center">
									230
								</div>

								<div class="large-2 columns">
									<a href="#" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>

						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Telcel plus 400
								</div>

								<div class="large-2 columns">
									<span class="company">Telcel</span>
								</div>

								<div class="large-2 columns" align="center">
									200
								</div>

								<div class="large-2 columns" align="center">
									1024MB
								</div>

								<div class="large-2 columns" align="center">
									230
								</div>

								<div class="large-2 columns">
									<a href="#" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>

						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-2 columns">
									Telcel plus 400
								</div>

								<div class="large-2 columns">
									<span class="company">Telcel</span>
								</div>

								<div class="large-2 columns" align="center">
									200
								</div>

								<div class="large-2 columns" align="center">
									1024MB
								</div>

								<div class="large-2 columns" align="center">
									230
								</div>

								<div class="large-2 columns">
									<a href="#" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain red">&#10060;</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>

		</div>
	</div>
  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>
