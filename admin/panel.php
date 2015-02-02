<?php session_start();?>
<?php ob_start();?>
<?php if(!isset($_SESSION['admin'])){
	header('Location: index.php');
}
?>
<?php require_once('../initialize.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
<link rel="stylesheet" type="text/css" href="../css.css">   
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../UI/jquery-ui-1.7.2.custom.css">
<link rel="stylesheet" type="text/css" href="../latest/markitup/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="../latest/markitup/sets/default/style.css" />
<script type="text/javascript" src="../jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../UI/jquery-ui.min.js"></script>
<script type="text/javascript" src="../latest/markitup/jquery.markitup.js"></script>
<script type="text/javascript" src="../latest/markitup/sets/default/set.js"></script>
</head>
<body style="background-image:url('../img/panel.jpg');">
<div id="panel_header">
<a href="panel.php?id=dashboard"><i class="fa fa-bars"></i> Dashboard</a>
<a href="panel.php?id=homepage"><i class="fa fa-home"></i> Homepage</a>
<a href="panel.php?id=pages"><i class="fa fa-file"></i> Pages</a>
<a href="panel.php?id=posts"><i class="fa fa-file-text-o"></i> Posts</a>
<a href="panel.php?id=settings"><i class="fa fa-code"> Settings</i></a>
<div id="logout" style="float:right;">
<a href="../index.php" target="_new"><i class="fa fa-eye"></i> Visit Site</a>
<a href="panel.php?id=logout"><i class="fa fa-location-arrow"> Logout</i></a>
</div><!--#logout-->
</div><!--#panel_header-->
<div id="panel_wrapper">


  

<?php

$panel=isset($_GET['id'])?$_GET['id']:null;
if($panel=='homepage'){require_once('homepage.php');}
if($panel=='pages'){require_once('pages.php');}
if($panel=='posts'){require_once('posts.php');}
if($panel=='settings'){require_once('settings.php');}
if($panel=='dashboard'){require_once('dashboard.php');}
if($panel=='logout'){session_unset($_SESSION['admin']);
                     header('Location: ../index.php');
                     }


?>

</div><!--#panel_wrapper-->



</body>
</html>