<?php
define('ACCESS', TRUE);
include('include/connect.inc.php');
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 2){
	header('Location: index.php');	
}
$userid = $_SESSION['id'];
$query_count = "SELECT *, COUNT(type_of_disease) FROM users_info GROUP BY type_of_disease"; 		 
	$result_count = mysql_query($query_count) or die(mysql_error());
	$data = array();
		while($row = mysql_fetch_array($result_count)) {		
		$data[] = array(strtoupper($row['type_of_disease']), (int)$row['COUNT(type_of_disease)']);
	}
		$data = json_encode($data);

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
	<script type="text/javascript" src="js/jquery-ajax-add_new_patient.js"></script>
	<script type="text/javascript" src="js/update_status.js"></script>
	<link class="include" rel="stylesheet" type="text/css" href="css/jquery.jqplot.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/excanvas.js"></script><![endif]-->
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
                        <a class="brand" href="administrator.php">
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
                <button class="btn btn-white dropdown-toggle" data-toggle="dropdown">Manage Patients <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a class="listusers" href="#">Patients List</a></li>
                  <li><a class="addnewusers" href="#">Add New Patients</a></li>  
				 <li><a class="showpercentage" href="#">Statistic of Disease</a></li>
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
			<p><a href="javascript:history.back()" name="Back" value="Back"
class="btn btn-primary" >Try Again?</a></p>

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
    <div class="page-header" style="display:none;" id="showListUsers">				
					<div align="center">
	<p>&nbsp;</p>
	<form class="form-search">	
    <input class="span12" id="search_input_users"  placeholder="Type to filter..." type="text" style="marging:5px 10px; padding:5px 10px; height:24px; width:88%">
    <!--<button class="btn btn-green" type="button">Go!</button>-->
		</form>
	</div>
	
	<h4 style="padding-left:60px;">Showing <span id="num_results_users"></span> users:</h4> 
	
				
	<form  id="updateStatus" name="updateStatus" action="update_user.php" method="post">     
	<?php
	//$query_users = "SELECT * FROM users, users_info WHERE users.id = users_info.users AND users.role = 2";
	$query_users = "SELECT patients.*, patient_info.* FROM patients inner join patient_info 
					ON patients.id = patient_info.patients where patients.role = 3 and  patients.gp = $userid";
 	//echo $query_users;
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
					<input id='$users_p' name='$users_p' type='button' style='padding: 7px 10px' class='btn btn-primary btn-medium view' value='View Employee Details' />		
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
	    <div class="disease" style="margin: 0 auto; width:80%;">
		<h3 style="padding: 0 10px;">Statistic of Disease</h3>
		</div>
		<div id="chart" style="margin: 0 auto 50px auto; width:80%;" class="chartpie" ></div>
		
    <!-- Page Footer -->
    <footer id="footer" role="contentinfo" class="section">
        <div class="container">
            <div class="row-fluid">
                <div class="span4">
                    <h3>Contact us</h3>
                   
                    <ul class="icons">
                        <li>
                            <i class="icon-envelope"></i><a href="mailto:initmyanmar@gmail.com">Mr. GP</a>
                        </li>
                        <li>
                            <i class="icon-twitter"></i><a href="http://www.twitter.com/Mr. GP" target="_blank">@initmyanmarsoftware</a>
                        </li>
                        <li>
                            <i class="icon-facebook"></i><a href="http://www.facebook.com/profile.php?id=1918713951751319" target="_blank">Init Myanmar Software</a>
                        </li>
                        <li>
                            <i class="icon-phone"></i>+95 9455821510
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <h3>Recent news</h3>
                    <ul class="icons">
                        <li><p>
                                <i class="icon-twitter"></i>How to Know If You Have High Cholesterol
                                <small>
                                    by <a href="#">Mr. GP</a>
                                </small>
                            </p>
                        </li>
                        <li><p>
                                <i class="icon-twitter"></i>A Good Workout Can Work the Kinks Out
                                <small>
                                    by <a href="#">Mr. GP</a>
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
                        &copy; 2013 - Mr. GP by <a href="mailto:initmyanmmar@gmail.com">Init Myanmar Software</a>
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
	<script class="code" type="text/javascript">
	$(document).ready(function(){
	  var data = <?php echo $data; ?>;
	  var plot1 = jQuery.jqplot ('chart', [data], 
		{ 
		  seriesDefaults: {
			renderer: jQuery.jqplot.PieRenderer, 
			rendererOptions: {
			  showDataLabels: true
			}
		  }, 
		  legend: { show:true, location: 'e' }
		}
	  );
	});
	</script>
	
	<script type="text/javascript" src="js/jquery.jqplot.js"></script>
    <script type="text/javascript" src="js/jqplot.pieRenderer.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
           $(".logout").click(function() { 
				top.location.href='include/logout.php';
			});
					
			$(".listusers").click(function() { 				
				$("#addNewUsers, .chartpie, .disease, #message_update").slideUp("slow");
				$("#showListUsers").slideDown("slow");
			
			});
			
			$(".addnewusers").click(function() { 
				$("#showListUsers, .chartpie, .disease, #message_update").slideUp("slow");
				$("#addNewUsers").slideDown("slow");
			
			});
			
			$(".showpercentage").click(function() { 
				$("#addNewUsers, #showListUsers, #message_update").slideUp("slow");
				$(".chartpie, .disease").slideDown("slow").css('display', 'block');
			});
									
			$(".view").click(function() {	
				var userid = $(this).attr("id"); 
				$("#showUser"+userid).slideDown("slow");
				$(".showUser").not("#showUser"+userid).slideUp("slow");
			});	
				
			$('#search_input_users').fastLiveFilter('#search_users', {
				callback: function(total) { $('#num_results_users').html(total); }
			});
			
			$(".edit").click(function() {	
				var userid = $(this).attr("id"); 
				$("#showEdit"+userid).slideDown("slow");
				$(".showEdit").not("#showEdit"+userid).slideUp("slow");
			});
			
        });
	</script>
	

</body></html>