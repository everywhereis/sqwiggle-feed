'use strict';

angular.module('sqwiggle-feed.system').controller('IndexController', ['$scope', '$interval', function ($scope, $interval) {
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
    }
}]);