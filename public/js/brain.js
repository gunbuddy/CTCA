app = angular.module("backend", [])
	.config(['$routeProvider', function($routeProvider, $interpolateProvider) {
		
		$routeProvider.
			when('/dashboard', {templateUrl: '../backend/api/v1/partial/dashboard.template', controller: DashboardCtrl}).
			when('/content/view', {templateUrl: '../backend/api/v1/partial/content.template', controller: ContentCtrl}).
			when('/content/edit/:token/:productId', {templateUrl: '../backend/api/v1/partial/edit.template', controller: EditCtrl}).
			otherwise({redirectTo: '/dashboard'});
}]);

app.run(function($rootScope) {

	$rootScope.menuIcon='&#59175;';

	$rootScope.$on('menuChange', function(evnt, icon) {

		$rootScope.menuIcon = icon;
	});

	$rootScope.touchSwitch = function() {

		$rootScope.touchMenu = !$rootScope.touchMenu;
	};

	// Get user
	/**$rootScope.user = {};

	$http.get('../api/user.json').success(function(data) 
	{	
		$rootScope.user = data
	});**/

})

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


app.directive('categories', function() {

	return {
		restrict: 'E',
		scope: {},
		transclude: true,
		template: 
			'<section class="categories-widget">' +
				'<div class="row">' +
					'<div class="large-12 columns navigation">' +
						'<div class="row">' +
							'<div class="large-3 columns" ng-transclude><h2>Gestión de contenido</h2></div>' +
							'<div class="large-4 columns">' + 
								'<nav class="navigation-menu">' +
									'<a href="#" class="active">Categorias</a>'+
									'<a href="#">Compañias</a>'+
								'</nav>' +
							'</div>' +
							'<div class="large-3 columns">' +
								'<div class="navigation-search">' +
									'<input type="text" ng-model="searchText" placeholder="Buscar..."> <i class="icon-magnifying"></i>' +
								'</div>' +
							'</div>' +
							'<div class="large-2 columns"></div>' +
						'</div>' +
					'</div>' +
				'</div>' +
				'<div class="row">' +
					'<div class="large-6 columns">' +
						'<div class="row">'+
							'<div class="large-6 columns">' +
								'<div class="white-margin"></div>' +
								'<nav class="list">' +
									'<span class="hint">Categorias</span>' +
									'<div ng-repeat="category in categories" ng-animate="\'custom\'">' +
										'<a href="" ng-class="{active:category.selected}" ng-click="switchCategory(category)">{{ category.name }}</a>' +
									'</div>' +
								'</nav>' +
								'<div class="button-nav">' +
									'<a href="#" class="active">&#128318;</a>' +
									'<a href="#">&#10133;</a>' +
									'<a href="#">&#59156;</a>' +
								'</div>' +
							'</div>' +

							'<div class="large-6 columns">' +
								'<div class="white-margin"></div>' +
								'<nav class="list">' +
									'<span class="hint">Subcategorias</span>' +
									'<div ng-repeat="category in tree.subcategories" ng-animate="\'custom\'">' +
										'<a href="" ng-class="{active:category.selected}" ng-click="getCategory(category)">{{ category.name }}<span class="label">{{ category.count }}</span></a>' +
									'</div>' +
								'</nav>' +
								'<div class="button-nav">' +
									'<a href="#" class="">&#128318;</a>' +
									'<a href="#">&#10133;</a>' +
									'<a href="#">&#59156;</a>' +
								'</div>' +
							'</div>' +	
						'</div>' +
						'<div class="white-margin"></div>' +
						'<div class="row">' +
							'<div class="large-12 columns">' +
								// stats and shit
							'</div>' +
						'</div>' +
					'</div>' +
					'<div class="large-6 columns">' +
						'<div class="white-margin"></div>' +
						'<article class="product-headers">' +
							'<div class="row" ng-include="products.header">' +
							'</div>' +
						'</article>' +
						'<section class="product-list">' +
							'<article class="product-item" ng-repeat="product in products.list | filter:searchText" ng-animate="\'custom\'">' +
								'<div class="row" ng-include="products.template">' +
								'</div>' +
							'</article>' +
						'</section>' +

						'<section class="product-pagination" ng-show="pages.length<=1">' +
							'<span class="pictogram">&#59229;</span>'+
							'<span ng-repeat="page in pages">' +
								'<a href="" ng-class="{active:page.selected}" ng-click="goTo(page)">' +
									'{{ page.n }} ' +
								'</a>' +
							'</span>' +
							'<span class="pictogram">&#59230;</span>'+
						'</section>' +
						'<div class="white-margin"></div>' +
						'<div class="white-margin"></div>' +
						'<div class="button-nav">' +
							'<a href="#">&#10133;</a>' +
							'<a href="#">&#59156;</a>' +
							'<a href="#">&#59290;</a>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</section>',
		controller: function($scope, $element, $http) {

			$scope.tree = [];
			$scope.categories = [];
			$scope.products = {
				headers: "",
				template: "",
				list: ""
			};
			$scope.pages = [];
			$scope.token = null;

			var init = false;

			this.addCategory = function(category) {
				
				category.selected = false;

				if (category.subcategories.length > 0) {

					angular.forEach(category.subcategories, function(subcategory) {

						subcategory.selected = false;
					});
				}

				$scope.categories.push(category);

				if (init == false) {

					$scope.switchCategory(category);

					init = true;
				}
			}

			$scope.switchCategory = function(cat) {

				angular.forEach($scope.categories, function(category) {
					category.selected = false;
				});

				cat.selected = true;

				$scope.tree = [];
				$scope.tree = cat;

				if ($scope.tree.subcategories.length > 0)
				{
					$scope.getCategory($scope.tree.subcategories[0]);
				}
			}

			$scope.getCategory = function(cat) {

				var count = cat.count;
				var divider = 10;

				var pages_number = Math.floor(count / divider) + 1;
				
				$scope.pages = [];

				for (var i = 1; i <= pages_number; i++) {
					
					$scope.pages.push({selected: false, n: i});
				};

				angular.forEach($scope.tree.subcategories, function(category) {
					category.selected = false;
				});

				cat.selected = true;

				$scope.goTo($scope.pages[0]);
			};

			$scope.goTo = function(page) {

				var skip = (parseInt(page.n) - 1) * 10;
				var cat;

				angular.forEach($scope.tree.subcategories, function(category) {
					
					if (category.selected == true)
					{
						cat = category;
						$scope.token = cat.aller;
					}
				});

				$http.post('../backend/api/v1/product/show/' + cat.aller, {take: 10, skip: skip}).success(function(data) {

					$scope.products = data;				
				})
				.error(function() {
					
				});	

				angular.forEach($scope.pages, function(p) {
					p.selected = false;
				});

				page.selected = true;

					
			}	

			return this;
		},
	};
});

