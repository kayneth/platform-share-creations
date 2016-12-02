app.controller('CreationCtrl', function CreationCtrl($scope, $http, $rootScope, $routeParams){
    $scope.creation = {};
    $scope.params = $routeParams;

   $http.get($rootScope.api+'creation/'+$scope.params.slug).success(function(data) {
      $scope.creation = data;
    });
});