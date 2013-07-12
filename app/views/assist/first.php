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
	<?php print HTML::style("asset/front.css") ?>
	<?php print HTML::script("asset/script/vendor-custom.modernizr.js") ?>
	
	<style type="text/css">

	a.button {
		background: #F34D17;
		border: 0;
		box-shadow: none;
		border-radius: 4px;
	}
	a.button.blue { background: #1D90D0; }

	.question {
		margin-top: 200px;
	}

	.question .fill-inline {
		display: inline;
		font-size: inherit;
		background: transparent;
		border: 0;
		border-bottom: 1px dashed #C0C0C0;
		width: 100px;
		box-shadow: none;
		padding: 0px 20px;
	}

	.question .fill-inline::-webkit-input-placeholder {
		color: #777777;
	}

	.question .fill-inline:focus {
		border: 0;
		border-radius: 3px;
		outline: 0;
		box-shadow: none;
		background: #FFF;
		color: #A4A4A4;
	}

	.question .fill-inline:focus::-webkit-input-placeholder {
		color: #A4A4A4;
	}

	.answer-options {
		padding: 10px 5px 0;
		width: 250px;
	}

	.answer-options a.button {
		width: 100%;
		font-size: 12px;
	}


	.tooltipster-assist
	{
	  border-radius:4px;
	  border:2px solid #FFF;
	  background:#FFF;
	  color:#CAC8C8;
	  -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);
		-moz-box-shadow:    0px 0px 3px rgba(0, 0, 0, 0.1);
		box-shadow:         0px 0px 3px rgba(0, 0, 0, 0.1);
	}

	.tooltipster-assist .tooltipster-content
	{
	  font-family: inherit;
	  font-size:14px;
	  line-height:16px;
	  overflow:hidden;
	}
	</style>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	<?php print HTML::script("https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js"); ?>
	<?php print HTML::script("asset/script/vendor-jquery.js") ?>
	<?php print HTML::script("asset/script/jquery.knob.js") ?>
	<?php print HTML::script("http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.5.4.min.js") ?>
	<?php print HTML::script("asset/script/jquery.tooltipster.min.js"); ?>
	<?php print HTML::script("asset/script/jquery.mousewheel.js"); ?>
	<?php print HTML::script("asset/script/perfectscrollbar.js"); ?>

	<script type="text/javascript">
	CompanyCtrl = function($scope, $location, steps)
	{
		$scope.$watch("answer", function() {
			if ($scope.answer == 'si' || $scope.answer == 'sí' || $scope.answer == 'yes')
			{
				$location.path('/companies');
			}

			if ($scope.answer == 'no' || $scope.answer == 'nop' || $scope.answer == 'nope')
			{
				$location.path('/calls');
			}
		})
	};

	CompaniesCtrl = function($scope, $location, steps) 
	{

	}

	CallsCtrl = function($scope, $location, steps) 
	{
		$scope.$watch("answer", function() {
			if ($scope.answer == 'pocas')
			{
				$location.path('/messages');
			}
			else if ($scope.answer == 'algunas')
			{
				$location.path('/messages');
			}
			else if ($scope.answer == 'bastantes')
			{
				$location.path('/messages');
			}
			else if ($scope.answer == 'muchas')
			{
				$location.path('/messages');
			}
		})
	}

	MessagesCtrl = function($scope, $location, steps) 
	{

	}

	app = angular.module("Comparison", [])
	.config(function($routeProvider, $interpolateProvider, $locationProvider) {

		$locationProvider.hashPrefix('!');
		$routeProvider.
			when('/company', {templateUrl: 'company.html', controller: CompanyCtrl}).
			when('/companies', {templateUrl: 'companies.html', controller: CompaniesCtrl}).
			when('/calls', {templateUrl: 'calls.html', controller: CallsCtrl}).
			when('/messages', {templateUrl: 'messages.html', controller: CallsCtrl}).
			otherwise({redirectTo: '/company'});
	});

	app.run(function ($rootScope) {

	});

	app.factory('steps', function() {
		return {
			step: 0,
			order: [],
			done: {},
			daycalls: 0,
			messages: 0,
			companies: {
				telcel: true,
				movistar: true,
				nextel: true,
				unefon: true,
				iusacell: true
			},
			fee: {
				from: 0,
				to: 0
			}
		}
	});

	app.directive('answer', function() {
		return {
			restrict: 'E',
			scope: {
				bind: '=',
				text: '@',
				options: '&'
			},
			replace: true,
			link: function(scope, element, attrs) {

				scope.setOption = function(option) {

					alert(option);
					$(element).find("input").val(option);
				}

				var options  = '<div class="answer-options">';
					options += '<div class="row">';
					options += '<div class="large-12 columns">';
					options += 'Escribe una opción de estas o presionala';
					options += '</div>';
					options += '</div>';

					if (scope.options().length == 2)
					{
						options += '<div class="row" style="margin-top: 20px">';
						options += '<div class="large-6 columns">';
						options += '<a ng-click="setOption(scope.options()[0])" class="button blue">' + scope.options()[0].toUpperCase() + '</a>';
						options += '</div>';
						options += '<div class="large-6 columns">';
						options += '<a ng-click="setOption(scope.options()[1])" class="button blue">' + scope.options()[1].toUpperCase() + '</a>';
						options += '</div>';
						options += '</div>';
					}
					else
					{
						angular.forEach(scope.options(), function(value, key)
						{
							options += '<div class="row" style="margin-top: 20px">';
							options += '<div class="large-7 columns">';
							options += '<a ng-click="setOption(value)" class="button blue">' + value.text.toUpperCase() + '</a>';
							options += '</div>';
							options += '<div class="large-5 columns" style="margin-top:10px">';
							options += value.hint;
							options += '</div>';
							options += '</div>';
						});
					}

					options += '</div>';


				setTimeout(function() {
					$(element).find("input").focus();
				},50)

				$(element).find("input").tooltipster({
					content: options,
					position: 'bottom',
					theme: '.tooltipster-assist',
					interactive: true,
					interactiveTolerance: 10000000
				});
				$(element).find("input").tooltipster('show');

				$(element).find("input").on('keyup', function(e) {

					var value = $(this).val();

					if (value.length === 1)
					{
						var width = 60;
					}
					else
					{
						var c = String.fromCharCode(e.keyCode|e.charCode);

						$span = $(element).find("span");
						$span.text($(this).val() + c);

						$inputSize = $span.width() + 40;

						var width = $inputSize;
					}

					$(this).animate({width: width}, 100);
				});
			},
			template: '<div style="display:inline">' +
						'<input title="cool" type="text" placeholder="{{ text }}" class="fill-inline" ng-model="bind" />' +
						'<span id="answer-hide" style="display:none;font-size:22px"></span>' +
					  '</div>'
		}
	})
	</script>
