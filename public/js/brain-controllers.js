function DashboardCtrl($scope) {
	
	// Menu for...
	$scope.$emit('menuChange', ['&#59175;']);

	// jQuery context
	jQuery(function() {
		jQuery(".dial").knob();
	});

	$scope.name = "dash";
}

function ContentCtrl($scope, $http, $filter) {

	// Menu for...
	$scope.$emit('menuChange', ['&#128213;']);

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

		$http.post('../backend/api/v1/product/show/' + $scope.currentSubcategory.aller, {}).success(function(data) {

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

function EditCtrl($scope, $http, $routeParams) {

	// Menu for...
	$scope.$emit('menuChange', ['&#128213;']);

	$scope.token = $routeParams.token;
	$scope.productId = $routeParams.productId;

	$http.post('../backend/api/v1/product/one', {id: $scope.productId, category: $scope.token}).success(function(data)
	{
		angular.forEach(data, function(value, key)
		{
			$scope[key] = value;
		});

		$(function() {
			$("#minutes").val($scope.minutes).trigger("change");
			$("#messages").val($scope.messages).trigger("change");
			$("#internet").val($scope.internet).trigger("change");
		});
	});

	// jQuery context
	$(function() {
		$("#internet").knob({
			change: function(value) {

				$scope.internet = value;
				$scope.$apply();
			}
		});

		$("#messages").knob({
			change: function(value) {

				$scope.messages = value;
				$scope.$apply();
			}
		});

		$("#minutes").knob({
			change: function(value) {

				$scope.minutes = parseInt(value);
				$scope.minutes_toany = $scope.minutes - $scope.minutes_tosame - $scope.minutes_toother;

				if ($scope.minutes_toany < 0)
				{
					$scope.minutes_toany = 0;
					$scope.minutes_tosame = $scope.minutes - $scope.minutes_toother;
				}

				if ($scope.minutes_tosame < 0)
				{
					$scope.minutes_tosame = 0;
					$scope.minutes_toother = $scope.minutes;
				}
				$scope.$apply();
			}
		});

		update_minutes = function(value) {
			
		}
	});
}