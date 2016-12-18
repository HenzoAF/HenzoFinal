(function(){
  angular.module("app").controller('loginpageController', ['$scope', '$location', '$http', function($scope, $location, $http) {
    $scope.go = function(path) {
      console.log(path);
      $location.path(path);
    };

    $scope.admin = {};

    $scope.submitLoginForm = function(isValid) {
        if (isValid) {
            if (typeof(Storage) !== "undefined") {
                if ($scope.admin.name == "admin" && $scope.admin.password == "admin") {
                    //Checa se a entrada é válida e salva o status 1(logado) no storage local
                    console.log("teste");
                    localStorage.setItem("adminID", null);
                    localStorage.setItem("adminID", 1);
                    $location.path("/");
                    console.log("valido");
                }
                else {
                    alert("inválido");
                    console.log("inválido");
                }

                // Debug
                console.log(localStorage.getItem("adminID"));
                
              } else {
                alert("Seu navegador não suporta este website, desculpe.");
              }
  		}
    };
  }]);
})();
