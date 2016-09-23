/**
 * Controls all 
 */
dropCatApp.controller('dropController', function ($scope, $location, $http, $interval) {

	//Site-wide URL pieces
	$scope.baseUrl = 'http://chronoto.pe';
	$scope.jsonEndPoint = '/wp-json/wp/v2';

	//Base Endpoints
	$scope.postsEndPoint = '/posts';
	$scope.catEndPoint = '/categories';

	//Endpoint filters
	$scope.categoryNameFilter = '/';

	//Endpoint Variable Storage
	$scope.query = '';
	$scope.catID = 28;
	$scope.mainCatID = 28;
	$scope.catSlug = '';
	$scope.catName = 'news';
	$scope.catReadableName = 'News';
	$scope.catParentName = '';
	$scope.catChildID = '';

	//Manipulatable Array Storage
	$scope.posts = '';
	$scope.categoryParents = [];
	$scope.categoryChildren = [];

	//Tick-ready storage
	// @todo this - https://docs.angularjs.org/api/ng/service/$interval
	$scope.catChildInPlay = '';

	$scope.currentCatName = function(){
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.catEndPoint+'/'+$scope.catID)
    		.success(function(response) 
    			{
    				
    				$scope.catReadableName = response.name;
    			}
    		);
	}

	$scope.renderChars = function(string){
		return he.decode(string);
	}

	// Get the feed from a category by name
	$scope.getCatFeedByID = function(id) {
		$scope.catID = id;
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.catEndPoint+'/'+id)
    		.success(function(response) 
    			{
    				console.log(response.slug);
    				$scope.catName = response.slug;
    				$scope.getCatFeed(response.slug);
    			}
    		);
	};

	// Get the feed from a category by name
	$scope.getCatFeed = function(name) {
		$scope.catName = name;
		$scope.currentCatName();
		console.log('get feed for '+name);
		$http.get($scope.baseUrl+$scope.jsonEndPoint+$scope.postsEndPoint+$scope.categoryNameFilter+name)
    		.success(function(response) 
    			{
    				$scope.posts = response;
    				for (i = 0; i < $scope.posts.length; i++) {
    					//console.log($scope.renderChars($scope.posts.title));
    					$scope.posts[i].title = $scope.renderChars($scope.posts[i].title);
    					$scope.posts[i].excerpt = $scope.posts[i].excerpt.substring(3,140);
    					$scope.posts[i].excerpt = $scope.renderChars($scope.posts[i].excerpt);
    				}

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
    				$scope.categoryChildren = [];
    				for (i = 0; i < allCats.length; i++) {
    					//console.log(allCats[i].ID);
    					if ( (null != allCats[i].parent) && (id == allCats[i].parent.ID) ) {
    						//console.log('child: '+allCats[i].ID);
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
    						//console.log(allCats[i].ID);
    						$scope.categoryParents.push(allCats[i]);
    					}
    				}
    			}
    		);	
	}

	$scope.timedCheck = function(){
		$scope.tickered = $interval(function() { $scope.getCatFeed($scope.catName) }, 6000 );
	}
	

});
