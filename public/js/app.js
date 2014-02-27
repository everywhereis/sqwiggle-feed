'use strict';

angular.module('sqwiggle-feed', 
	['ngResource', 
	'ngRoute',
	'ngSanitize',
	'angularMoment',
	'infinite-scroll',
	'sqwiggle-feed.users',
	'sqwiggle-feed.system',
	'sqwiggle-feed.filters',
	'angular-fibonacci',
	]);

angular.module('sqwiggle-feed.users', []);
angular.module('sqwiggle-feed.system', []);
angular.module('sqwiggle-feed.filters', []);
angular.module('angular-fibonacci', []);
