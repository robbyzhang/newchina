<?php

define("SQL_SELECT_ACCOUNT", "select * from account;");
define("MYSQL_HOST", "localhost");

class RbCache {
	protected $_cache;
	protected $_dbcon;

	public function __construct($host, $port) {
		$this -> _cache = memcache_pconnect($host, $port);
	}

	private function connectDb() {
		$this -> _dbcon = mysql_pconnect(MYSQL_HOST, "root", "robby");
		mysql_select_db("newchina", $this -> _dbcon);
	}

	public function getsql($sql) {
		//echo md5($sql).'\r\n';
		$cache = $this -> _cache -> get(md5($sql));
		if ($cache == "") {
            //echo "get from db\r\n";		
			$this -> connectDb();
			$r = mysql_query($sql);
			if (($rows = mysql_num_rows($r)) == 0)
			{
				echo "table is empty!\r\n";
				return "";
			}

			for ($i = 0; $i < $rows; $i++) {
				$fields = mysql_num_fields($r);
				$row = mysql_fetch_array($r);
				for ($j = 0; $j < $fields; $j++) {
					if ($i == 0) {
						$columns[$j] = mysql_field_name($r, $j);
					}
					$cache[$i][$columns[$j]] = $row[$j];
				}
			}
			$this -> _cache -> set(md5($sql), $cache, 0, 30);
		}
		else {
			echo "cache found\r\n";
		}
		return $cache;
	}

	public function execsql($sql) {
		$this -> connectDb();
		return mysql_query($sql);
	}
	
	public function delsql($sql) {
		$this -> _cache -> delete(md5($sql));
	}

}

global $gcache;
$gcache = new RbCache("localhost", 11211);
  
  
?>