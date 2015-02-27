var dropCatApp = angular.module('dropCat', [
  'ngResource',
  'wp.api'
]);

/**
 * Controls all 
 */
dropCatApp.controller('dropController', function ($scope, $location, $http) {

	$scope.baseUrl = 'http://chronoto.pe';
	$scope.jsonEndPoint = '/wp-json';
	$scope.postsEndPoint = '/posts';
	$scope.categoryNameFilter = '?filter[category_name]=';
	$scope.query = '';
	$scope.catName = 'news';
	$scope.posts = '';

	$scope.getCatFeed = function(name) {
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.postsEndPoint+$scope.categoryNameFilter+name)
    		.success(function(response) 
    			{
    				$scope.posts = response;
    			}
    		);
	};

});