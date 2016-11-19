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
			controller: 'CreationsCtrl'
		})
		.when('/creation/:slug', {
			templateUrl: 'views/creation.html',
			controller: 'CreationCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	}
])
.run(function($rootScope) {
	$rootScope.api = "http://localhost/man/src/api/index.php/";
})
;