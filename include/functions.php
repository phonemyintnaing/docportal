<?php
if(!defined('ACCESS')) { // Preventing user from executing the file
	header('Location: ../index.php');
	exit();
}

function msg($status,$txt){
if(isset($_POST['fname'])){
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}else{
		header('Location: index.php');
		exit();
	}
}

function msgLogin($status,$txt){
if(isset($_POST['login_email'])){
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}else{
		header('Location: index.php');
		exit();
	}
}

function msgFp($status,$txt){
if(isset($_POST['emailFp'])){
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}else{
		header('Location: index.php');
		exit();
	}
}

function msgFt($status,$txt){
if(isset($_POST['icNo'])){
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}else{
		header('Location: index.php');
		exit();
	}
}

function msgOj($status,$txt){
if(isset($_POST['date'])){
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}else{
		header('Location: index.php');
		exit();
	}
}

function msgPj($status,$txt){
if(isset($_POST['day'])){
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}else{
		header('Location: index.php');
		exit();
	}
}


function isDigits($element) {
  return !preg_match ("/[^0-9]/", $element);
}


?>