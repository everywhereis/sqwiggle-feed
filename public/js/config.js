'use strict';

//Setting up route
angular.module('sqwiggle-feed').config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
		when('/feed', {
            templateUrl: 'public/views/feed.html'
        }).
       	when('/', {
            templateUrl: 'public/views/index.html'
        }).
        otherwise({
            redirectTo: '/'
        });
    }
]);

//Setting HTML5 Location Mode
angular.module('sqwiggle-feed').config(['$locationProvider',
    function($locationProvider) {
        $locationProvider.hashPrefix('!');
    }
]);