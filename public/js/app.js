'use strict';

angular.module('sqwiggle-feed', 
	['ngResource', 
	'ngRoute',
	'ngSanitize',
	'sqwiggle-feed.users',
	'sqwiggle-feed.system',
	'sqwiggle-feed.filters']);

angular.module('sqwiggle-feed.users', []);
angular.module('sqwiggle-feed.system', []);
angular.module('sqwiggle-feed.filters', []);
