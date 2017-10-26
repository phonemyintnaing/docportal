<?php
define('ACCESS', TRUE);

session_start();
include('include/connect.inc.php');
require_once('include/functions.php');

if(empty($_POST['login_email'])){
	die(msgLogin(0,"Enter your email address."));
} else{
	$email = mysql_real_escape_string($_POST['login_email']);
}

// is the email valid?
if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['login_email']))){
	die(msgLogin(0,"You haven't provided a valid email"));
}

if(empty($_POST['login_password'])){
	die(msgLogin(0,"Enter your password."));
} else{
	$password = mysql_real_escape_string(sha1($_POST['login_password']));	
}	
		
$query = "SELECT * FROM users WHERE email ='$email' AND password = '$password'";
$result = mysql_query($query);
    if (!$result) {
        echo 'Database Error Occured ';
    }
	if (mysql_num_rows($result) == 1) {
	
		while($row = mysql_fetch_assoc($result)){
		    if($row['status'] == 0){
				die(msgLogin(0,"You haven't activate your email yet."));
			} else if($row['role'] == 1){	
				$_SESSION['id'] = $row['id'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['email'] = $row['email'];	
				$_SESSION['role'] = $row['role'];				
				echo msgLogin(1,"administrator.php");
				
			} else if($row['role'] == 2){	
				$_SESSION['id'] = $row['id'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['email'] = $row['email'];	
				$_SESSION['role'] = $row['role'];
				echo msgLogin(1,"doctor.php");
			} else if($row['role'] == 3){	
				$_SESSION['id'] = $row['id'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['email'] = $row['email'];	
				$_SESSION['role'] = $row['role'];
				echo msgLogin(1,"employee.php");
			}
		}
    }else{
		die(msgLogin(0,"Incorrect email or password. Try again!"));
	}

?>
