<?php
include ('database.php');

$obj=new mysqldb();

if(isset($_POST['submit']))

if(isset($_POST['hidden_id']))
{
	 $obj->update($_POST);
}
else
{
	
   	$obj->insert($_POST);
}		
$obj->delete();
?>
<html>
<head>
<title>User Demo Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
	.error{
		color: red;
	}
</style>
<body>
	<a href="login.php">
	&nbsp;&nbsp;&nbsp;<button style="text-align:left">login</button>
	</a>
<center>
<h1> Register Page</h1>
	<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<?php
		$result1="";
	 	if(isset($_SESSION['id']) && $_SESSION['id'] != ""){
		$result=$obj->select($_SESSION['id']);
		$result1=mysql_fetch_array($result);
		?>
	<input type="hidden" name="hidden_id" value="<?php echo $_SESSION['id'];?>">
	<?php }?>
		<table>
			<tr>
				<td width="100">Firstname</td>
				<td><input type="text" name="Firstname" value="<?php echo (isset($result1['Firstname'])) ? $result1['Firstname'] : "" ?>" required></td>
			</tr>
			<tr>
				<td width="100">Lastname</td>
				<td><input type="text" name="Lastname" value="<?php echo (isset($result1['Lastname'])) ? $result1['Lastname'] : "" ?>" required></td>
			</tr>
			<tr>
				<td width="100">Email</td>
				<td><input type="text" name="Email" value="<?php echo (isset($result1['Email'])) ? $result1['Email'] : "" ?>" required></td>
			</tr>
			<tr>
				<td width="100">Password</td>
				<td><input type="Password" name="Password" value="<?php echo (isset($result1['Password'])) ? $result1['Password'] : "" ?>" required></td>
			</tr>
			<tr>
				<td width="100">Contact</td>
				<td><input type="text" name="Contact" maxlength="10" value="<?php echo (isset($result1['Contact'])) ? $result1['Contact'] : "" ?>" class=" number only_float">
				
				</td>

			</tr>
			<tr>
				<td width="100">Gender</td>
				<td>
				Male <input type="radio" name="Gender" value="m"<?php echo(isset($result1['Gender']) && $result1['Gender']=="m") ? "checked" : "";?>  required>
				Female<input type="radio" name="Gender" value="f"<?php echo(isset($result1['Gender'])&& $result1['Gender']=="f") ? "checked" :" ";?> required>
				</td>
			</tr>
			<tr>
				<td width="100"></td>
				<td><input type="submit" name="submit" value="add">
				<?php if(isset($result1) && $result1==""){?>
					<input type="reset" name="submit" value="clear">
					<?php }?></td>
			</tr>
		</table>
	</form>	
</center>
</body>
</html>
<center>
</center>
