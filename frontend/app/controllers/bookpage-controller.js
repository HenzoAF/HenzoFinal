(function(){
  angular.module("app").controller('bookpageController', ['$scope', '$location', '$http', '$routeParams', '$rootScope', function($scope, $location, $http, $routeParams, $rootScope) {

      var currentID = $routeParams.id;
      $scope.book = {};

      $http({
        method: 'GET',
        url: '/Henzo/backend/index.php/livro/'+currentID
      }).then(function successCallback(response) {
          $scope.livro = response.data;
        }, function errorCallback(response) {
          alert('Erro no GET do livro individual');
        });

      $scope.isAdmin = function() {
        if (localStorage.getItem("adminID") == 1) {
          return true;
        }
        return false;
      }

      $scope.signOut = function() {
        localStorage.setItem("adminID", 0);
        $location.path("/");
      }

      // Go
      $scope.go = function(path) {
        console.log(path);
        $location.path(path);
      };


  }]);
})();
