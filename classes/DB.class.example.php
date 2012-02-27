<?php
	
class DB {
	
	public $defaults = null;
	
	function __construct($host = null, $username = null, $password = null, $database = null){
		switch($_SERVER['HTTP_HOST']){
			default:
				$this->defaults = array(
					'host' => 'localhost',
					'database' => 'database',
					'username' => 'root',
					'password' => ''
				);
				break;
				
		}
		
		if($host){ $this->defaults['host'] = $host; }
		if($username){ $this->defaults['username'] = $username; }
		if($password){ $this->defaults['password'] = $password; }
		if($database){ $this->defaults['database'] = $database; }
	}
	
	public function execute($query){
		
		mysql_connect($this->defaults['host'], $this->defaults['username'], $this->defaults['password']);
		mysql_select_db($this->defaults['database']);
		$result = mysql_query($query) or die(mysql_error());
		
		$return = array();
		if($result && is_resource($result) && mysql_num_rows($result) > 0){
			while ($row = mysql_fetch_assoc($result)) {
				$return[] = $row;
			}
			return $return;
		}else{
			//trigger_error("No results from query '$query'.");
			return null;
		}
	}
	
}