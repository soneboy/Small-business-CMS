
<?php
class Pagination extends Database{

	public $current_page;
	public $per_page;
	public $total_count;

	public function __construct($current_page,$per_page,$total_count){
		     
		      $this->current_page=(int)$per_page;
		      $this->per_page=(int)$per_page;
		      $this->total_count=(int)$total_count;


		}
	public function offset(){
		return ($this->current_page-1)*$this->per_page;

	}

	}
?>