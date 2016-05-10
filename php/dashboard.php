<?php
  session_start();
  include("connection.php");
  if (!$_SESSION['id']){
	  
	  //user not loged in, redirect to login page and provide and error.
	  $error = "You are not logged in.";
	  header("Location:index.php/?uie=1");
	  
  }
  //$query = "SELECT * FROM projects WHERE id='".$_SESSION['id']."' LIMIT 1";
  //$result = mysqli_query($link, $query);
  //$row = mysqli_fetch_array($result);
  //$name = $row['name'];
  
?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Dashboard - Project Savant</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Used to customeize bootstrap -->
<link rel="stylesheet" href="headlines.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		#pagecontainer{
			background:url('https://www.bwaldrop.com/tools/images/cover.jpg') no-repeat center center;
			height: 100vh;
			width: 100%;
			margin: 0 auto;
			background-size: cover;
		}
		#loginbox{
			margin-top:50px;
		}

		.center{
			text-align:center;
		}
	
		.bold{
			font-weight:bold;
		}
	
		.margin-top{
			margin-top:36px;
		}
		
		.navbar{
			margin:0 auto;
		}

	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project Savant</a>
			</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="navbar-nav nav navbar-right">
				<li><a href="index.php?logout=1">Log Out</a></li>
			</ul>
			
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div id="pagecontainer" class="container">
		
		<div id="loginbox" class="container">
			
		<H1>Dashboard</H1>
		
		</div>
	
	</div>
	
	<script>
		$(".pagecontainer").css("min-height",$(window).height());
		
		//autoupdate fields like below
		 
		//$(".projectform").keyup(function()){
		//	$.post("updateproject.php", {name:$("name").val});
		//});
	</script>
	
</body>
</html>
