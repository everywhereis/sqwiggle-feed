'use strict';

angular.module('sqwiggle-feed.system').controller('IndexController', ['$scope', '$interval', '$timeout', '$location', '$http', 
	function ($scope, $interval, $timeout, $location, $http) {
    $scope.dots = '...';
    $scope.animateDots = function() {
    	var dots = $scope.dots;
    	$interval(function() {
    		if(dots.length == 3) {
    			dots = '.';
    		} else {
    			dots += '.';
    		}
    		$scope.dots = dots;
    	}, 500);

    	$timeout(function() {
    		$location.path('feed');
    	}, 2000)
	}
}]);