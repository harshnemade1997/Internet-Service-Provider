<?php 
//login page validation

function validate_login()
{
	$errors=array();
	
	if(empty($_POST['username']))
	{
		$errors['u'] = "Please enter username<br>";
	}
	elseif(!preg_match("#^^[a-z0-9_-]{3,15}$#",$_POST['username']))
	{	
		$errors['u'] = "Please enter valid username<br>";
	}
	if(empty($_POST['password']))
	{
		$errors['p'] = "Please enter Password<br>";
	}
	elseif(!preg_match("#^[-A-Za-z0-9']*$#",$_POST['password']))
		$errors['p'] = "Please enter valid Password<br>";
return $errors;
}

//add plan validation
function validate_plan()
{
	$errors=array();
	if(empty($_POST['pname']))
	{
		$errors['p']="Plan name can't be empty<br>";
	}
	elseif(!preg_match("#^^[A-Za-z0-9_-]{1,15}$#",$_POST['pname']))
	{	
		$errors['p'] = "Please enter valid plan name<br>";
	}
	
	if(empty($_POST['sprovider']))
	{
		$errors['s']="Service Provider  can't be empty<br>";
	}
	elseif(!preg_match("#^^[A-Zsa-z_-]{1,15}$#",$_POST['sprovider']))
	{	
		$errors['s'] = "Please enter valid service provider <br>";
	}
	if(empty($_POST['speedlimit']))
	{
		$errors['l']="speed limit can't be empty<br>";
	}
	elseif(!preg_match("#^^[a-z0-9_-]{3,15}$#",$_POST['speedlimit']))
	{	
		$errors['l'] = "Please enter valid speed limit<br>";
	}
	if(empty($_POST['cost']))
	{
		$errors['c']="cost  can't be empty<br>";
	}
	elseif(!preg_match("#^^[a-z0-9_-]{2,4}$#",$_POST['cost']))
	{	
		$errors['c'] = "Please enter valid cost<br>";
	}
	if(empty($_POST['duration']))
	{
		$errors['d']="duration can't be empty<br>";
	}
	elseif(!preg_match("#^^[a-z0-9_-]{1,6}$#",$_POST['duration']))
	{	
		$errors['d'] = "Please enter valid duration<br>";
	}
     return $errors;
}

//add employee validation
function validate_employee()
{
	$errors=array();
	if(empty($_POST['ename']))
	{
		$errors['n']="employee name can't be empty<br>";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['ename']))
	{	
		$errors['n'] = "Please enter valid name<br>";
	}
	
	if(empty($_POST['ecnt']))
	{
		$errors['c']="contact   can't be empty<br>";
	}
	elseif(!preg_match("#^[-0-9' ]{10,10}$#",$_POST['ecnt']))
	{
	$errors['c']="enter valid contact no<br>";
	}
	if(empty($_POST['eemail']))
	{
		$errors['e']="email-id can't be empty<br>";
	}
	elseif(!filter_var($_POST['eemail'],FILTER_VALIDATE_EMAIL))
	{
		$errors['e'] = "Please enter valid email address";
	}
	if(empty($_POST['region']))
	{
		$errors['r']="region  can't be empty<br>";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['region']))
	{	
		$errors['r'] = "Please enter valid name<br>";
	}
	
     return $errors;
}
//add customer validation
function validate_customer()
{
	$errors=array();
	if(empty($_POST['customername']))
 	{
 		$errors['n'] = "Name can't be empty<br>";
 	}
 	elseif(!preg_match("#^^[A-Za-z_-]{1,15}$#",$_POST['customername']))
	{	
		$errors['n'] = "Please enter valid  name<br>";
	}
 	if(empty($_POST['contact']))
	{
		$errors['c']="contact   can't be empty<br>";
	}
	elseif(!preg_match("#^^[0-9_-]{10,10}$#",$_POST['contact']))
	{	
		$errors['c'] = "Please enter valid contact<br>";
	}
 	if(empty($_POST['cemail']))
 {
 		$errors['e'] = "Please enter email address<br>";
  	}
  	elseif(!filter_var($_POST['cemail'],FILTER_VALIDATE_EMAIL))
  	{
  		$errors['e'] = "Please enter valid email address<br>";
  	}
	if(empty($_POST['age']))
	{
		$errors['a']="age can't be empty<br>";
	}
	elseif(!preg_match("#^^[0-9_-]{0,3}$#",$_POST['age']))
	{	
		$errors['a'] = "Please enter valid age<br>";
	}
	if(empty($_POST['gender']))
 	{
 		$errors['g']="please select gender.";
 	}
	if(empty($_POST['region']))
	{
		$errors['r']="region  can't be empty<br>";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['region']))
	{	
		$errors['r'] = "Please enter valid name<br>";
	}
	if(empty($_POST['plan']))
	{
		$errors['p']="plan can't be empty<br>";
	}
	if(empty($_POST['expirydate']))
	{
		$errors['ex']="expiry date can't be empty<br>";
	}
	
     return $errors;
}
function validate_complaint()
{
	$errors=array();
	if(empty($_POST['complaint_id']))
 	{
 		$errors['n'] = "Complaint_id can't be empty<br>";
	}
	if(empty($_POST['complaint1']))
 	{
 		$errors['m'] = "message can't be empty<br>";
	}
	if(empty($_POST['email']))
 	{
 		$errors['e'] = "Please enter email address<br>";
	}
	elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
  	{
		  $errors['e'] = "Please enter valid email address<br>";
	}
	if(empty($_POST['city']))
	{
		$errors['c'] = "Please select city name<br>";
   } 
   if(empty($_POST['problem1']))
	{
		$errors['p'] = "Please select problem <br>";
   } 
	return $errors;
}
function validate_admin()
{
	$errors=array();
	
	if(empty($_POST['eemail']))
	{
		$errors['e'] = "Please enter email<br>";
	}
	elseif(!preg_match("#^^[a-z0-9_-]{3,30}$#",$_POST['eemail']))
	{	
		$errors['e'] = "Please enter valid email<br>";
	}
	if(empty($_POST['pwd']))
	{
		$errors['p'] = "Please enter Password<br>";
	}
	elseif(!preg_match("#^^[A-Za-z0-9']*$#",$_POST['pwd']))
	{
		$errors['p'] = "Please enter valid Password<br>";
	}	
		if(empty($_POST['ename']))
 	{
 		$errors['n'] = "Name can't be empty<br>";
 	}
 	elseif(!preg_match("#^^[A-Za-z_-]{1,15}$#",$_POST['ename']))
	{	
		$errors['n'] = "Please enter valid  name<br>";
	}
return $errors;
}
