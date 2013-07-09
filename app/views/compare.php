<!DOCTYPE html>


<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Comparateca | Comparaciones de <?php echo $subcategory->name; ?></title>
	
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<?php print HTML::style("asset/tooltipster.css") ?>
	<?php print HTML::style("asset/normalize.css") ?>
	<?php print HTML::style("asset/foundation.min.css") ?>
	<?php print HTML::style("asset/perfect-scrollbar.css") ?>
	<?php print HTML::script("asset/script/vendor-custom.modernizr.js") ?>
	<?php print HTML::style("css/master.css") ?>
	
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
			//$(".compare-list").perfectScrollbar();
			$(".dial").knob();
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
				<div class="data-info" style="padding-bottom: 200px">
					<div class="tag">Consumo</div>
					<h4 style="margin-top:40px">Costo</h4>
					<h4 style="margin-top:150px">Minutos</h4>
					<h4 style="margin-top:80px">Mensajes</h4>
					<h4 style="margin-top:65px">Internet</h4>
					<h4 style="margin-top:60px">Radio</h4>
					<h4 style="margin-top:45px">Numeros gratis</h4>

					<div class="tag" style="margin-top:40px">Costo adicional</div>
					<h4 style="margin-top:60px">KB adicional</h4>
					<h4 style="margin-top:80px">MMS</h4>
					<h4 style="margin-top:80px">Mensaje adicional</h4>
					<h4 style="margin-top:75px">Minuto adicional (misma comp.)</h4>
					<h4 style="margin-top:75px">Minuto adicional (otras comp.)</h4>
					<h4 style="margin-top:75px">Minuto adicional (nacional)</h4>
					<h4 style="margin-top:75px">Minuto adicional (local)</h4>
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

							<div class="row minutes_meters" style="margin-top:20px">
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
									<div class="meter_text">locales</div>
									<div class="meter_number" style="display:none"><?php echo $product->minutes_tolocal; ?></div>
								</div>
								<div class="large-3 columns" align="left">
									<div class="meter_text">misma comp.</div>
									<div class="meter_number" style="display:none"><?php echo $product->minutes_tosame; ?></div>
								</div>
								<div class="large-3 columns" align="left">
									<div class="meter_text">otras comp.</div>
									<div class="meter_number" style="display:none"><?php echo $product->minutes_toother; ?></div>
								</div>
								<div class="large-3 columns" align="left">
									<div class="meter_text">todo destino</div>
									<div class="meter_number" style="display:none"><?php echo $product->minutes_toany; ?></div>
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

							<div style="margin-top:20px;font-size:22px;color:#FFF" align="center">
								<?php if ($product->radio): ?>
								<span class="icon-ok"></span>
								<?php else: ?>
								<span class="icon-remove"></span>
								<?php endif; ?>
							</div>

							<div class="circle" style="margin-top:20px">
								<?php echo $product->free_numbers_tosame + $product->free_numbers_toother; ?>
							</div>

							<div class="circle" style="margin-top:60px">
								$ <?php echo (float)$product->additional_internet_kb; ?>
							</div>

							<div class="circle" style="margin-top:20px">
								$ <?php echo (float)$product->additional_mms; ?>
							</div>
							<div class="circle" style="margin-top:20px">
								$ <?php echo (float)$product->additional_message; ?>
							</div>
							<div class="circle" style="margin-top:20px">
								$ <?php echo (float)$product->additional_minute_tosame; ?>
							</div>
							<div class="circle" style="margin-top:20px">
								$ <?php echo (float)$product->additional_minute_toother; ?>
							</div>

							<div class="circle" style="margin-top:20px">
								$ <?php echo (float)$product->additional_minute_any_national; ?>
							</div>

							<div class="circle" style="margin-top:20px">
								$ <?php echo (float)$product->additional_minute_any_local; ?>
							</div>

							<div class="compareButton" style="margin-top:40px;margin-bottom:120px">
								<a href="#">Contratar</a>
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