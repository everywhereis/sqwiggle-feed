'use strict';

//Setting up route
angular.module('sqwiggle-feed').config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
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