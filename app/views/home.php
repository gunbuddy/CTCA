<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width" />
  	<title>Comparateca | Comparar vuelve a ser sencillo</title>

  	<?php print HTML::style("css/normalize.css") ?>
  	<?php print HTML::style("asset/foundation.min.css") ?>
  	<?php print HTML::style("css/perfect-scrollbar.css") ?>

 	 <?php print HTML::script("asset/script/perfectscrollbar.css") ?>
  	<script src="js/vendor/custom.modernizr.js"></script>

  	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
 	<link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
  	<script type="text/javascript">
	  	$(function() {

	  	});
  	</script>

  	<style type="text/css">
  	@font-face {
		font-family: 'Conv_UniversLTStd';
		src: url('/fonts/UniversLTStd.eot');
		src: local('☺'), url('/fonts/UniversLTStd.woff') format('woff'), url('/fonts/UniversLTStd.ttf') format('truetype'), url('/fonts/UniversLTStd.svg') format('svg');
		font-weight: normal;
		font-style: normal;
	}

	@font-face {
		font-family: 'Conv_UniversLTStd-Light';
		src: url('/fonts/UniversLTStd-Light.eot');
		src: local('☺'), url('/fonts/UniversLTStd-Light.woff') format('woff'), url('/fonts/UniversLTStd-Light.ttf') format('truetype'), url('/fonts/UniversLTStd-Light.svg') format('svg');
		font-weight: normal;
		font-style: normal;
	}
	body {
		font-family: 'Conv_UniversLTStd-Light', serif;
		font-size: 14px;
	}

  	header.top {
  		color: #0D1523;
  		height: 60px;
  	}
  	header.top h1 {
  		color: inherit;
  		font-size: 32px;
  		font-family: 'Conv_UniversLTStd-Light', serif;
  		font-weight: 300;
  		margin-top: 15px;
  	}

  	header.top .assist-me {
  		display: block;
  		height: 60px;
  		background: #FD6230 url(/img/assist-me.png) 20px center no-repeat;
  		color: #FFF;
  		font-weight: 300;
  		font-family: inherit;
  		font-size: 16px;
  		padding: 0 0 0 80px;
  		line-height: 60px;
  		transition:all 0.3034s ease;
		-webkit-transition:all 0.3034s ease;
		-moz-transition:all 0.3034s ease;
		-o-transition:all 0.3034s ease;
  	}

  	header.top .assist-me:hover {
  		background-color: #F34D17;
  	}

  	header.top .search {
  		display: block; 
  		background: #FAFAFA url(/img/search-home.png) 90% center no-repeat;
  		height: 60px;
  		line-height: 60px;
  		color: #888888;
  		font-size: 16px;
  		font-weight: 300;
  		border: 0;
  		box-shadow: none;
  		padding: 0px 60px 0 20px;
  		width: 100%;
  	}
  	header.top .search:focus {
  		outline: none;
  	}

  	section.body {
  		height: 600px;
  		background: #E9E9E9;
  		width:100%;
  	}

  	section.body h2 {
  		color: #0D1523;
  		font-family: inherit;
  		font-weight: 300;
  		margin-top: 80px;
  	}

  	section.body h3 {
  		color: #777777;
  		font-family: inherit;
  		font-weight: 300;
  		font-size: 22px;
  	}

  	section.body nav.categories {
  		margin-top: 50px;
  	}

  	section.body nav.categories a {
  		background: #FFF;
  		border-bottom: 1px solid #EEEEEE;
  		padding: 10px 10px;
  		display: inline-block;
  		width: 250px;
  		height: 60px;
	  	-webkit-box-shadow: 1px 1px 1px #DBDCDC;
		-moz-box-shadow:    1px 1px 1px #DBDCDC
		box-shadow:         1px 1px 1px #DBDCDC;
		margin-right: 30px;
  	}

  	section.body nav.categories a:hover {
  		background: #F6F6F6;

  	}

  	section.body nav.categories a:hover .directional {
  		color: #52B752;
  	}

  	section.body nav.categories a .category-icon, .name, .directional {
  		display: block;
  		float: left;
  	}

  	section.body nav.categories a div.name {
  		color: #0D1523;
  		font-size: 18px;
  		margin-left: 20px;
  		margin-top: 12px;
  	}

  	section.body nav.categories a .directional {
  		color: #DDDDDD;
  		font-size: 28px;
  		margin-left: 30px;
  		margin-top: 5px;
  	}

  	footer {
  		margin-top: 30px;
  	}

  	footer h4 {
  		color: inherit;
  		font-family: inherit;
  		font-weight: 300;
  	}

  	footer p {
  		color: #999999;
  	}

  	footer a {
  		color: #999999;
  		display: block;
  		margin-bottom: 5px;
  	}
  	</style>
