<div align="center" style="width:88%; margin: 0 auto; padding-top:10px; display:none" id="message_add_new_user">
			<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>SUCCESSS!</h4>
			New patient has been successfully added.
			</div>
	</div> 
		
			
	<div id="addNewUsers" align="center" class="page" style="margin: 0; display:none">

        <div align="left" >     
            <h2>ADD NEW PATIENT</h2>       	        		
                        <form id="regForm" method="post">
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" name="fname" id="fname" placeholder="First Name" class="span4" autocomplete="on">
                            </div>
                            
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-user-md"></i></span>
                               <input type="text" name="lname" id="lname" placeholder="Last Name" class="span4" autocomplete="on">
                            </div>
                            
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-heart"></i></span>
                               <select id="sex-select" name="sex-select" style="height:34px">
                                   <option value="0" selected="selected">Select Gender&nbsp;</option>
                                   <option value="1">Male</option>
                                   <option value="2">Female</option>
                              </select>
                            </div>
							
							<div class="input-prepend">
                            <span class="add-on"><i class="icon-tint"></i></span>
                               <select id="blood-type-select" name="blood-type-select" style="height:34px">
                                   <option value="0" selected="selected">Select Type of Blood&nbsp;</option>
                                   <option value="1">A</option>
                                   <option value="2">B</option>
								   <option value="3">AB</option>
								   <option value="4">O</option>
                              </select>
                            </div>
                            
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                               <input type="text" name="email" id="email" placeholder="Email" class="span4" autocomplete="on">
                            </div>
                            
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-key"></i></span>
                               <input type="password" name="password" id="password" placeholder="Password" class="span4" autocomplete="on">
                            </div>
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-repeat"></i></span>
                               <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="span4" autocomplete="on">
                            </div>
 
                            <p><button type="submit" class="btn btn-danger">Sign Up</button>   
							<img class="loading" id="loading" src="img/preloader.gif" alt="working.." /></p>
							
                           	 <span style="display:none; padding:10px 10px 10px 15px;" id="error" class="alert-error">&nbsp;</span> 
							<span style="display:none; padding:10px 10px 10px 15px;" id="success" class="alert-success">&nbsp;</span>
                        </form>                           
					
               </div> 
	 
	  </div><!--END Add New Users -->