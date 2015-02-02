<div id="posts">
<i class="fa fa-file-text-o" style="color:black;font-size:300%;margin-bottom:20px;"> Posts</i><br/>
 <script type="text/javascript" >
   $(document).ready(function() {
      $("#markItUp").markItUp(mySettings);
   });
</script>
<?php
$action=isset($_GET['action'])?$_GET['action']:null;
$post_id=isset($_GET['post_id'])?$_GET['post_id']:null;
$comment_id=isset($_GET['comment_id'])?$_GET['comment_id']:null;
$post=new Posts();
if(!isset($action)){

        $post->display_post_admin();
        echo "<a id=\"add_post_a\" href=\"panel.php?id=posts&action=create_post\"><i class=\"fa fa-plus\"></i> Add new post</a>";

}
elseif ($action == "create_post"){
         echo "<form method=\"post\"><input type=\"text\" name=\"post_title\" placeholder=\"Add post title\">";
         echo "<textarea id=\"markItUp\" name=\"post_content\">";
         echo "</textarea>";
         echo "<button type=\"submit\" name=\"add_post\"><i class=\"fa fa-plus\"> Add</i></button></form>";
         if(isset($_POST['add_post'])){
          $post->pages_id=4;
          $post->naslov=isset($_POST['post_title'])?$_POST['post_title']:null;
          $post->content=isset($_POST['post_content'])?$_POST['post_content']:null;
              if(empty($post->naslov)){
                echo "You can`t create post without title.Please add post title!";
              }
              elseif(empty($post->content)){
                echo "You didn`t create any blog content";
              }
              else{
                $post->create_post();
                 Database::redirect_to('panel.php?id=posts');
           }
         }
}
elseif($action=='edit_post'){
	$post->show_post_values($post_id);
        echo "<div id=\"edit_post\"><h2>EDIT POST: ".$post->naslov."</h2>";
    	  echo "<form method=\"post\"><textarea id=\"markItUp\" name=\"post\">";
        echo $post->content;
        echo "</textarea>";
        echo "<div id=\"post_bottom\">";
        echo "Last Update: ".$post->date;
        echo "<button type=\"submit\" name=\"update_post\">";
        echo "<i class=\"fa fa-check\"> Update</i></button></form></div></div>";

          if(isset($_POST['update_post'])){
                          $post->content=isset($_POST['post'])?$_POST['post']:null;
                          $post->edit_post($post_id);
                          header('Location: panel.php?id=posts');
                   
                     }
    }
elseif($action=="delete_post"){
	$post->delete_post($post_id);
  $post=Database::redirect_to("panel.php?id=posts");
	
}
elseif($action=="comments"){
  echo "<a href=\"panel.php?id=posts\"><i style=\"text-align:left;\" class=\"fa fa-arrow-left\"></i> Back</a>";
  Comments::show_comments($post_id);
}
elseif($action=="delete_comment"){
  Comments::delete_comment($comment_id);
  Database::redirect_to("panel.php?id=posts&action=comments&post_id=".$post_id);
}

?>


</div><!--#posts