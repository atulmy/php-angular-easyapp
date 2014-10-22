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
            templateUrl: '/view/index.view.php'
        })
        .when('/readme', {
            controller: 'readme',
            templateUrl: '/view/readme.view.php'
        })
        .when('/sample/form', {
            controller: 'sampleForm',
            templateUrl: '/view/sample/form.view.php'
        })
        .when('/database/mysql', {
            controller: 'databaseMysql',
            templateUrl: '/view/database/mysql.view.php'
        })
        .when('/database/mongodb', {
            controller: 'databaseMongodb',
            templateUrl: '/view/database/mongodb.view.php'
        })
        .when('/download', {
            controller: 'download',
            templateUrl: '/view/download.view.php'
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