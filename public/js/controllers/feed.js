  'use strict';

angular.module('sqwiggle-feed.system').controller('FeedController', 
	['$scope', '$http', '$location', '$timeout', 'Fibonacci',
	function ($scope, $http, $location, $timeout, Fibonacci) {
	
	$scope.messages = [];
	$scope.users = [];
	$scope.menuactive = false;
	$scope.page = 1;
	$scope.limit = 25;
	$scope.room = {
		name: 'loading...'
	};
	$scope.isPolling = false;

	$scope.togglemenu = function(){
		$scope.menuactive = !$scope.menuactive;
	}

	$scope.getRooms = function() {
		$http.get('resources/api.php', {
    		params: {
    			endpoint: 'rooms',
    		}, 
    	}).success(function(rooms) {
    		if(Object.prototype.toString.call(rooms) === '[object Array]') {
    			$scope.room = rooms.length > 0 ? rooms.pop() : null;
    		}
    	}).error(function(e){
    		console.log('could not fetch rooms...');
    	});
	}

	$scope.getMessages = function(replace) {
		var page = $scope.page;
		var limit = $scope.limit;

		// if we replace the data, make sure we request correct update
		if(replace) {
			limit = limit * page;
			page = 1;
		}

		$http.get('resources/api.php', {
    		params: {
    			endpoint: 'messages',
    			page: page,
    			limit: limit
    		}
    	}).success(function(e) {
    		if(replace) {

    			if(Object.prototype.toString.call(e) === '[object Array]' && e.length > 0) {
    				// get first message
    				var firstFetchedMessage = e[0];
    				var firstCurrentMessage = $scope.messages.length > 0 ? $scope.messages[0] : null;
    				if(firstFetchedMessage !== null && firstCurrentMessage !== null) {
    					if(firstFetchedMessage.id > firstCurrentMessage.id) {
    						Fibonacci.restart();
    					}
    				}
    			}
    			$scope.messages = e;
    		} else {
    			for(var i in e) {
	    			var message = e[i];
	    			// check if the messages variable is an array
	    			if(Object.prototype.toString.call($scope.messages) === '[object Array]') {
	    				$scope.messages.push(message);
	    			}
	    		}
    		}
    		if(!Fibonacci.isPolling) {
    			Fibonacci.start({
					max: 10,
					callback: function() {
						$scope.getMessages(true);
						$scope.getUsers();
					}
				});
    		}
    	}).error(function(e){
    		$location.path('install');
    	});
	}

	$scope.getUsers = function() {
		$http.get('resources/api.php', {
    		params: {
    			endpoint: 'users'
    		}
    	}).success(function(e) {
    		$scope.users = e;
    	}).error(function(e){
    		$location.path('install');
    	});
	}

	$scope.loadMore = function(){
		$scope.page ++;
		$scope.getMessages();
	}

	$scope.postMessage = function() {
		if($scope.formData === null || $scope.formData == "") {
			return;
		}

		var payload = {
			endpoint: 'messages',
			data: $scope.formData
		};

		$scope.formData = '';
		$http({
	        method  : 'POST',
	        url     : 'resources/api.php',
	        data    : $.param(payload),  
	        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
	    }).success(function(e) {
	    	$scope.messages.unshift(e);
	    	Fibonacci.restart();
        }).error(function(e) {
        	alert('There was an error posting your message');
        })
	};
}]);