  'use strict';

angular.module('sqwiggle-feed.system').controller('FeedController', ['$scope', '$http', function ($scope, $http) {
	$scope.messages = [];
	$scope.users = [];
	$scope.menuactive = false;
	$scope.togglemenu = function(){
		$scope.menuactive = !$scope.menuactive;
	}
	$scope.getMessages = function() {
		$http.get('http://www.everywhere.is/making/sqwiggle/resources/api.php', {
    		params: {
    			endpoint: 'messages'
    		}
    	}).success(function(e) {
    		console.log(e);
    		$scope.messages = e;
    	});
	}
	$scope.getUsers = function() {
		$http.get('http://www.everywhere.is/making/sqwiggle/resources/api.php', {
    		params: {
    			endpoint: 'users'
    		}
    	}).success(function(e) {
    		console.log(e);
    		$scope.users = e;
    	});
	}
	$scope.loadMore = function(){
	alert("loading more");
	}
}]);