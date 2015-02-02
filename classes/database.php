<?php ob_start();?>

<?php

class Database{

static $connect;
static $result;

public function __construct(){
    
    try{
	self::$connect=new PDO('mysql:host=localhost;dbname=specijalisticki_rad','root','');
       }
	catch(Exception $e){
		$error=$e->getMessage();
	}
	if(isset($error)){
		echo $error;
	}
	
}

public function login($username,$password){

	$sql="SELECT * FROM users ";
	$sql.="WHERE username='{$username}' AND password='{$password}' ";
	$row=self::$connect->query($sql)->rowCount();
	if($row>=1){
		$_SESSION['admin']=$username;
		header('Location: panel.php?id=dashboard');
      }
}
 public static function redirect_to($location){
    header('Location:'.$location);
}	
public  function test(){
	$sql="ALTER TABLE users DROP FOREIGN KEY test";
	
	self::$connect->query($sql);
}


}









?>