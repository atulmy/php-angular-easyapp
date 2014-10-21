// Angular App Configurations

var easyApp = angular.module('EasyApp', [
    'ngRoute',
    'ngUpload',
    'EasyApp.controllers'
]);

easyApp.config(['$routeProvider', function($routeProvider){
    // routeProvider config, allows minification
    $routeProvider
        .when('/home', {
            controller: 'index',
            templateUrl: '/view/index.view.html'
        })
        .when('/readme', {
            controller: 'readme',
            templateUrl: '/view/readme.view.html'
        })
        .when('/sample/form', {
            controller: 'sampleForm',
            templateUrl: '/view/sample/form.view.html'
        })
        .when('/database/mysql', {
            controller: 'databaseMysql',
            templateUrl: '/view/database/mysql.view.html'
        })
        .when('/database/mongodb', {
            controller: 'databaseMongodb',
            templateUrl: '/view/database/mongodb.view.html'
        })
        .when('/download', {
            controller: 'download',
            templateUrl: '/view/download.view.html'
        })
        /* loading view dynamically
        .when('/sample/:page', {
            controller: 'sample',
            templateUrl: function(params){ return '/view/sample/'+params.page+'.view.html'; }
        })
        */
        .otherwise({
            redirectTo: '/home'
        });
    }
]);

easyApp.config(['$locationProvider', function($locationProvider) {
    $locationProvider.hashPrefix('!');
}]);