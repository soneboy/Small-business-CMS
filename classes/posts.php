<?php require_once('database.php');?>
<?php
class Posts extends Database{

	public $id;
	public $pages_id;
	public $naslov;
	public $content;
	public $date;
	public $rows;

public function find_post_values($page){

    $sql="SELECT * FROM posts ";
    $sql.="WHERE navigacija_id={$page} ";

    $this->query($sql);
    while($row=self::$result->fetch_array(MYSQLI_ASSOC)){
    	$this->id       =$row['id'];
    	$this->pages_id =$page;
    	$this->naslov   =$row['naslov'];
    	$this->content  =$row['content'];
    	$this->date     =$row['date'];

    	return $this->id;
    	return $this->pages_id;
    	return $this->naslov;
    	return $this->content;
    	return $this->date;
    }
}
public function show_post(){
	
	echo "<h1>".$this->naslov."<\h1>";
	echo "<h2>".$this->date."<\h2>";
	echo "<p>".$this->content."<\p>";
}
public function list_all_posts(){

	$sql="SELECT * FROM posts WHERE navigacija_id=4";
   

   if($sql == null){
           echo "There is no blogs created!";
   }
   else{
           foreach(self::$connect->query($sql) as $row){
           $this->id=$row['id'];
    	     $this->naslov=$row['naslov'];
           $this->date  =$row['date'];

           echo "<li><a href=\"index.php?page_id=4&post_id=".$this->id."\">".$this->naslov."</a><br/>";
           echo "<p>(".$this->date.")</p></li>";

    }
   }
 }
public function show_post_boxes(){
    $pagination=new Pagination(1,2,0);
    $offset=$pagination->offset();
    $sql="SELECT id,naslov,content,date FROM posts ";
    $sql.="WHERE navigacija_id=4 ";
    $sql.="ORDER BY id DESC ";
    $sql.="LIMIT {$pagination->per_page} ";
    $sql.="OFFSET {$offset} ";

	
    if($sql==null){
        echo "There is no blogs created!";
    }
    else{
    
         foreach(self::$connect->query($sql) as $row){
    	    $this->id      =$row['id'];
    	    $this->date    =$row['date'];
    	    $this->content =$row['content'];
    	    $this->naslov  =$row['naslov'];
    	    $this->date    =$row['date'];
    	    $this->content =$row['content'];

    	     echo "<div class=\"blog_box\">";
    	     echo "<a href=\"index.php?page_id=4&post_id=".$this->id."\"><h2>".$this->naslov."</h2></a>";
    	     echo "<p id=\"small\">".$this->date."</p>";
    	     echo "<p>".$this->content."</p></div>";
    }
}
    
}
public function full_post($post_id){

	$sql="SELECT naslov,content,date FROM posts ";
	$sql.="WHERE id={$post_id}";

    foreach(self::$connect->query($sql) as $row){

     $this->rows[]=$row;
} 
	foreach($this->rows as $row){
		$this->naslov  =$row['naslov'];
        $this->date    =$row['date'];
        $this->content =$row['content'];

        echo "<h1 style=\"color:#2F4F4F;\">".$this->naslov."</h1>";
        echo "<p>".$this->date."</p>";
        echo "<p>".$this->content."</p>";
	}
   echo "<hr/>";

}
public function show_coloumns(){

    $sql="SELECT * FROM posts WHERE navigacija_id=1";
    $result=self::$connect->query($sql);
    $rows=array();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $rows[]=$row;
        $this->naslov=array_column($rows, 'naslov');
        $this->content=array_column($rows, 'content');
        $this->date=array_column($rows, 'date');
        $this->id=array_column($rows, 'id');
       }
    
}
  public function edit_columns($id,$naslov){
    if($naslov){
        $sql="UPDATE posts SET naslov= :naslov ";
        $sql.="WHERE navigacija_id=1 AND id= :id ";
        $stmt=self::$connect->prepare($sql);
        $stmt->bindParam(':naslov',$naslov);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();

    }
    else{

    $sql="UPDATE posts SET content= :content, date=NOW() ";
    $sql.="WHERE navigacija_id=1 AND id= :id ";
    $stmt=self::$connect->prepare($sql);
    $stmt->bindParam(':content',$this->content);
    $stmt->bindParam(':id',$id,PDO::PARAM_INT);
    $stmt->execute();
    } 
    
     
  }
  public function display_post_admin(){

    $sql="SELECT * FROM posts WHERE navigacija_id=4";
    echo "<table><tr>";
    echo "<th>Title</th>";
    echo "<th>Comets</th>";
    echo "<th>Posted</th>";
    echo "<th colspan=\"2\">Action</th></tr>";
    echo "<tr>";

    foreach(self::$connect->query($sql) as $row){
        
        
        $this->id=$row['id'];
        $posts_id=$this->id;
        $this->naslov=$row['naslov'];
        $this->date=$row['date'];
        echo "<td>".$this->naslov."</td>";
        echo "<td><a href=\"panel.php?id=posts&action=comments&post_id=".$this->id."\">".Comments::count_comments($posts_id)."</a></td>";
        echo "<td>".$this->date."</td>";
        echo "<td><a href=\"panel.php?id=posts&action=edit_post&post_id=".$this->id."\">";
        echo "<i class=\"fa fa-pencil\"> Edit</i></a></td>";
        echo "<td><a href=\"panel.php?id=posts&action=delete_post&post_id=".$this->id."\">";
        echo "<i class=\"fa fa-trash\"> Delete</i></a></td></tr>";

            
    }
    echo "</table>";
    if(empty($row)){
          echo "<p style=\"text-align:center;\">You didn`t create any blog yet!</p>";
        }
  }
  public function show_post_values($post_id){
    $sql="SELECT * FROM posts WHERE id={$post_id} ";
    foreach(self::$connect->query($sql) as $row){
        $this->pages_id=$row['navigacija_id'];
        $this->naslov=$row['naslov'];
        $this->content=$row['content'];
        $this->date=$row['date'];
    }
  }
  public function edit_post($post_id){
    $sql="UPDATE posts SET content='{$this->content}' WHERE id={$post_id} ";
    self::$connect->query($sql);
  }
  public function delete_post($post_id){
    $sql="DELETE FROM posts WHERE id={$post_id} ";
    self::$connect->query($sql);
  }
  public function create_post(){
    $sql="INSERT INTO posts(navigacija_id,naslov,content,date) VALUES ({$this->pages_id},'{$this->naslov}','{$this->content}',NOW())";
    self::$connect->query($sql);
  }
}

?>

