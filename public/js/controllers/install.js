'use strict';

angular.module('sqwiggle-feed.system').controller('InstallController', ['$scope', '$http', '$location',
	function ($scope, $http, $location) {
    	$scope.saveConfig = function() {

    		var payload = {
				endpoint: 'settings',
				data: $scope.settings
			};

    		$http({
		        method  : 'POST',
		        url     : 'resources/setup.php',
		        data    : $.param(payload),  
		        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
		    }).success(function(e) {
		    	$location.path('index');
	        }).error(function(e) {
	        	$scope.error = e;
	        });
    	}
}]);