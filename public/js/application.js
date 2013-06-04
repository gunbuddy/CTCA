app = angular.module("comparateca", []);

app.config(['$routeProvider', function($routeProvider) {
	
	$routeProvider.
		when('/setup', {templateUrl: 'setup.html', controller: "SetupCtrl"}).
		when('/products', {templateUrl: 'products.html', controller: "ProductsCtrl"}).
		otherwise({redirectTo: '/setup'});
}])

app.run(function($rootScope, db, filtrate, comparer) {	
	
	$rootScope.products = [];
	$rootScope.recommended = [];
	
	$rootScope.updateFiltrate = function() 
	{
		$rootScope.products = comparer.filterUpdate(filtrate).getFeatured();
		$rootScope.recommended = comparer.getRecommended();
		return;

		var products = db.getItems();
		var product_matching = [];
		
		angular.forEach(products, function (p, id)
		{
			if (filtrate.month_minutes.active)
			{
				var minutes = p.minutes.inside + p.minutes.outside;
				
				if (filtrate.month_minutes.to200)
				{				
					if (minutes > 0 && minutes <= 200)
					{
						product_matching.push(p);
					}
				}
				
				if (filtrate.month_minutes.to400)
				{				
					if (minutes > 200 && minutes <= 400)
					{
						product_matching.push(p);
					}
				}
				
				if (filtrate.month_minutes.to600)
				{				
					if (minutes > 400 && minutes <= 600)
					{
						product_matching.push(p);
					}
				}
				
				if (filtrate.month_minutes.to1000)
				{				
					if (minutes > 600 && minutes <= 1000)
					{
						product_matching.push(p);
					}
				}
				
				if (filtrate.month_minutes.to1500)
				{				
					if (minutes > 1000 && minutes <= 1500)
					{
						product_matching.push(p);
					}
				}
				
				if (filtrate.month_minutes.to2500)
				{				
					if (minutes > 1500 && minutes <= 2500)
					{
						product_matching.push(p);
					}
				}
				
				if (filtrate.month_minutes.tonone)
				{				
					if (minutes > 2500)
					{
						product_matching.push(p);
					}
				}
			}
		})
		
		db.updateItems(product_matching)
	}
})

app.factory('comparer', function ($rootScope) {

	var comparer = {};
	
	// This is the complete list of products we'll have to filter though
	var product_list = [];

	// First three featured products compared against the filtration
	var product_featured = [];

	// First five other recommendations
	var product_recommendations = [];

	comparer.pushProduct = function (product)
	{
		product_list.push(product);
	}

	comparer.setList = function (products)
	{
		product_list = products;
	}

	comparer.getFeatured = function ()
	{
		return product_featured;
	}

	comparer.getRecommended = function ()
	{
		return product_recommendations;
	}

	comparer.filterUpdate = function (filters)
	{
		var main = filters.main;

		// Reset the important stuff
		product_featured = [];
		product_recommendations = [];

		var temp_list = [];

		// Generate temp product list based on defined modules on filters
		angular.forEach(product_list, function (product, id) {

			var points = 0;
			var pass = false;
			var field_main = product[main];

			angular.forEach(filters.fields, function (filter_under, filter_name) {

				var field_value = eval(filter_under);					
				var field_revelance = 1.0 / filters[filter_name].relevance;

				// Not activated
				if (filters[filter_name].active == false) return false;

				// Check if the product passes or not based on the modules
				for (var i = filters[filter_name].module.length - 1; i >= 0; i--) {

					// Check if the module applies 
					if (filters[filter_name][filters[filter_name].module[i][1][0]] == filters[filter_name].module[i][1][1])
					{

						// Get the config for the module
						var module_configuration = filters[filter_name][filters[filter_name].module[i][2]];

						// Module activated
						if (filters[filter_name].module[i][0] == 'multiple_ranges')
						{
							
							for (var rc = module_configuration.length - 1; rc >= 0; rc--) {
								
								// The range is not activated
								if (filters[filter_name][module_configuration[rc][2]] == false) continue;

								if (field_value > module_configuration[rc][0] && field_value <= module_configuration[rc][1])
								{
									// Buuya!
									pass = true;

									break;
								}

								pass = false;
							};
						}
						else if (filters[filter_name].module[i][0] == 'unique_range')
						{
							// Get the config for the module
							var module_configuration = filters[filter_name][filters[filter_name].module[i][2]];

							var from = filters[filter_name][module_configuration[0][0]];
							var to = filters[filter_name][module_configuration[1][0]];

							if (field_value > from && field_value <= to)
							{
								pass = true;
							}
						}

						break;
					}

					continue;
				};

				// Calculate the points for the filter
				points += field_revelance * field_value;
			});
	
			// Did not pass
			if (! pass) return;

			points = (points / field_main) * 10;

			temp_list.push([points, product]);
		});
		

		// Sort by points
		temp_list.sort(function (a, b) {
			return parseFloat(a[0])-parseFloat(b[0])
		});

		temp_list.reverse();

		if (temp_list.length <= 3)
		{
			product_featured = temp_list;
		}

		if (temp_list.length > 3)
		{
			product_featured = temp_list.slice(0,3);

			temp_list.shift();
			temp_list.shift();
			temp_list.shift();

			product_recommendations = temp_list;
		}

		return comparer;
	}

	return comparer;
})

