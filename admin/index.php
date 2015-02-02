<?php session_start();?>
<?php if(isset($_SESSION['admin'])){
  header('Location: panel.php?id=dashboard');
}?>
<?php require_once("../initialize.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
<link rel="stylesheet" type="text/css" href="../login.css">
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>


<div id="form-main">
  <div id="form-div">
    <form class="form" id="form1" method="post">
      
      <p class="name">
        <input name="username" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Username" id="name" />
      </p>
      
      <p class="username">
        <input name="password" type="text" class="validate[required,custom[email]] feedback-input" id="comment" placeholder="Password" />
      </p>
      
      
      
      <div class="submit">
        <input type="submit" value="LOGIN" id="button-blue" name="submit"/>
        <div class="ease"></div>
      </div>
    </form>
  </div>
<?php

if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$login=new Database();
	$login->login($username,$password);
 
     }
?>



</body>
</html>






