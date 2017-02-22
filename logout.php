<?php
include ('database.php');
$obj=new mysqldb();
if(isset($_POST['logout']))
{
$obj->logout();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<style>
.ab
{
	width: 1320px;
	padding: 1em;
	float: right;
    color: white;
    background-color: black;
    text-align: right;
}
.nav ul,.nav li
{
float: left;
list-style-type:none;
display:inline;
margin:0px 10px;
}
.nav a:link, .nav a:visited, .nav a:active
{
font-size:15px;
color:#5D7393;

padding:5px 5px 5px 5px;
text-decoration: none;
}
.nav a:hover
{
color:#fff;
}
</style>
<body>
<form action="#" method="post">
<div class="ab">
<div class="nav">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="changeprofile.php">Change Profile</a></li>
<li><a href="Changepassword.php">Change Password</a></li>
</ul>
<?php
session_start();
echo 'Weclome'," ".$_SESSION["Firstname"];
echo "&nbsp";
?>
<button name="logout">logout</button>
</div>
</div>
</form>
</body>
</html>
