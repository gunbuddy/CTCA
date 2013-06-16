<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Comparateca | Comparaciones de <?php echo $subcategory->name; ?></title>

	<?php print HTML::style("css/normalize.css") ?>
	<?php print HTML::style("css/foundation.css") ?>
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
			font: 28px "Lato";
		}

		body h2 {
			color: #FFF;
			font: 24px "Lato";
		}

		header {
			background: #34495E;
			padding: 1em 0;
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
			background: #4D77C2;
			padding: 1em 0;
		}

			.filters h2 { color: #FFF; }

			.filters a.settings {
				background: #446CB3;
				color: rgba(255,255,255,0.7);
				display: block;
				font-size: 40px;
				width: 100px;
				height: 100px;
				line-height: 100px;
				text-align: center;
			}
		#application {
			background: #ECF0F5;
		}

		#right-helper {
			background: #446CB3;
		}
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

		.table-header {
			color: #2D3E4F;
			text-transform: uppercase;
			font-size: 16px;
		}

		.product-item {
			background: #FFF;
			padding: 10px 0;
			border: 3px solid #E4E9EF;
			border-bottom: 0px;
		}

			.name {
				color: #2D3E4F;
				text-transform: uppercase;
				font-size: 12px;
				font-weight: bold;
			}

			.company {
				float: right;
				background: #0086C3;
				padding: 2px 3px;
				color: #FFF;
				margin-right: 50px;
				border-radius: 3px;
				text-transform: uppercase;
				margin-top: 5px;
				font-size: 12px;
			}

			.company.green {
				background: #79CF19;
			}

			.company.red {
				background: #ED4545;
			}

			.company.orange {
				background: #FBA617;
			}

			.number {
				font-size: 18px;
				color: #425C75;
			}
			.number-description {
				font-size: 12px;
				color: #345B81;
				display: block;
			}

			.price {
				color: #425C75;
				font-size: 22px;
				font-weight: bold;
				border: 3px solid #25BC9D;
				padding: 5px;
				display: block;
				width: 100px;
				border-radius: 3px;
			}

			a.action {
				color: #425C75;
				font-size: 24px;
				text-decoration: none;
				display: inline-block;
				margin: 10px;
				-webkit-transition: 0.35s linear all;
				-moz-transition: 0.35s linear all;
				-o-transition: 0.35s linear all;
				transition: 0.35s linear all;
			}

			a.action:hover {
				color: #26B99A;
			}
		.custom-enter,
		.custom-leave,
		.custom-move {
		  -webkit-transition: 0.35s linear all;
		  -moz-transition: 0.35s linear all;
		  -o-transition: 0.35s linear all;
		  transition: 0.35s linear all;
		  position:relative;
		}

		.custom-enter {
		  left:-10px;
		  opacity:0;
		}
		.custom-enter.custom-enter-active {
		  left:0;
		  opacity:1;
		}

		.custom-leave {
		  left:0;
		  opacity:1;
		}
		.custom-leave.custom-leave-active {
		  left:-10px;
		  opacity:0;
		}

		.custom-move {
		  opacity:0.5;
		}
		.custom-move.custom-move-active {
		  opacity:1;
		}
	</style>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	<?php print HTML::script("https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js"); ?>
	<?php print HTML::script("js/vendor/jquery.js") ?>
	<?php print HTML::script("js/jquery.knob.js") ?>
	<?php print HTML::script("http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.5.4.min.js") ?>

	<script type="text/javascript">
	FirstSetupCtrl = function($scope, $http, $routeParams)
	{
		if ($routeParams.filters)
		{
			filtrate = $routeParams.filters;
		}
		else
		{
			filtrate = null;
		}

		$http.post('/tunnel/products/<?php echo $subcategory->aller; ?>', {take: 10, skip:0, filter: filtrate}).success(function(data)
		{
			$scope.products = data;
		});
	};

	app = angular.module("Comparison", [])
	.config(function($routeProvider, $interpolateProvider, $locationProvider) {

		$locationProvider.hashPrefix('!');
		$routeProvider.
			when('/', {templateUrl: 'setup.html', controller: FirstSetupCtrl}).
			otherwise({redirectTo: '/'});
	});


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

	app.directive('meter', function() {
		return {
			restrict: 'E',
			replace: true,
			scope: {
				max: '@',
				value: '@'
			},
			template: '<div></div>',
			link: function(scope, element, attrs) {

				var total_percent_points =  52.0 / scope.max;
				var total_filled_points  = (parseFloat(scope.value) / parseFloat(scope.max)) * 52.0;
				var total_rest_points    = 52.0 - total_filled_points;

				var stage = new Kinetic.Stage({
			        container: element[0],
			        width: 23,
			        height: 52
			    });

			    var layer = new Kinetic.Layer();
			    var rect = new Kinetic.Rect({
			        x: 0,
			        y: 0,
			        width: 23,
			        height: 52,
			        fill: '#ECF0F5',
			    });

			    var fillRectangle = new Kinetic.Rect({
			        x: 0,
			        y: 52,
			        width: 23,
			        height: 0,
			        fill: '#28ABE1',
			    });

			    layer.add(rect);
			    layer.add(fillRectangle);

      			stage.add(layer);

      			var tween = new Kinetic.Tween({
			        node: fillRectangle, 
			        duration: 1,
			        height: -total_filled_points,
			        easing: Kinetic.Easings.EaseInOut,
			    });

				setTimeout(function() {
			        tween.play();
			    }, 2000);
			}
		};
	});

	app.directive('stairsMeter', function() {
		return {
			restrict: 'E',
			replace: true,
			scope: {
				max: '@',
				value: '@'
			},
			template: '<canvas width="52" height="52"></canvas>',
			link: function(scope, element, attrs) {

				var context = element[0].getContext('2d');

				context.fillStyle = '#ECF0F5';
				context.fillRect(0,0,10,10);
				context.fillRect(0,13,10,10);
				context.fillRect(0,26,10,10);
				context.fillRect(0,39,10,10);

				context.fillRect(13,13,10,10);
				context.fillRect(13,26,10,10);
				context.fillRect(13,39,10,10);

				context.fillRect(26,26,10,10);
				context.fillRect(26,39,10,10);

				context.fillRect(39,39,10,10);

				var percent = parseFloat(scope.value) / parseFloat(scope.max) * 100;

				context.fillStyle = '#28ABE1';

				if (percent >= 10) { context.fillRect(39,39,10,10); }
				if (percent >= 20) { context.fillRect(26,39,10,10); }
				if (percent >= 30) { context.fillRect(13,39,10,10); }
				if (percent >= 40) { context.fillRect(0,39,10,10); }
				if (percent >= 50) { context.fillRect(26,26,10,10); }
				if (percent >= 60) { context.fillRect(13,26,10,10); }
				if (percent >= 70) { context.fillRect(0,26,10,10); }
				if (percent >= 80) { context.fillRect(13,13,10,10); }
				if (percent >= 90) { context.fillRect(0,13,10,10); }
				if (percent >= 100) { context.fillRect(0,0,10,10); }
			}
		};
	});

	app.directive('radialMeter', function() {
		return {
			restrict: 'E',
			scope: {
				value: '@',
				max: '@',
				id: '@',
			},
			replace: true,
			template: '<input type="text" value="{{ value }}" data-value="{{ value }}" data-height="50" data-max="{{ max }}" data-width="50" data-bgColor="#ECF0F5" data-angleOffset=-125 data-angleArc=250 data-fgColor="#28ABE1">',
			link: function(scope, element, attrs) {

				$(element).knob();
			},
		}
	});
	</script>
