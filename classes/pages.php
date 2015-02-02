
<?php
 class Pages extends Database{

    public $id;
 	public $naziv;
 	public $content;
 	public $date;
    
 	public function navigation(){

	$sql="SELECT id,naziv FROM navigacija";
    
	foreach(self::$connect->query($sql) as $row){
        $this->id=$row['id'];
		$this->naziv=$row['naziv'];
		echo "<ul><li><a href=\"index.php?page_id=".$this->id."\">".$this->naziv."</a></ul></li>";
		
	}
}

private static function count_pages(){

    // Counting pages in navigation except Homepage and Blog pages,because they are fixed.
	$sql="SELECT COUNT(*) FROM navigacija WHERE id!=1 AND id!=4";
	$result=self::$connect->query($sql);
	$row=$result->fetch(PDO::FETCH_NUM);
	return $row[0];
	
}
public function show_pages_title(){

	if(self::count_pages() == 0){
		echo "<td> You didn`t create additional pages!</td>";
	}
	else{
		$sql="SELECT * FROM navigacija WHERE id!=1 AND id !=4";
		$result=self::$connect->query($sql);
		while($row=$result->fetch(PDO::FETCH_ASSOC)){
			$this->id=$row['id'];
			echo "<tr><td>".$row['naziv']."</td>";
			echo "<td><a href=\"panel.php?id=pages&edit_page=".$this->id."&action=title\"><i class=\"fa fa-pencil\" id=\"edit\"></i> Edit Title</a></td>";
			echo "<td><a href=\"panel.php?id=pages&edit_page=".$this->id."&action=content\"><i class=\"fa fa-pencil\"></i> Edit Content</a></td>";
			echo "<td><a id=\"delete\" href=\"panel.php?id=pages&delete_page=".$this->id."\"><i class=\"fa fa-trash\"></i> Delete</a></td></tr>";

		}
	}
}
public function find_page($navigacija_id){

	$sql="SELECT * FROM pages WHERE navigacija_id={$navigacija_id}";
	foreach(self::$connect->query($sql) as $row){
	      $this->id=$row['id'];
	      $this->content=$row['content'];
	      $this->date=$row['date'];


	}

}
public function edit_page($navigacija_id){

	$sql="UPDATE pages SET content='{$this->content}',date=NOW() ";
	$sql.="WHERE navigacija_id={$navigacija_id}";
	self::$connect->query($sql);
}
public  function find_page_title($navigacija_id){

	$sql="SELECT naziv FROM navigacija WHERE id={$navigacija_id} ";
	$result=self::$connect->query($sql);
	$row=$result->fetch(PDO::FETCH_ASSOC);
		$this->naziv=$row['naziv'];
		return $this->naziv;
	
}
public function edit_page_title($navigacija_id){

	$sql="UPDATE navigacija SET naziv='{$this->naziv}' WHERE id={$navigacija_id} ";
	self::$connect->query($sql);
}
public function delete_page_title($delete_id){

	$sql="DELETE FROM navigacija WHERE id={$delete_id} ";
	self::$connect->query($sql);
	return true;
	
	}
public function delete_page_content($delete_id){

	if($this->delete_page_title($delete_id)){
		$sql="DELETE FROM pages WHERE navigacija_id={$delete_id} ";
		self::$connect->query($sql);

	}
}

public function create_page_title($naziv){
	if(self::count_pages() >= 4){
		echo "You cannot create more than 4 additional pages!";
	}
	else{
	$sql="INSERT INTO navigacija(naziv) VALUES ('{$naziv}') ";
	self::$connect->query($sql);
	header('Location: panel.php?id=pages');
    }
  }
 public function create_page_content($navigacija_id){

 	$sql="INSERT INTO pages(navigacija_id,content,date) VALUES ({$navigacija_id},'{$this->content}',NOW()) ";
 	self::$connect->query($sql);
 }
}






?>
