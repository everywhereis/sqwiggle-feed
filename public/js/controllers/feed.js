  'use strict';

angular.module('sqwiggle-feed.system').controller('FeedController', ['$scope', '$http', function ($scope, $http) {
	$scope.messages = [];
	$scope.users = [];
	$scope.menuactive = false;
	$scope.page = 1;
	$scope.limit = 15;
	$scope.togglemenu = function(){
		$scope.menuactive = !$scope.menuactive;
	}
	$scope.getMessages = function() {
		$http.get('/resources/api.php', {
    		params: {
    			endpoint: 'messages',
    			page: $scope.page,
    			limit: $scope.limit
    		}, 
    	}).success(function(e) {
    		for(var i in e) {
    			var message = e[i];
    			$scope.messages.push(message);
    		}
    	});
	}
	$scope.getUsers = function() {
		$http.get('resources/api.php', {
    		params: {
    			endpoint: 'users'
    		}
			
    	}).success(function(e) {
    		$scope.users = e;
    	});
	}
	$scope.loadMore = function(){
		$scope.page ++;
		$scope.getMessages();
	}

	$scope.postMessage = function() {
		var payload = {
			endpoint: 'messages',
			data: $scope.formData
		};
		
		$http({
	        method  : 'POST',
	        url     : 'resources/api.php',
	        data    : $.param(payload),  
	        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
	    }).success(function(e) {
	    	$scope.messages.unshift(e);
        });
	};
}]);