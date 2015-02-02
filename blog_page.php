<div id="blog_page">
 
   <?php
$blog=new Posts();
$post_id=isset($_GET['post_id'])?$_GET['post_id']:null;
if($post_id){
echo "<div id=\"full_page\">";
$blog->full_post($post_id);
echo "<div id=\"comments_wrapper\">";
echo "<h2><i>Comments</i></h2>";
Comments::diplay_comments($post_id);
echo "</div>";
echo "<div id=\"comment_box\">";
echo "<h2><i>Leave comment</i></h2>";
if(isset($_POST['post_comment'])){
	$posts_id=$post_id;
	$autor=$_POST['name'];
	$email=$_POST['email'];
	$comment=$_POST['comment'];
	if(empty($autor)){
		echo "<p>Please enter Your name!</p>";
	}
	elseif(empty($email)){
		echo "<p>Please enter Your E-mail!</p>";
	}
	elseif(empty($comment)){
		echo "<p>Please enter Your comment!</p>";
	}
	else{
	Comments::insert_comments($posts_id,$autor,$comment,$email);
	Database::redirect_to('index.php?page_id=4&post_id='.$posts_id);
	}
  }
Comments::display_comment_box();
echo "</div>";
echo "</div>";

}
else{
echo "<div id=\"blogs_wrapper\">";
$blog->show_post_boxes();
echo "</div>";
echo "<div id=\"list_blogs\">";
echo "<h2>Latest blogs</h2>";
echo "<ul>";
$blog->list_all_posts();
echo "</ul></div>";
}?>









</div><!--#blog_page -->