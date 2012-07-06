<?php
require_once("rbcache.php");

function nc_verify_account($username, $password) {
	global $gcache;
	$arr = $gcache -> getsql(SQL_SELECT_ACCOUNT);

    if($arr=="")
	    return false;
	$rows = count($arr);
	
	//echo "row num=".$rows."\r\n";
	for ($i = 0; $i < $rows; $i++) {
		//echo $arr[$i]."\r\n";
		if($username == $arr[$i]['username'] && $password == $arr[$i]['password'])
			return true;
	}

	return false;
}


function nc_create_account($username, $password) {
	global $gcache;
    //echo "insert\r\n";
	
	$s = "insert into account(username, password, create_time) values 
		('$username', '$password', '')";
	if (!$gcache -> execsql($s))
		return false;
	$gcache -> delsql(SQL_SELECT_ACCOUNT);
	return true;
}

/*
if(nc_create_account("robby", "1234"))
   echo "create account success\r\n";
else {
	echo "create account failed\r\n";
}
 */
 


if(nc_verify_account("robby", "1234"))
	echo "verfiy robby success\r\n";
else
  
	echo "verify robby failed\r\n";
  
  
?>