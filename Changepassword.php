<?php
include('logout.php');
$new_password="";$new_passwordError="";

if(isset($_POST['submit']))
{	
	if(empty($_POST['new_password']))
	{
		$new_passwordError="please new password required";
	}
	else
	{
		 $obj->changepassword($_POST);
	}
}
?>
<?php
if(isset($_SESSION['Firstname']))
{
?>
<style>
	.error{
		color: red;
	}
</style>
<center>
<h3> Change password </h3>
<form method="post" action="" style="clear:both;">
<table>
	<tr>
		<td width ="100">Old  Password</td>
		<td><input type="password" name="old_password" value=" <?php echo $_SESSION['Password']?>" readonly>
		</td>
		<input type="hidden" value="<?php echo  $_SESSION['Id'] ;?>" name="id"/>
	</tr>
	<tr>
		<td width ="100">New  Password</td>
		<td><input type="password" name="new_password" ></td>
		<div class="error"><?php echo $new_passwordError;?></div>
	</tr>
	<tr>
		<td width ="150">Confirm Password</td>
		<td><input type="password" name="con_password" ></td>
	</tr>
	<tr>
		<td width ="100"></td>
		<td><p align="center"><input type="submit" value="Change" name="submit"></p></td>
	</tr>
	</table>
</form>
</center>
<?php
}else
{
	header("location: login.php");
}
?>