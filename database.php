<?php
class mysqldb
{

		private $connection;

		public function __construct()
		{

			$this->connection=mysql_connect('localhost','root','root','register1');
			mysql_select_db('register1', $this->connection);
		}
		public function select($id=null)
 		{

		 		if(isset($id))
			 	{
			 			$result=mysql_query("select * from user where id=' $id'");
			 			return $result;
	 			}
		 }
	   public function insert ($data)
	  {
	  	
	  	$Firstname=trim($data['Firstname']);
		$Lastname=trim($data['Lastname']);
		$Email=trim($data['Email']);
		$Password=trim($data['Password']);
		$Contact=trim($data['Contact']);
		$Gender=trim($data['Gender']);

 		$sql="insert into user(Firstname,Lastname,Email,Password,Contact,Gender)values('$Firstname','$Lastname','$Email','$Password','$Contact','$Gender')";

 		if(mysql_query($sql))
 			{
 				echo "Insert Successfully";
 			}
	  }
 		public function update($data)
	 	{	

	 		$Firstname=trim($data['Firstname']);
			$Lastname=trim($data['Lastname']);
			$Email=trim($data['Email']);
			if(isset($data['Password']) &&  $data['Password']!="") 
			{
				$Password=trim($data['Password']);
			}
			$Contact=trim($data['Contact']);
			$Gender=trim($data['Gender']);
			
	 		if(isset($data['hidden_id']))
			{ 
					if(isset($data['Password']) &&  $data['Password']!="") 
					{
					       $sql="update user set Firstname='$Firstname', Lastname='$Lastname',				    Email='$Email',Password='$Password',Contact='$Contact',Gender='$Gender' where ID = '$_POST[hidden_id]'";
					}
					else
					{
						$sql="update user set Firstname='$Firstname', Lastname='$Lastname', Email='$Email',Contact='$Contact',Gender='$Gender' where ID = '$data[hidden_id]'";
					}
					if(mysql_query($sql))
	 				{
	 					echo "Update Data Successfully";
	 				}
	 				if(!isset($data['Password']) &&  $data['Password']=="") {
	 					header("location: index.php");
	 				}
	 				
			}
	  	}
	  	public function delete($id=null)
	  		{
	 			if(isset($_GET['delete_id'])) 
				{
					$id=$_GET['delete_id'];
					$result=mysql_query("delete from user where Id ='$id'");	
				}
	  		}
	  		 public function redirect_to($location = NULL ) 
				{
					
  					if($location!=NULL)
			   		{	
				    	header("Location: {$location}");
			    	}
				}
			 public function login()
			 {
				$result = mysql_query("select *  from user where Email = '$_POST[Email]' && Password = '$_POST[Password]'");
				$row = mysql_fetch_array($result);
					if(!empty($row['Email']) && !empty($row['Password']))
					{
						$_SESSION['Id'] = $row['Id'];
						$_SESSION['Password']=$row['Password'];
						$_SESSION['Firstname']=$row['Firstname'];
						$_SESSION['Email'] = $row['Email'];

						echo "SUCCESSFULLY LOGIN TO PAGE...";
						
						header("Location: index.php");
					}
					else
					{
						echo "SORRY YOU ENTERD USERNAME  AND PASSWORD";
					}
			}

				public function changepassword($data)
				{
					$new_password=$_POST['new_password'];
					$id=$_POST['id'];
					$con_password=$_POST['con_password'];
					$chg_pwd=mysql_query("select * from user where Id='$id'");
					$chg_pwd1=mysql_fetch_array($chg_pwd);
					$data_pwd=$chg_pwd1['Password'];
					if($new_password==$con_password)
					{
								$update_pwd=mysql_query("update user set Password='$new_password' where Id='$id'");
								 header("location: index.php");
					}
					else
					{
								 echo $change_error="Your new and Retype Password is not match !!!";
					}
					 
				}
									
				public function logout()
				{

						session_start();
						session_destroy();
						header("location:login.php");
				}	
				public function changeprofile($id=null)
				{
					if(isset($id))
					{
						$result=mysql_query("select * from user where id='$id'");
						return $result;
					}
				}	
}					
