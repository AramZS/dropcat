<!DOCTYPE html>
<html>
<?php require_once('functions.php'); ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DropCat</title>
	<link rel="stylesheet" href="assets/stylesheets/app.css" />
	<script src="bower_components/modernizr/modernizr.js"></script>

</head>

<body ng-app="dropCat" ng-controller="dropController" ng-init="getCatFeed('news');getCategoryParents();">
	<header class="row">
		<div class="large-10 columns">
			<div class="row">
				<div class="large-12 columns">
					<h1>DropCats</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<h3>An AramZS "Myopic Web" Project</h3>
				</div>
			</div>
		</div>
		<div class="large-2 columns">
			<img src="assets/images/logo1.gif">
		</div>
	</header>

<ul>
  <li ng-repeat="x in categoryParents">
    {{ x.name + ', ' + x.ID }}
  </li>
</ul>


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


<footer class="row">
	<div class="large-12 columns crafted-with">
		<div class="row">
			<?php 
				dropcat()->templates->the_view_for('crafted-with', array('by' => 'Crafted With:'));

				dropcat()->templates->the_view_for('crafted-with', array('by' => 'WordPress'));

				dropcat()->templates->the_view_for('crafted-with', array('by' => 'AngularJS'));

				dropcat()->templates->the_view_for('crafted-with', array('by' => 'WP-API'));
			?>
		</div>
		<div class="row">
			<?php 
				dropcat()->templates->the_view_for('crafted-with', array('by' => 'Foundation'));
			?>
		</div>




	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
	<script src="lib/angularjs-wp-api/angular-wp-api.js"></script>
	<script src="lib/ngResource/angular-resource.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/dropController.js"></script>
	<script src="bower_components/jquery/dist/jquery.js"></script>
	<script src="bower_components/foundation/js/foundation.js"></script>
	<script src="assets/js/foundation.js"></script>
</footer>

</body>
</html>