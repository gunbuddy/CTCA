<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Comparateca | <?php echo $subcategory->name; ?></title>

	<?php print HTML::style("css/normalize.css") ?>
	<?php print HTML::style("css/foundation.css") ?>
	<?php print HTML::style("css/chosen.css") ?>
	<?php print HTML::script("js/vendor/custom.modernizr.js") ?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

	<style type="text/css">
		body, html {
			height: 100%;
		}

		body {
			background: #FFF;
			font:14px/1.231 "Lato", sans-serif;
			width: 100%;
			height: 100%;
		}

		body h1 {
			color: #FFF;
			font: 28px "Adelle";
		}

		body h2 {
			color: #FFF;
			font: 24px "Adelle";
		}

		header {
			background: #34495E;
			padding: 3em 0;
		}

		.compare {
			background: #446CB3;
			padding: 3em 0;
		}

			.compare .button {
				text-transform: uppercase;
				font: inherit;
				color: #FFF;
				background: #3A9AD8;
				box-shadow: none;
				border: none;
				margin: 0;
			}

			.compare .product {
				padding: 1em;
				background: #FFF;
				color: #446CB3;
				position: relative;
			}
				.compare .product div.drop {
					background: #253B62;
					color: #446CB3;
					top: -10px;
					right: -10px;
					position: absolute;
					width: 20px;
					height: 20px;
					line-height: 20px;
					text-align: center;
				}

				.compare .product div.drop:hover {
					cursor: pointer;
					background: #FFF;
				}

				.compare .product h4 {
					color: inherit;
					font: inherit;
					font-size: 16px;
				}
		.filters {
			width: 100%;
			background: #ECF0F5;
			padding: 1em 0;
		}

		.filters h2 { color: #000; }
		.fade-hide, .fade-show {
		  -webkit-transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.5s;
		  -moz-transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.5s;
		  -o-transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.5s;
		  transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.5s;
		}

		.fade-hide {
		  opacity:1;
		}
		.fade-hide.fade-hide-active {
		  opacity:0;
		}

		.fade-show {
		  opacity:0;
		}
		.fade-show.fade-show-active {
		  opacity:1;
		}
	</style>

	<script type="text/javascript" src="//use.typekit.net/zmb0eru.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<?php print HTML::script("https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js"); ?>
	<?php print HTML::script("js/vendor/jquery.js") ?>
	<?php print HTML::script("js/jquery.chosen.js") ?>


	<script type="text/javascript">
	FirstSetupCtrl = function($scope, $http)
	{
		$http.post('/tunnel/products/<?php echo $subcategory->aller; ?>', {take: 10, skip:0}).success(function(data)
		{
			alert("done");
			$scope.products = data;
		});

		$(function() {

			$("#filters").chosen({no_results_text:'Uups, ningun filtro llamado '});
		});
	};

	app = angular.module("Comparison", [])
	.config(['$routeProvider', function($routeProvider, $interpolateProvider) {
		
		$routeProvider.
			when('/setup', {templateUrl: 'setup.html', controller: FirstSetupCtrl}).
			otherwise({redirectTo: '/setup'});
	}]);


	app.run(function($rootScope) { 

		$rootScope.compare = function()
		{
			alert("bout to compare");
		};

		$rootScope.firstProduct  = {};
		$rootScope.secondProduct = {};
		$rootScope.thirdProduct  = {};
		$rootScope.fourthProduct = {};
		$rootScope.fifthProduct  = {};
	});
	</script>
</head>

<body ng-app="Comparison">
	<header>
		<div class="row">
			<div class="large-4 columns">
				<h1>Planes de telefonia</h1>
			</div>
		</div>
	</header>

	<section class="compare">
		<div class="row">
			<div class="large-2 columns">
				<a href="#" ng-click="compare()" class="button" style="margin-top:1.5em">Comparar</a>
			</div>
			<div class="large-2 columns">
				<div class="product" ng-show="firstProduct.name" ng-animate="'fade'">
					<div class="drop" ng-click="firstProduct={}"><i class="icon-remove"></i></div>
					<h4>Telcel Plus Mixto 40</h4>
				</div>
			</div>
			<div class="large-2 columns">
				<div class="product" ng-show="secondProduct.name">
					<div class="drop"><i class="icon-remove"></i></div>
					<h4>Telcel Plus Mixto 40</h4>
				</div>
			</div>
			<div class="large-2 columns">
				<div class="product" ng-show="thirdProduct.name">
					<div class="drop"><i class="icon-remove"></i></div>
					<h4>Telcel Plus Mixto 40</h4>
				</div>
			</div>
			<div class="large-2 columns">
				<div class="product" ng-show="fourthProduct.name">
					<div class="drop"><i class="icon-remove"></i></div>
					<h4>Telcel Plus Mixto 40</h4>
				</div>
			</div>
			<div class="large-2 columns">
				<div class="product" ng-show="fifthProduct.name">
					<div class="drop"><i class="icon-remove"></i></div>
					<h4>Telcel Plus Mixto 40</h4>
				</div>
			</div>
		</div>
	</section>

	<section class="filters">
		<div class="row">
			<div class="large-12 columns">
				<h2>Filtros</h2>
			</div>
		</div>
	</section>

	<section id="application">
		<div class="row">
			<div class="large-12 columns" ng-view>
				
			</div>
		</div>
	</section>

	<?php print HTML::script("js/foundation.min.js") ?>
	<script>
		$(document).foundation();
	</script>


	<script type="text/ng-template" id="setup.html">
		<div class="row" style="margin-top: 50px;margin-bottom: 20px;">
			<div class="large-12 columns">
				<div class="large-4 columns">
				Plan y compañia
				</div>
				<div class="large-2 columns">
				Clasificacion
				</div>
				<div class="large-2 columns">
				Costo mensual
				</div>
				<div class="large-2 columns">
				Minutos
				</div>
				<div class="large-2 columns">
				Mensajes
				</div>
			</div>

			<div class="large-12 columns" ng-repeat="product in products">
				<div class="large-4 columns">
				Plan y compañia
				</div>
				<div class="large-2 columns">
				Clasificacion
				</div>
				<div class="large-2 columns">
				Costo mensual
				</div>
				<div class="large-2 columns">
				Minutos
				</div>
				<div class="large-2 columns">
				Mensajes
				</div>
			</div>
		</div>
		
	</script>
</body>
</html>