</head>

<body ng-app="Comparison">
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
			<div class="large-12 columns" ng-view ng-animate="{enter: 'view-enter', leave: 'view-leave'}">

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

	<?php print HTML::script("asset/script/foundation.min.js") ?>
	<script>
		$(document).foundation();
	</script>

	<script type="text/ng-template" id="company.html">
		<div class="question" id="step-1">
			<h3><answer options="['si', 'no']" bind="answer" text="Si ó no"></answer> me interesa elegir compañias que me brindaran el servicio.</h3>
		</div>
	</script>

	<script type="text/ng-template" id="calls.html">
		<div class="question" id="step-1">
			<h3>normalmente llamo <answer options="[{text: 'pocas', hint: 'de 1 a 3'},{text: 'algunas', hint: 'de 4 a 6'}, {text: 'bastantes', hint: 'de 7 a 15'}, {text: 'muchas', hint: 'mas de 15'}]" bind="answer"></answer> veces al día.</h3>
		</div>
	</script>

	<script type="text/ng-template" id="messages.html">
		<div class="question" id="step-1">
			<h3>normalmente mando <answer options="[{text: 'pocos', hint: 'de 1 a 4'},{text: 'algunos', hint: 'de 5 a 10'}, {text: 'bastantes', hint: 'de 10 a 20'}, {text: 'muchos', hint: 'mas de 20'}]" bind="answer"></answer> mensajes al día.</h3>
		</div>
	</script>

	<script type="text/ng-template" id="companies.html">
		<div class="question" id="step-1">
			<h3>las compañias que quiero que me brinden servicio son <answer options="['si', 'no']" bind="answer" text=""></answer></h3>
		</div>
	</script>

	<?php print HTML::script("http://code.jquery.com/ui/1.10.3/jquery-ui.js") ?>
</body>
</html>