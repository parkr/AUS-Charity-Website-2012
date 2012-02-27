<?php
	
class Page {
	
	public $displayField = 'name';
	public static $useTable = 'pages';
	public $db = null;
	private $data;
	
	function __construct($name){
		require_once("DB.class.php");
		// fetch event by ID.
		$this->db = new DB();
		$query = "SELECT * FROM ".Page::$useTable." WHERE name LIKE '$name'";
		$event = $this->db->execute($query);
		$this->data = $event[0];
	}
	
	public function __get($key){
		if(array_key_exists($key, $this->data)){
			return $this->data[$key];
		}else{
			trigger_error("Array key '$key' does not exist for Page.");
			return "Array key '$key' does not exists for Page.";
		}
	}
	
	public function __set($key, $value){
		$this->data[$key] = $value;
	}
	
	public function __toString(){
		return print_r($this, true);
	}
	
}
	
?>
