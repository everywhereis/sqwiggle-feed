<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
		<title>Sqwiggle Feed</title>
		<link rel="stylesheet" href="public/lib/pure/pure-min.css">
	    <!--[if lte IE 8]>
	        <link rel="stylesheet" href="public/css/side-menu-old-ie.css">
	    <![endif]-->
	    <!--[if gt IE 8]><!-->
	        <link rel="stylesheet" href="public/css/side-menu.css">
	    <!--<![endif]-->
	    <link rel="stylesheet" href="public/css/common.css" />
	</head>
	<body>	
		<div ng-view></div>
		<!-- Jquery -->
		<script type='text/javascript' src='public/lib/jquery/dist/jquery.min.js'></script>

		<!-- AngularJS -->
		<script type="text/javascript" src="public/lib/angular/angular.js"></script>
		<script type="text/javascript" src="public/lib/angular-sanitize/angular-sanitize.js"></script>
		<script type="text/javascript" src="public/lib/angular-resource/angular-resource.js"></script>
		<script type="text/javascript" src="public/lib/angular-route/angular-route.js"></script>

		<!-- Angular Moment -->
		<script src="public/lib/moment/moment.js"></script>
		<script src="public/lib/angular-moment/angular-moment.js"></script>
		
		<!-- NgInfinite -->
		<script type='text/javascript' src='public/lib/ngInfiniteScroll/ng-infinite-scroll.js'></script>
		
		<!-- Application init -->
		<script type="text/javascript" src="public/js/app.js"></script>
		<script type="text/javascript" src="public/js/config.js"></script>
		<script type="text/javascript" src="public/js/filters.js"></script>

		<!-- Application Services -->
		<script type="text/javascript" src="public/lib/angular-fibonacci/angular-fibonacci.js"></script>

		<!-- Application Filters -->
		<script type="text/javascript" src="public/js/filters.js"></script>

		<!-- Application Controllers -->
		<script type="text/javascript" src="public/js/controllers/index.js"></script>
		<script type="text/javascript" src="public/js/controllers/feed.js"></script>
		<script type="text/javascript" src="public/js/controllers/install.js"></script>
		<script type="text/javascript" src="public/js/init.js"></script>
		<?php
			$whitelist = array('127.0.0.1', '::1');
			if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)): ?>
			   <script type="text/javascript" src="http://localhost:35729/livereload.js"></script>
		<?php endif ?>
	</body>
</html>
