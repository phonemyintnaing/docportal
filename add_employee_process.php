<?php
define('ACCESS', TRUE);
include('include/connect.inc.php');
session_start();
if(!isset($_SESSION['role']) && $_SESSION['role'] != 2){
	header('Location: index.php');	
}

if(isset($_POST['submit'])){
$users = $_SESSION['id'];
$type_of_disease = mysql_real_escape_string($_POST['type_of_disease']);
$blood_pressure = mysql_real_escape_string($_POST['blood_pressure']);
$sugar_level = mysql_real_escape_string($_POST['sugar_level']);
$height = mysql_real_escape_string($_POST['height']);
$weight = mysql_real_escape_string($_POST['weight']);

}

if(empty($type_of_disease) || $type_of_disease == ''){
	$type_of_disease = "NONE";
}

if(!(int)$blood_pressure || !(int)$sugar_level || !(int)$height || !(int)$weight){

header('Location: employee.php?update=error');
exit();
}

$query_insert_users_info = "INSERT INTO users_info (type_of_disease, blood_pressure, sugar_level, height, weight, status, users) 
						  VALUES ('$type_of_disease', '$blood_pressure', '$sugar_level', '$height', '$weight', 1, '$users')";
		$result_insert_users_info =mysql_query($query_insert_users_info);
        if ($result_insert_users_info) {				
            $flag = 1;
			//unset($_SESSION['id']);
			header('Location: employee.php?add=success');
			exit();
        } 


?>

