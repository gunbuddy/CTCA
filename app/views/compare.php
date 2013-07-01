<!DOCTYPE html>


<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Comparateca | Comparaciones de <?php echo $subcategory->name; ?></title>

	<?php print HTML::style("asset/tooltipster.css") ?>
	<?php print HTML::style("asset/normalize.css") ?>
	<?php print HTML::style("asset/foundation.min.css") ?>
	<?php print HTML::style("asset/perfect-scrollbar.css") ?>
	<?php print HTML::script("asset/script/vendor-custom.modernizr.js") ?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<style type="text/css">
		html { height: 100% }
		body {
			background: #34495E;
			font:14px/1.231 "Varela Round", sans-serif;
			width: 100%;
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
			background: #FFF;
			padding: 1em 0;
		}

		header a.category {
			color: #34495E;
			margin-top: 2.5em;
			display: block;
			text-align: center;
		}

		.compare {
			background: #2c3e50;
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
				color: #34495E;
				position: relative;
				display: inline-block;
				width: 200px;
				float: left;
				margin-right: 20px;
				height: 100px;
			}
				.compare .product div.drop {
					background: #F6F8F8;
					color: #34495E;
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

		.compare-filtrate {
			width: 100%;
			background: #3A9AD8;
			padding: 10px 0;
		}

		.compare-filtrate .dropdown {
			font: 16px "Varela Round";
			background: #25BC9D;
			width: 300px;
			border-radius: 4px;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
		}

		.compare-filtrate .dropdown h4 {
			font: inherit;
			display: inline-block;
			width: 230px;
			color: #FFF;
			padding: 10px 10px;
			margin: 0;
		}

		.compare-filtrate .dropdown .tip {
			display: inline-block;
			width: 60px;
			color: #FFF;
			padding: 10px 0;
			border-left: 1px solid #22AE91;
			text-align: center;
		}

		.compare-filtrate .search {
			background: #FFF;
			border-radius: 20px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			width: 300px;
			height: 40px;
		}

		.compare-filtrate .search input {
			border: none;
			background: transparent;
			box-shadow: none;
			width: 250px;
			display: inline-block;
			margin: 0;
			padding: 10px 10px;
			height: 40px
		}

		.compare-filtrate .search .add {
			display: inline-block;
			width: 30px;
			background: #0086C3;
			color: #FFF;
			height: 30px;
			line-height: 32px;
			text-align: center;
			border-radius: 20px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
		}

		.filters {
			width: 100%;
			background: #3A9AD8;
		}

		.filters.stick {
			position: fixed;
			top: 0px;
			z-index: 1000;
		}

		.filters-hide {
			width:100%;
			height: 100px;
			display: none;
		}

			.filters h2 { color: #FFF; }

			.filters a.settings {
				background: #FFF;
				color: #3A9AD8;
				display: block;
				font-size: 40px;
				text-align: center;
			}

			.filters a {
				color: #FFF;
				display: inline-block;
				height: 100px;
				text-align: center;
				width: 100%;
				padding: 30px 0 0;
				font-size: 18px;
				-webkit-transition: 0.35s linear all;
				-moz-transition: 0.35s linear all;
				-o-transition: 0.35s linear all;
				transition: 0.35s linear all;
				background: #3A9AD8;
			}

			.filters a span.info {
				display: block;
				font-size: 13px;
				margin-top: 10px;
			}

			.filters a:hover {
				background: #FFF;
				color: #3A9AD8;
			}

			.filters img {
				margin: 8px 0;
			}

			.filters .filter {
				position:relative;
			}

		#application-brief h2 {
			color: #3489C0;
			margin: 1em 0;
		}
		#application {
			background: #F6F8F8;
		}

		#right-helper {
			background: #446CB3;
		}

		#application-brief .data-info {
			background: #283644;
			padding: 10px 0px;
		}

		#application-brief .data-info .tag {
			background: url(/img/tag.png) top left no-repeat;
			color: #FFF;
			height: 34px;
			width: 232px;
			padding: 6px 10px;
			font-size: 18px;
		}

		#application-brief .data-info h4 {
			color: #FFF;
			font: 18px "Varela Round";
			padding: 0px 10px;
		}

		#application-brief .compare-list {
			overflow: hidden;
		}

		#application-brief .compare-list > div {
			min-width: 2600px;
			overflow: hidden;
			position: relative;
		}
		#application-brief .compare-list .compare-item {
			width: 240px;
			text-align: center;
			float: left;
			margin: 0px 50px;
		}

		#application-brief .compare-list .compare-item h3 {
			color: #FFF;
			font: 18px "Varela Round";
			height: 44px;
		}

		#application-brief .compare-list .compare-item .bigCircle {
			background: #3A9AD8;
			border-radius:45px;
			-moz-border-radius:45px;
			-webkit-border-radius:45px;
			color: #FFF;
			height: 90px;
			width: 90px;
			margin: 0 auto;
			text-align: center;
			padding: 25px 0 0;
		}
		
		#application-brief .compare-list .compare-item .bigCircle strong {
			font-size: 18px;
			display: block;
		}

		#application-brief .compare-list .compare-item .bigCircle small {
			font-size: 14px;
		}

		#application-brief .compare-list .compare-item .simpleq .qt {
			background: #3A9AD8;
			color: #FFF;
			padding: 10px;
			font-size: 20px;
		}

		#application-brief .compare-list .compare-item .simpleq .q {
			color: #FFF;
			font: 18px "Varela Round";
		}

		#application-brief .compare-list .compare-item .vertical-meter {
			color: #FFF;
			font: 16px "Varela Round";
		}

		#application-brief .compare-list .compare-item .vertical-meter .meter {
			background: #ECF0F5;
			height: 23px;
			width: 100%;
		}

		#application-brief .compare-list .compare-item .vertical-meter .fill {
			height: 23px;
			background: #0086C3;
		}

		#application-brief .compare-list .compare-item .knob {
			position: relative;
			color: #FFF;
			font: 18px "Varela Round";
		}

		#application-brief .compare-list .compare-item .knob .mbs {
			color: #FFF;
			font: 16px "Varela Round";
			position: absolute;
			top: 40px;
			width:100%;
			text-align: center;
			left:0px;
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
			padding: 10px;
			display: block;
		}

		.order {
			background: #25BC9D;
			border-radius: 4px;
			color: #FFF;
			padding: 10px;
			font-size: 16px;
		}

		#order-hide a {
			width: 200px;
			padding: 10px;
			text-align: left;
			margin: 0;
			color: #FFF;
			font-size: 16px;
			display: block;
			border-radius: 4px;
		}

		#order-hide a:hover, #order-hide a.active {
			background: #25BC9D;
		}

		#order-hide a.reverse {
			background: #35CC77;
		}
		.product-item {
			background: #FFF;
			padding-bottom: 10px;
			padding-top: 10px;
			border-bottom: 0px;
			margin-left: 0.9375em;
			margin-right: 0.9375em;
		}

			.name {
				color: #2D3E4F;
				text-transform: uppercase;
				font-size: 12px;
				font-weight: bold;
			}

			.company {
				float: left;
				background: #0086C3;
				padding: 2px 3px;
				color: #FFF;
				margin-right: 50px;
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
				border: 3px solid #28ABE1;
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

			.radialNumber {
				color: #425C75;
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

		.filters-theme {
			border-radius: 5px; 
			border: 1px solid #34495E;
			background: #34495E;
			color: #fff;
		}

		/* Use this next selector to style things like font-size and line-height: */
		.filters-theme .tooltipster-content {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 16px;
			padding: 8px 15px;
		}

		.ui-widget-header {
			border: 1px solid #aaaaaa;
			background: #1abc9c;
			color: #222222;
			font-weight: bold;
		}

		.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br, .ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl, .ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr, .ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
			border-radius: 0;
		}

		.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
			border: 0px;
			background: #16a085;
		}

		.ui-slider .ui-slider-handle {
			position: absolute;
			z-index: 2;
			width: .8em;
			height: .8em;
			cursor: default;
		}

		.ui-widget-content {
			border: 0;
		}
		.ui-slider-horizontal .ui-slider-handle {
			top: 0em;
			margin-left: -.4em;
		}

		.reveal-modal {
			width: 400px;
			left: 50%;
			margin-left: -200px;
			position: fixed;
			margin-top: 5%;
		}

		.reveal-modal h2 {
			color: #2D3E4F;
			z-index: 10000;
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
	CompareCtrl = function($scope, $location)
	{
		$(function() {
			$(".compare-list").perfectScrollbar();
			$(".dial").knob();

			var lastScrollLeft = 0;
			$(".compare-list").scroll(function() {

			});
		});
	};

	app = angular.module("Comparison", [])
	.config(function($routeProvider, $interpolateProvider, $locationProvider) {

		$locationProvider.hashPrefix('!');
		$routeProvider.
			when('/list', {templateUrl: 'setup.html', controller: CompareCtrl}).
			otherwise({redirectTo: '/list'});
	});


	app.run(function($rootScope, $location) { 

	});

	app.directive('meter', function() {
		return {
			restrict: 'E',
			replace: true,
			scope: {
				max: '=',
				value: '@',
				smax: '@',
			},
			template: '<div></div>',
			link: function(scope, element, attrs) {

				if (! scope.max)
				{
					var max = scope.smax;
				}
				else
				{
					var max = scope.max;
				}

				var total_percent_points =  52.0 / max;
				var total_filled_points  = (parseFloat(scope.value) / parseFloat(max)) * 52.0;
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

			    scope.$watch("max", function() {

					var n_total_percent_points =  52.0 / scope.max;
					var n_total_filled_points  = (parseFloat(scope.value) / parseFloat(max)) * 52.0;
					var n_total_rest_points    = 52.0 - total_filled_points;

					if (n_total_filled_points != total_filled_points)
					{
						if (n_total_filled_points >= total_filled_points)
						{
							var fillUp = new Kinetic.Rect({
						        x: 0,
						        y: 52,
						        width: 23,
						        height: 0,
						        fill: '#28ABE1',
						    });

							layer.add(fillUp);

							var tweenUp = new Kinetic.Tween({
						        node: fillUp, 
						        duration: 1,
						        height: -n_total_filled_points,
						        easing: Kinetic.Easings.EaseInOut,
						    });

						    setTimeout(function() {
						        tweenUp.play();
						    }, 1000);

						    total_filled_points = n_total_filled_points;
						}
						else
						{
							var fillDown = new Kinetic.Rect({
						        x: 0,
						        y: 0,
						        width: 23,
						        height: 0,
						        fill: '#ECF0F5',
						    });

							layer.add(fillDown);

							var tweenDown = new Kinetic.Tween({
						        node: fillDown, 
						        duration: 1,
						        height: (52.0-n_total_filled_points),
						        easing: Kinetic.Easings.EaseInOut,
						    });

						    setTimeout(function() {
						        tweenDown.play();
						    }, 1000);

						    total_filled_points = n_total_filled_points;
						}
					}
				});
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
			template: '<input type="text" value="{{ value }}" data-height="50" data-max="{{ max }}" data-readOnly=true data-displayInput=false data-width="50" data-bgColor="#ECF0F5" data-angleOffset=-125 data-angleArc=250 data-fgColor="#28ABE1">',
			link: function(scope, element, attrs) {

				$(element).attr('value', scope.value);
				$(element).data('max', scope.max);
				$(element).knob();
			},
		}
	});

	app.directive('filter', function() {
		return {
			restrict: 'E',
			template: 
				'<div class="large-2 columns filter" id="filter-{{ name }}"> ' +
					'<a href="#"><span ng-transclude></span> <span class="info">{{ pre }}{{ from }}{{ post }} a {{ pre }}{{ to }}{{ post }} / mes</span></a>' +
				'</div>',
			scope: {
				from: '=',
				to: '=',
				message: '@',
				name: '@',
				post: '@',
				pre: '@',
				def: '='
			},
			transclude: true,
			link: function(scope, element, attrs) {

				$(element).find("div.filter").tooltipster({
					theme: '.filters-theme',
					content: $("#filter-"+scope.name+"-module"),
					position: 'bottom',
					interactive: true,
					fixedWidth: 200,
					functionReady: function(origin, tooltip)
					{
						$(tooltip).find("#slider").slider({
							range: true,
						      min: 0,
						      max: scope.def,
						      step: 50,
						      values: [ scope.from, scope.to ],
						      slide: function( event, ui ) {
						        
						        $(tooltip).find(".from").html(ui.values[ 0 ]);
						        $(tooltip).find(".to").html(ui.values[ 1 ]);

						        scope.from = parseInt(ui.values[ 0 ]);
						        scope.to   = parseInt(ui.values[ 1 ]);
						        scope.$apply();
						      },
						      change: function( event, ui ) {

						      	scope.$emit('updatePartialSetUseFilter');
						      	scope.$apply();
						      }
						});
					}
				});

			},
		}
	});
	
	app.directive('filter-multiple', function() {
		return {
			restrict: 'E',
			template: 
				'<div class="large-2 columns filter" id="filter-{{ name }}"> ' +
					'<a href="#"><span ng-transclude></span> <span class="info">{{ options }}</span></a>' +
				'</div>',
			scope: {
				from: '=',
				to: '=',
				message: '@',
				name: '@',
				def: '='
			},
			transclude: true,
			link: function(scope, element, attrs) {

				scope.options = 'TODAS';

				$(element).find("div.filter").tooltipster({
					theme: '.filters-theme',
					content: $("#filter-"+scope.name+"-module"),
					position: 'bottom',
					interactive: true,
					fixedWidth: 200,
					functionReady: function(origin, tooltip)
					{
						$(tooltip).find("#slider").slider({
							range: true,
						      min: 0,
						      max: scope.def,
						      step: 50,
						      values: [ scope.from, scope.to ],
						      slide: function( event, ui ) {
						        
						        $(tooltip).find(".from").html(ui.values[ 0 ]);
						        $(tooltip).find(".to").html(ui.values[ 1 ]);

						        scope.from = parseInt(ui.values[ 0 ]);
						        scope.to   = parseInt(ui.values[ 1 ]);
						        scope.$apply();
						      },
						      change: function( event, ui ) {

						      	scope.$emit('updatePartialSetUseFilter');
						      	scope.$apply();
						      }
						});
					}
				});

			},
		}
	});
	</script>
</head>

<body ng-app="Comparison">
	<header>
		<div class="row" style="max-width:100em">
			<div class="large-2 columns" align="center">
				<img src="<?php echo asset('img/plain-logo2.png'); ?>" width="50" />
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

	<section class="compare-filtrate">
		<div class="row" style="max-width:100em">
			<div class="large-4 columns">
				<div class="dropdown">
					<h4>Toda la información</h4> 

					<div class="tip"><span class="icon-chevron-down"></span></div>
				</div>
			</div>	
			<div class="large-4 columns" align="center">
				
				<div class="search">
					<input type="text" placeholder="Buscar y añadir" />
					<div class="add"><span class="icon-plus"></span></div>
				</div>
			</div>	
			<div class="large-4 columns">
				&nbsp;
			</div>	
		</div>
	</section>



	<section id="application-brief" style="margin-top:20px">
		<div class="row" style="max-width:100em">
			<div class="large-3 columns">
				<div class="data-info">
					<div class="tag">Consumo</div>
					<h4 style="margin-top:40px">Costo</h4>
					<h4 style="margin-top:80px">Minutos</h4>
					<h4 style="margin-top:150px">Mensajes</h4>
					<h4 style="margin-top:65px">Internet</h4>
					<h4 style="margin-top:30px">Radio</h4>
					<h4 style="margin-top:30px">Numeros gratis</h4>

					<div class="tag" style="margin-top:40px">Costo adicional</div>
					<h4 style="margin-top:30px">Costo</h4>
					<h4 style="margin-top:30px">Minutos</h4>
				</div>
			</div>

			<div class="large-9 columns">
				<div class="compare-list">
					<div>
						<?php $messages = 0; ?>
						<?php $internet = 0; ?>
						<?php foreach ($products as $product): ?>
						<?php if ($product->messages > $messages) $messages = $product->messages; ?>
						<?php if ($product->internet > $internet) $internet = $product->internet; ?>
						<?php endforeach; ?>

						<?php foreach ($products as $product): ?>
						<?php $minutes = $product->minutes_toany + $product->minutes_tolocal + $product->minutes_tosame + $product->minutes_toother; ?>
						<div class="compare-item">
							<h3><?php echo $product->name; ?></h3>

							<div class="bigCircle">
								<strong>$ <?php echo $product->fee; ?> </strong>
								<small>cada mes</small>
							</div>

							<div class="row" style="margin-top:20px">
								<div class="large-3 columns" align="left">
									<meter smax="<?php echo $minutes; ?>" value="<?php echo $product->minutes_tolocal; ?>" />
								</div>
								<div class="large-3 columns" align="left">
									<meter smax="<?php echo $minutes; ?>" value="<?php echo $product->minutes_tosame; ?>" />
								</div>
								<div class="large-3 columns" align="left">
									<meter smax="<?php echo $minutes; ?>" value="<?php echo $product->minutes_toother; ?>" />
								</div>
								<div class="large-3 columns" align="left">
									<meter smax="<?php echo $minutes; ?>" value="<?php echo $product->minutes_toany; ?>" />
								</div>
							</div>

							<div class="row" style="margin-top:20px;color:#FFF">
								<div class="large-3 columns" align="left">
									locales
								</div>
								<div class="large-3 columns" align="left">
									misma comp.
								</div>
								<div class="large-3 columns" align="left">
									otras comp.
								</div>
								<div class="large-3 columns" align="left">
									todo destino
								</div>
							</div>

							<div class="row simpleq" style="margin-top:20px">
								<div class="large-6 columns">
									<div class="qt">
										<?php echo $minutes; ?>
									</div>
								</div>

								<div class="large-6 columns" align="left">
									<div class="q">
										minutos<br /> cada mes
									</div>
								</div>
							</div>

							<div class="vertical-meter" style="margin-top:20px">
								<div class="row">
									<div class="large-6 columns">
										<div class="meter">
											<div class="fill" style="width:<?php echo ($product->messages/$messages)*100; ?>%"></div>
										</div>
									</div>

									<div class="large-6 columns" align="left">
										<?php echo $product->messages; ?> / mes
									</div>
								</div>
							</div>

							<div class="row knob" style="margin-top:20px">
								<div class="large-6 columns">
									<input type="text" data-fgColor="#3A9AD8" data-bgColor="#ECF0F5" value="<?php echo $product->internet ?>" data-max="<?php echo $internet ?>" data-readOnly="true" class="dial" data-width="100" data-height="100"data-displayInput="false" />
									<div class="mbs"><?php echo $product->internet ?></div>
								</div>

								<div class="large-6 columns" style="padding-top:2.1em">
									MB's al mes
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="application">
		<div class="row" style="max-width:100em">
			<div class="large-12 columns" ng-view>
				
			</div>
		</div>
	</section>

	<div id="myModal" class="reveal-modal">
	  <h2>{{ currentProduct.name }}</h2>
	  <p class="lead">Detalles del plan</p>
	  <p>Los planes elite de Iusacell normalmente son planes de gama de alto consumo con un precio que supera los $1500, considerela una buena opción si usted hace un uso intensivo de las caracteristicas.</p>

	  
	  <div class="row">
	  	<div class="large-8 columns" style="padding-top:1em">
	  		Costo mensual
	  	</div>
	  	<div class="large-4 columns">
	  		<div class="price">$ {{ currentProduct.fee }} </div>
	  	</div>
	  </div>
	  <br />
	  <div class="row">
	  	<div class="large-8 columns" style="padding-top:1em">
	  		Minutos al mes
	  	</div>
	  	<div class="large-4 columns">
	  		<div class="price" align="center">{{ currentProduct.minutes_tolocal + currentProduct.minutes_toany + currentProduct.minutes_tosame + currentProduct.minutes_toother }}</div>
	  	</div>
	  </div>
	  <br />
	  <div class="row">
	  	<div class="large-3 columns">
	  		<meter value="{{ currentProduct.minutes_toany }}" smax="{{ currentProduct.minutes_tolocal + currentProduct.minutes_toany + currentProduct.minutes_tosame + currentProduct.minutes_toother }}"></meter>
	  		Todo destino
	  	</div>
	  	<div class="large-3 columns">
	  		<meter value="{{ currentProduct.minutes_tolocal }}" smax="{{ currentProduct.minutes_tolocal + currentProduct.minutes_toany + currentProduct.minutes_tosame + currentProduct.minutes_toother }}"></meter>
	  		Locales
	  	</div>
	  	<div class="large-3 columns">
	  		<meter value="{{ currentProduct.minutes_tosame }}" smax="{{ currentProduct.minutes_tolocal + currentProduct.minutes_toany + currentProduct.minutes_tosame + currentProduct.minutes_toother }}"></meter>
	  		Misma compañia
	  	</div>
	  	<div class="large-3 columns">
	  		<meter value="{{ currentProduct.minutes_toother }}" smax="{{ currentProduct.minutes_tolocal + currentProduct.minutes_toany + currentProduct.minutes_tosame + currentProduct.minutes_toother }}"></meter>
	  		Otras compañias
	  	</div>
	  </div>
	  <a class="close-reveal-modal">&#215;</a>
	</div>

	<?php print HTML::script("asset/script/foundation.min.js") ?>
	<script>
		$(document).foundation();
	</script>

	<script type="text/ng-template" id="setup.html">

		<div class="row" ng-repeat="product in products | orderBy:orderBy:false | limitTo:10" ng-animate="'custom'">
			<div class="large-12 columns">
				<div class="row product-item">
					<div class="large-3 columns">
						<div class="name">{{ product.name }}</div>
						<div class="company {{ product.company.label }}">{{ product.company.name }}</div>
					</div>
					<div class="large-2 columns">
						<div class="row">
							<div class="large-2 large-offset-1 columns">
								<meter value="{{ product.minutes_tolocal + product.minutes_toany + product.minutes_tosame + product.minutes_toother }}" max="maxs.minutes"></meter>
							</div>
							<div class="large-4 columns" align="center">
								<span class="number">{{ product.minutes_tolocal + product.minutes_toany + product.minutes_tosame + product.minutes_toother }}</span>
								<span class="number-description">al mes</span>
							</div>
							<div class="large-5 columns"></div>
						</div>
					</div>
					<div class="large-2 columns">
						<div class="row">
							<div class="large-4 large-offset-1 columns">
								<stairs-meter value="{{ product.messages }}" max="1000"></stairs-meter>
							</div>
							<div class="large-4 columns" align="center">
								<span class="number">{{ product.messages }}</span>
								<span class="number-description">al mes</span>
							</div>
							<div class="large-3 columns"></div>
						</div>
					</div>
					<div class="large-1 columns" align="center">
						<radial-meter id="{{ product.id }}" value="{{ product.internet }}" max="4096"></radial-meter>
						<div class="radialNumber">{{ product.internet }} MB</div>
					</div>
					<div class="large-2 columns" align="center">
						<span class="price">$ {{ product.fee }}</span>
					</div>
					<div class="large-2 columns" align="center">
						<a href="" ng-click="productShow(product)" class="action" data-reveal-id="myModal"><i class="icon-comments-alt"></i></a> <a href="" ng-click="addToCompare(product)" class="action"><i class="icon-plus"></i></a>
					</div>
				</div>
			</div>
		</div>
	</script>
</body>
</html>