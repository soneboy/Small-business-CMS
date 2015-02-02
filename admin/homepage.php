<div id="homepage">
<i class="fa fa-home" style="color:black;font-size:300%;margin-bottom:20px;">Homepage</i>
<?php
$page_id=isset($_GET['page_id'])?$_GET['page_id']:null;
if($page_id==null){include('homepage_nav.php');}
if($page_id==1){include('edit_gallery.php');}
if($page_id==2){include('edit_slider.php');}
if($page_id==3){include('edit_column1.php');}
if($page_id==4){include('edit_column2.php');}

?>
   <script src="//cdn.ckeditor.com/4.4.6/basic/ckeditor.js"></script> 
 
</div><!--#homepage-->
