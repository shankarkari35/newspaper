<?php 
include_once('config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('lane',array('lno'=>$_REQUEST['delId']));
	header('location: brows_lane.php?msg=rds');
	exit;
}
?>