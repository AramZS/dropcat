function userController($scope) {
	$scope.fName = '';
	$scope.lName = '';
	$scope.passw1 = '';
	$scope.passw2 = '';
	$scope.users = [
		{id:1, fName:'Hege',  lName:"Pege" },
		{id:2, fName:'Kim',   lName:"Pim" },
		{id:3, fName:'Sal',   lName:"Smith" },
		{id:4, fName:'Jack',  lName:"Jones" },
		{id:5, fName:'John',  lName:"Doe" },
		{id:6, fName:'Peter', lName:"Pan" }
	];
	$scope.id = $scope.users.length+1;
	$scope.newid = $scope.id;
	$scope.edit = true;
	$scope.error = false;
	$scope.incomplete = false; 

	$scope.editUser = function(id) {
	  if (id == 'new') {
	    $scope.edit = true;
	    $scope.incomplete = true;
	    $scope.fName = '';
	    $scope.lName = '';
	    $scope.id = $scope.newid;
	   } else {
	    $scope.edit = false;
	    $scope.fName = $scope.users[id-1].fName;
	    $scope.lName = $scope.users[id-1].lName; 
	    $scope.id = $scope.users[id-1].id;
	  }
	};

	$scope.updateUser = function(id) {
		console.log(id);
		if (id > $scope.users.length){
			$scope.newid = id+1;
		}
		$scope.users.push({id:$scope.id, fName:$scope.fName, lName:$scope.lName});
	}

	$scope.$watch('passw1',function() {$scope.test();});
	$scope.$watch('passw2',function() {$scope.test();});
	$scope.$watch('fName', function() {$scope.test();});
	$scope.$watch('lName', function() {$scope.test();});

	$scope.test = function() {
	  if ($scope.passw1 !== $scope.passw2) {
	    $scope.error = true;
	    } else {
	    $scope.error = false;
	  }
	  $scope.incomplete = false;
	  if ($scope.edit && (!$scope.fName.length ||
	  !$scope.lName.length ||
	  !$scope.passw1.length || !$scope.passw2.length)) {
	       $scope.incomplete = true;
	  }
	};

	$scope.myVar = false;
    $scope.toggle = function() {
        $scope.myVar = !$scope.myVar;
    };

}

var app = angular.module('tutorialWebApp', [
	'ngRoute'
]);

app.config(['$routeProvider', function ($routeProvider) {
	$routeProvider.when("/about", {templateUrl: "play-about-part.html", controller: "PageCtrl"})
	.when("/", {templateUrl: "play-home-part.html", controller: "PageCtrl"});
}]);

app.controller('BlogCtrl', function (/* $scope, $location, $http */) {
  console.log("Blog Controller reporting for duty.");
});

app.controller('userController', userController());

/**
 * Controls all other Pages
 */
app.controller('PageCtrl', function (/* $scope, $location, $http */) {
  console.log("Page Controller reporting for duty.");

  // Activates the Carousel
  $('.carousel').carousel({
    interval: 5000
  });

  // Activates Tooltips for Social Links
  $('.tooltip-social').tooltip({
    selector: "a[data-toggle=tooltip]"
  })
});