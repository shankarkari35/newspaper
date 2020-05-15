<?php 
include_once('config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('newspaper',array('cust_id'=>$_REQUEST['delId']));
	header('location: brows_cust.php?msg=rds');
	exit;
}
?>