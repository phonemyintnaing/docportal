<?php
define('ACCESS', TRUE);
include('include/connect.inc.php');
session_start();
if(!isset($_SESSION['role']) && $_SESSION['role'] != 2){
	header('Location: index.php');	
}

$userid = $_SESSION['id'];
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

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <title>EHMS | Home page</title>
    <meta name="description" content="EHMS">
    <meta name="viewport" content="width=device-width">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fastLiveFilter.js"></script>
	<script type="text/javascript" src="js/jquery-ajax-add_new_user.js"></script>
	<script type="text/javascript" src="js/update_status.js"></script>
   
  
</head>
<body class="theme">   
    <!-- Page Header -->
    <header id="masthead">       
        <nav class="navbar navbar-fixed-top">		
			 <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <h1>
                        <a class="brand" href="index.php">
                            EHMS
                            <i class="icon-user-md"></i>
                        </a>
                            
                    </h1>
            
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li style="padding-top:30px; font-weight: bold; color: #555555; text-transform: uppercase;">
                               <span > Welcome, <?php echo $_SESSION['fname']; ?></span>
                            </li>
                            &nbsp;
                            <a href="#" class="logout btn btn-danger pull-right" >Logout</a>
                        </ul>
                    </div>
                </div>
            </div>
           
        </nav>
    </header>

    
    <!-- Main Content -->
    <div id="content" role="main">
	  <section style="padding:20px; margin:0;">
            <div class="container" align="center">
                   <h2 align="center">Employee Dashboard</h2>
					<br />
            	<div class="btn-toolbar" style="margin: 0;">
                
                <div class="btn-group" align="left">
                <button class="btn btn-white dropdown-toggle" data-toggle="dropdown">Manage Your Profile <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a class="view_info" href="#">View Your Info</a></li>
                  <li><a class="view_medical" href="#">View Medical History</a></li>   
                </ul>
              </div>
			  
              </div>
			  
	<div align="left" class="container">
	<p>&nbsp;</p>
	
	<?php
		if(isset($_GET['update']) && $_GET['update'] == "error"){
		echo'<div align="center" style="width:94%; margin: 0 auto; padding-top:10px; " id="message_update">
			<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>ERROR UPDATE USER ACCOUNT!</h4>
			User account unable to updated. Invalid user input! 
			<p><a href="#" name="Back" value="Back"
class="try_again btn btn-primary" >Try Again?</a></p>

			</div>		
		</div>'; 
		}
		?>
	
	<?php
		if(isset($_GET['update']) && $_GET['update'] == "success"){
		echo'<div align="center" style="width:94%; margin: 0 auto; padding-top:10px; " id="message_update">
			<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>ACCOUNT UPDATED!</h4>
			User account has been successfully updated.
			</div>		
		</div>'; 
		}
		?>
		
				<?php
		if(isset($_GET['add']) && $_GET['add'] == "success"){
		echo'<div align="center" style="width:94%; margin: 0 auto; padding-top:10px; " id="message_update">
			<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>ACCOUNT ADDED!</h4>
			User account has been successfully added.
			</div>		
		</div>'; 
		}
		?>
	 <div class="page-header" style="display:none;" id="viewInfo">	
	
	<?php
	echo "
	    <div  class='list-widget' style='margin:20px'>
				<a href='#'><img src='img/user.jpg' class='avatar' style='float:left' height='42' width='42'></a>    
				<div class='list-head'>
					<h3><strong>{$fname} {$lname}</strong></h3>
					<div class='list-meta'></div> 
					<img class='loading$userid list-follow' style='padding:5px 90px 20px 0; display:none; ' src='img/preload.gif' width='24' height='24' />
				
					
				</div>  
				<ul>  
					<li>
						<div>
							<strong>Email:</strong> {$email} 
						</div>
					</li>
					
					<li>
						<div>
							<strong>Gender:</strong> {$gender} 
						</div>
					</li>
					
					<li>
						<div>
							<strong>Blood type:</strong> {$blood} 
						</div>
					</li>  
				</ul>				
			</div>				
				";
				?>
				
				
				</div>

   
    <div align="left" id="viewMedical" style="display:none; margin:30px 0 0" class="page" >
	<?php
	if(isset($userinfo)){
	
	echo '<div style="margin:0px" id="update" >
	     <h3>No Medical History yet. Please fill your Details!</h3>
		<p style="color:#FF0000">( * ) Indicate, enter number only.</p>
		<form  id="updateUserStatus" name="updateUserStatus" action="add_employee_process.php" method="post">  
		<div class="showEdit" id="showEdit"  style="padding:30px;">
		<label for="type_of_disease">Type of Disease:</label>
		<input id ="type_of_disease" name="type_of_disease" type="text" style="margin-bottom:20px;"/><span style="font-size:12px;"> ( Leave blank if you don\'t have any. )</span>
		<label for="blood_presure">Blood Presure:</label>
		<input id ="blood_pressure" name="blood_pressure" type="text" style="color:#454545; margin-bottom:20px;"/><span style="color:#FF0000"> *</span>
		<label for="sugar_level">Sugar Level:</label>
		<input id ="sugar_level" name="sugar_level" type="text" style="margin-bottom:20px;"/><span style="color:#FF0000"> *</span>
		<label for="height">Height:</label>
		<input id ="height" name="height" type="text" style="margin-bottom:20px;"/><span style="color:#FF0000"> *</span>
		<label for="weight">Weight:</label>
		<input id ="weight" name="weight" type="text" style="margin-bottom:20px;"/><span style="color:#FF0000"> *</span>
		<p style="padding:10px 0 0 0;">
		<input id="submit" name="submit" type="submit" class="btn btn-danger submit" value="Update"/>									
		</p>
		</div>
	</form>
	</div>';
	} else {
		echo "<h2>Medical History</h2><hr>";
		echo "<p><strong>Type of Disease:</strong> $type_of_disease_p</p>";
		echo "<p><strong>Blood Presure:</strong> $blood_pressure_p Mm</p>";
		echo "<p><strong>Sugar Level:</strong> $sugar_level_p  mm</p>";
		echo "<p><strong>Height:</strong>  $height_p  Cm</p>";
		echo "<p><strong>Weight:</strong>  $weight_p  Kg</p>";
		
		echo "<a class='btn btn-primary' href='user_print_details.php?id=$userid' >Print Record</a>";
	}
	?>

	</div>
			                
            </div>
          
        </section>

    </div>
	
	<div id="printbutton" style="display:none">
	
	Blodd Presure
<input type="button" value="Print Record" class="print btn btn-primary"/>
	<script type="text/javascript">
        $(document).ready(function() {
           $(".print").click(function() { 
				$(this).fadeOut("fast");
				setTimeout(function() {
    				 window.print();
				}, 2000);
			});						
        });
	</script>
	
	</div>
    
	<p>&nbsp;</p>
    <!-- Page Footer -->
    <footer id="footer" role="contentinfo" class="section">
        <div class="container">
            <div class="row-fluid">
                <div class="span4">
                    <h3>Contact us</h3>
                   
                    <ul class="icons">
                        <li>
                            <i class="icon-envelope"></i><a href="mailto:zayarsoethein.k@gmail.com">EHMS</a>
                        </li>
                        <li>
                            <i class="icon-twitter"></i><a href="http://www.twitter.com/ehms" target="_blank">@zayar</a>
                        </li>
                        <li>
                            <i class="icon-facebook"></i><a href="http://www.facebook.com" target="_blank">zayar &amp; phyo</a>
                        </li>
                        <li>
                            <i class="icon-phone"></i>+60176259769
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <h3>Recent news</h3>
                    <ul class="icons">
                        <li><p>
                                <i class="icon-twitter"></i>How to Know If You Have High Cholesterol
                                <small>
                                    by <a href="#">EHMS</a>
                                </small>
                            </p>
                        </li>
                        <li><p>
                                <i class="icon-twitter"></i>A Good Workout Can Work the Kinks Out
                                <small>
                                    by <a href="#">EHMS</a>
                                </small>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <h3>Latest posts</h3>
                    <ul class="unstyled">
                        <li>
                            <h4><a href="#">The greatest wealth is health</a></h4>
                            <p><small>April 12, 2013</small></p>
                        </li>
                        <li>
                            <h4><a href="#">Physical fitness</a></h4>
                            <p><small>April 20, 2013</small></p>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <p>&nbsp;</p>
            	<div class="row-fluid pull-center">
                    <div class="span12">
                        &copy; 2013 - EHMS by <a href="mailto:zayarsoethein.k@gmail.com">Zayar &amp; Phyo</a>
                    </div>
        	 	</div>           
        </div>
        
           
    </footer>
   
    <!-- JavaScript -->

    <!-- Load boostrap and custom scripts -->
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <!-- end scripts -->
	<script type="text/javascript">
        $(document).ready(function() {
           $(".logout").click(function() { 
				top.location.href='include/logout.php';
			});
			
			$(".view_info").click(function() { 				
				$("#viewMedical, #message_update").slideUp("slow");
				$("#viewInfo").slideDown("slow");
			});
			
			$(".view_medical").click(function() { 
				$("#viewInfo, #message_update").slideUp("slow");
				$("#viewMedical").slideDown("slow");
			});
			
			$(".try_again").click(function() { 				
				$("#viewMedical, #message_update").slideUp("slow");
				$("#viewMedical").slideDown("slow");
			});
			
					
        });
	</script>

</body></html>