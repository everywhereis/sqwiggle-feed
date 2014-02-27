'use strict';

angular.module('sqwiggle-feed.system').controller('IndexController', ['$scope', '$interval', '$timeout', '$location', '$http', 
	function ($scope, $interval, $timeout, $location, $http) {
    $scope.dots = '...';
    $scope.animateDots = function() {
        $http.get('resources/setup.php')
        .success(function() {
            $timeout(function() {
                $location.path('feed');
            }, 5000)
        })
        .error(function() {
            $timeout(function() {
                $location.path('install');
            }, 1000);
        });
	}
}]);