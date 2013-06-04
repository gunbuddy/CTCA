function DashboardCtrl($scope) {
	
	// Menu for...
	$scope.$emit('menuChange', ['&#59175;']);

	// jQuery context
	jQuery(function() {
		jQuery(".dial").knob();
	});

	$scope.name = "dash";
}

function ContentCtrl($scope, $http) {

	// Menu for...
	$scope.$emit('menuChange', ['&#128213;']);

	// Categories 
	$scope.categories = [];

	// Get full categories
	$scope.load_categories = function() {

		$scope.loadError = false;

		$http.get('../backend/api/v1/category').success(function(data) 
		{	
			$scope.categories = data;

		}).
		error(function(data) {
				
			console.log(data);

			$scope.loadError = true;
		});
	};

	$scope.load_categories();

	$scope.showCategory = function (category)
	{
		$scope.currentCategory = category;
	}
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