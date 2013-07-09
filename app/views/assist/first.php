<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Comparateca | Asistente</title>

	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<?php print HTML::style("asset/tooltipster.css") ?>
	<?php print HTML::style("asset/normalize.css") ?>
	<?php print HTML::style("asset/foundation.min.css") ?>
	<?php print HTML::style("asset/perfect-scrollbar.css") ?>
	<?php print HTML::style("asset/master.css") ?>
	<?php print HTML::script("asset/script/vendor-custom.modernizr.js") ?>
	
	<style type="text/css">
	#application h1, h2, h3, h4, h5, h6 {
		color: #0D1523;
	}

	#application h2 {
		color: #A4A4A4;
		font-weight: 300;
	}

	#application h4 {
		color: #C0C0C0;
		font-weight: 300;
	}

	.order-filter {
		list-style: none;
	}

	.order-filter li {
		background: #FFF;
		padding: 10px;
		cursor: move;
	}

	.order-filter li i {
		margin-right: 20px;
		color: #EFEFEF;
	}

	.order-filter .order-filter-placeholder {
		height: 42px;
		background: #52B752;
	}

	.filter-option {
		background: #FFF;
		padding: 10px;
		margin-bottom: 1px;
	}

	a.button {
		background: #F34D17;
		border: 0;
		box-shadow: none;
		border-radius: 4px;
	}
	</style>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	<?php print HTML::script("https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js"); ?>
	<?php print HTML::script("asset/script/vendor-jquery.js") ?>
	<?php print HTML::script("http://code.jquery.com/ui/1.10.3/jquery-ui.js") ?>
	<?php print HTML::script("asset/script/jquery.knob.js") ?>
	<?php print HTML::script("http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.5.4.min.js") ?>
	<?php print HTML::script("asset/script/jquery.tooltipster.min.js"); ?>
	<?php print HTML::script("asset/script/jquery.mousewheel.js"); ?>
	<?php print HTML::script("asset/script/perfectscrollbar.js"); ?>

	<script type="text/javascript">
	FirstCtrl = function($scope, $location)
	{
		$(function() {

			$( "#sortable" ).sortable({
		    	placeholder: "order-filter-placeholder"
		    });
			$( "#sortable" ).disableSelection();
		});

		$scope.next = function() {

			$scope.done.first = true;
			$scope.order = $( "#sortable" ).sortable("toArray");
			$location.path('/' + $scope.order[0]);
		}
	};

	MinutesCtrl = function($scope, $location) {

		$scope.step = $scope.step + 1; 

		$scope.next = function() {

			$scope.done.minutes = true;
			console.log($scope.order);
			$location.path('/' + $scope.order[$scope.step]);
		}
	}

	MessagesCtrl = function($scope, $location) {

		$scope.step++; 

		$scope.next = function() {

			$scope.done.minutes = true;
			$scope.order = $( "#sortable" ).sortable("toArray");
			$location.path('/' + $scope.order[0]);
		}
	}

	app = angular.module("Comparison", [])
	.config(function($routeProvider, $interpolateProvider, $locationProvider) {

		$locationProvider.hashPrefix('!');
		$routeProvider.
			when('/first', {templateUrl: 'setup.html', controller: FirstCtrl}).
			when('/minutes', {templateUrl: 'minutes.html', controller: MinutesCtrl}).
			when('/messages', {templateUrl: 'messages.html', controller: MessagesCtrl}).
			otherwise({redirectTo: '/first'});
	});


	app.run(function($rootScope, $location) { 

		$rootScope.step = 0;
		$rootScope.order = [];
		$rootScope.done = {};

		// Vars to get the recommendations
		$rootScope.daycalls = 0;
		$rootScope.messages = 0;
	});
	</script>
</head>

<body ng-app="Comparison">
	<header>
		<div class="row" style="max-width:100em">
			<div class="large-2 columns" align="center">
				<img src="<?php echo asset('img/logo-home.png'); ?>" width="50" />
			</div>

			<div class="large-2 columns">
				<a href="#" class="category">Telecomunicaciones</a>
			</div>

			<div class="large-2 columns">
				<a href="#" class="category">Educación</a>
			</div>

			<div class="large-2 columns">
				<a href="#" class="category">Turismo</a>
			</div>

			<div class="large-2 columns">
				<a href="#" class="category">Vehículos</a>
			</div>

			<div class="large-2 columns">
				<a href="#" class="category">Electronicos</a>
			</div>
		</div>
	</header>
	<section id="application">
		<div class="row">
			<div class="large-12 columns">
				<h1>Asistente</h1>
				<h2>Paso a paso para descubrir el producto a tu medida</h2>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns" ng-view>
				
			</div>
		</div>
	</section>

	<?php print HTML::script("asset/script/foundation.min.js") ?>
	<script>
		$(document).foundation();
	</script>

	<script type="text/ng-template" id="setup.html">

		<h4>Ordena las siguientes caracteristicas según la importancia para ti</h4>

		<ul id="sortable" class="order-filter">
		  <li class="ui-state-default" id="fee"><i class="icon-list"></i> Precio cada mes</li>
		  <li class="ui-state-default" id="minutes"><i class="icon-list"></i> Minutos de telefonia</li>
		  <li class="ui-state-default" id="messages"><i class="icon-list"></i> Cuantos mensajes puedo enviar</li>
		  <li class="ui-state-default" id="internet"><i class="icon-list"></i> Internet movil incluido</li>
		  <li class="ui-state-default" id="free-numbers"><i class="icon-list"></i> Numeros gratis</li>
		  <li class="ui-state-default" id="company"><i class="icon-list"></i> Elegir la compañia que brinda el servicio</li>
		</ul>

		<a ng-click="next()" href="" class="button">Siguiente</a>
	</script>

	<script type="text/ng-template" id="minutes.html">

		<h4>¿Cuantas llamadas necesitas hacer al dia?</h4>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="0" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Muy pocas (0 - 1 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="1" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Algunas (2 - 5 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="2" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Moderadamente (6 - 10 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="3" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Muchas (mas de 10 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="4" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Prefiero elegir un rango de minutos al mes
			</div>
		</div>
		</div>
		<br />
		<a ng-click="next()" href="" class="button">Siguiente</a>
	</script>

	<script type="text/ng-template" id="messages.html">

		<h4>¿Cuantos SMS mandas diariamente?</h4>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="0" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Muy pocas (0 - 3 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="1" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Algunas (4 - 10 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="2" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Moderadamente (11 - 20 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="3" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Muchas (mas de 20 al dia)
			</div>
		</div>
		</div>

		<div class="filter-option">
		<div class="row">
			<div class="large-2 columns">
				<input type="radio" name="day" value="4" ng-model="daycalls" />
			</div>
			<div class="large-10 columns">
				Prefiero elegir un rango de minutos al mes
			</div>
		</div>
		</div>
		<br />
		<a ng-click="next()" href="" class="button">Siguiente</a>
	</script>
</body>
</html>