<?php 
include_once('config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('paperinfo',array('p_id'=>$_REQUEST['delId']));
	header('location: brows_userspaper.php?msg=rds');
	exit;
}
?>