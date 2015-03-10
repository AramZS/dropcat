<!DOCTYPE html>
<html>
<?php require_once('functions.php'); ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8"/>
    <title>DropCat</title>
	<link rel="stylesheet" href="assets/stylesheets/app.css" />

	<meta name="description" content="How can I build a tool for others that will shrink the filter bubble to as small as it can get?"/>
	<link rel="canonical" href="http://chronoto.pe/dropcat/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Dropcat" />
	<meta property="og:description" content="A tool for building a smaller web." />
	<meta property="og:url" content="http://chronoto.pe/dropcat/" />
	<meta property="og:site_name" content="Dropcat" />
	<meta property="og:image" content="http://chronoto.pe/dropcat/assets/images/logo1.gif" />
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:description" content="Dropcat: a smaller web."/>
	<meta name="twitter:title" content="Dropcat: a smaller web."/>
	<meta name="twitter:site" content="@chronotope"/>
	<meta name="twitter:domain" content="Chronoto.pe"/>
	<meta name="twitter:creator" content="@chronotope"/>

	<script src="bower_components/modernizr/modernizr.js"></script>

</head>

<body ng-app="dropCat" ng-controller="feedsController" ng-init="getCatFeed('news');timedCheck();">
	<header class="row">
		<div class="large-10 columns">
			<div class="row">
				<div class="large-12 columns">
					<h1>DropCats</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<h3>A PressForward experiment</h3>
				</div>
			</div>
		</div>
		<div class="large-2 columns">
			<img src="assets/images/logo1.gif">
		</div>
	</header>
	<div class="row">
		<div class="large-12 columns">
			<h2>The latest in PressForward RSS Feeds</h2>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="large-10 large-offset-1 columns primary-app-space">
			<ul class="large-block-grid-3 medium-block-grid-2 small-block-grid-1 primary-app-grid">
			  <li ng-repeat="x in posts" class="dc-gridblock">
				  <div class="row item-row">
				    <div class="large-12 columns">
				    	<div class="row">
				    		<div class="large-12 columns block-title">
				    			<a href="{{ x.link }}" title="{{ x.title }}" class="item-title" target="_blank">{{ x.title }}</a>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="large-8 columns">
				    			<p>{{ x.excerpt }} ...</p>
				    		</div>
				    		<div class="large-4 columns">
				    			<img src="{{x.featured_image.attachment_meta.sizes.thumbnail.url}}" />
				    		</div>
				    	</div>
					</div>
				  </div>
			  </li>
			</ul>
		</div>
	</div>


<footer class="row">
	<div class="large-12 columns crafted-with">
		<div class="row">
			<?php 
				dropcat()->templates->the_view_for('crafted-with', array('h' => '4', 'by' => 'Crafted With:'));

				dropcat()->templates->the_view_for('crafted-with', array('h' => '6', 'by' => 'WordPress', 'url' => 'http://wordpress.org'));

				dropcat()->templates->the_view_for('crafted-with', array('h' => '6', 'by' => 'AngularJS', 'url' => 'http://angularjs.org'));

				dropcat()->templates->the_view_for('crafted-with', array('h' => '6', 'by' => 'WP-API', 'url' => 'http://wp-api.org'));
			?>
		</div>
		<div class="row">
			<?php 
				dropcat()->templates->the_view_for('crafted-with', array('h' => '6', 'by' => 'Foundation'));
			?>
		</div>
		<div class="row">
			<div class="large-12 columns crafted-with">
				<p>
					<a href="https://github.com/AramZS/dropcat" target="_blank">See the source code on GitHub</a>.
				</p>
			</div>
		</div>
	</div>



	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
	<script src="bower_components/underscore/underscore.js"></script>
	<script src="bower_components/he/he.js"></script>
	<script src="lib/angularjs-wp-api/angular-wp-api.js"></script>
	<script src="lib/ngResource/angular-resource.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/feedsController.js"></script>
	<script src="bower_components/jquery/dist/jquery.js"></script>
	<script src="bower_components/foundation/js/foundation.js"></script>
	<script src="assets/js/foundation.js"></script>
</footer>

</body>
</html>