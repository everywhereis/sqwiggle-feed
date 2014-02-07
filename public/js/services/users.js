'use strict';
// User service used for user REST endpoint
angular.module('sqwiggle-feed.users').factory('Users', ['$resource', function($resource) {
	return $resource('users/:userId', {
		userId: '@_id'
	}, {
		update: {
			method: 'PUT'
		},
		pets: {
			method: 'GET',
			url: '/users/:userId/pets',
			isArray: true,
		}
	});
}]);