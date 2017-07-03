<?php
if(isset($_SESSION['delete'])){
echo'<div class="reload" id="showListUsers" style="display:block;">';
} else{
	echo'<div class="reload" id="showListUsers" style="display:none;">';	
}
?>
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
					<input id ='$users_p' name='$users_p' type='submit' value='Edit' style='padding: 0.5em 0.8em;' class='list-follow edit btn btn-warning' />
				</div>  
				<ul>  
					<li>
						<div>
							Email: {$email_p} 
						</div>
					</li>
					<div class='hide$users_p' style='display:none'> 
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
					<input id='hide$users_p' name='hide$users_p' type='button' class='btn btn-primary view' value='View Employee Details' />
					
					
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