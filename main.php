<?php session_start(); header("Content-type: application/javascript") ?>

var app = angular.module('projectsavant', [
	'ngResource'
]);

app.factory("Portfolio", function ($resource) {
	return $resource('api.php/projects')
});

app.controller('ProjectDetailController', function ($scope, ProjectService) {
	$scope.portfolio = ProjectService 
});


app.controller('ProjectListController', function ($scope, ProjectService) {

	$scope.search = "";
	$scope.order = "id";
	$scope.portfolio = ProjectService;

	$scope.sensitiveSearch = function (project) {
		if ($scope.search) {
			return project.name.indexOf($scope.search) == 0 ||
				     project.number.indexOf($scope.search) == 0;
		}
		return true;
	};

});

app.service('ProjectService', function (Portfolio, $http) {
	userid = <?php echo $_SESSION['id'] ?>;
	
	var self = {
		'addProject': function (project) {
			this.projects.push(project);
		},
		'selectedProject': null,
		'projects': [], 
		'loadProjects': function () {
										$http({method: 'GET', 
											   url: 'api.php/projects',
											   params: {transform: 1}
										}).
										then(function successCallback(response) {
											angular.forEach(response.data.projects, function (project) {
												if(project.owner == userid){
												 self.projects.push(project)	
												}
											});
	  									}, function errorCallback(response) {
	  										console.log("failure :(");
	  										});
		}
	};
	
	self.loadProjects();
	return self;	
});