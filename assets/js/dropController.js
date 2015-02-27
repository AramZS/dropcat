/**
 * Controls all 
 */
dropCatApp.controller('dropController', function ($scope, $location, $http) {

	//Site-wide URL pieces
	$scope.baseUrl = 'http://chronoto.pe';
	$scope.jsonEndPoint = '/wp-json';

	//Base Endpoints
	$scope.postsEndPoint = '/posts';
	$scope.catEndPoint = '/taxonomies/category/terms';

	//Endpoint filters
	$scope.categoryNameFilter = '?filter[category_name]=';

	//Endpoint Variable Storage
	$scope.query = '';
	$scope.catName = 'news';

	//Manipulatable Array Storage
	$scope.posts = '';
	$scope.categoryParents = '';
	$scope.categoryChildren = '';

	//Tick-ready storage
	// @todo this - https://docs.angularjs.org/api/ng/service/$interval
	$scope.catChildInPlay = '';

	// Get the feed from a category by name
	$scope.getCatFeed = function(name) {
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.postsEndPoint+$scope.categoryNameFilter+name)
    		.success(function(response) 
    			{
    				$scope.posts = response;
    			}
    		);
	};

	$scope.getCatChildren = function(id){
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.catEndPoint)
    		.success(function(response) 
    			{
    				var allCats = response;
    				for (i = 0; i < allCats.length; i++) {
    					if ( (0 < allCats[i].parent.length) && (id == allCats[i].parent.ID) ) {
    						$scope.categoryChildren.push(allCats[i]);
    					}
    				}
    			}
    		);
	}

});