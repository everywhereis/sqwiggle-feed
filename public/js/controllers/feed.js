  'use strict';

angular.module('sqwiggle-feed.system').controller('FeedController', ['$scope', '$http', function ($scope, $http) {
	$scope.messages = [];
	$scope.menuactive = false;
	$scope.togglemenu = function(){
		$scope.menuactive = !$scope.menuactive;
	}
	$scope.getMessages = function() {
		$http.get('/resources/api.php', {
    		params: {
    			endpoint: 'messages'
    		}
    	}).success(function(e) {
    		console.log(e);
    		$scope.messages = e;
    	});
	}
}]); 
  
  
  
  
  

