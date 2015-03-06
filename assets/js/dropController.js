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
	$scope.catID = 28;
	$scope.catSlug = '';
	$scope.catName = 'news';
	$scope.catParentName = '';
	$scope.catChildID = '';

	//Manipulatable Array Storage
	$scope.posts = '';
	$scope.categoryParents = [];
	$scope.categoryChildren = [];

	//Tick-ready storage
	// @todo this - https://docs.angularjs.org/api/ng/service/$interval
	$scope.catChildInPlay = '';

	// Get the feed from a category by name
	$scope.getCatFeedByID = function(id) {
		
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.catEndPoint+'/'+id)
    		.success(function(response) 
    			{
    				console.log(response.slug);
    				$scope.catSlug = response.slug;
    				$scope.getCatFeed(response.slug);
    			}
    		);
	};

	// Get the feed from a category by name
	$scope.getCatFeed = function(name) {

		console.log('get feed for '+name);
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.postsEndPoint+$scope.categoryNameFilter+name)
    		.success(function(response) 
    			{
    				$scope.posts = response;
    			}
    		);
	};

	$scope.getCatChildren = function(id){
		console.log('evaluate children of '+id);
		$scope.getCatFeedByID(id);
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.catEndPoint)
    		.success(function(response) 
    			{
    				var allCats = response;
    				for (i = 0; i < allCats.length; i++) {
    					//console.log(allCats[i].ID);
    					if ( (null != allCats[i].parent) && (id == allCats[i].parent.ID) ) {
    						console.log('child: '+allCats[i].ID);
    						$scope.categoryChildren.push(allCats[i]);
    					}
    				}
    			}
    		);
	}

	$scope.getCategoryParents = function(){
		//console.log('Get parent cats.');
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.catEndPoint)
    		.success(function(response) 
    			{
    				var allCats = response;
    				for (i = 0; i < allCats.length; i++) {
    					//console.log(allCats[i].parent);
    					if ( allCats[i].parent == null ) {
    						//console.log('was null');
    						console.log(allCats[i].ID);
    						$scope.categoryParents.push(allCats[i]);
    					}
    				}
    			}
    		);	
	}

});