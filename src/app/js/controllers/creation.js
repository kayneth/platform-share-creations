app.controller('CreationCtrl', function CreationCtrl($scope, $http){
   $scope.creations = {};

   $http.get('http://localhost/man/src/api/index.php/creation').success(function(data) {
      $scope.creations = data;
    });
});