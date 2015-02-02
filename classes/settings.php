<?php

class Settings extends Database{
	public $id;
	public $name;
	public $value;


	public function show_services(){

		$sql="SELECT value FROM settings ";
		$sql.="WHERE name='{$this->name}'";

		foreach(self::$connect->query($sql) as $row){
			$this->value=$row['value'];
			echo $this->value;
		}
	}
	public function change_service(){

	    $sql="UPDATE settings SET value='{$this->value}'";
	    $sql.=" WHERE name='{$this->name}' ";
		self::$connect->query($sql);
	}
    public function show_title(){

	    $sql="SELECT value FROM settings ";
	    $sql.="WHERE name='title'";
	    foreach(self::$connect->query($sql) as $row){
	    	$this->value=$row['value'];
	    	echo $this->value;
	    }
}
   public function change_title(){
   	$sql="UPDATE settings SET value='{$this->value}' ";
   	$sql.="WHERE name='title' ";
   	self::$connect->query($sql);
   	if($sql){
   		echo "The site name sucessfully changed!";
   	}
   }
   public function show_social(){
   	$sql="SELECT value FROM settings ";
   	$sql.="WHERE name='{$this->name}'";
   	foreach(self::$connect->query($sql) as $row){
   		$this->value=$row['value'];
   		echo $this->value;
   	}
   }
   public function change_social(){
   	$sql="UPDATE settings SET ";
   	$sql.="value='{$this->value}' WHERE name='{$this->name}'";
   	self::$connect->query($sql);
   }
}



















?>