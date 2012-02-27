<?php
	
class Event {
	
	public $displayField = 'name';
	public static $useTable = 'events';
	public static $joinTable = 'events_sponsors';
	public $db = null;
	private $data;
	
	function __construct($id){
		require_once("DB.class.php");
		// fetch event by ID.
		$this->db = new DB();
		$query = "SELECT * FROM ".Event::$useTable." WHERE id = ".$id;
		$event = $this->db->execute($query);
		$this->data = $event[0];
	}
	
	public function __get($key){
		if(array_key_exists($key, $this->data)){
			return $this->data[$key];
		}else{
			trigger_error("Array key '$key' does not exist for Event.");
			return "Array key '$key' does not exists for Event.";
		}
	}
	
	public function __set($key, $value){
		$this->data[$key] = $value;
	}
	
	public function __toString(){
		return print_r($this, true);
	}
	
	public static function getAll($order = "datetime ASC"){
		// returns array of Event objects.
		$db = new DB();
		$getManyQuery = "SELECT id FROM ".Event::$useTable." ORDER BY ".$order;
		$objs = $db->execute($getManyQuery);
		$ret = array();
		if($objs){
			foreach($objs as $obj){
				$ret[] = new Event($obj['id']);
			}
		}
		return $ret;
	}
	
}
	
?>