</head>

<body ng-app="Comparison">
	<header>
		<div class="row">
			<div class="large-4 columns">
				<img src="<?php echo asset('img/plain-logo.png'); ?>" width="50" />
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
		<div class="row" style="max-width:100em">
			<div class="large-2 columns">
				<a href="#" class="settings"><i class="icon-umbrella"></i></a>
			</div>
		</div>
	</section>

	<section id="application">
		<div class="row" style="max-width:100em">
			<div class="large-12 columns" ng-view>
				
			</div>
		</div>
	</section>

	<?php print HTML::script("js/foundation.min.js") ?>
	<script>
		$(document).foundation();
	</script>


	<script type="text/ng-template" id="setup.html">

		<div class="row" style="margin-top: 20px;margin-bottom: 20px;">
			<div class="large-12 columns">
				<div class="large-3 columns">
					<span class="table-header">Plan y compañia</span>
				</div>
				<div class="large-2 columns" align="left">
					<span class="table-header">Minutos</span>
				</div>
				<div class="large-2 columns">
					<span class="table-header">Mensajes</span>
				</div>
				<div class="large-1 columns">
					<span class="table-header">Internet</span>
				</div>
				<div class="large-2 columns" align="center">
					<span class="table-header">Precio</span>
				</div>
				<div class="large-2 columns">
					<span class="table-header"></span>
				</div>
			</div>
		</div>

		<div class="row" ng-repeat="product in products" ng-animate="'custom'">
			<div class="large-12 columns product-item">
				<div class="large-3 columns">
					<div class="name">{{ product.name }}</div>
					<div class="company {{ product.company.label }}">{{ product.company.name }}</div>
				</div>
				<div class="large-2 columns">
					<div class="row">
						<div class="large-2 large-offset-1 columns">
							<meter value="{{ product.minutes_toany }}" max="250"></meter>
						</div>
						<div class="large-4 columns" align="center">
							<span class="number">{{ product.minutes_toany }}</span>
							<span class="number-description">al mes</span>
						</div>
						<div class="large-5 columns"></div>
					</div>
				</div>
				<div class="large-2 columns">
					<div class="row">
						<div class="large-4 large-offset-1 columns">
							<stairs-meter value="{{ product.messages }}" max="20"></stairs-meter>
						</div>
						<div class="large-4 columns" align="center">
							<span class="number">{{ product.messages }}</span>
							<span class="number-description">al mes</span>
						</div>
						<div class="large-3 columns"></div>
					</div>
				</div>
				<div class="large-1 columns" align="center">
					<radial-meter id="{{ product.id }}" value="100" max="200"></radial-meter>
				</div>
				<div class="large-2 columns" align="center">
					<span class="price">$ {{ product.fee }}</span>
				</div>
				<div class="large-2 columns">
					<span class="table-header"><a href="#" class="action"><i class="icon-comments-alt"></i></a> <a href="#" class="action"><i class="icon-plus"></i></a></span>
				</div>
			</div>
		</div>
	</script>
</body>
</html>