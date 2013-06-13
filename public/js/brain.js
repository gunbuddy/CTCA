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