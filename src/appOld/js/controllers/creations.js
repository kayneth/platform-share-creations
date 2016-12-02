app.controller('CreationsCtrl', function CreationsCtrl($scope, $http, $rootScope){
    $scope.creations = {};

    $http.get($rootScope.api+'creation').success(function(data) {
        $scope.creations = data;
    });
});