app.factory('filtrate', function () {
	
	return {
		main: 'fee',
		fields: {month_minutes: 'product.minutes.inside + product.minutes.outside' },
		month_fee: {
			active: false,
			module: [
				['multiple_ranges', ['slider', false], 'multiple_ranges_config'], 
				['unique_range', ['slider', true], 'unique_range_config']
			],
			multiple_ranges_config: [
				[150, 300, 'to300'],
				[300, 700, 'to700'],
				[700, 1200, 'to1200'],
				[1200, 1600, 'to1600'],
				[1600, 2000, 'to2000'],
				[2000, 0, 'tonone']
			],
			unique_range_config: [
				['from', 0, 0],
				['to', 2000, 0],
			],
			from: 0,
			to: 250,
			slider: false,
			to300: false,
			to700: false,
			to1200: false,
			to1600: false,
			to2000: false,
			tonone: false,
			relevance: 1
		},
		month_sms: {
			active: false,
			from: 0, 
			to: 100,
			relevance: 3
		},
		month_minutes: {
			active: false,
			module: [
				['multiple_ranges', ['slider', false], 'multiple_ranges_config'], 
				['unique_range', ['slider', true], 'unique_range_config']
			],
			multiple_ranges_config: [
				[0, 200, 'to200'],
				[200, 400, 'to400'],
				[400, 600, 'to600'],
				[600, 1000, 'to1000'],
				[1000, 1500, 'to1500'],
				[1500, 2500, 'to2500'],
				[2500, 0, 'tonone']
			],
			unique_range_config: [
				['from', 0, 0],
				['to', 2500, 0]
			],
			slider: false,
			to200: false,
			to400: false,
			to600: false,
			to1000: false,
			to1500: false,
			to2500: false,
			tonone: false,
			relevance: 2,
			from: 0,
			to: 200,
		},
		internet: {
			active: false,
			relevance: 4,
		},
		company: {
			active: false,
			relevance: 5,
			telcel: false,
			nextel: false,
			movistar: false,
			iusacell: false,
		}
	}
})

app.factory('db', function ($rootScope) {
	
	var items = [];
	
	var modify = {};
	
	modify.updateItems = function (v) 
	{
		items = v;
		
		$rootScope.products = items;
		
		return true;
	}
	
	modify.getItems = function () 
	{
		return items;
	}
	
	return modify;
})

app.controller("SetupCtrl", function ($scope, $http, $location, filtrate) {

	$scope.filtrate = filtrate
	
	$scope.performConfig = function () {
		
		$(".mask").fadeOut();
		
	}
})

app.controller("ProductsCtrl", function ($scope, $http, filtrate, comparer) {
	
	$scope.filtrate = filtrate
	
	$http.get('../v1/api/product-list/cell-plans.json').success(function(data) 
	{	
		comparer.setList(data)
	});
	

  
	$(".mask").fadeOut();
})

app.controller("FilterCtrl", function ($scope, $http, filtrate) {

	$scope.filtrate = filtrate
	
	$scope.performConfig = function () {
		
		$(".mask").fadeOut();
	}
	
	$(function() { 
		
	    $("#month_fee_slider").slider({
	    	range: true,
	    	min: 0,
	    	max: 2000,
	    	step: 50,
	    	values: [0, 200],
	    	slide: function(event, ui) {	 
	    		
	    		$scope.filtrate.month_fee.from = ui.values[0];
	    		$scope.filtrate.month_fee.to = ui.values[1];
	    		
	    		$scope.$apply();
	        },
	        stop: function(event, ui) {
	        
		       
	        }
	    });
	    
	    $("#month_sms_slider").slider({
	    	range: true,
	    	min: 0,
	    	max: 500,
	    	step: 50,
	    	values: [0, 100],
	    	slide: function(event, ui) {	 
	    		
	    		$scope.filtrate.month_sms.from = ui.values[0];
	    		$scope.filtrate.month_sms.to = ui.values[1];
	    		
	    		$scope.$apply();
	        },
	        stop: function(event, ui) {
	        		
	        }
	    });
	    
	    $("#month_minutes_slider").slider({
	    	range: true,
	    	min: 0,
	    	max: 2000,
	    	step: 50,
	    	values: [0, 300],
	    	slide: function(event, ui) {	 
	    		
	    		$scope.filtrate.month_minutes.from = ui.values[0];
	    		$scope.filtrate.month_minutes.to = ui.values[1];
	    		
	    		$scope.$apply();
	        },
	        stop: function(event, ui) {
	        
		        $scope.filtrateUpdate()
	        }
	    });
	    
	    $("#filtrate-config").sortable({ 
	    	axis: "y", 
	    	cursor: "move",
	    	handle: ".reorder",
	    	scroll: false,
	    	start: function(event, ui) {
		    	ui.item.last_position = ui.item.index() + 1;
	    	},
	    	update: function(event, ui) {
		    	
		    	angular.forEach($scope.filtrate, function(config, fltr) {
		    		
		    		if (ui.item.last_position > (ui.item.index() + 1)  && (config.relevance >= (ui.item.index() + 1) && config.relevance < ui.item.last_position))
		    		{
			    		config.relevance = config.relevance + 1
		    		} 
		    		else if (ui.item.last_position < (ui.item.index() + 1)  && (config.relevance <= (ui.item.index() + 1) && config.relevance > ui.item.last_position))
		    		{
			    		config.relevance = config.relevance - 1
		    		}
		    	});	    				    	
		    	
		    	angular.forEach($scope.filtrate, function(config, fltr) {
		    		
		    		if (fltr == ui.item.data('filter'))
		    		{
			    		config.relevance = ui.item.index()+1;
		    		}	
		    	});
		    	
		    	$scope.$apply();	
	    	}	
	    });
	    $("#filters").disableSelection();
	})
})