app.directive('category', function() {

	return {
		restrict: 'E',
		template: '', 
		require: '^categories',
		replace: true,
		scope: {
			item: '='
		},
		link: function(scope, element, attrs, categoriesCtrl) {

			categoriesCtrl.addCategory(scope.item);
		}
	};
});

/** Dropdown directive for backend **/
app.directive('dropdown', function() {
	return {
		restrict: 'E',
		scope: {
			in: '='
		},
		transclude: true,
		template: '<div class="dropdown">' +
			'<div class="current" ng-click="listShow=!listShow" ng-bind-html-unsafe="current.inside.html()"></div>' +
			'<div ng-click="listShow=!listShow" class="tip">▾</div>' +
			'<div class="clear"></div>' +
			'<div class="list" ng-show="listShow" style="display: none" ng-animate="\'fade\'" ng-transclude>' +
			'</div>' +
		'</div>',
		controller: function ($scope, $element) {

			$scope.listShow = false;
			$scope.list = [];
			$scope.current = {};
			var first = false;

			this.addOption = function (element, value) {

				$scope.list.push({inside: element, value: value});
			}

			this.activate = function(item) {

				$scope.in = item.value;

				angular.forEach($scope.list, function(lstitem) {

					lstitem.inside.removeClass("active");
				});

				item.inside.addClass("active");

				$scope.current = item;
				$scope.listShow = false;
			}

			$scope.activate = this.activate;

			$scope.$watch("in", function(value, old)
			{
				angular.forEach($scope.list, function(lstitem) {

					if (lstitem.value == $scope.in)
					{
						$scope.activate(lstitem);	
					}
				});
			});

			return this;
		}
	};
});

app.directive('de', function() {

	return {
		restrict: 'E',
		require: '^dropdown',
		transclude: true,
		scope: {
			value: '@'
		},
		template: '<div class="list-item" ng-click="activate()" ng-transclude></div>',
		replace: true,
		link: function (scope, element, attrs, dropdownCtrl) {

			dropdownCtrl.addOption(element, scope.value);

			scope.activate = function() {

				dropdownCtrl.activate({inside: element, value: scope.value});
			}
		}
	};
});

/** Named selector for backend **/
app.directive('namedSelector', function() {
	return {
		restrict: 'E',
		scope: {
			in: '='
		},
		transclude: true,
		template: '<div class="named-selector" ng-transclude></div>',
		controller: function ($scope, $element) {

			this.activate = function (option) {

				$scope.in = option;
				$($element).find("a.active").removeClass("active");
			}
		}
	};
});

app.directive('ne', function() {

	return {
		restrict: 'E',
		require: '^namedSelector',
		transclude: true,
		scope: {
			value: '@',
			selected: '&'
		},
		template: '<a href="" ng-click="activate()" ng-transclude></a>',
		replace: true,
		link: function (scope, element, attrs, namedSelectorCtrl) {

			scope.activate = function ()
			{
				namedSelectorCtrl.activate(scope.value);

				element.addClass("active");
			}

			if (typeof attrs.selected != 'undefined') {

				scope.activate();
			}	
		}
	};
});