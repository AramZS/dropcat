<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="stylesheets/app.css" />
	<script src="bower_components/modernizr/modernizr.js"></script>
</head>

<body ng-app="dropCat" ng-controller="dropController">

  <label class="control-label">Category Slug:</label>
  <div class="">
    <input type="text" ng-model="catName">
  </div>
  <button class="btn btn-success" ng-disabled="error || incomplete" ng-click="getCatFeed(catName)">
  	<span class="glyphicon glyphicon-save"></span> Save Changes
  </button>

<ul>
  <li ng-repeat="x in posts">
    {{ x.title + ', ' + x.ID }}
  </li>
</ul>


<footer>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
	<script src="bower_components/jquery/dist/jquery.js"></script>
	<script src="bower_components/foundation/js/foundation.js"></script>
	<script src="lib/angularjs-wp-api/angular-wp-api.js"></script>
	<script src="lib/ngResource/angular-resource.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/dropController.js"></script>
</footer>

</body>
</html>