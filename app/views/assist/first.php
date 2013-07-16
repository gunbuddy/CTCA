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
	a.button.red { background: #ED4545; }
	a.button.green { background: #74AE2E; }

	section.body { background: #202020; color: #FFF; }

	.question {
		margin-top: 200px;
	}

	.question h4 {
		color: #FFF;
		font-weight: 300;
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

	.fill {
		background: #FFF;
		border-radius: 4px;
		display: inline;
		height: 50px;
		width: 60px;
		padding: 10px 20px;
	}

	.type {
		color: rgb(119, 119, 119);
		font: inherit;
		font-size: 22px;
	}

	.bigBox {
		margin-top: 40px;
		position: relative;
		background: #FFF;
		border-radius: 5px;
		padding: 1.25em;
		color: #AEB5B8;
	}

	.bigBox .arrow {
		position: absolute;
		width: 0;
		height: 0;
		border-color: transparent;
		border-style: solid;
		border-bottom-color: #FFF;
		border-width: 0 9px 9px;
		margin-left: -9px;
		top: -9px;
		left: 30px;
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
	AssistCtrl = function($scope, steps) {

		$scope.text = steps.text;

		$scope.answer = function() {

			$scope.text += ', y quiero que sean: ';
		}
	}

	StepsCtrl = function($scope, steps) {

	}

	CompanyCtrl = function($scope, $location, steps)
	{
		steps.text = 'me int';

		$scope.answer = function(a) {

			if (a == 1)
			{
				$location.path('/companies')
			}

			if (a == 2)
			{
				$location.path('/calls')
			}
		}
	};

	CompaniesCtrl = function($scope, $location, steps) 
	{
		$scope.companies = steps.companies;

		$scope.next = function() {

			$location.path('/calls');
		}
	}

	CallsCtrl = function($scope, $location, steps) 
	{
		$scope.answer = function(a) {

			steps.daycalls = a;

			$location.path('/messages');
		}
	}

	MessagesCtrl = function($scope, $location, steps) 
	{
		$scope.answer = function(a) {

			steps.messages = a;

			$location.path('/tocompanies');
		}
	}

	TocompaniesCtrl = function($scope, $location, steps)
	{
		$scope.companies = steps.tocompanies;

		$scope.next = function() {

			steps.tocompanies = $scope.companies;

			$location.path('/fee');
		}
	}

	FeeCtrl = function($scope, $location, steps)
	{
		$(function() {
			$( "#slider" ).slider({
		      range: true,
		      min: 0,
		      max: 3000,
		      values: [ 50, 300 ],
		      step: 50,
		      slide: function( event, ui ) {

		      	steps.fee.from = ui.values[0];
		      	steps.fee.to = ui.values[1];

		      	$("#from").text(ui.values[0]);
		    	$("#to").text(ui.values[1]);
		      }
		    });

			steps.fee.from = $( "#slider" ).slider("values", 0);
		    steps.fee.to = $( "#slider" ).slider("values", 1);

		    $("#from").text($( "#slider" ).slider("values", 0));
		    $("#to").text($( "#slider" ).slider("values", 1));
		});

		$scope.next = function() {

			$location.path('/done');
		}
	}

	DoneCtrl = function($scope, $location, $http, steps) 
	{
		console.log(steps);

		$http.post('/assist/choose', steps).success(function(data) {

			location.href = data;
		});
	}

	app = angular.module("Comparison", [])
	.config(function($routeProvider, $interpolateProvider, $locationProvider) {

		$locationProvider.hashPrefix('!');
		$routeProvider.
			when('/company', {templateUrl: 'company.html', controller: CompanyCtrl}).
			when('/companies', {templateUrl: 'companies.html', controller: CompaniesCtrl}).
			when('/calls', {templateUrl: 'calls.html', controller: CallsCtrl}).
			when('/messages', {templateUrl: 'messages.html', controller: MessagesCtrl}).
			when('/tocompanies', {templateUrl: 'tocompanies.html', controller: TocompaniesCtrl}).
			when('/fee', {templateUrl: 'fee.html', controller: FeeCtrl}).
			when('/done', {templateUrl: 'done.html', controller: DoneCtrl}).
			otherwise({redirectTo: '/company'});
	});

	app.run(function ($rootScope) {

	});

	app.factory('steps', function() {
		return {
			step: 0,
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
			tocompanies: {
				telcel: false,
				movistar: false,
				nextel: false,
				unefon: false,
				iusacell: false
			},
			fee: {
				from: 0,
				to: 0
			},
			text: 'me interesa elegir las compañias que me brindaran servicio'
		}
	});

	app.directive('typewrite', function() {

		return {
			restrict: 'E',
			scope: {
				link: '='
			},
			template: '{{ text }}',
			link: function(scope, element, attrs) {

				
			},
			controller: function($scope, $element, $attrs, $transclude, $timeout) {

				var index = 0;

				$scope.text = '';

				$scope.update = function() {

					$scope.text += $scope.link[index];

					index++;

					if(index >= $scope.link.length-1){

        				return;
    				}

					$timeout(function() { $scope.update(); }, 50);
				}

				$scope.update();

				$scope.$watch("link", function() {

					$scope.update();
				})
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
			<div class="large-12 columns">
				<h3>Planes de telefonia</h3>
			</div>
		</div>

		<div class="row">
			<div class="large-10 large-offset-2 columns" ng-animate="{enter: 'view-enter', leave: 'view-leave'}" ng-view>
				
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
		<div class="row question" style="margin-top:200px">
			<div class="large-12 columns">
				<h4>¿Te interesa elegir las compañias que te brindaran servicio?</h4>
			</div>
		</div>

		<div class="row">
			<div class="large-3 large-offset-6 columns" align="right">
				<a href="" ng-click="answer(2)" class="button red">NO</a> <a href="" ng-click="answer(1)" class="button green">SI</a>
			</div>
		</div>
	</script>

	<script type="text/ng-template" id="calls.html">
		<div class="row question" style="margin-top:80px">
			<div class="large-12 columns">
				<h4>¿Cuantas llamadas realizas al dia?</h4>
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(1)" class="button green">Pocas</a>
			</div>
			<div class="large-10 columns" align="left">
				de 1 a 3
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(2)" class="button green">Algunas</a>
			</div>
			<div class="large-10 columns" align="left">
				de 4 a 6
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(3)" class="button green">Bastantes</a>
			</div>
			<div class="large-10 columns" align="left">
				de 7 a 15
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(4)" class="button green">Muchas</a>
			</div>
			<div class="large-10 columns" align="left">
				mas de 15
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns" align="left">
				<a href="" ng-click="answer(1)" class="button green">Otro rango</a>
			</div>
		</div>
	</script>

	<script type="text/ng-template" id="messages.html">
		<div class="row question" style="margin-top:80px">
			<div class="large-12 columns">
				<h4>¿Cuantas mensajes mandas al dia?</h4>
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(1)" class="button green">Pocos</a>
			</div>
			<div class="large-10 columns" align="left">
				de 1 a 4
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(2)" class="button green">Algunos</a>
			</div>
			<div class="large-10 columns" align="left">
				de 5 a 10
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(3)" class="button green">Bastantes</a>
			</div>
			<div class="large-10 columns" align="left">
				de 10 a 20
			</div>
		</div>

		<div class="row">
			<div class="large-2 columns" align="left">
				<a href="" ng-click="answer(4)" class="button green">Muchos</a>
			</div>
			<div class="large-10 columns" align="left">
				mas de 20
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns" align="left">
				<a href="" ng-click="answer(1)" class="button green">Otro rango</a>
			</div>
		</div>
	</script>

	<script type="text/ng-template" id="companies.html">
		<div class="row question" style="margin-top:80px">
			<div class="large-12 columns">
				<h4>¿Que compañias quieres que te brinden servicio?</h4>
			</div>
		</div>

		<div class="row question">
			<div class="large-3 large-offset-6 columns" align="left">
				<p>
					<input type="checkbox" ng-model="companies.telcel" checked /> Telcel
				</p>

				<p>
					<input type="checkbox" ng-model="companies.movistar" checked /> Movistar
				</p>

				<p>
					<input type="checkbox" ng-model="companies.iusacell" checked /> Iusacell
				</p>

				<p>
					<input type="checkbox" ng-model="companies.nextel" checked /> Nextel
				</p>

				<p>
					<input type="checkbox" ng-model="companies.unefon" checked /> Unefon
				</p>
			</div>
		</div>

		<div class="row question">
			<div class="large-3 large-offset-6 columns" align="left">
				<a href="" ng-click="next()" class="button green">SIGUIENTE</a>
			</div>
		</div>
	</script>

	<script type="text/ng-template" id="tocompanies.html">
		<div class="row question" style="margin-top:80px">
			<div class="large-12 columns">
				<h4>¿Sabes a que compañias marcas con mayor frecuencia?</h4>
			</div>
		</div>

		<div class="row question">
			<div class="large-3 large-offset-6 columns" align="left">
				<p>
					<input type="checkbox" ng-model="companies.telcel" /> Telcel
				</p>

				<p>
					<input type="checkbox" ng-model="companies.movistar" /> Movistar
				</p>

				<p>
					<input type="checkbox" ng-model="companies.iusacell" /> Iusacell
				</p>

				<p>
					<input type="checkbox" ng-model="companies.nextel" /> Nextel
				</p>

				<p>
					<input type="checkbox" ng-model="companies.unefon" /> Unefon
				</p>
			</div>
		</div>

		<div class="row question">
			<div class="large-3 large-offset-6 columns" align="left">
				<a href="" ng-click="next()" class="button green">SIGUIENTE</a>
			</div>
		</div>
	</script>

	<script type="text/ng-template" id="fee.html">
		<div class="row question" style="margin-top:100px">
			<div class="large-12 columns">
				<h4>¿Cuanto dinero tienes planeado gastar cada mes?</h4>
			</div>
		</div>

		<div class="row" style="margin-top: 50px;margin-bottom:50px">
			<div class="large-6 columns" align="left">
				$<span id="from"></span>
			</div>

			<div class="large-6 columns" align="right">
				$<span id="to"></span>
			</div>
		</div>

		<div class="row" style="margin-top: 50px;margin-bottom:50px">
			<div class="large-12 columns">
				<div id="slider"></div>
			</div>
		</div>

		<div class="row">
			<div class="large-3 large-offset-9 columns" align="right">
				<a href="" ng-click="next()" class="button green">SIGUIENTE</a>
			</div>
		</div>
	</script>

	<script type="text/ng-template" id="done.html">&nbsp;</script>

	<?php print HTML::script("http://code.jquery.com/ui/1.10.3/jquery-ui.js") ?>
</body>
</html>