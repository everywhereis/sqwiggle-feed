'user strict'

// filter for use in TRUSTED html sources only
angular.module('sqwiggle-feed.filters').filter('unsafe', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	}
});

angular.module('sqwiggle-feed.filters').filter('orderObjectBy', function() {
  return function(items, field, reverse) {
    var filtered = [];
    angular.forEach(items, function(item) {
      filtered.push(item);
    });
    filtered.sort(function (a, b) {
      return (a[field] > b[field]);
    });
    if(reverse) filtered.reverse();
    return filtered;
  };
});

angular.module('sqwiggle-feed.filters').filter('humanize', function() {
  return function(time) {
    return moment.duration(time, "seconds").humanize();
  }
});