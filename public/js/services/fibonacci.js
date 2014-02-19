'use strict';

angular.module('sqwiggle-feed.fibonacci').factory('Fibonacci', ['$timeout', function($timeout) {
	return  {
		isPolling: false,
		series: [],
		index: 0,
		next: 1,
		max: 5,
		initialize: function(options) {
			this.series = [1, 1];
			this.index = 0;
			this.next = 1;

			for(var prop in options) {
				this[prop] = options[prop];
			}
		},
		start: function (options) {
			this.initialize(options);
			this.tick(this.next);
			this.isPolling = true;
		},
		stop: function() {
			if(this.timeout) {
				var timeout = this.timeout;
				$timeout.cancel(timeout);
			}
			this.isPolling = false;
		},
		tick: function(seconds) {
			var self = this;
			self.timeout = $timeout(function(){
				self.next = self.series[self.index] + self.series[self.index + 1];
				self.series.push(self.next);
				if(self.callback && typeof(self.callback) == "function") {
					self.callback();
				}
				self.index ++;
				if(self.series.length > self.max) {
					self.restart();
				} else {
					self.tick(self.next);
				}
			}, seconds * 1000);
		},
		restart: function() {
			var self = this;
			self.stop();
			self.start();
		}
	}
}]);