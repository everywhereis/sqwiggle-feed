'user strict'

// filter for use in TRUSTED html sources only
angular.module('sqwiggle-feed.filters').filter('unsafe', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	}
});