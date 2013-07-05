<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Comparateca | Comparaciones de <?php echo $subcategory->name; ?></title>

	<?php print HTML::style("css/tooltipster.css") ?>
	<?php print HTML::style("css/normalize.css") ?>
	<?php print HTML::style("css/foundation.css") ?>
	<?php print HTML::script("js/vendor/custom.modernizr.js") ?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<style type="text/css">
		body, html {
			height: 100%;
		}

		body {
			background: #F6F8F8;
			font:14px/1.231 "Varela Round", sans-serif;
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

		header a.category {
			color: #FFF;
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
		
		.comparing-now {
			background: #2C3E50;
			height: 50px;
			width: 100%;
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
	<?php print HTML::script("js/vendor/jquery.js") ?>
	<?php print HTML::script("http://code.jquery.com/ui/1.10.3/jquery-ui.js") ?>
	<?php print HTML::script("js/jquery.knob.js") ?>
	<?php print HTML::script("http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.5.4.min.js") ?>
	<?php print HTML::script("js/jquery.tooltipster.min.js"); ?>

	<script type="text/javascript">
	FirstSetupCtrl = function($scope, $location)
	{

	};

	SecondSetupCtrl = function($scope, $http, $routeParams)
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
			$scope.$emit('updateFullSet', data);
			$scope.$emit('updatePartialSetUseFilter');
		});

		$(function() {

			$(".order").tooltipster({
				interactive: true,
				content: $("#order-hide"),
				theme: '.filters-theme',
				position: 'bottom'
			});

		    var s = $(".filters");
		    var h = $(".filters-hide");
		    var comparing = $(".filters .comparing-now");

		    var pos = s.position();                    
		    $(window).scroll(function() {
		        var windowpos = $(window).scrollTop();
		        if (windowpos >= pos.top) {
		            s.addClass("stick");
		            h.show();

		            comparing.show();

		        } else {
		            s.removeClass("stick"); 
		            h.hide();

		            comparing.hide();
		        }
		    });
		});
	};

	app = angular.module("Comparison", [])
	.config(function($routeProvider, $interpolateProvider, $locationProvider) {

		$locationProvider.hashPrefix('!');
		$routeProvider.
			when('/list', {templateUrl: 'setup.html', controller: SecondSetupCtrl}).
			otherwise({redirectTo: '/list'});
	});


	app.run(function($rootScope, $location) { 

		$rootScope.filters = {
			minutes: {
				from: 0,
				to: 4000,
				def: 4000
			},
			messages: {
				from: 0,
				to: 1000,
				def: 1000
			},
			internet: {
				from: 0,
				to: 4096,
				def: 4096
			},
			fee: {
				from: 0,
				to: 2500,
				def: 2500
			},
			companies: {
				telcel: true,
				movistar: true,
				nextel: true,
				unefon: true,
				iusacell: true
			}
		};

		$rootScope.maxs = {
			minutes: 0,
			messages: 0,
			internet: 0
		};

		$rootScope.productsFull = [];
		$rootScope.products = [];
		$rootScope.currentProduct = {};

		$rootScope.productShow = function(product) {
			
			$rootScope.currentProduct = product;
		}

		$rootScope.compareList = [];

		$rootScope.addToCompare = function(product) {

			

			if ($rootScope.compareList.length >= 5)
			{
				$rootScope.compareList.shift();
			}

			$rootScope.compareList.push(product);
		}

		$rootScope.compare = function() {

			var url = '/show-comparison/cellplan/';
			var slugify = function(Text) { 
				return Text
			        .toLowerCase()
			        .replace(/[^\w ]+/g,'')
			        .replace(/ +/g,'-');
			}

			if ($rootScope.compareList.length == 1)
			{	
				// Throw an error

				return;
			}

			var first = false;

			angular.forEach($rootScope.compareList, function(product) {

				var product_url = product.id + '-' + slugify(product.name);

				if (first == false)
				{
					url  += product_url;
					first = true;
					return true;
				}

				url += '-vs-' + product_url;
			});

			location.href = url;
		}

		$rootScope.orderedBy = '-minutes';
		$rootScope.orderProductsBy = function(property) {

			var order = function(property) {
			    var sortOrder = 1;
			    if(property[0] === "-") {
			        sortOrder = -1;
			        property = property.substr(1, property.length - 1);
			    }

			    if (property == 'minutes')
			    {
			    	return function(a, b){
						var minutes_a = parseInt(a.minutes_tolocal) + parseInt(a.minutes_toany) + parseInt(a.minutes_tosame) + parseInt(a.minutes_toother);
						var minutes_b = parseInt(b.minutes_tolocal) + parseInt(b.minutes_toany) + parseInt(b.minutes_tosame) + parseInt(b.minutes_toother);

						if (minutes_a < minutes_b)
						{
							return -1 * sortOrder;
						}
						else if (minutes_a > minutes_b)
						{
							return 1 * sortOrder;
						}

						return 0;
					};
			    }

			    return function (a,b) {
			    	if (property == 'name')
			    	{
			    		var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
			    	}
			    	else
			    	{
			    		var result = (parseFloat(a[property]) < parseFloat(b[property])) ? -1 : (parseFloat(a[property]) > parseFloat(b[property])) ? 1 : 0;
			    	}
			        
			        return result * sortOrder;
			    }
			};

			if ($rootScope.orderedBy == property)
			{
				property = '-' + property;
			}

			$rootScope.orderedBy = property;

			$rootScope.productsFull.sort(order(property));
			$rootScope.$emit('updatePartialSetUseFilter');
		};


		$rootScope.$on('updateFullSet', function(event, set) {

			$rootScope.productsFull = set;

			$rootScope.productsFull.sort(function(a, b){
				var minutes_a = parseInt(a.minutes_tolocal) + parseInt(a.minutes_toany) + parseInt(a.minutes_tosame) + parseInt(a.minutes_toother);
				var minutes_b = parseInt(b.minutes_tolocal) + parseInt(b.minutes_toany) + parseInt(b.minutes_tosame) + parseInt(b.minutes_toother);

				if (minutes_a < minutes_b)
				{
					return 1;
				}
				else if (minutes_a > minutes_b)
				{
					return -1;
				}

				return 0;
			});
		});

		$rootScope.$on('updatePartialSetUseFilter', function(event) {

			var limit = 10;
			var put = 0;

			$rootScope.maxs.minutes = 0;
			$rootScope.maxs.fee = 0;
			$rootScope.maxs.messages = 0;
			$rootScope.maxs.internet = 0;

			$rootScope.products = [];

			for (var i = 0; i < $rootScope.productsFull.length; i++) {
				
				if (put < limit)
				{
					var product = $rootScope.productsFull[i];
					var minutes = product.minutes_tolocal + product.minutes_toany + product.minutes_tosame + product.minutes_toother;

					if (minutes >= $rootScope.filters.minutes.from && minutes <= $rootScope.filters.minutes.to)
					{
						if (product.messages >= $rootScope.filters.messages.from && product.messages <= $rootScope.filters.messages.to)
						{
							if (product.fee >= $rootScope.filters.fee.from && product.fee <= $rootScope.filters.fee.to)
							{
								if (product.internet >= $rootScope.filters.internet.from && product.internet <= $rootScope.filters.internet.to)
								{
									if ((parseInt(product.company.id) == 1 && $rootScope.filters.companies.telcel == true) || (parseInt(product.company.id) == 2 && $rootScope.filters.companies.movistar == true) || (parseInt(product.company.id) == 3 && $rootScope.filters.companies.nextel == true) || (parseInt(product.company.id) == 4 && $rootScope.filters.companies.iusacell == true) || (parseInt(product.company.id) == 5 && $rootScope.filters.companies.unefon == true)) {
										$rootScope.products.push(product);
										put = put + 1;
									}
								}
							}
						}
					}
				}	
			};

			for (var i = $rootScope.products.length - 1; i >= 0; i--) {
				
				var product = $rootScope.products[i];
				var minutes = product.minutes_tolocal + product.minutes_toany + product.minutes_tosame + product.minutes_toother;

				if (minutes > $rootScope.maxs.minutes) { $rootScope.maxs.minutes = minutes; }
			};
		});

		$rootScope.$watch("filters.companies.telcel", function() {

			$rootScope.$emit('updatePartialSetUseFilter');
		})
		$rootScope.$watch("filters.companies.movistar", function() {

			$rootScope.$emit('updatePartialSetUseFilter');
		})
		$rootScope.$watch("filters.companies.nextel", function() {

			$rootScope.$emit('updatePartialSetUseFilter');
		})
		$rootScope.$watch("filters.companies.iusacell", function() {

			$rootScope.$emit('updatePartialSetUseFilter');
		})
		$rootScope.$watch("filters.companies.unefon", function() {

			$rootScope.$emit('updatePartialSetUseFilter');
		})
		
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
	
	app.directive('filterMultiple', function() {
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
					fixedWidth: 200
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
				<img src="<?php echo asset('img/plain-logo.png'); ?>" width="50" />
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

	<section class="compare" ng-hide="compareList.length<=0">
		<div class="row" style="max-width:100em">
			<div class="large-2 columns">
				<a href="#" ng-click="compare()" class="button" style="margin-top:1.5em">Comparar</a>
			</div>
			<div class="large-10 columns">
				<div ng-repeat="product in compareList"  ng-animate="'custom'">
					<div class="product">
						<div class="drop" ng-click="removeFromCompare(product)"><i class="icon-remove"></i></div>
						<h4>{{ product.name  }}</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="filters-hide">&nbsp;</section>
	<section class="filters">
		<div class="row" style="max-width:100em">
			<div class="large-12 columns">
				<div class="row collapse">
					<filter from="filters.minutes.from" def="filters.minutes.def" to="filters.minutes.to" name="minutes">
						Minutos al mes
					</filter>

					<filter from="filters.messages.from" def="filters.messages.def" to="filters.messages.to" name="messages">
						Mensajes
					</filter>

					<filter from="filters.internet.from" def="filters.internet.def" to="filters.internet.to" name="internet" post=" MB">
						Internet movil
					</filter>

					<filter from="filters.fee.from" def="filters.fee.def" to="filters.fee.to" name="fee" pre="$ ">
						Costo
					</filter>

					<filter-multiple set="filters.companies" name="company">
						Compañia
					</filter-multiple>

					<div class="large-2 columns">
						<a href="#" class="settings"><i class="icon-cogs"></i></a>
					</div>
				</div>
			</div>	
		</div>
	</section>

	<section id="filter-module" style="display:none">
		<div id="filter-minutes-module">
			<div><h4 style="color:#FFF;font-size:16px;margin-bottom:10px">¿Cuanto llamas por mes?</h4></div>
			<div id="slider" style="width:200px;margin: 10px 0"></div>
			<div style="float:left;width:100px;font-size:18px" class="from">0</div>
			<div style="float:right;font-size:18px;width:100px;text-align:right"class="to">4000</div>
		</div>

		<div id="filter-messages-module">
			<div><h4 style="color:#FFF;font-size:16px;margin-bottom:10px">¿Que tanto escribes?</h4></div>
			<div id="slider" style="width:200px;margin: 10px 0"></div>
			<div style="float:left;width:100px;font-size:18px" class="from">0</div>
			<div style="float:right;font-size:18px;width:100px;text-align:right"class="to">1000</div>
		</div>

		<div id="filter-internet-module">
			<div><h4 style="color:#FFF;font-size:16px;margin-bottom:10px">¿Navegas en linea?</h4></div>
			<div id="slider" style="width:200px;margin: 10px 0"></div>
			<div style="float:left;width:100px;font-size:18px" class="from">0</div>
			<div style="float:right;font-size:18px;width:100px;text-align:right"class="to">4096</div>
		</div>

		<div id="filter-fee-module">
			<div><h4 style="color:#FFF;font-size:16px;margin-bottom:10px">¿Presupuesto?</h4></div>
			<div id="slider" style="width:200px;margin: 10px 0"></div>
			<div style="float:left;width:100px;font-size:18px" class="from">0</div>
			<div style="float:right;font-size:18px;width:100px;text-align:right"class="to">2500</div>
		</div>

		<div id="filter-company-module">
			<div><h4 style="color:#FFF;font-size:16px;margin-bottom:10px">¿Que compañias?</h4></div>
			<div class="company-select"><input type="checkbox" name="" ng-model="filters.companies.telcel" /> Telcel</div>
			<div class="company-select"><input type="checkbox" name="" ng-model="filters.companies.movistar" /> Movistar</div>
			<div class="company-select"><input type="checkbox" name="" ng-model="filters.companies.unefon" /> Unefon</div>
			<div class="company-select"><input type="checkbox" name="" ng-model="filters.companies.iusacell"  > Iusacell</div>
			<div class="company-select"><input type="checkbox" name="" ng-model="filters.companies.nextel" /> Nextel</div>
		</div>
	</section>

	<section id="application-brief">
		<div class="row" style="max-width:100em;background:#FFF">
			<div class="large-12 columns">
				<h2>Planes de telefonía para ti: </h2>

				<div class="row" style="margin-top: 20px;margin-bottom: 20px;">
					<div class="large-12 columns">
						<div class="row">
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
								<div class="order">
									Ordernar por
								</div>

								<div style="display:none">
									<div id="order-hide">
										<a href="" ng-class="{active:orderedBy=='name', reverse:orderedBy=='-name'}" ng-click="orderProductsBy('name')">Nombre y compañia</a>
										<a href="" ng-class="{active:orderedBy=='minutes', reverse:orderedBy=='-minutes'}" ng-click="orderProductsBy('minutes')">Minutos / mes</a>
										<a href="" ng-class="{active:orderedBy=='messages', reverse:orderedBy=='-messages'}" ng-click="orderProductsBy('messages')">Mensajes / mes</a>
										<a href="" ng-class="{active:orderedBy=='internet', reverse:orderedBy=='-internet'}" ng-click="orderProductsBy('internet')">Internet movil</a>
										<a href="" ng-class="{active:orderedBy=='fee', reverse:orderedBy=='-fee'}" ng-click="orderProductsBy('fee')">Precio</a>
									</div>
								</div>
							</div>
						</div>
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

	<?php print HTML::script("js/foundation.min.js") ?>
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