<?php 
	//Server Connection
	
	$con = mysqli_connect('localhost','root','') or die('Server Connection Not Established');
	
	//Database selection
	
	mysqli_select_db($con, 'crm') or die('Database Not Found.');
	
	//Session name
	
	session_name('crm');
	
	//Session Start 
	
	session_start();
	//validation file
	require_once("validation.php");
	
?>