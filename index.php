<?php
  include("php/login.php");
?> 

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Project Savant - World Famous Project Management Suite</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Used to customeize bootstrap -->
<link rel="stylesheet" href="headlines.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
			<form class="navbar-form navbar-right" method="post" role="login">
				<div class="form-group">
					<input type="email" name="loginemail" id="loginemail" placeholder="Email" value="<?php echo addslashes($_POST['loginemail']); ?>" class="form-control" />
				</div>
					
				<div class="form-group">
					<input type="password" name="loginpassword" id="loginpassword" placeholder="Password" value="<?php echo addslashes($_POST['loginpassword']); ?>" class="form-control" />
				</div>
					
				<div class="checkbox">
					<label>
				<input type="checkbox"> Remember me
					</label>
				</div>

			<div class="form-group">
				<input type="submit" name="submit" value="Login" class="btn btn-primary" />
			</div>
		  </form>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div id="pagecontainer" class="container">
		
		<div id="loginbox" class="container">
			
			<div class="col-md-6 col-md-offset-3">
			<h1 class="center">Project Savant</h1>
			<p class="lead center">This Gives You the Power to Manage Projects With One Arm Tied Behind Your Back!</p>
			<?php
				if ($error){
					echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
				}
				if ($message){
					echo '<div class="alert alert-success">'.addslashes($message).'</div>';
				}
 			?>
			<p class="bold margin-top center">Interested? Sign up below!</p> 
				<form method="post">
					<div class="form-group">
						<input type="email" name="email" id="email" placeholder="Email" value="<?php echo addslashes($_POST['email']); ?>" class="form-control" />
					</div>
					
					<div class="form-group">
						<input type="password" name="password" id="password" placeholder="Password" value="<?php echo addslashes($_POST['password']); ?>" class="form-control" />
					</div>
					
					<div class="form-group">
						<input type="submit" name="submit" value="Sign Me Up" class="btn btn-success" />
					</div>
										
				</form>
							
			</div>
		
		</div>
	
	</div>
		<script>
			$(".pagecontainer").css("min-height",$(window).height());
		</script>

</body>
</html>