app.controller("PreliminarCompare", function($scope, $http) {
	
	$scope.featured = []
	
	$scope.filtrate = 
	
	
	$scope.filtrateUpdate = function() {
		
	}
});

// Some useful but functionless directives
app.directive("box", function() {
	
	return {
		restrict: 'E',
		transclude: true,
		template: '<div class="row" ng-transclude></div>'
	}
});

app.directive("preFilter", function() {
	
	return {
		restrict: 'E',
		transclude: true,
		replace: true,
		scope: {
			lt: '='	
		},
		template: '<article class="prefilter" ng-click="activate()">' +
					'<div class="row">' +
						'<div class="large-1 columns">' +
							'<div class="selector"><i class="icon-check"></i></div>' +
						'</div>' +
						'<div class="large-11 columns filter-name" ng-transclude></div>' +
					'</div>' +
				  '</article>',
		link: function(scope, element, attrs) {
			
			scope.activate = function() {
				
				
				scope.lt.active = true
				element.addClass("active")
				
				$("#next-step").html("Empezar sugerencias");
			}
			
		}
	};
})

app.directive("filters", function() {
	
	return {
		restrict: 'E',
		transclude: true,
		controller: function($scope, $element) {
			
			this.activateFilter = function(){
				
			}
		},
		template: '<section id="filtrate-config" ng-transclude></section>',
	}
});

app.directive("filter", function() {
	return {
		require: '^filters',
		restrict: 'E',
		transclude: true,
		scope: {
			title: '@',
			description: '@',
			icon: '@',
			lt: '=',
			st: '@'
		},
		replace: true,
		template: '<article class="filter-item" data-filter="{{ st }}">' +
					'<div class="row">' +
						'<div class="large-2 columns">' +
							'<section class="filter-icon"><i class="icon-{{ icon }}"></i></section>'+
						'</div>'+
						'<div class="large-5 columns">' +
							'<h5>{{ title }} <small>{{ description }}</small></h5>' +
						'</div>' +
						'<div class="large-2 large-offset-1 columns">' +
							'<section class="reorder"><i class="icon-reorder"></i></section>' +
						'</div>' +
						'<div class="large-2 columns">'+
							'<div class="selector" ng-click="activate()"><i class="icon-check"></i></div>' +
						'</div>' +
					'</div>' +
					'<div class="row" ng-show="lt.active" style="display:none" ng-animate="\'fade\'">'+
						'<div class="large-10 large-offset-2 columns">'+
							'<div class="row">' +
								'<div ng-class="firstColumn" ng-transclude></div>' +
								'<div ng-hide="lt.slider" ng-animate="\'fade\'" ng-class="secondColumn">' +
								'<section class="suggest" align="left">'+
									'Prefirias seleccionar un rango de precios?' +
									'<br />' +
									'<br />' +
									'<a ng-click="activateSlider()">Definitivamente</a>' +
									'<br />' +
									'ó <a href="#">quiero que me guien</a>' +
								'</section>' +
						'</div>'+
					'</div>'+
				  '</article>',
		link: function (scope, element, attrs, filtersCtrl) {
			
			scope.hidden = false
			scope.firstColumn = "large-5 columns";
			scope.secondColumn = "large-7 columns";

			scope.$watch('lt.active', function(n, o){
				
				if (n == true)
				{
					element.addClass("active")
					
					return
				}
				
				element.removeClass("active")
			})
			
			scope.activateSlider = function () {
				
				scope.lt.slider = true;
				scope.secondColumn = "delete";
				scope.firstColumn  = "large-12 columns";
			}
			
			scope.activate = function() {
				
				// We've to check first if we'll active or deactivate
				if (scope.lt.active) 
				{
					scope.lt.active = false
					
					return
				}
				
				scope.lt.active = true
				
				filtersCtrl.activateFilter()
				
				return		
			}
		}
	}
});