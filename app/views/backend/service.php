<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="es" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Comparateca Backend | Escritorio</title>
	
	<?php print HTML::style("css/normalize.css") ?>
	<?php print HTML::style("css/foundation.css") ?>
	<?php print HTML::style("css/mfglabs_iconset.css") ?>
	<?php print HTML::style("css/brain.css") ?>
	<?php print HTML::script("js/vendor/custom.modernizr.js") ?>

	<?php print HTML::script("js/angular/angular.js") ?>
	<?php print HTML::script("js/vendor/jquery.js") ?>
	<?php print HTML::script("js/jquery.knob.js") ?>
</head>
<body ng-app="backend" ng-dblclick="menuShow=false">
	<header>
		<div class="row">
			<div class="large-3 small-12 large-offset-1 columns" align="center">
				<img src="<?php print asset("img/logo4.png") ?>" id="logo" width="130" />
			</div>

			<div class="large-1 hide-for-small columns" align="center">
				<nav class="main-menu">
					<span class="pictogram" ng-click="menuShow=!menuShow" ng-bind-html-unsafe="menuIcon"></span>

					<ul class="no-bullet" ng-show="menuShow" style="display:none" ng-animate="'fade'">
						<li><a href="#/dashboard" ng-click="menuShow=false"><span class="pictogram">&#59175;</span> Escritorio</a></li>
						<li><a href="#/content/view" ng-click="menuShow=false"><span class="pictogram">&#128213;</span> Contenido</a></li>
						<li><a href="#/members" ng-click="menuShow=false"><span class="pictogram">&#128101;</span> Miembros</a></li>
						<li><a href="#/invoices" ng-click="menuShow=false"><span class="pictogram">&#59185;</span> Facturas</a></li>
						<li><a href="#/tools" ng-click="menuShow=false"><span class="pictogram">&#9881;</span> Herramientas</a></li>
					</ul>
				</nav>
			</div>
			<div class="large-4 small-12 columns" align="center">
				<a class="show-for-small small-menu" ng-click="touchSwitch()"><span class="pictogram">&#59175;</span></a>
				<a href="#" data-tooltip title="{{ user.name }} ({{ user.email }}) level {{ user.level }}"><i class="icon-user_male"></i></a>
				<a href="#"><i class="icon-mail"></i><span class="up-label">4</span></a>
				<a href="#"><i class="icon-settings"></i></a>
			</div>

			<div class="large-3 small-12 columns" align="center">
				<div class="search-widget row collapse">
					<div class="large-2 small-2 columns"><i class="icon-magnifying"></i></div>
					<div class="large-10 small-10 columns"><input type="text" placeholder="buscar" /></div>
				</div>
			</div>
		</div>
	</header>
	<section class="phone-menu" id="touch-menu" ng-show="touchMenu" style="display:none" ng-animate="'fade'">
		<div class="row">
			<div class="small-3 columns" align="center">
				<a href="#/content"><span class="pictogram">&#128213;</span></a>
			</div>
			<div class="small-3 columns" align="center">
				<span class="pictogram">&#128101;</span>
			</div>
			<div class="small-3 columns" align="center">
				<span class="pictogram">&#59185;</span>
			</div>
			<div class="small-3 columns" align="center">
				<span class="pictogram">&#9881;</span>
			</div>
		</div>
	</section>
	<section ng-view ng-animate="{enter: 'view-enter', leave: 'view-leave'}">

	</section>

	<?php print HTML::script("js/foundation.min.js") ?>
	<script type="text/javascript">
		$(document).foundation();
	</script>
	<?php print HTML::script("js/brain-controllers.js") ?>
	<?php print HTML::script("js/brain.js") ?>

<script type="text/ng-template" id="list-cellplan.html">
	<div class="large-5 columns">{{ product.name | lowercase | ucfirst }}</div>
	<div class="large-2 columns" align="center"><span class="label {{ product.company.label }}">{{ product.company.name | lowercase }}</span></div>
	<div class="large-3 columns">$ {{ product.fee | number:2 }} </div>
	<div class="large-2 columns"><a href="#/content/edit/{{ token }}/{{ product.id }}">editar</a></div>
</script>

<script type="text/ng-template" id="header-cellplan.html">
	<div class="large-5 columns">Nombre del plan</div>
	<div class="large-2 columns" align="center">Compañia</div>
	<div class="large-3 columns">Caracteristicas</div>
	<div class="large-2 columns">&nbsp;</div>
</script>

<script type="text/ng-template" id="list-internet.html">
	<div class="large-5 columns">{{ product.name | lowercase | ucfirst }}</div>
	<div class="large-2 columns" align="center"><span class="label {{ product.company.label }}">{{ product.company.name | lowercase }}</span></div>
	<div class="large-3 columns">$ {{ product.fee | number:2 }} </div>
	<div class="large-2 columns"><a href="#/content/edit/{{ token }}/{{ product.id }}">editar</a></div>
</script>

<script type="text/ng-template" id="header-internet.html">
	<div class="large-5 columns">Nombre del plan</div>
	<div class="large-2 columns" align="center">Compañia</div>
	<div class="large-3 columns">Costo mensual</div>
	<div class="large-2 columns">&nbsp;</div>
</script>
</body>
</html>