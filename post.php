<?php
class post
{
		
		private $connection;

			public function __construct()
			{
					$this->connection=mysql_connect('localhost','root','root','register1');
					mysql_select_db('register1',$this->connection);
			}
			public function lists($Id=null)
			{	
					$start=0;
					$limit=2;
					if(isset($_GET['page']))
					{	
						$page=$_GET['page'];                              
					    $start = ($page - 1) * $limit; 
					}
					else 
						{
							$page=1;
						}
					$result=mysql_query("select * from post where user_Id='$Id' LIMIT $start, $limit");
		 			echo "<div id='content'><table border = '1'><tr><td>subject</td><td>title</td><td>description</td><td>action</td><td>action</td>";
					while($result1=mysql_fetch_array($result))
					{	
					echo "<tr><td>".$result1['subject']."</td>";
					echo "<td>".$result1['title']."</td>";
					echo "<td>".$result1['description']."</td>";
					echo "<td><a href='index.php?id=".$result1['pid']."'>Edit</a></td>";
					echo "<td><a onclick='return confirm(\"Are you sure to delete it?\");' href='index.php?delete_id=".$result1['pid']."'>Delete</a></td><tr>";
					}

					echo "</table>";	
					$rows=mysql_query("select * from post");
					$total=ceil($rows/$limit);
					if($page>1)
					{
						echo "<a href='?page=".($page-1)."' class='button'>PREV</a>";
					}
					if($page!=$total)
					{
						echo "<a href='?page=".($page+1)."' class='button'>NEXT</a>";
					}
					echo "<ul class='page'>";
							for($i=1;$i<=$total;$i++)

							{
								if($i==$page) { echo "<li class='current'>".$i."</li>"; }
								
								else { echo "<li><a href='?page=".$i."'>".$i."</a></li>"; }

							}
					echo "</ul></div>";	
			}
			public function insert($data)
			{	
				$user_Id=trim($data['hidden_id']);
				$subject=trim($data['subject']);
				$title=trim($data['title']);
				$description=trim($data['description']);
				$sql="insert into post(subject,title,description,user_Id)values('$subject','$title','$description','$user_Id')";
		 		if(mysql_query($sql))
		 		{
		 				echo "Insert Successfully";
		 		}
			}
			public function update($data)
			{

				$user_Id=trim($data['hidden_id']);
				$subject=trim($data['subject']);
				$title=trim($data['title']);
				$description=trim($data['description']);
				if(isset($data['hide']))
				{
					$sql="update post set subject='$subject', title='$title', description='$description' where pid ={$data['hide']}";
					if(mysql_query($sql))
	 				{
	 					echo "Update Data Successfully";
	 				}
				} 
			}
			public function delete($id=null)
	  		{
	 			if(isset($_GET['delete_id']))
				{
					$id=$_GET['delete_id'];
					$result=mysql_query("delete from post where pid ='$id'");	
				}
	  		}
	  		public function edit($pid){
	  			if(isset($pid))
			 	{
			 			$result=mysql_query("select * from post where pid='$pid'");
			 			$result=mysql_fetch_array($result);
			 			return $result;
	 			}

	  		}
}
?>
