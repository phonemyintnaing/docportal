<?php
define('ACCESS', TRUE);

session_start();
include('include/connect.inc.php');
require_once('include/functions.php');

// we check if everything is filled in
if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])){
	die(msg(0,"All the fields are required"));
} else{
	$fname = mysql_real_escape_string(ucwords($_POST['fname'])); // ucwords() --> Uppercase the first character of each word in a string
	$lname = mysql_real_escape_string(ucwords($_POST['lname']));
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string(sha1($_POST['password']));
	$confirm_password = mysql_real_escape_string($_POST['confirm_password']);
}	

if(strlen($_POST['password']) < 8){
	die(msg(0,"Password must be at least 8 characters length"));
}

// is the sex selected?
if(!(int)$_POST['sex-select']){
	die(msg(0,"You have to select your gender"));
} else{
	$gender = mysql_real_escape_string($_POST['sex-select']);	
}

if(!(int)$_POST['blood-type-select']){
	die(msg(0,"You have to select your blood type"));
} else{
	$blood = mysql_real_escape_string($_POST['blood-type-select']);	
	if($blood == 1) {
		$blood = "A";
	}else if($blood == 2) {
		$bllod = "B";
	} else if($blood == 3) {
		$blood = "AB";
	} else if($blood == 4) {
		$blood = "O";
	} else {
		die(msg(0,"Invalid blood type"));
	}
}

// is the email valid?
if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email']))){
	die(msg(0,"You haven't provided a valid email"));
}	

// is the password match?
if($_POST['password'] != $_POST['confirm_password']){
	die(msg(0,"Your password is not match"));
}

$query_verify_email = "SELECT * FROM users  WHERE email ='$email'";
        $result_verify_email = mysql_query($query_verify_email);		
		
		//if the query failed, similar to if($result_verify_email==false)
        if (!$result_verify_email) {
            echo ' Database Error Occured ';
        }
		
        if (mysql_num_rows($result_verify_email) == 0) {
		 // Create a unique  activation code:
            $token = md5(uniqid(rand(), true));
            $query_insert_user = "INSERT INTO users (fname, lname, gender, type_of_blood, email, password, status, role, token) 
								  VALUES ('$fname', '$lname', '$gender', '$blood', '$email', '$password', 1, 2, '$token')";
            $result_insert_user = mysql_query($query_insert_user);
            if (!$result_insert_user) {
                die(msg(0,"You could not be registered due to a system error. We apologize for any inconvenience."));
            }

            if (mysql_affected_rows() == 1) { //If the Insert Query was successfull.
					
					/* send activation email
					$to = $email;
					$subject = "Activate your account!";
					//$headers = "From: noreply@suretarget.com";
					
					$body = "
					
					Hello $fname, \n\n
					
					You need to activate your account with the link below:
					http://www.suretarget.com/wms/activate.php?id=$email&code=$token \n\n
					
					Thank you. EHMS management team.
					
					";
					
					//function to send email
					mail($to, $subject, $body, $headers);
					*/
					
				echo(msg(1,'Add new user successfully, Click here to add user DETAILS'));
			}
		} else { // The email address is not available.
				die(msg(0,"Your email have been registered!"));
		}
?>
