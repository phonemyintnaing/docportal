<?php
define('ACCESS', TRUE);
include('include/connect.inc.php');
session_start();
if(!isset($_SESSION['role']) && $_SESSION['role'] != 1){
	header('Location: index.php');	
}

if(!isset($_GET['userid'])){
header('Location: index.php');	
exit();
}

$gp = $_SESSION['id'];
$userid=$_GET['userid'];
$_SESSION['updateuser'] = $userid;
$query ="SELECT * FROM patient_info WHERE patients = '$userid'";
$result = mysql_query($query);
if(mysql_num_rows($result) == 1) {
	while($row = mysql_fetch_assoc($result)){
		$blood_pressure_p = $row['blood_pressure'];
		$sugar_level_p = $row['sugar_level'];
		$height_p = $row['height'];
		$weight_p = $row['weight'];
	}
} else {
	header('Location: index.php');	
	exit();
}

?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <title>Mr. GP | Home page</title>
    <meta name="description" content="Mr. GP">
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
                        <a class="brand" href="doctor.php">
                            Mr. GP
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
                   <h2 align="center">Doctor Dashboard</h2>
					<br />
            	<div class="btn-toolbar" style="margin: 0;">
                
                <div class="btn-group" align="left">
                <button class="btn btn-white dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a class="listusers" href="#">List Patients</a></li>
                  <li><a class="addnewusers" href="#">Add New Patients</a></li>   
				  	 <li><a class="showpercentage" href="#">Statistic of Disease</a></li>
                </ul>
              </div>
				              
              </div>
			  
	<div align="left" class="container">
	
	<p>&nbsp;</p>
	

	
	<div style="margin:20px" id="update" class="page">
	
	<?php
	if(isset($_GET)){
		echo "
		<form  id='updateUserStatus' name='updateUserStatus' action='update_patient_process.php' method='post'>  
		<div class='showEdit' id='showEdit'  padding:30px;'>	
		<label for='blood_presure'>Blood Presure:</label>
		<input id ='blood_pressure' name='blood_pressure' type='text' value='$blood_pressure_p' style='display:block; margin-bottom:20px;'/>
		<label for='sugar_level'>Sugar Level:</label>
		<input id ='sugar_level' name='sugar_level' type='text' value='$sugar_level_p' style='display:block; margin-bottom:20px;'/>
		<label for='height'>Height:</label>
		<input id ='height' name='height' type='text' value='$height_p' style='display:block; margin-bottom:20px;'/>
		<label for='weight'>Weight:</label>
		<input id ='weight' name='weight' type='text' value='$weight_p' style='display:block; margin-bottom:20px;'/>
		<p style='padding:10px 0 0 0;'>
		<input id='submit' name='submit' type='submit' class='btn btn-danger submit' value='Update'/>									
		</p>
		</div>
	</form>";		
	}
	
	
	?>
	
	
	
	
	</div>
			  
    <div class="page-header" style="display:none;" id="showListUsers">				
					<div align="center">
	<p>&nbsp;</p>
	<form class="form-search">	
    <input class="span12" id="search_input_users"  placeholder="Type to filter..." type="text" style="marging:5px 10px; padding:5px 10px; height:24px; width:88%">
    <!--<button class="btn btn-green" type="button">Go!</button>-->
		</form>
	</div>
	
	<h4 style="padding-left:60px;">Showing <span id="num_results_users"></span> users:</h4> 
		<div align="center" style="width:94%; margin: 0 auto; padding-top:10px; display:none; " id="message_delete">
			<div class="alert alert-error">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>ACCOUNT DELETED!</h4>
			User account has been successfully deleted.
			</div>		
		</div> 			
	<form  id="updateStatus" name="updateStatus" action="update_patient.php" method="post">     
	<?php
	//$query_users = "SELECT * FROM users, users_info WHERE users.id = users_info.users AND users.role = 2";
	$query_users = "SELECT patients.*, patient_info.* FROM patients inner join patient_info 
					ON patients.id = patient_info.patients where patients.role = 3 and  patients.gp = $gp";
			//	echo $query_users;
		$result_users = mysql_query($query_users);
		if ($result_users) {
		$count = 0;
		echo '<div id="search_users">';
			while($row = mysql_fetch_assoc($result_users)) {
				
				$fname_p = $row['fname'];
				$lname_p = $row['lname'];
				$email_p = $row['email'];
				$gender_p = $row['gender'];
				$blood_p = $row['type_of_blood'];
				if($gender_p == 1) {
					$gender_p = "Male";
				} else if($gender_p == 2) {
					$gender_p = "Female";
				}

				$type_of_disease_p = $row['type_of_disease'];
				$blood_presure_p = $row['blood_pressure'];
				$sugar_level_p = $row['sugar_level'];
				$height_p = $row['height'];
				$weight_p = $row['weight'];
				$users_p = $row['patients'];

				echo " 
				<div  class='$users_p'>
				<div  class='list-widget' style='margin:20px'>
				<a href='#'><img src='img/user.jpg' class='avatar' style='float:left' height='42' width='42'></a>    
				<div class='list-head'>
					<h3><strong>{$fname_p} {$lname_p}</strong></h3>
					<div class='list-meta'></div> 
					<img class='loading$users_p list-follow' style='padding:5px 90px 20px 0; display:none; ' src='img/preload.gif' width='24' height='24' />
					<a href='update_patient.php?userid=$users_p' style='color:#fff;' class='list-follow edit btn btn-danger' /> Edit</a> 
					
				</div>  
				<ul>  
					<li>
						<div>
							Email: {$email_p} 
						</div>
					</li>
					<div class='showUser' id='showUser$users_p' style='display:none'> 
					<li>
						<div>
							Gender: {$gender_p} 
						</div>
					</li>
					
					<li>
						<div>
							Blood type: {$blood_p} 
						</div>
					</li>  
					
					<li>
						<div>
							Type of Disease: {$type_of_disease_p} 
						</div>
					</li>  
					
					<li>
						<div>
							Blood Pressure: {$blood_presure_p} Mm
						</div>
					</li> 
					<li>
						<div>
							Sugar Level: {$sugar_level_p} mm
						</div>
					</li>
					<li>
						<div>
							Height: {$height_p} Cm
						</div>
					</li>
					<li>
						<div>
							Weight: {$weight_p} Kg
						</div>
					</li>
					
					
					
					</div>
					
					
					
					<p style='padding:10px 0 0 40px'>
					<input id='$users_p' name='$users_p' type='button' class='btn btn-primary view' value='View Employee Details' />		
					<a href='doctor_print_details.php?userid=$users_p' style='color:#fff;' class='list-follow edit btn btn-success' /> Print Details</a> 
					</p>
				</ul>				
							
				</div>
				
				
				
				
				</div>
			
				";			
			}
		echo '</div>';
		} else {
			echo '<div align="center" style="width:94%; margin: 0 auto; padding-top:10px;" id="message_reject">
			<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>NO USERS!</h4>			
			</div>
			</div> ';
		}
	?>
	</form>
	
	</div><!--END list Users -->
					
					
					
					<?php include('include/add_new_patient_form.php'); ?>	
					
                </div>				                
            </div>
          
        </section>

    </div>
	
		
	<div id="showpercentage" class="list-widget" style="margin: 0 auto 50px auto; width:80%; display:none;" >
	<?php
	$query_count = "SELECT COUNT(type_of_disease) FROM users_info "; 		 
	$result_count = mysql_query($query_count) or die(mysql_error());

	while($row = mysql_fetch_array($result_count)) {		
	$total  = $row['COUNT(type_of_disease)'];
	}
	
	echo "<h2>STATISTIC OF DISEASE</h2><br />";
	echo "<h3>Total: $total Users</h3><br />";
	$query_statistic = "SELECT *, COUNT(type_of_disease) FROM users_info GROUP BY type_of_disease "; 		 
	$result_statistic = mysql_query($query_statistic) or die(mysql_error());

	while($row = mysql_fetch_array($result_statistic)) {
	    
		$c = $row['COUNT(type_of_disease)'];
		$d = strtoupper($row['type_of_disease']);
		$percentage = round(($c * 100) / $total , 2);
		echo'<div class="progress progress-striped active" >';
		echo"<div class='bar' style='width: $percentage%; background-color: #149BDF;'>$d: $c USER Or $percentage% </div>";
		echo "<br />";
		echo'</div>';
	}
	?>
	</div>
    
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
   
	<!---AJAX LOGIN FORM START -->

	<div id="ajax" class="edituser" style="max-width:600px; display: none;">
            <h2>Members Login</h2>
            	<div style="padding:10px 20px 10px 15px">

                 <form id="loginForm" method="post">                   
                    <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    	<input type="text" name="login_email" id="login_email" placeholder="Email" class="span4" autocomplete="off">
                    </div>
                    <div class="input-prepend">
                    <span class="add-on"><i class="icon-key"></i></span>
                       <input type="password" name="login_password" id="login_password" placeholder="Password" class="span4" autocomplete="off">
                    </div>
                    <button id="login" type="submit" class="btn btn-success">Submit</button>
    			</form>  
				<span style="display:none; padding:10px 10px 10px 15px;" id="message" class="span4 alert-error">&nbsp;</span>	
               	</div>
	</div>
    
    <!--AJAX LOGIN FORM END -->
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
			
			$(".listusers").click(function() { 				
				$("#showpercentage, #addNewUsers, #update").slideUp("slow");
				$("#showListUsers").slideDown("slow");
			});
			
			$(".addnewusers").click(function() { 
				$("#showpercentage, #showListUsers, #update").slideUp("slow");
				$("#addNewUsers").slideDown("slow");
			});
			
			$(".showpercentage").click(function() { 
				$("#addNewUsers, #showListUsers, #update").slideUp("slow");
				$("#showpercentage").slideDown("slow");
				
			});
									
			$(".view").click(function() {	
				var userid = $(this).attr("id"); 
				$("#showUser"+userid).slideDown("slow");
				$(".showUser").not("#showUser"+userid).slideUp("slow");
			});	
				
			$('#search_input_users').fastLiveFilter('#search_users', {
				callback: function(total) { $('#num_results_users').html(total); }
			});
	
        });
	</script>

</body></html>