(function(){
angular.module("app").config(['$routeProvider', function($routeProvider){
  $routeProvider
    .when('/', {
        templateUrl: 'app/templates/homepage/index.html',
        controller: 'homepageController',
        controllerAs: 'homepgCtrl'
    })
    .when('/login', {
        templateUrl: 'app/templates/login/index.html',
        controller: 'loginpageController',
        controllerAs: 'loginpgCtrl'
    })
    .when('/livro/:id', {
      templateUrl: 'app/templates/livro/index.html',
      controller: 'bookpageController',
      controllerAs: 'bookpgCtrl'
    })
    .when('/cadastro', {
      templateUrl: 'app/templates/cadastro/index.html',
      controller: 'bookregisterController',
      controllerAs: 'bookrgCtrl'
    })
  .otherwise({redirectTo: '/'});
}]);
})();
