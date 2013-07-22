<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="es" > <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="es" ><!--<![endif]-->
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width">
  	<title>Comparateca | Planes de telefonia | <?php print $product->name; ?></title>
  
  	<?php print HTML::style("css/b/foundation.css") ?>
  	<?php print HTML::script("asset/script/vendor-custom.modernizr.js") ?>
  	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

  	<style type="text/css">
  		body {
  			background: #FAFAFA;
  		}

  		header#main {
  			background: #536579;
  			padding: 5px 10px;
  		}

  		header#main h1 {
  			font: inherit;
  			font-size: 12px;
  			color: #B2C2D2;
  			text-transform: uppercase;
  		}

  		section.content {
  			background: #FFF;
  			padding-top: 20px;
  		}

  			section.content h3.block {
  				background: #50B9F0;
  				color: #FFF;
  				font: inherit;
  				font-size: 24px;
  				font-weight: 300;
  				padding: 1.5em 2em;
  				margin-top: 0em;
  				margin-bottom: 0em;
  			}

  			section.content h3.block.purple { background: #7F64B5; }

  			section.content .firstBlock {
  				border: 1px solid #E8EEF6;
  				border-left: 1px solid #FFF;
  				border-right: 1px solid transparent;
  				height: 6em;
  			}

  			section.content .ratings {
  				border: 1px solid #E8EEF6;
  				border-left: 1px solid #FFF;
  				border-right: 1px solid transparent;
  				border-top: 1px solid transparent;
  				height: 6em;
  			}

  			section.content .ratings i.icon-star {
  				color: #536579;
  			}

  			section.content .feature {
  				font-size: 12px;
  				font-weight: 300;
  				margin-bottom: 20px;
  			}

  			section.content .feature .box {
  				width: 104px;
  				height: 82px;
  				background: url(<?php print asset('img/b/feature.png'); ?>) top left no-repeat;
  				margin: 10px 0;
  			}

  			section.content .feature .box:hover {
  				background-image: url(<?php print asset('img/b/feature-hover.png'); ?>);
  			}

  			section.content .feature2 {
  				width: 245px;
  				height: 41px;
  				background: url(<?php print asset('img/b/feature2.png'); ?>) top left no-repeat;
  				margin: 10px 0;
  				font: inherit;
  				font-size: 12px;
  				margin-bottom: 20px;
  			}

  			section.content h4 {
  				font: inherit;
  				font-size: 20px;
  				font-weight: 300;
  				color: #6E7B89;
  			}

  			section.content h3 {
  				font: inherit;
  				font-size: 24px;
  				font-weight: 300;
  				color: #6E7B89;
  			}

  			section.content p {
  				font: inherit;
  				font-size: 14px;
  				font-weight: 300;
  				color: #6E7B89;
  			}

  			section.content .block-content {
  				border: 1px solid #E8EEF6;
  				border-bottom: 1px solid transparent;
  				border-top: 1px solid transparent;
  			}
  		a.bordered {
  			color: #6E7B89;
  			border: 2px solid #50B9F0;
  			border-radius: 3px;
  			-moz-border-radius: 3px;
  			-webkit-border-radius: 3px;
  			display: inline-block;
  			font: inherit;
  			font-weight: 300;
  			font-size: 16px;
  			padding: 10px;
  		}

  		a.bordered i[class^="icon"]
  		{
  			color: #50B9F0;
  			margin-left: 20px;
  		}

  		a.button {
  			border: 1px solid transparent;
  			box-shadow: none;
  			font: inherit;
  			font-size: 14px;
  			font-weight: 300;
  		}

  		span.number {
  			font-size: 18px;
  		}

  		.uncollapse {
  			position: relative;
			padding-left: 0.9375em;
			padding-right: 0.9375em;
			float: left;
  		}

  		div.meter {
  			width: 80%;
  			/* Rectangle 10: */
			background: #98A4B1;
			-moz-box-shadow:    inset 0px 1px 3px 0 #78828D;
			-webkit-box-shadow: inset 0px 1px 3px 0 #78828D;
			box-shadow:         inset 0px 1px 3px 0 #78828D;
			height: 18px;
			margin:10px 0;
			text-align: left;
  		}

  		div.fill {
  			background: #536579;
  			height: 18px;
  		}

  		ul.circles {
  			list-style-image:url(<?php print asset('img/b/list.png') ?>);
  		}

  		ul.circles li {
  			padding-left: 1em;
  		}

  		ul.circles li h5 {
  			font: inherit;
  			font-size: 18px;
  			font-weight: 300;
  		}
  	</style>
</head>
<body>

	<div class="row" style="max-width: 65em">
		<div class="large-12 columns">
			<header id="main">
				<h1>Comparateca</h1>
			</header>
		</div>
	</div>

	<div class="row" style="max-width: 65em">
		<div class="large-12 columns">
			<section class="content">
				<div class="row">
					<div class="large-3 columns" align="center">
						<img src="<?php print asset('img/b/logo.png'); ?>" width="64" />
					</div>
					<div class="large-4 columns large-offset-5">
						<a href="#" class="bordered" style="margin-top: 1.5em">Planes de telefonia <i class="icon-angle-right"></i></a>
					</div>
				</div>

				<div class="row collapse">
					<div class="large-4 columns">
						<div class="firstBlock">
							<div class="row">
								<div class="large-6 columns" style="padding-left:1.875em;padding-right:1.875em">
									<h4 style="margin:1em 0 0 1em"><?php print $product->name; ?></h4> 
								</div>
								<div class="large-6 columns" style="padding-left:0.9375em;padding-right:0.9375em;padding-top:1.5em">
									<a href="#" class="button">CONTRATAR</a>
								</div>
							</div>
						</div>

						<div class="ratings">
							<div class="row">
								<div class="large-5 columns" style="padding-left:1.875em;padding-right:1.875em">
									<h4 style="margin:1.5em 0 0 1em">Reseñas</h4> 
								</div>
								<div class="large-5 columns" style="padding-left:0.9375em;padding-right:0.9375em;padding-top:2em">
									<i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i>
								</div>
								<div class="large-2 columns" style="padding-left:0.9375em;padding-right:0.9375em;padding-top:2em">(0)</div>
							</div>
						</div>

						<div class="row">
							<div class="large-12 columns" style="padding-left:2.8125em;padding-top:1em;padding-right:2.8125em">
								<h3>Caracteristicas</h3>
								<p>Estas son las caracteristicas principales de este plan telefonico</p>

								<div class="row">
									<div class="large-6 columns" align="center">
										<div class="feature">
											Costo del plan
											<div class="box">
												<span class="number">$ <?php echo $product->fee; ?></span>
												<div class="meter"><div class="fill" style="width: 50%"></div></div>
												<span class="upper">cada mes</span>
											</div>
										</div>
									</div>

									<div class="large-6 columns" align="center">
										<div class="feature">
											Minutos locales
											<div class="box">
												<span class="number"><?php echo $product->minutes_tolocal; ?></span>
												<div class="meter"><div class="fill" style="width: 50%"></div></div>
												<span class="upper">cada mes</span>
											</div>
										</div>
									</div>

									<div class="large-6 columns" align="center">
										<div class="feature">
											Mensajes
											<div class="box">
												<span class="number"><?php echo $product->messages; ?></span>
												<div class="meter"><div class="fill" style="width: 50%"></div></div>
												<span class="upper">cada mes</span>
											</div>
										</div>
									</div>

									<div class="large-6 columns" align="center">
										<div class="feature">
											Internet
											<div class="box">
												<span class="number"><?php echo $product->internet; ?> MB</span>
												<div class="meter"><div class="fill" style="width: 50%"></div></div>
												<span class="upper">cada mes</span>
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="padding-left:0.9375em;padding-right:0.9375em;">
									<div class="large-6 columns">
										<a href="#" class="button">CONTRATAR</a>
									</div>

									<div class="large-6 columns">
										<a href="#" class="button">COMPARTIR</a>
									</div>

									<div class="large-6 columns">
										<a href="#" class="button">EMBED <i class="icon-code"></i></a>
									</div>

									<div class="large-6 columns"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="large-4 columns">
						<h3 class="block">Adicional</h3>
						<div class="block-content" style="min-height:300px" align="center">
							<div class="feature2">
								<div class="row" style="padding-top:15px">
									<div class="large-5 large-offset-2  columns" align="left">
										Mensaje adicional
									</div>
									<div class="large-5 columns" align="center">
										<span class="number">$<?php echo $product->additional_message; ?></span>
									</div>
								</div>
							</div>
							<div class="feature2">
								<div class="row" style="padding-top:15px">
									<div class="large-5 large-offset-2  columns" align="left">
										Numeros fijos
									</div>
									<div class="large-5 columns" align="center">
										<span class="number">$0.16</span>
									</div>
								</div>
							</div>
							<div class="feature2">
								<div class="row" style="padding-top:15px">
									<div class="large-5 large-offset-2  columns" align="left">
										Mensaje multimedia
									</div>
									<div class="large-5 columns" align="center">
										<span class="number">$0.16</span>
									</div>
								</div>
							</div>
							<div class="feature2">
								<div class="row" style="padding-top:15px">
									<div class="large-5 large-offset-2 columns" align="left">
										KB internet adicional
									</div>
									<div class="large-5 columns" align="center">
										<span class="number">$0.16</span>
									</div>
								</div>
							</div>

							<div class="feature2">
								<div class="row" style="padding-top:15px">
									<div class="large-5 large-offset-2  columns" align="left">
										Minuto local adicional
									</div>
									<div class="large-5 columns" align="center">
										<span class="number">$0.16</span>
									</div>
								</div>
							</div>
						</div>

						<h3 class="block">Información</h3>

						<div class="block-content">
							<div class="row" style="padding-left:3.8125em;padding-top:1em;padding-right:2.8125em">
								<div class="large-12 columns">
									<ul class="circles">
										<li>
											<h5>Politica de cancelación</h5>
											<p>La cancelación de un plan de telefonia en esta compañia implica pagar el completamente el resto de mensualidades faltantes dentro del contrato.</p>
											<p>Cualquier aclaración favor de comunicarse al departamento de soporte de comparateca para aclarar dudas o realizar comentarios.</p>
										</li>

										<li>
											<h5>Requisitos de contratación</h5>
											<p>La cancelación de un plan de telefonia en esta compañia implica pagar el completamente el resto de mensualidades faltantes dentro del contrato.</p>
											<p>Cualquier aclaración favor de comunicarse al departamento de soporte de comparateca para aclarar dudas o realizar comentarios.</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="large-4 columns">
						<h3 class="block purple">Planes similares</h3>
					</div>
				</div>
			</section>
		</div>
	</div>

  <?php print HTML::script("asset/script/vendor-jquery.js") ?>
  <?php print HTML::script("asset/script/foundation.min.js") ?>
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>
