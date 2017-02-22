
<?php
include('logout.php');
if(isset($_POST['Change']))
{
 	 $obj->update($_POST);
}
else
{
	$result=$obj->changeprofile($_SESSION['Id']);
	$res=mysql_fetch_array($result);
}	

function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){

   
    $target_path = $target_folder;
    $thumb_path = $thumb_folder;
    
    $filename_err =($_FILES[$field_name]['name']);
    $filename_err_count = count($filename_err);
    $file_ext = $filename_err[$filename_err_count-1];
    if($file_name != ''){
        $fileName = $file_name.'.'.$file_ext;
    }else{
        $fileName = $_FILES[$field_name]['name'];
    }
    
    $upload_image = $target_path.basename($fileName);
    $sql=mysql_query("update user set pic='$fileName' where id={$_SESSION['Id']}");
    if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
    {
        if($thumb == TRUE)
        {
            $thumbnail = $thumb_path.$fileName;
            list($width,$height) = getimagesize($upload_image);
            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
            switch($file_ext){
                case 'jpg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;
                case 'jpeg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;

                case 'png':
                    $source = imagecreatefrompng($upload_image);
                    break;
                case 'gif':
                    $source = imagecreatefromgif($upload_image);
                    break;
                default:
                    $source = imagecreatefromjpeg($upload_image);
            }

            imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
            switch($file_ext){
                case 'jpg' || 'jpeg':
                    imagejpeg($thumb_create,$thumbnail,10);
                    break;
                case 'png':
                    imagepng($thumb_create,$thumbnail,10);
                    break;

                case 'gif':
                    imagegif($thumb_create,$thumbnail,10);
                    break;
                default:
                    imagejpeg($thumb_create,$thumbnail,10);
            }

        }

        return $fileName;
    }
    else
    {
        return false;
    }
}
	if(!empty($_FILES['pic']['name'])){
   
    $upload_img = cwUpload('pic','uploads/','',TRUE,'uploads/thumbs/','200','160');
    $thumb_src = 'uploads/thumbs/'.$upload_img;
}else{
 
    $thumb_src = '';
}
?>

<?php
if(isset($_SESSION['Firstname']))
{
?>
<center>
<style>
	.hjh{
		height: 120px;
	}
</style>
<h3>Change profile</h3>
<form action ="" method="post" style="clear:both;" enctype="multipart/form-data">
	<input type="hidden" name="hidden_id" value="<?php echo $res['Id'];?>">
		<?php
			$result=mysql_query("select pic from user WHERE Id ={$_SESSION['Id']} ");
            while($rows= mysql_fetch_array($result))
            {
            	
				//echo "<img src='upload/".$rows['0']."'/>";
            }
		?>
		<table>
			<tr>
			<td width="100"></td>
			<td><?php if($thumb_src != ''){ ?>
			<img src="<?php echo $thumb_src; ?>" alt="">
			<?php } ?>  
			<img class=" hjh" src="uploads/<?php echo(isset($res['pic'])) ? $res['pic']:" ";?>"></td> 
			</tr>                  
			<tr>
				<td width="100">Firstname</td>
				<td><input type="text" name="Firstname" value="<?php echo (isset($res['Firstname'])) ? $res['Firstname'] : "" ?>" ></td>
			</tr>
			<tr>
				<td width="100">Lastname</td>
				<td><input type="text" name="Lastname" value="<?php echo (isset($res['Lastname'])) ? $res['Lastname'] : "" ?>" ></td>
			</tr>
			<tr>
				<td width="100">Email</td>
				<td><input type="text" name="Email" value="<?php echo (isset($res['Email'])) ? $res['Email'] : "" ?> "></td>
			</tr>
			<tr>
				<td width="100">Password</td>
				<td><input type="Password" name="Password" value="<?php echo (isset($res['Password'])) ? $res['Password'] : "" ?>" disabled ></td>
			</tr>
			<tr>
				<td width="100">Contact</td>
				<td><input type="text" name="Contact"  maxlength="10"  value="<?php echo (isset($res['Contact'])) ? $res['Contact'] : "" ?>"></td>
			</tr>
			<tr>
				<td width="100">Gender</td>
				<td>
				Male <input type="radio" name="Gender" value="m"<?php echo(isset($res['Gender']) && $res['Gender']=="m") ? "checked" : "";?> >
				Female<input type="radio" name="Gender" value="f"<?php echo(isset($res['Gender'])&& $res['Gender']=="f") ? "checked" :" ";?> >
				</td>
			</tr>
			<tr>
				<td width="100">uploadimage</td>
				<td><input type="file" name="pic"><button type="submit" name="submit">upload</button></td>
			</tr>
			<tr>
				<td width="100"></td>
				<td><input type="submit" name="Change" value="Change profile">
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
