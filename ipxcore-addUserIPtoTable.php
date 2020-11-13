<?php

//By Damian Harouff - May 2013
//Released under WTFPL - http://www.wtfpl.net/

function ipxcoreaddIPToList($vars) {
	
	if ($_SESSION['adminid']) {return;}

	$userid = $vars['userid'];
	$ipaddress =  $_SERVER['REMOTE_ADDR'];
	$desc = "Client area login from: " . gethostbyaddr($ipaddress);
	$user = "Client";
	$nowTS = date("Y-m-d H:i:s");

	$dataadd = array("date" => $nowTS, "userid"=>$userid, "ipaddr"=>$ipaddress, "description"=>$desc, "user"=>$user);
	insert_query("tblactivitylog", $dataadd);

}

add_hook('ClientLogin', 1, 'ipxcoreaddIPToList');

?>
