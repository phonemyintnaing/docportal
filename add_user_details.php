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

$userid=$_GET['userid'];
$email = $_SESSION['email'];
$query ="SELECT * FROM users WHERE email = '$email'";
$result = mysql_query($query);
if(mysql_num_rows($result) == 1) {
	while($row = mysql_fetch_assoc($result)){
		$fname = $row['fname'];
		$_SESSION['id'] = $row['id'];
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
    <title>doctor portal | Home page</title>
    <meta name="description" content="doctor portal">
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
                            doctor portal
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
                   <h2 align="center">Administrator Dashboard</h2>
					<br />
            	<div class="btn-toolbar" style="margin: 0;">
                
                <div class="btn-group" align="left">
                <button class="btn btn-white dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a class="listusers" href="#">List Users</a></li>
                  <li><a class="addnewusers" href="#">Add New Users</a></li>   
                </ul>
              </div>
				              
              </div>
			  
	<div align="left" class="container">
	
	<p>&nbsp;</p>
	
	<div style="margin:20px" id="update" class="page">
	
	 <h2>Add User Details</h2>
		<p style="color:#FF0000">( * ) Indicate, enter number only.</p>
		<form  id="updateUserStatus" name="updateUserStatus" action="add_user_process.php" method="post">  
		<div class="showEdit" id="showEdit"  style="padding:30px;">
		<label for="type_of_disease">Type of Disease:</label>
		<input id ="type_of_disease" name="type_of_disease" type="text" style="margin-bottom:20px;"/><span style="font-size:12px;"> ( Leave blank if you don't have any. )</span>
		<label for="blood_presure">Blood Presure:</label>
		<input id ="blood_pressure" name="blood_pressure" type="text" style="margin-bottom:20px;"/><span style="color:#FF0000"> *</span>
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
	<form  id="updateStatus" name="updateStatus" action="update_user.php" method="post">     
	<?php
	$query_users = "SELECT * FROM users, users_info WHERE users.id = users_info.users AND users.role = 2";
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

				$blood_presure_p = $row['blood_pressure'];
				$sugar_level_p = $row['sugar_level'];
				$height_p = $row['height'];
				$weight_p = $row['weight'];
				$users_p = $row['users'];

				echo " 
				<div  class='$users_p'>
				<div  class='list-widget' style='margin:20px'>
				<a href='#'><img src='img/user.jpg' class='avatar' style='float:left' height='42' width='42'></a>    
				<div class='list-head'>
					<h3><strong>{$fname_p} {$lname_p}</strong></h3>
					<div class='list-meta'></div> 
					<img class='loading$users_p list-follow' style='padding:5px 90px 20px 0; display:none; ' src='img/preload.gif' width='24' height='24' />
					<a href='update_user.php?userid=$users_p' style='color:#fff;' class='list-follow edit btn btn-danger' /> Edit</a> 
					
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
					
					
					
					<?php include('include/add_new_user_form.php'); ?>	
					
                </div>				                
            </div>
          
        </section>

    </div>
    
    <!-- Page Footer -->
    <footer id="footer" role="contentinfo" class="section">
        <div class="container">
            <div class="row-fluid">
                <div class="span4">
                    <h3>Contact us</h3>
                   
                    <ul class="icons">
                        <li>
                            <i class="icon-envelope"></i><a href="mailto:doctormail@gmail.com">doctor portal</a>
                        </li>
                        <li>
                            <i class="icon-twitter"></i><a href="http://www.twitter.com/doctor portal" target="_blank">@doctor Clinic</a>
                        </li>
                        <li>
                            <i class="icon-facebook"></i><a href="http://www.facebook.com" target="_blank">doctor clinic</a>
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
                                    by <a href="#">doctor portal</a>
                                </small>
                            </p>
                        </li>
                        <li><p>
                                <i class="icon-twitter"></i>A Good Workout Can Work the Kinks Out
                                <small>
                                    by <a href="#">doctor portal</a>
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
                            <p><small>April 12, 2017</small></p>
                        </li>
                        <li>
                            <h4><a href="#">Physical fitness</a></h4>
                            <p><small>April 20, 2017</small></p>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <p>&nbsp;</p>
            	<div class="row-fluid pull-center">
                    <div class="span12">
                        &copy; 2017 - doctor portal by <a href="mailto:doctormail@gmail.com">doctor clinic</a>
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
				$("#addNewUsers, #update").slideUp("slow");
				$("#showListUsers").slideDown("slow");
			});
			
			$(".addnewusers").click(function() { 
				$("#showListUsers, #update").slideUp("slow");
				$("#addNewUsers").slideDown("slow");
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