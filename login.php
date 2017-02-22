<?php
session_start();
include 'database.php';
$obj= new mysqldb();
if(isset($_POST['sub']))
{
	$obj->redirect_to("register.php");
}
if(isset($_POST['submit']))
{
	$Email="";
	$Password="";
	$obj->login($Email,$Password);
	
}
?>
<html>
<head>
	<title>Login Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<center>
<h1>Login page</h1>
	<form action="" method="post">
	<table>
		<tr>
			<td width="100">Email</td>
			<td><input type="text" name="Email" ></td>
		</tr>
		<tr>
			<td width="100">Password</td>
			<td><input type="Password" name="Password" ></td>
		</tr>
		<tr>
			<td width="100"></td>
			<td><input type="submit" name="submit" value="Login">
			<input type="submit" name="sub" value="Sign Up"></td>
		</tr>
	</table>
	</form>
</center>
</body>
</html>
