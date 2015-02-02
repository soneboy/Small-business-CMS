<?php
require_once('database.php');
class Comments extends Database{

	public static $id;
	public static $posts_id;
	public static $email;
	public static $autor;
	public static $comment;
	public static $date;

	public static function diplay_comments($post_id){

    $sql="SELECT * FROM comments WHERE posts_id={$post_id} ";
    foreach(self::$connect->query($sql) as $row){

    	echo "<div id=\"comments\"><div id=\"comment_heading\"><p style=\"color:#2F4F4F;font-weight:bold;\">".ucfirst($row['autor'])."</p>";
        echo "<p style=\"font-size:80%;\">".$row['time']."</p><br/>";
    	echo "<p>".$row['comment']."</p></div>";
         $sql="SELECT * FROM comments WHERE id={$row['id']}";
          foreach(self::$connect->query($sql) as $row){
             if($row['reply']==true){
                 self::find_reply($row['id']);
    	

      }
      
	}
    echo "</div>";
 }
} 
 private static function find_reply($comment_id){
     $sql="SELECT * FROM replies WHERE comment_id={$comment_id} ";
     foreach(self::$connect->query($sql) as $row){
        echo "<div id=\"reply\"><p style=\"color:#191970;font-weight:bold;\">Admin</p><br/>";
        echo "<p>".$row['reply']."</p>";
        echo "</div>";
     }
 }
	public static function display_comment_box(){
		  echo "<table><form method=\"post\"><tr><td> Name</td>";
    	echo "<td><input type=\"text\" name=\"name\" /></td></tr>";
    	echo "<tr><td> E-mail</td>";
    	echo "<td><input type=\"email\" name=\"email\" /></td></tr>";
    	echo "<tr><td>Comment: </td>";
    	echo "<td><textarea name=\"comment\"></textarea></td></tr>";
    	echo "<tr><td></td>";
    	echo "<td><input type=\"submit\" name=\"post_comment\" value=\"Post comment\" /></td></tr></form></table>";
	}
 public static function insert_comments($posts_id,$autor,$comment,$email){
 	$sql="INSERT INTO comments(posts_id,autor,comment,email,time) VALUES ({$posts_id},'{$autor}','{$comment}','{$email}', NOW())";
 	self::$connect->query($sql);
 }
 public static function count_comments($posts_id){
 	$sql="SELECT COUNT(*) FROM comments WHERE posts_id={$posts_id}";
 	$result=self::$connect->query($sql);
 	while($row=$result->fetch(PDO::FETCH_NUM)){
 		return $row[0];
 	;
 	}
 }
 public static function show_comments($posts_id){
 	$sql="SELECT * FROM comments WHERE posts_id={$posts_id} ";
 	echo "<table><tr><th> Autor</th>";
 	echo "<th> Email</th>";
 	echo "<th> Comment</th>";
 	echo "<th> Date</th>";
 	echo "<th></th></tr>";
 	foreach(self::$connect->query($sql) as $row){
            echo "<td>".$row['autor']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['comment']."</td>";
            echo "<td>".$row['time']."</td>";
            echo "<td><a href=\"panel.php?id=posts&action=delete_comment&post_id={$posts_id}&comment_id=";
            echo $row['id']."\"><i class=\"fa fa-trash\"> Delete</a></td></tr>";
 	}
 	echo "</table>";
 }
 public static function delete_comment($comment_id){
 	$sql="DELETE FROM comments WHERE id={$comment_id} ";
 	self::$connect->query($sql);
 }
 
 
}










?>