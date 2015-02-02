<?php require_once("initialize.php");?>

<!DOCTYPE html>
<html>
<head>
<title><?php $title=new Settings();
             $title->show_title();?>

</title>

<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" />
<link rel="stylesheet" href="nivo-slider/themes/default/default.css" type="text/css" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="jquery-2.0.3.min.js"></script>
<script src="jquery.nivo.slider.pack.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>

</head>
<body>
<div id="wrapper">
<div id="header">
<div id="logo">
<?php echo "<img src=\"img/";
      Photos::show_logo();
      echo "\" />";
?>
</div><!--end of logo-->
<div id="navigation">
<?php
$navigation=new Pages();
$navigation->navigation();?>
</div><!--end of navigation -->
</div><!--End of header-->
<?php
$page=isset($_GET['page_id'])?$_GET['page_id']:1;

if($page==1){
	include("homepage.php");
}
else{
	include("pages.php");
}
include('footer.php');


?>

</div><!--End of wrapper !-->
<form method="post">
<input type="submit" id="testiranje" value="submit" onclick="funkcija()">
</form>
<script type="text/javascript">
	function funkcija(){
		getElementById('test').innerHtml=write('joooss boljeeeee');
	}
	}
</script>
<p id="test" style="color:black"></p>
</body>

</html>