</head>

<body>
	<header class="top">
		<div class="row">
			<div class="large-1 columns">
				<img src="<?php echo asset("img/logo-home.png"); ?>" alt="Comparateca" />
			</div>

			<div class="large-4 columns">
				<h1>Comparateca</h1>
			</div>

			<div class="large-3 columns">
				<a class="assist-me" href="<?php echo action('AssistController@showFirstSetup'); ?>">
					Asistente
				</a>
			</div>

			<div class="large-4 columns">
				<input class="search" placeholder="¿Que quieres comparar?" />
			</div>
		</div>
	</header>

	<section class="body">
		<div class="row">
			<div class="large-12 columns">
				<h2>La manera más rapida de elegir un <br /> producto de acuerdo a tus preferencias</h2>
				<h3>Toma decisiones de compra inteligentes</h3>
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
				<nav class="categories">
					<a href="<?php echo action('HomeController@showCategory', array('category' => 'telefonia-movil')); ?>">
						<div class="category-icon"><img src="<?php echo asset("img/phone-icon.png"); ?>" /></div>
						<div class="name">Telefonía Móvil</div>
						<div class="directional"><i class="icon-angle-right"></i></div>
						<br style="clear:both" />
					</a>

					<a href="<?php echo action('HomeController@showCategory', array('category' => 'telefonia-movil')); ?>">
						<div class="category-icon"><img src="<?php echo asset("img/television-icon.png"); ?>" /></div>
						<div class="name">Televisión</div>
						<div class="directional"><i class="icon-angle-right"></i></div>
						<br style="clear:both" />
					</a>

					<a href="<?php echo action('HomeController@showCategory', array('category' => 'telefonia-movil')); ?>">
						<div class="category-icon"><img src="<?php echo asset("img/internet-icon.png"); ?>" /></div>
						<div class="name">Internet</div>
						<div class="directional"><i class="icon-angle-right"></i></div>
						<br style="clear:both" />
					</a>
				</nav>
			</div>
		</div>
	</section>

	<footer>
		<div class="row">
			<div class="large-1 columns">
				<img src="<?php echo asset("img/logo-home.png"); ?>" alt="Comparateca" width="30" />
			</div>

			<div class="large-4 columns">
				<h4>Comparateca</h4>
				<p>Es una plataforma que te facilita la búsqueda, análisis y comparación de productos y servicios antes de adquirirlos</p>
			</div>

			<div class="large-3 columns">
				<h4>Enlaces</h4>

				<nav>
					<a href="privacy">Aviso de privacidad</a>
					<a href="legal">Legales</a>
					<a href="about">Acerca de</a>
					<a href="team">Equipo</a>
				</nav>
			</div>
			<div class="large-3 columns">
				<h4>Social</h4>

				<nav>
					<a href="http://www.facebook.com">Facebook</a>
					<a href="http://www.twitter.com">Twitter</a>
					<a href="http://www.pinterest.com">Pinterest</a>
				</nav>
			</div>
		</div>
	</footer>
</body>
</html>