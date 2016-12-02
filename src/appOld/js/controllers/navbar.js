app.controller('NavbarCtrl', function NavbarCtrl($scope, $http, $rootScope, $mdDialog, $timeout){

    $scope.creation = {};
    $scope.categories = null;

    $scope.showAddCrea = function($event){
        $mdDialog.show({
            clickOutsideToClose: true,
            scope: $scope,
            preserveScope: true,
            templateUrl: 'views/addcreation.html',
            controller: function DialogController($scope, $mdDialog) {
                $scope.closeDialog = function() {
                    $mdDialog.hide();
                }
            }
        });
    };

    $scope.addCreation = function() {
        $http.post($rootScope.api + 'creation', $scope.creation).success(function (data) {
            $scope.creation = data;
            console.log($scope.creation);
        });
    };

    $scope.loadCategories = function () {
        $http.get($rootScope.api + 'category').success(function (data) {
            $scope.categories = data;
        });
        console.log($scope.creation);
    }
});