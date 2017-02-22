var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {

    $routeProvider
        .when("/", {
            templateUrl: "html/articles.html",
            controller: 'cmsController'
        });
});

app.controller('cmsController', ['$http', '$scope', function ($http, $scope) {
    getTasks();


    function getTasks() {
        $http({
            method: 'GET',
            url: 'php/getTasks.php'
        }).then(function successCallback(response) {
            $scope.data = response.data;
        }, function errorCallback(response) {
            console.log("Pobranie artykłów z bazy nie powiodło się.");
        });
    }
}])