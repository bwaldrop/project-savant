<?php
  session_start();
  if (!$_SESSION['id']){
	  //user not loged in, redirect to login page and provide and error.
	  $error = "You are not logged in.";
	  header("Location:index.php/?uie=1");
  }
?> 

<!DOCTYPE html >
<html lang="en" ng-app="projectsavant" >
<head >
	<title >Project Portfolio</title >
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css"
	<link href="bower_components/ladda/dist/ladda-themeless.min.css" rel="stylesheet">
	<link href="bower_components/ladda/dist/ladda.min.css" rel="stylesheet">
	<link href="main.css" rel="stylesheet" >
</head >

<body >
<nav class="navbar navbar-inverse navbar-fixed-top" >
	<div class="container" >
		<div class="navbar-header" >
			<a class="navbar-brand"
			   href="http://www.bwaldrop.com/tools/" >Project Portfolio
			</a >
		</div >
	</div >
</nav >

<div class="container main-content" >

	<div class="row" > <!-- Start Search Bar Row -->
		<div class="col-md-8" >
			<form class="form-inline well well-sm" >
				<span class="glyphicon glyphicon-search" ></span >

				<div class="form-group" >
						<input type="text"
						       class="form-control"
						       id="name"
						       ng-model="search.$"
						       placeholder="Search..."
								/>
				</div >

				<span class="glyphicon glyphicon-sort-by-attributes" ></span >

				<div class="form-group" >
					<select class="form-control"
							ng-model="order">
						<option value="name" >Name (ASC)</option >
						<option value="-name" >Name (DEC)</option >
						<option value="number" >Number (ASC)</option >
						<option value="-number" >Number (DEC)</option >
						<option value="id" >ID (ASC)</option >
						<option value="-id" >ID (DEC)</option >
					</select >
				</div >
			</form >
		</div >
	</div ><!-- End Search Bar Row -->

	<div class="row" > <!-- Start Main Data Display Container -->
		
		
		<div class="col-md-8" ng-controller="ProjectListController"><!--Project List Pane -->

			<table class="table table-bordered" >

				<tr >
					<th>Index</th>
					<th >ID
						<span ng-click="order = 'id'" class="glyphicon glyphicon-menu-up"></span>
						<span ng-click="order = '-id'" class="glyphicon glyphicon-menu-down"></span>
					</th >
					<th >Number
						<span ng-click="order = 'number'" class="glyphicon glyphicon-menu-up"></span>
						<span ng-click="order = '-number'" class="glyphicon glyphicon-menu-down"></span>
					</th >
					<th >Name
						<span ng-click="order = 'name'" class="glyphicon glyphicon-menu-up"></span>
						<span ng-click="order = '-name'" class="glyphicon glyphicon-menu-down"></span>
					</th >
					<th >Status</th >
				</tr >

				<tr ng-repeat="project in filteredProjects = (portfolio.projects | filter:search | orderBy:order)"
				    ng-style="{
							 'background-color': project.id == portfolio.selectedProject.id ? 'lightgray' : ''
					}"
				    ng-click="portfolio.selectedProject = project" >
					<td >{{ $index }}</td>
					<td >{{ project.id }}</td >
					<td >{{ project.number }}</td >
					<td >{{ project.name }}</td >
					<td >{{ project.status }}</td >
				</tr >
				<tr ng-show="filteredProjects.length == 0">
					<td colspan="5">
						<div class="alert alert-info">
							<p class="text-center">No results found for search term '{{ search }}'</p>
						</div>
					</td>
				</tr>
			</table >
		</div ><!-- End Project List Pane -->
		

		<div class="col-md-4" ng-controller="ProjectDetailController"><!-- 	Project Detail Pane   -->

			<div class="panel panel-default" >
				<div class="panel-heading" >Details</div >
				<div class="panel-body" >
					<dl >
						<dt >id</dt >
						<dd >{{portfolio.selectedProject.id}}</dd >
						<dt >owner</dt >
						<dd >{{portfolio.selectedProject.owner}}</dd >
						<dt >number</dt >
						<dd >{{portfolio.selectedProject.number}}</dd >
						<dt >name</dt >
						<dd >{{portfolio.selectedProject.name}}</dd >
						<dt >notes</dt >
						<dd >{{portfolio.selectedProject.note}}</dd >
						<dt >status</dt >
						<dd >{{portfolio.selectedProject.status}}</dd >
						<dt >created</dt >
						<dd >{{portfolio.selectedProject.created}}</dd >
						<dt >modified</dt >
						<dd >{{portfolio.selectedProject.modified}}</dd >
					</dl >
				</div >
			</div >
		</div ><!-- End Project Detail Pane -->
	</div ><!-- Start Main Data Display Container -->
</div ><!-- End Main Content Container -->
<script src="bower_components/angular/angular.min.js" ></script >
<script src="bower_components/angular-auto-validate/dist/jcs-auto-validate.min.js" ></script >
<script src="bower_components/ladda/dist/spin.min.js" ></script >
<script src="bower_components/ladda/dist/ladda.min.js" ></script >
<script src="bower_components/angular-ladda/dist/angular-ladda.min.js" ></script >
<script src="bower_components/ng-resource/dist/ng-resource.min.js"></script>
<script src="main.js" ></script >
</body >
</html >
