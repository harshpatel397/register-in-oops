<?php
include('logout.php');	
include ('post.php');
$obj= new post();
if(isset($_POST['submit']))
if(isset($_POST['hide']))
{
	 $obj->update($_POST);
}
else
{
	 $obj->insert($_POST);
}
$obj->delete();
?>
<center>
<h3> Post  Page.</h3>
<head>
	<title>post page</title>
<style >
#content
{
	width: 350px;
	margin: 0 auto;
	font-family:Arial, Helvetica, sans-serif;
}
.page
{
float: right;
margin: 0;
padding: 0;
}
.page li
{
	list-style: none;
	display:inline-block;
}
.page li a, .current
{
display: block;
padding: 2px;
}
.button
{
padding: 5px 15px;
text-decoration: none;
background: #333;
color: #F3F3F3;
float: left;
}
</style>
</head> 
<?php 
if(isset($_GET['id'])){
$result=$obj->edit($_GET['id']);
}
 ?>
<?php 
if (isset($_SESSION['Firstname']))
{?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<input type="hidden" name="hidden_id" value="<?php echo $_SESSION['Id'];?>">
	<?php if(isset($result['pid'])){ ?>
	<input type="hidden" name="hide" value="<?php echo (isset($result['pid'])) ? $result['pid'] : ""?>"> 
	<?php } ?>
	<table>
		<tr>
			<td width="100">Subject</td>
			<td><input type="text" name="subject" value="<?php echo (isset($result['subject'])) ? $result['subject'] : "" ?>"  required></td>
		</tr>
		<tr>
			<td width="100">Title</td>
			<td><input type="text" name="title" value="<?php echo (isset($result['title'])) ? $result['title'] : "" ?>" required></td>
		</tr>
		<tr>
			<td width="100">description</td>
			<td><textarea rows="4" cols="20" name="description"  style="width: 163px; height: 78px;resize: vertical; "required><?php echo (isset($result['description'])) ? $result['description'] : "" ?></textarea></td>
		</tr>
		<tr>
			<td width="100"></td>
			<td><input type="submit" name="submit" value="add">
			<?php 
			if(!isset($result)){?>
				<input type="reset" name=" submit" value="clear">
				<?php } ?></td>
		</tr>
	</table>
</form>
</center>	
<center>
<?php
$obj->lists($_SESSION['Id']);
?>
</center>
<?php
}
else
{
	header("location:login.php");
}?>
