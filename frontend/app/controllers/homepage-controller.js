(function(){
  angular.module("app").controller('homepageController', ['$scope', '$location', '$http', function($scope, $location, $http) {

    $scope.livros = [];
    $scope.livro = {};

    // $scope.genreArray = [];
    // $scope.publisherArray = [];

    //Define variaveis gerais

    $http({
     method: 'GET',
     url: '/Henzo/backend/index.php/livros'
   }).then(function successCallback(response) {
     $scope.livros = response.data;
     console.log(JSON.stringify(response.data));
     }, function errorCallback(response) {
       console.log(response);
       // called asynchronously if an error occurs
       // or server returns response with an error status.
     });

  //     $http({
  //    method: 'GET',
  //    url: '/Henzo/backend/index.php/generos'
  //  }).then(function successCallback(response) {
  //    $scope.genreArray = response.data;
  //    }, function errorCallback(response) {
  //      // called asynchronously if an error occurs
  //      // or server returns response with an error status.
  //    });
   //
  //     $http({
  //    method: 'GET',
  //    url: '/Henzo/backend/index.php/editoras'
  //  }).then(function successCallback(response) {
  //    $scope.publisherArray = response.data;
  //    }, function errorCallback(response) {
  //      // called asynchronously if an error occurs
  //      // or server returns response with an error status.
  //    });

      $scope.go = function(path) {
        console.log(path);
        $location.path(path);
      };

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

  }]);
})();
