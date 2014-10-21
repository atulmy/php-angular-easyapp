// App Controllers
// Define your controllers here or you can create new file for each controller (recommended)

var easyAppControllers = angular.module('EasyApp.controllers', [])

// Index Controller
easyAppControllers.controller('index', function($scope) {
    $scope.index_data = {};
    $scope.index_data.easy_app_components = [{
          "name": "PHP",
          "description": "for backend, follows MVC pattern",
          "url": "http:\/\/php.net\/"
        },{
          "name": "MySQL",
          "description": "for database with SQL",
          "url": "http:\/\/www.mysql.com\/"
        },{
          "name": "MongoDB",
          "description": "for database with NoSQL",
          "url": "http:\/\/www.mongodb.org\/"
        },{
          "name": "Skeleton CSS",
          "description": "for basic responsive, mobile friendly grid layout",
          "url": "http:\/\/www.getskeleton.com\/"
        },{
          "name": "Angular JS",
          "description": "for frontend, follows MVC patten",
          "url": "http:\/\/www.getskeleton.com\/"
        },{
          "name": "JQuery",
          "description": "for frontend advance DOM manipulation",
          "url": "http:\/\/jquery.com\/"
    }];
});


// Sample Form Controller
easyAppControllers.controller('sampleForm', function($scope, $http) {
    
    // Form AJAX
    $scope.formAjax = {};
    $scope.formAjax.data = {};
    
    // Default values
    $scope.formAjax.data.textField = "";
    $scope.formAjax.data.selectField = 0;
    $scope.formAjax.data.checkboxField = 0;
    $scope.formAjax.data.radioField = "one";
    
    $scope.formAjax.response = {};
    $scope.formAjax.response.showFlag = false;
    
    $scope.formAjax.submitForm = function(item, event) {
        var responsePromise = $http({
            method: "POST",
            url: "/app_api.php",
            params: {action: "form_ajax"},
            data: $scope.formAjax.data
        });
        responsePromise.success(function(response, status, headers, config) {
            $scope.formAjax.response.string = JSON.stringify(response);
            $scope.formAjax.response.showFlag = true;
            console.log(response);
        });
        responsePromise.error(function(data, status, headers, config) {
            alert("Submitting form failed!");
            $scope.formAjax.response.showFlag = false;
        });
    };
    
    // Form File
    $scope.formFileResponseShowFlag = false;
    $scope.formFileStartUploading = function() {
        console.log("Uploading...");
    };
    $scope.formFileUploadComplete = function(content) {
        console.log("Upload Complete!");
        $scope.formFileResponse = JSON.stringify(content);
        $scope.formFileResponseShowFlag = true;
        console.log(content);
        $('#formFile')[0].reset();
    };
});


// Databse MySQL controller
easyAppControllers.controller("databaseMysql", function($scope, $http) {
    
    // Select
    $scope.waitSelectFlag = true;
    $scope.waitSelectMessage = "Please wait...";
    $scope.customers = {};
    $scope.customers.list = {};
    
    $scope.customers.get = function() {
        var responsePromise = $http({
            method: "GET",
            url: "/app_api.php",
            params: {action: "mysql_select"}
        });
        responsePromise.success(function(response, status, headers, config) {
            if(response.customers.success === true) {
                $scope.waitSelectFlag = false;
                $scope.customers.list = response.customers.data;
            } else {
                $scope.waitSelectFlag = true;
                $scope.waitSelectMessage = response.customers.message;
            }
            console.log(response);
        });
        responsePromise.error(function(data, status, headers, config) {
            $scope.waitSelectFlag = true;
            $scope.waitSelectMessage = "There was some error getting customers.";
        });
    };
    $scope.customers.get();
    
    // Insert
    $scope.waitInsertFlag = false;
    $scope.customers.data = {};
    $scope.customers.data.name = "";
    $scope.customers.data.email = "";
    $scope.customers.insert = function() {
        $scope.waitInsertFlag = true;
        $scope.waitInsertMessage = "Please wait...";
        var responsePromise = $http({
            method: "POST",
            url: "/app_api.php",
            params: {action: "mysql_insert"},
            data: $scope.customers.data
        });
        responsePromise.success(function(response, status, headers, config) {
            console.log(response);
            if(response.customers.success === true) {
                $scope.customers.get();
                $('#formCustomer')[0].reset();
                $scope.customers.data = {};
            }
            $scope.waitInsertMessage = response.customers.message;
        });
        responsePromise.error(function(response, status, headers, config) {
            $scope.waitSelectFlag = true;
            $scope.waitInsertMessage = "There was some error saving Customer.";
        });
    };
});


// Database MongoDB controller
easyAppControllers.controller("databaseMongodb", function($scope, $http) {
    
    // Select
    $scope.waitSelectFlag = true;
    $scope.waitSelectMessage = "Please wait...";
    $scope.customers = {};
    $scope.customers.list = {};
    
    $scope.customers.get = function() {
        var responsePromise = $http({
            method: "GET",
            url: "/app_api.php",
            params: {action: "mongo_select"}
        });
        responsePromise.success(function(response, status, headers, config) {
            if(response.customers.success === true) {
                $scope.waitSelectFlag = false;
                $scope.customers.list = response.customers.data;
            } else {
                $scope.waitSelectFlag = true;
                $scope.waitSelectMessage = response.customers.message;
            }
            console.log(response);
        });
        responsePromise.error(function(data, status, headers, config) {
            $scope.waitSelectFlag = true;
            $scope.waitSelectMessage = "There was some error getting customers.";
        });
    };
    $scope.customers.get();
    
    // Insert
    $scope.waitInsertFlag = false;
    $scope.customers.data = {};
    $scope.customers.data.name = "";
    $scope.customers.data.email = "";
    $scope.customers.insert = function() {
        $scope.waitInsertFlag = true;
        $scope.waitInsertMessage = "Please wait...";
        var responsePromise = $http({
            method: "POST",
            url: "/app_api.php",
            params: {action: "mongo_insert"},
            data: $scope.customers.data
        });
        responsePromise.success(function(response, status, headers, config) {
            console.log(response);
            if(response.customers.success === true) {
                $scope.customers.get();
                $('#formCustomer')[0].reset();
                $scope.customers.data = {};
            }
            $scope.waitInsertMessage = response.customers.message;
        });
        responsePromise.error(function(response, status, headers, config) {
            $scope.waitSelectFlag = true;
            $scope.waitInsertMessage = "There was some error saving Customer.";
        });
    };
});


// Readme controller
easyAppControllers.controller("readme", function($scope) {
    
});

// Download controller
easyAppControllers.controller("download", function($scope) {
    
});