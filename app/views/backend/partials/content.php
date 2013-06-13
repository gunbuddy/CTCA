<div class="row">
	<div class="large-12 columns">
		<nav class="product-breadcumb">
			<a href="#/dashboard" title="general">Backend <span class="pictogram">&#9656;</span></a> 
			<a href="#/content/view" title="escritorio">Contenido <span class="pictogram">&#9656;</span></a>
		</nav>
	</div>
</div>

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
							<span><span class="more">&#9652;</span></span>
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

