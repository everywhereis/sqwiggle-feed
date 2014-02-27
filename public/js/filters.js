'user strict'

// filter for use in TRUSTED html sources only
angular.module('sqwiggle-feed.filters').filter('unsafe', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	}
});

angular.module('sqwiggle-feed.filters').filter('humanize', function() {
  return function(time) {
    return moment.duration(time, "seconds").humanize();
  }
});