  'use strict';

angular.module('sqwiggle-feed.system').controller('FeedController', ['$scope', function ($scope) {
  
	
	$scope.menuactive = false;
	$scope.togglemenu = function(){
		$scope.menuactive = !$scope.menuactive;
	}

  
}]);
  
  
  
  
  

