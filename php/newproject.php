<?php
	
	session_start();
	include("connection.php");
	
    if ($_POST['submit']=="Add Project") {
	   if (!$_POST['email']) $error.="<br />Please enter your email.";
	   else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))$error.="<br />Please enter a valid email address.";
	   
	   if (!$_POST['password']) $error.="<br />Please enter your password.";
	   else {
		   if (strlen($_POST['password'])<8) $error.="<br />Please enter a password with at least 8 characters.";
		   if (!preg_match('`[A-Z]`', $_POST['password'])) $error.="<br />Please include at least one capital letter in your password.";
	   }
	   
	   if ($error) $error = "There was a problem with your registration.".$error;
	   else {
		   
		   $query="SELECT * FROM `users` WHERE `email`='".mysqli_real_escape_string($link, $_POST['email'])."'";
		   
		   $result = mysqli_query($link, $query);
		   
		   $results = mysqli_num_rows($result);
		   
		   if($results){
			   
			   $error = "That email address is already registered. Do you want to log in?";
			   
			   } else {
			   			   			   
			   $query = "INSERT INTO `users` (`email`, `password`) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".md5(md5($_POST['email']).$_POST['password'])."')";
			   
			   mysqli_query($link,$query);
			   
			   $_SESSION['id']=mysqli_insert_id($link);
			   
			   //you're registered and logged in, go to the dashboard
			   header("Location:/tools/pages/index.php");
		   }
	   }
   }
   
   if ($_POST['submit']=="Login"){
	   $query="SELECT * FROM `users` WHERE `email`='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND `password`='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
	   
	   $result = mysqli_query($link, $query);
	   
	   $row = mysqli_fetch_array($result);
	   
	   if ($row){
		   $_SESSION['id']=$row['ID'];
		   
		   //you're logged in, go to the dashboard
		   header("Location:/tools/pages/index.php");
		   
	   } else {
		   $error = ("We could not find the email and password combination. Please try again.");
	   }
   }
   
?>