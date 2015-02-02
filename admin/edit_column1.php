<div id="edit_coloumn1_heading">
<h2>Edit Coloumn 1</h2>
</div><!--#edit_coloumn1_heading-->
<div id="edit_column1_container">
<?php
$homepage_post=new Posts();
$homepage_post->show_coloumns();
$column_photo=new Photos();
$column_photo->show_column_photos();
?>
<div id="edit_column1_header" style="margin-top:20px;">
 <h2 style="margin-bottom:20px;"><i class="fa fa-arrow-right" style="background-color:black;"></i>Edit title: <?php echo $homepage_post->naslov[0];?></h2>
 <?php

echo "<table><tr><td><form method=\"post\"><input type=\"text\" name=\"title_1\" placeholder=\"";
echo $homepage_post->naslov[0];
echo "\"></td><td><button type=\"submit\" name=\"edit_title1\"><i class=\"fa fa-pencil\"> Update</i></button></td></tr></form></table>";
echo "<hr/>";
if(isset($_POST['edit_title1'])){
	$id=$homepage_post->id[0];
	$naslov=isset($_POST['title_1'])?$_POST['title_1']:null;
	$homepage_post->edit_columns($id,$naslov);
	header('Location: panel.php?id=homepage&page_id=3');

}



 ?>
 </div><!--#edit_column_header-->
 <div id="edit_column1_header">

 <h2> <i class="fa fa-arrow-right" style="background-color:black;"></i> Change column image</h2>
 </div><!--#edit_column_header-->

<script type="text/javascript" >
   $(document).ready(function() {
      $("#markItUp").markItUp(mySettings);
   });
</script>
<?php

echo "<table><tr><td>";
echo "<img src=\"../img/";
echo $column_photo->name[0];
echo "\" /></td>";
echo "<td><form method=\"post\" enctype=\"multipart/form-data\"> ";
echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"5500000\" />";
echo "<input type=\"file\" name=\"file_upload\" />";
echo "<button type=\"submit\" name=\"".$column_photo->id[0]."\"><i class=\"fa fa-pencil\"> Edit</i></button></form></td></tr></table>";
echo "<hr/>";?>
 <div id="edit_column1_header">
 <h2><i class="fa fa-arrow-right" style="background-color:black;"></i> Edit content</h2>
 </div><!--#edit_column_header-->
<?php


echo "<form method=\"post\"><textarea id=\"markItUp\" name=\"post_1\">";
echo $homepage_post->content[0];
echo "</textarea>";
echo "<div id=\"pages_bottom\" style=\"border:none;\">";
echo "Last Update: ".$homepage_post->date[0];
echo "<button type=\"submit\" name=\"update_post_1\">";
echo "<i class=\"fa fa-check\"> Update</i></button></form></div>";


 if(isset($_POST['update_post_1'])){
 	        $id=$homepage_post->id[0];
            $homepage_post->content=isset($_POST['post_1'])?$_POST['post_1']:null;
             if(empty($homepage_post->content)){
             	echo "You can't send empty textarea";
             }
             else{
          	     $homepage_post->edit_columns($id,$naslov=null);
          	     header('Location: panel.php?id=homepage&page_id=3');
          	 }

          }

if(isset($_POST[$column_photo->id[0]])){
	$id=$column_photo->id[0];
	$file=array();
	$file=isset($_FILES['file_upload'])?$_FILES['file_upload']:null;
	$column_photo->name=$file['name'];
	$column_photo->size=$file['size'];
	$column_photo->type=$file['type'];
	$column_photo->tmp_path=$file['tmp_name'];

	move_uploaded_file($column_photo->tmp_path, '/opt/lampp/htdocs/specijalisticki_rad/img/'.$column_photo->name);
	$column_photo->change_column_photo($id);
    header('Location: panel.php?id=homepage&page_id=3');
   }
?>
</div><!--#edit_column1_container-->

