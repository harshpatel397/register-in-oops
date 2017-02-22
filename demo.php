<?php
echo "hello world!";
echo "<br>";
$a=10;
$b=20;
echo  $c= $a + $b;
echo "<br>";
echo "value is a : ". $a;
echo "<br>";
$myvar="hello world!";
echo strtoupper("$myvar");
echo "<br>";
echo "<b>" .$myvar . "</b>"	;
echo "<br>";
if($a == 10)
{
    ?>
    <b>Yes, the number is in fact 10!</b>    
    <?php
}
$i=0;
while ($i < 10) {
	echo $i;
	$i++;
}
echo "<br>";
$i=0;
do{
	
	echo $i;
	$i++;
}while($i < 10);
echo "<br>";

$animals = array("Dog", "Cat", "Snake", "Tiger");

foreach($animals as $animal)
    echo "<pre>";
    echo $animal[] . "<br />";


$animals = array(1 => "abhay",2=> "sajan", 3=>"devang",4=>"hardik");

foreach($animals as $key => $value)
    echo "friend name " .$key.	 " is a " . $value . "<br />";

echo "hello \" test\""."<br>";
$str1="hello hiiii !";
$str2="world";
$str3=$str1 . " ".$str2;
echo $str3;
echo strlen('$str1');
echo strpos($str1, "hiiii");
echo "<br>";
$contacts["Friends"] = array("Me", "John Doe");
$contacts["Family"] = array("Mom", "Dad");
$contacts["Enemies"] = array("Stalin", "Hitler");

foreach($contacts as $categoryName => $value)
{
    echo "<b>" . $categoryName . ":</b><br />";
    foreach($contacts[$categoryName] as $value)
    {
        echo $value . "<br />";
    }
    echo "<br />";
}
?>
class defintion:--
<br>
<?php
class user
{
	public $name;
	public $age;	

	public function describe()
	{
		return $this->name. " is ".$this->age." years old";
	}
}

$user=new user();
$user->name="harsh";
$user->age=42;
echo $user->describe();
?>

<br>
<?php 
class harsh
{
    public $name;
    
    public function __construct($name)
    {
        $this->name=$name;
    }
}
$harsh = new harsh("harsh patel");
echo $harsh->name;
?>

<br>
<hr>
<?php
class User1
{
    public $name;     //static classs use
    public $age;
    public static $minimumPasswordLength = 6;
    
    public function Describe()
    {
        return $this->name . " is " . $this->age . " years old";
    }
    
    public static function ValidatePassword($password)
    {
        if(strlen($password) >= self::$minimumPasswordLength)
            return true;
        else
            return false;
    }
}

$password = "test12";
if(User1::ValidatePassword($password))
    echo "Password is valid!";
else
    echo "Password is NOT valid!";

?>
<br>
<?php
class abc    // constrant class use
{
	const name="harshpatel";
	const age= 21;

}
echo  "username is a ". abc::name."<br>";
echo "age is a".abc::age;
?>
<br>
<hr>
database connect and database call
<br>
$dbConnection = mysql_connect("localhost", "username", "password");<br>
mysql_select_db("my_database", $dbConnection);<br>
mysql_close($dbConnection); 
<hr>

<?php    
setcookie("username","harsh patel",time()+3600);
echo $_COOKIE["username"];
?>
<br>
<?php
if(isset($_POST["Name"]))
{
	$name=$_POST['Name'];
    echo $name;
}
?>

<form action="<?php  echo $_SERVER['PHP_SELF'];?>" method="post">
    Your name:
    <input type="text" name="Name"/>
    <input type="submit" name="btnSendForm" value="Send" />
</form>


<?php
if(isset($_POST["selRating"]))
{
    $number = $_POST["selRating"];
    if((isset($number)) && ($number > 0) && ($number < 6))
    {
        echo "Selected rating: " . $number;
    }
    else
        echo "The rating has to be a number between 1 and 5!";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Select a rating from 1 to 5:
    <select name="selRating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <input type="submit" name="btnSendForm" value="Send" />
</form>

<?php

echo gettype(102);
echo "&nbsp";
echo gettype('harsh patel');


?>

<?php
$a = array("harsh" => 1,"abhay"=>2,"sajan"=>3);
foreach ($a as $key => $ab) {
echo $ab;
}

?>
<?php
$var="harsh";
$a=true;
var_dump($var);

?>
