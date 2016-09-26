angular.
  module('man').
  config(['$locationProvider', '$routeProvider',
    function config($locationProvider, $routeProvider) {

		$routeProvider
		.when('/', {
			templateUrl: 'views/main.html',
			controller: 'MainCtrl'
		})
		.when('/creations', {
			templateUrl: 'views/creations.html',
			controller: 'CreationCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	}
]);