(function(){
  angular.module("app").controller('bookregisterController', ['$scope', '$location', '$http', function($scope, $location, $http) {

    $scope.isAdmin = function() {
      if (localStorage.getItem("adminID") == 1) {
        return true;
      }
      return false;
    }

    if ($scope.isAdmin()) {
     console.log("ok");
   }
   else {
     console.log("nao ok");
     alert("ACCESS DENIED");
     $location.path('/');
   }

    $scope.go = function(path) {
      $location.path(path);
    };
    $scope.signOut = function() {
      localStorage.setItem("adminID", 0);
      $location.path("/");
    }
    $scope.livro = {}
    $scope.submitBookForm = function(isValid) {
      if (isValid) {
        $http({method: 'POST', url: '/Henzo/backend/index.php/livro/insert', data: JSON.stringify($scope.livro)}).then(function successCallback(response) {
          console.log("Livro adicionado com sucesso");
          $location.path("/");
        }, function errorCallback(response) {
          alert('Erro no POST do livro');
        });
  		}
    };



  }]);
})();
