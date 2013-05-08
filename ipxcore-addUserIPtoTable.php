<?php

function ipxcoreaddIPToList($vars) {

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
