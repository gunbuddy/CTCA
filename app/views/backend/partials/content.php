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

			<categories>
				<div ng-repeat="category in categories"><category item="category"></category></div>
			</categories>
		</div>
	</div>
</section>

