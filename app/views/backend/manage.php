<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="es" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Comparateca Backend | Escritorio</title>
	
	<?php print HTML::style("css/backend/normalize.css") ?>
	<?php print HTML::style("css/backend/foundation.css") ?>
	<?php print HTML::style("css/mfglabs_iconset.css") ?>
	<?php print HTML::style("css/brain.css") ?>
	<?php print HTML::style("css/tooltipster.css") ?>
	<?php print HTML::script("js/vendor/custom.modernizr.js") ?>

	<?php print HTML::script("js/angular/angular.js") ?>
	<?php print HTML::script("js/vendor/jquery.js") ?>
	<?php print HTML::script("js/jquery.knob.js") ?>
	<?php print HTML::script("js/chart.js") ?>
	<?php print HTML::script("js/jquery.tooltipster.min.js"); ?>
</head>
<body ng-controller="ContentCtrl" ng-app="content" ng-dblclick="menuShow=false">
	<header>
		<div class="row">
			<div class="large-3 small-12 large-offset-1 columns" align="center">
				<img src="<?php print asset("img/backend.png") ?>" id="logo" width="130" />
			</div>

			<div class="large-1 hide-for-small columns" align="center">
				<nav class="main-menu">
					<span class="pictogram">&#128213;</span>

					<ul class="no-bullet" style="display:none">
						<li><a href="#/dashboard" ng-click="menuShow=false"><span class="pictogram">&#59175;</span> Escritorio</a></li>
						<li><a href="#/content/view" ng-click="menuShow=false"><span class="pictogram">&#128213;</span> Contenido</a></li>
						<li><a href="#/members" ng-click="menuShow=false"><span class="pictogram">&#128101;</span> Miembros</a></li>
						<li><a href="#/invoices" ng-click="menuShow=false"><span class="pictogram">&#59185;</span> Facturas</a></li>
						<li><a href="#/tools" ng-click="menuShow=false"><span class="pictogram">&#9881;</span> Herramientas</a></li>
					</ul>
				</nav>
			</div>
			<div class="large-4 small-12 columns" align="center">
				<a class="show-for-small small-menu"><span class="pictogram">&#59175;</span></a>
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

	<section>

		<div class="row">
			<div class="large-12 columns">
				<section class="alert error" ng-show="loadError" ng-animate="'fade'" style="display:none">
					<h3>Error: <strong>No se han podido cargar las categorias</strong></h3>

					<p>Ha ocurrido un <a href="#">error grave</a> tratando de cargar el contenido almacenado en la plataforma, intente denuevo en unos minutos y verifique su conexión a internet. Si el error persiste contacte con el soporte tecnico.</p>

					<div class="row">
						<div class="large-2 columns">
							<a href="" ng-click="load_categories()" class="button hot expand">Intentar denuevo</a>
						</div>
						<div class="large-2 columns">
							<a href="#/dashboard" class="button default expand">Esta bien</a>
						</div>
						<div class="large-8 columns"></div>
					</div>
				</section>
			</div>
		</div>
		<section class="content">
			<div class="row">
				<div class="large-12 columns">
					<div class="white-margin"></div>

					<section class="categories-widget">
						<div class="row">
							<!-- Row for the header / Search / Other stuff -->
							<div class="large-12 columns navigation">
								<div class="row">
									<div class="large-3 columns"><h2>Gestión de contenido</h2></div>
									<div class="large-4 columns">
										<nav class="navigation-menu">
											<a href="#" class="active">Categorias</a>
											<a href="#">Compañias</a>
										</nav>
									</div>
									<div class="large-3 columns">
										<div class="navigation-search">
											<input type="text" ng-model="searchText" placeholder="Buscar..."> <i class="icon-magnifying"></i>
										</div>
									</div>
									<div class="large-2 columns"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="large-6 columns">

								<!-- Row for list categories -->
								<div class="row">
									<div class="large-6 columns">
										<div class="white-margin"></div>
										<nav class="list">
											<span class="hint">Categorias</span>
											<div ng-repeat="category in categories" ng-animate="'custom'">
												<a href="" ng-class="{active:category.selected}" ng-click="showCategory(category)">{{ category.name }}</a>
											</div>
										</nav>
									</div>

									<div class="large-6 columns">
										<div class="white-margin"></div>
										<nav class="list">
											<span class="hint">Subcategorias</span>
											<div ng-repeat="category in currentCategory.subcategories" ng-animate="'custom'">
												<a href="" ng-class="{active:category.selected}" ng-click="showSubcategory(category)">{{ category.name }}<span class="label">{{ category.count }}</span></a>
											</div>
										</nav>
										<!--<div class="button-nav">
											<a href="#" class="">&#128318;</a>
											<a href="#">&#10133;</a>
											<a href="#">&#59156;</a>
										</div>-->
									</div>	
								</div>
								<div class="white-margin"></div>
								<div class="row">
									<div class="large-12 columns">
										<!--<h3>Comparaciones en Telecomunicaciones</h3>
										<canvas id="categoryStat" height="450" width="500"></canvas>-->
									</div>
								</div>
							</div>

							<!-- Row for the list of products -->
							<div class="large-6 columns">
								<div class="white-margin"></div>
								<article class="product-headers">
									<div class="row" ng-include="products.header">
									</div>
								</article>
								<section class="product-list">
									<article class="product-item" ng-repeat="product in page" ng-animate="'custom'">
										<div class="row" ng-include="products.template">
										</div>
									</article>
								</section>

								<section class="product-pagination" ng-show="pages.length>1">
									<span class="pictogram">&#59229;</span>
									<span ng-repeat="page in pages">
										<a href="" ng-class="{active:page.selected}" ng-click="showPage(page)">
											{{ page.n }}
										</a>
									</span>
									<span id="pag"><span class="more"><div class="pages-nav"><a href='' ng-click='setPageSet(0)'>1-8</a><a href='' ng-click='setPageSet(1)'>9-16</a></div>&#9652;</span></span>
									<span class="pictogram">&#59230;</span>
								</section>
								<div class="white-margin"></div>
								<div class="white-margin"></div>
								<div class="button-nav">
									<a href="#">&#10133;</a>
									<a href="#">&#59156;</a>
									<a href="#">&#59290;</a>
								</div>
							</div>
						</div>
					</section>
					</section>
				</div>
			</div>
		</section>
	</section>

	<?php print HTML::script("js/foundation.min.js") ?>

	<script type="text/javascript">
		$(document).foundation();

		$(function() 
		{
			$(".dial").knob();
		});

		app = angular.module("content", []);


		app.filter('ucwords', function() {

			return function (input) {

				return (input + '').replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function ($1) {
				    return $1.toUpperCase();
				});
			};
		});

		app.filter('ucfirst', function() {

			return function (input) {

				input += '';
				var f = input.charAt(0).toUpperCase();
				return f + input.substr(1);
			};
		});

		function ContentCtrl($scope, $http, $filter) {

			// Categories 
			$scope.categories = [];
			$scope.products = {
				headers: "",
				template: "",
				list: []
			};
			$scope.token = '';

			$scope.currentCategory = {};
			$scope.currentSubcategory = {};

			// Pagination for the subcategory
			$scope.pages = [];
			$scope.wholePagesSet = [];

			// Current page
			$scope.page = [];

			// First category initilization
			var init = false;

			// Get full categories
			$scope.load_categories = function() {

				$scope.loadError = false;

				$http.get('../backend/api/v1/category').success(function(data) 
				{	
					$scope.categories = data;

					angular.forEach($scope.categories, function(category) {

						category.selected = false;

						if (category.subcategories.length > 0) {

							angular.forEach(category.subcategories, function(subcategory) {

								subcategory.selected = false;
							});
						}

						if (init == false) {

							$scope.showCategory(category);

							init = true;
						}
					});
				}).
				error(function(data) {
						
					console.log(data);

					$scope.loadError = true;
				});
			};

			// Show a category
			$scope.showCategory = function(category)
			{
				angular.forEach($scope.categories, function(category) {
					category.selected = false;
				});

				category.selected = true;

				$scope.currentCategory = category;

				if ($scope.currentCategory.subcategories.length > 0)
				{
					$scope.showSubcategory($scope.currentCategory.subcategories[0]);
				}		
			};

			$scope.showSubcategory = function(subcategory)
			{
				var count = subcategory.count;
				var divider = 10;

				var pages_number = Math.floor(count / divider);
				
				$scope.pages = [];

				if (pages_number >= 8)
				{
					sets = Math.ceil(pages_number / 8);

					$scope.wholePagesSet = [];

					for (var i = sets; i <= sets; i++) {
						
						$scope.wholePagesSet.push(i);
					};

					pages_number = 8;
				}

				for (var i = 1; i <= pages_number; i++) {
					
					$scope.pages.push({selected: false, n: i});
				};

				angular.forEach($scope.currentCategory.subcategories, function(category) {
					category.selected = false;
				});

				$scope.currentSubcategory = subcategory;

				$scope.currentSubcategory.selected = true;
				$scope.token = $scope.currentSubcategory.aller;

				$http.get('../backend/api/v1/product/show/' + $scope.currentSubcategory.aller).success(function(data) {

					$scope.products = data;		
					$scope.showPage($scope.pages[0]);	

					$scope.$watch('searchText', function() {
						
						angular.forEach($scope.pages, function(p) {
							
							if (p.selected == true)
							{
								$scope.showPage(p);
							}
						});
					});	
				})
				.error(function() {
					
				});
			};


			$scope.showPage = function(page)
			{
				skip = (parseInt(page.n) - 1) * 10;
				take = 10;

				$scope.page = [];

				count = 0;

				filtered = $filter('filter')($scope.products.list, $scope.searchText);

				for (var i = 0; i < filtered.length; i++) {
					
					if (i >= skip)
					{
						if (i < (skip+10))
						{
							$scope.page.push(filtered[i]);
						}
					}
				};

				angular.forEach($scope.pages, function(p) {
					p.selected = false;
				});

				page.selected = true;
			};

			$scope.setPageSet = function(n) {

				$scope.pages = [];

				for (var i = 9; i <= 16; i++) {
					
					$scope.pages.push({selected: false, n: i});
				};
			}

			$scope.load_categories();

			$(function(){
				$('.tp').tooltipster({interactive: true});
			});
		}
	</script>
	<script type="text/ng-template" id="list-cellplan.html">
		<div class="large-5 columns">{{ product.name | lowercase | ucfirst }}</div>
		<div class="large-2 columns" align="center"><span class="label {{ product.company.label }}">{{ product.company.name | lowercase }}</span></div>
		<div class="large-3 columns">$ {{ product.fee | number:2 }} </div>
		<div class="large-2 columns">
			<a href="#/content/edit/{{ token }}/{{ product.id }}"><span class="call-to-action">&#9998;</span></a>
			<a href="#/content/edit/{{ token }}/{{ product.id }}"><span class="call-to-action gray">&#10060;</span></a>
		</div>
	</script>

	<script type="text/ng-template" id="header-cellplan.html">
		<div class="large-5 columns">Nombre del plan</div>
		<div class="large-2 columns" align="center">Compañia</div>
		<div class="large-3 columns">Costo & tarifa</div>
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