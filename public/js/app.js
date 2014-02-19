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
	'sqwiggle-feed.fibonacci',
	]);

angular.module('sqwiggle-feed.users', []);
angular.module('sqwiggle-feed.system', []);
angular.module('sqwiggle-feed.filters', []);
angular.module('sqwiggle-feed.fibonacci', []);
