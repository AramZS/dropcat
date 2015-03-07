<!DOCTYPE html>
<html>
<?php require_once('functions.php'); ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8"/>
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
	<div class="row">
		<div class="large-6 medium-6 small-12 columns">
			<label>Main Category Operator is: {{catID}}</label>
			<select ng-model="catID" ng-init="" ng-options="category.ID as category.name for category in categoryParents" ng-change="getCatChildren(catID)">
			</select>
		</div>

		<div class="large-6 medium-6 small-12 columns">
			<label>Child Category</label>
			<select ng-switch on="catID" ng-model="catChildID" ng-options="ccategory.ID as ccategory.name for ccategory in categoryChildren" ng-change="getCatFeedByID(catChildID)">
			</select>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<h2>The latest in </h2>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="large-10 large-offset-1 columns primary-app-space">
			<ul class="large-block-grid-3 medium-block-grid-2 small-block-grid-1">
			  <li ng-repeat="x in posts" class="dc-gridblock">
			    <a href="{{ x.link }}" title="{{ x.title }}" class="item-title">{{ x.title }}</a>
			    <img src="{{x.featured_image.attachment_meta.sizes.thumbnail.url}}" />
			    <p>{{ x.excerpt }} ...</p>
			  </li>
			</ul>
		</div>
	</div>


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
	<script src="bower_components/underscore/underscore.js"></script>
	<script src="bower_components/he/he.js"></script>
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