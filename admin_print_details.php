<?php
define('ACCESS', TRUE);
include('include/connect.inc.php');
session_start();
if(!isset($_SESSION['id']) && $_SESSION['role'] != 1 ){
	header('Location: index.php');	
} 

$userid = $_GET['userid'];
$query = "SELECT * FROM users_info WHERE users = '$userid'";
$result = mysql_query($query);
if(mysql_num_rows($result) == 1) {
	while($row = mysql_fetch_assoc($result)){
		$type_of_disease_p = $row['type_of_disease'];
		$blood_pressure_p = $row['blood_pressure'];
		$sugar_level_p = $row['sugar_level'];
		$height_p = $row['height'];
		$weight_p = $row['weight'];
	}
} else {
	$userinfo=true;
}

$query_email = "SELECT * FROM users WHERE id = '$userid'";
$result_email = mysql_query($query_email);
if(mysql_num_rows($result_email) == 1) {
	while($row = mysql_fetch_assoc($result_email)){
		$fname = $row['fname'];
		$lname = $row['lname'];
		$gender = $row['gender'];
		if($gender == 1){
			$gender = "Male";
		} else if ($gender == 2){
			$gender = "Female";
		}
		$blood = $row['type_of_blood'];
		$email = $row['email'];
		
	}
} else {
	header('Location: index.php');	
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="js/jquery.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/fonts.css">	
    
<title>Print Information</title>
<style>
#print-wrapper{
margin: auto;
width: 800px;
padding-top:0.2em;	
	
}
</style>

</head>

<body>

<div id="print-wrapper">

<h1>User Details</h1>
<hr>
<table border="0">
  <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Name:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$fname $lname"; ?></td>
  </tr>
  
  <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Gender:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$gender"; ?></td>
  </tr>
  
    <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Type of Blood:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$blood"; ?></td>
  </tr>
  
   <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Type of Disease:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$type_of_disease_p"; ?></td>
  </tr>
  
    <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Blood Pressure:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$blood_pressure_p"; ?> Mm</td>
  </tr>
  
      <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Sugar Level:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$sugar_level_p"; ?> mm</td>
  </tr>
  
      <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Height:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$height_p"; ?> Cm</td>
  </tr>
  
      <tr>
    <td width="150px" style="padding-bottom:20px;"><strong>Weight:</strong></td>
    <td>&nbsp;</td>
    <td width="150px" style="padding-bottom:20px;"><?php echo "$weight_p"; ?> Kg</td>
  </tr>
 
</table>

<a class="print btn btn-success btn-large" href="#">Print</a> &nbsp; 
<a class="cancel btn btn-danger btn-large" href="administrator.php">Cancel</a>

<div id="back" style="display:none">
	<a class="btn btn-large btn-info" href="administrator.php">BACK TO DASHBOARD</a>
</div>

</div>

	<script type="text/javascript">
        $(document).ready(function() {
           $(".print").click(function() { 
				$(this).slideUp("fast");
				$(".cancel").slideUp("fast");
				setTimeout(function() {
    				 window.print();
					 $("#back").slideDown("fast");
				}, 2000);				
			
			});			
        });
	</script>
</body>
</html>