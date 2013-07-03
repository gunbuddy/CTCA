<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Backend | Porque comparar es necesario! | Compañias</title>

  
  <?php print HTML::style("asset/foundation.min.css") ?>
  <?php print HTML::style("asset/backend.private.css") ?>
  <script src="js/vendor/custom.modernizr.js"></script>

  <script src="js/angular/angular.js"></script>
  <script src="js/backend.js"></script>

  <style type="text/css">
  .cicle.blue {
  	background: #3B9ADA;
  }

  .circle.red {
  	background: #ED4545;
  }

  .circle.orange {
  	background: #F6AD41;
  }

  .circle.green {
  	background: #74AE2E;
  }

  .circle.yellow {
  	background: #F2C600;
  }
  </style>
</head>
<body ng-app="backend">

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
				<a href="<?php echo action("Backend\ProductController@index"); ?>">Categorias</a>
			</div>

			<div class="large-2 columns">
				<a href="<?php echo action("Backend\CompanyController@index"); ?>" class="active">Compañias</a>
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
						<div class="right-column" style="height: 630px;">

							<!-- Right column -->
							<div class="row" style="margin-left: 0;margin-right: 0;">
								<div class="large-12 columns">
									<div class="header">
										<div class="row">
											<div class="large-8 columns">
												<h3>Categorias</h3>
											</div>

											<div class="large-4 columns" align="center">
												<span class="icon">&#10078;</span>
											</div>
										</div>
									</div>

									<div class="white-search">
										<input type="text" name="search" />
									</div>

									<div class="right-form">
										<div class="row" style="padding-left:2.8125em;padding-right:0.9375em">
											<div class="large-12 columns">
												<h3><span class="icon">&#127758;</span> Crear compañia</h3>
											</div>
										</div>
										
										<form class="styled">
											<div class="row" style="padding-left:2.8125em;padding-right:2.8125em">
												<div class="large-12 columns">
													<input type="text" value="<?php echo $company->name; ?>" placeholder="Nombre" />
												</div>
											</div>

											<div class="row" style="padding-left:2.8125em;padding-right:2.8125em">
												<div class="large-12 columns">
													<input type="text" value="<?php echo $company->wiki; ?>" placeholder="URL wikipedia" />
												</div>
											</div>

											<div class="row" style="padding-left:2.8125em;padding-right:2.8125em">
												<div class="large-12 columns">
													<textarea style="height:100px" placeholder="Descripción"><?php echo $company->description; ?></textarea>
												</div>
											</div>

											<div class="row" style="padding-left:2.8125em;padding-right:2.8125em">
												<div class="large-8 columns">
													<select name="category">
														<option>Categoria</option>
														<option>Telecomunicaciones > Telefonía Móvil</option>
													</select>
												</div>
												<div class="large-4 columns">
													<a href="#" class="button" style="padding-top:0.5em;padding-bottom:0.5em;width:100%"><span class="icon">&#128228;</span></a>
												</div>
											</div>

											<div class="row" style="padding-left:2.8125em;padding-right:2.8125em">
												<div class="large-12 columns">
													<input type="text" placeholder="Imagen de la empresa" />
												</div>
											</div>

											<div class="row" style="padding-left:2.8125em;padding-right:2.8125em">
												<div class="large-6 columns" style="padding-top:1em">
													<div class="circle" style="background:#79CF19">&nbsp;</div>
												</div>
												<div class="large-6 columns" align="right">
													<a href="#" class="button">Crear</a>
												</div>
											</div>
										</form>
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
									<span class="text">Mostrando <strong><?php echo $count; ?> compañias</strong></span>
								</div>

								<div class="large-4 columns" align="center">
									<a href="#" class="button" style="margin-top:6px;width:140px">Crear</a>
								</div>
							</div>
						</div>

						<div class="categories-headers">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-3 columns">
									Nombre
								</div>

								<div class="large-2 columns">
									Valoracion
								</div>

								<div class="large-3 columns" align="center">
									Wikipedia
								</div>

								<div class="large-2 columns" align="center">
									
								</div>

								<div class="large-2 columns"></div>
							</div>
						</div>

						<!-- Product list -->
						<?php foreach ($companies as $company): ?>
						<div class="product-row">
							<div class="row" style="padding-left:1.875em;padding-right:0.9375em">
								<div class="large-1 columns" align="center" style="padding-top:5px">
									<div class="circle <?php echo $company->label ?>">&nbsp;</div>
								</div>
								<div class="large-2 columns" style="padding-top:5px">
									<?php echo $company->name ?>
								</div>

								<div class="large-2 columns" style="padding-top:5px">
									<div class="stars">
										<span class="icon on">&#9733;</span>
										<span class="icon">&#9733;</span>
										<span class="icon">&#9733;</span>
										<span class="icon">&#9733;</span>
										<span class="icon">&#9733;</span>
									</div>
								</div>

								<div class="large-3 columns" align="center" style="padding-top:5px">
									<a href="#"><?php echo $company->wiki ?></a>
								</div>

								<div class="large-2 columns" align="center" style="padding-top:5px">
									<!--<span>Telefonía Móvil</span>-->
								</div>

								<div class="large-2 columns">
									<a href="<?php echo action("Backend\CompanyController@show", array($company->id)); ?>" class="pictolink">&#9998;</a> <a href="#" class="pictolink plain">&#10060;</a>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
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
