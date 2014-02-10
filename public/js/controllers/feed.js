  'use strict';

angular.module('sqwiggle-feed.system').controller('FeedController', ['$scope', '$http', function ($scope, $http) {
	$scope.messages = [];
	$scope.users = [];
	$scope.menuactive = false;
	$scope.page = 0;
	$scope.limit = 15;
	$scope.togglemenu = function(){
		$scope.menuactive = !$scope.menuactive;
	}
	$scope.getMessages = function() {
		$http.get('http://www.everywhere.is/making/sqwiggle/resources/api.php', {
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
		$http.get('http://www.everywhere.is/making/sqwiggle/resources/api.php', {
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
}]);