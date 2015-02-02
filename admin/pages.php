<div id="pages">
 <div id="pages_table">
 <i class="fa fa-file" style="color:black;font-size:300%;margin-bottom:20px;"> Pages</i>
 <script type="text/javascript" >
   $(document).ready(function() {
      $("#markItUp").markItUp(mySettings);
   });
</script>
 <?php
 $page=new Pages();

 $navigacija_id=isset($_GET['edit_page'])?$_GET['edit_page']:null;
 $action=isset($_GET['action'])?$_GET['action']:null;
 $delete_id=isset($_GET['delete_page'])?$_GET['delete_page']:null;
 if($navigacija_id && $action=='content'){
    $page->find_page($navigacija_id);
    if($page->content == null){
                    echo "<div id=\"add_content\"><br/>This page doesn`t have any content!";
                    echo "<h2>Create page content</h2>";
                    echo "<form method=\"post\"><textarea id=\"markItUp\" name=\"create_page\"></textarea>";
                    echo "<form method=\"post\"><button type=\"submit\" name=\"add_content\"><i class=\"fa fa-plus\"> Add Content</i></button></form>";
                       if(isset($_POST['add_content'])){
                          $page->content=isset($_POST['create_page'])?$_POST['create_page']:null;
                          $page->create_page_content($navigacija_id);
                          header('Location: panel.php?id=pages');
                   
                     }
    	        
                } 
    else{
    	  echo "<h2>EDIT CONTENT FOR PAGE: ".$page->find_page_title($navigacija_id)."</h2>";
    	  echo "<form method=\"post\"><textarea id=\"markItUp\" name=\"page\">";
        echo $page->content;
        echo "</textarea>";
        echo "<div id=\"pages_bottom\">";
        echo "Last Update: ".$page->date;
        echo "<button type=\"submit\" name=\"update_page\">";
        echo "<i class=\"fa fa-check\"> Update</i></button></form></div>";

        
          if(isset($_POST['update_page'])){
            $page->content=isset($_POST['page'])?$_POST['page']:null;
             if(empty($page->content)){
             	echo "You can't send empty textarea";
             }
             else{
          	     $page->edit_page($navigacija_id);
          	     header('Location: panel.php?id=pages');
          	     echo "Page is successfuly updated";
          	 }
            }
        }
    
}
elseif($navigacija_id && $action=='title'){
  echo "<div id=\"create_page\"><h2>EDIT PAGE TITLE: ".$page->find_page_title($navigacija_id)."</h2>";
  echo "<form method=\"post\"><input type=\"text\" name=\"page_title\" />";
  echo "<button type=\"submit\" name=\"edit_title\"><i class=\"fa fa-pencil\"> Edit</i></button></form></div>";
  if(isset($_POST['edit_title'])){
    $page->naziv=isset($_POST['page_title'])?$_POST['page_title']:null;
    $page->edit_page_title($navigacija_id);
    header('Location: panel.php?id=pages');
  }
}

else{

  echo "<table><tr><th>NAME</th><th colspan=\"3\">ACTION</th></tr>";
  $page->show_pages_title();
  echo "</table>";
  echo "<div id=\"create_page\"><h2>CREATE NEW PAGE</h2>";
     if($delete_id){

	   $page->delete_page_title($delete_id);
	   $page->delete_page_content($delete_id);
	   header('Location: panel.php?id=pages');
      }
   
  echo "<form method=\"post\"><input type=\"text\" name=\"naziv\">";
  echo "<button type=\"submit\" name=\"create_page\"><i class=\"fa fa-plus\"> Create</i></button></form></div>"; 
     if(isset($_POST['create_page'])){
     	$naziv=isset($_POST['naziv'])?$_POST['naziv']:null;
     	$page->create_page_title($naziv);
     	
     }

    }

 ?>
 <script>
 $("#delete").mouseover(function(){
    $("#delete").css("background","red");
 });
 $("#delete").mouseleave(function(){
    $("#delete").css("background","#4682B4");
 });
 </script
 <script src="//cdn.ckeditor.com/4.4.6/basic/ckeditor.js"></script> 
 </div><!--#pages_table-->


</div><!---#pages-->