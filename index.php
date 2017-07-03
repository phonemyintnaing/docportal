<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <title>Doctor Portal | Home page</title>
    <meta name="description" content="Doctor Portal">
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
	<script type="text/javascript" src="js/jquery-ajax-login.js"></script>
	<script type="text/javascript" src="js/jquery-ajax-registration.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
	</script>
  
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
                            Doctor Portal
                            <i class="icon-user-md"></i>
                        </a>
                            
                    </h1>
            
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Type of Diseases</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#cancer">Cancer</a>
                                    </li>
                                    <li>
                                        <a href="#diabetes">Diabetes</a>
                                    </li>
                                    <li>
                                        <a href="#asthma">Asthma</a>
                                    </li>
                                </ul>
                            </li>               
                            <li>
                                <a class="fancybox" href="#register">Register</a>
                            </li>
                            <li>
                                <a class="fancybox" href="#ajax-login">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    
    <!-- Main Content -->
    <div id="content" role="main">

	  

        <section id="promo" class="section alt">
            <div class="container">
                <div style="min-height: 637px;" id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <div class="row-fluid">
                                <div class="span8">
                                    <div class="hero-unit pull-center">
                                    <p>&nbsp;</p>
                                        <h1>The Greatest Wealth</h1>
                                        <p>"The greatest wealth is health." ~ Virgil</p>
                                    </div>
                                </div>
                                <div class="span4 pull-center">
                                    <img src="img/wellness-keywords.png" alt="wellness" class="pull-right">
                                </div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="row-fluid pull-center">
                                <div class="span8">
                                    <div class="hero-unit">
                                      <p>&nbsp;</p>
                                        <h1>Physical fitness</h1>
                                        <p>"Physical fitness is not only one of the most important keys to a healthy body,<br /> it is the basis of dynamic and creative intellectual activity." ~ John F. Kennedy</p>
                                    </div>
                                </div>        
                                <div class="span4 pull-center">
                                    <img src="img/wellness-keywords2.png" alt="wellness" class="pull-right">
                                </div>
                            </div>
                        </div>
                                
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                </div>
                
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="page-header">
                    <h1>
                        Tip for Wellness
                    </h1>
                </div>
                <ul class="thumbnails bordered thumbnail-list">
                    <li class="span4">
                        <a href="#">
                            <figure class="thumbnail-figure">
                                <img src="img/people1-600x400.jpg" alt="">
                                <figcaption class="thumbnail-title">
                                    <h3><span>TIP 1</span></h3>           
                                </figcaption>    
                            </figure>
                        </a>
                        <h3>Do What You Want to Do</h3>
                        <p>
                           Choose ways to exercise that are fun. If there's a routine that you enjoy that keeps your body moving, embrace it and continue it. You can always add to your routine later, but keep to your core so that you will enjoy exercise.
                        </p>
                    </li>
                    <li class="span4">
                        <a href="#">
                            <figure class="thumbnail-figure">
                                <img src="img/people9-600x400.jpg" alt="">
                                <figcaption class="thumbnail-title">
                                      <h3><span>TIP 2</span></h3>
                                </figcaption>    
                            </figure>
                        </a>
                        <h3>A Friend Indeed</h3>
                        <p>
                           Exercise with a friend or loved one. If someone is waiting for you to exercise, you are less likely to back out. Also, a friend can be a source of encouragement, and a helping hand when in need.
                        </p>
                    </li>
                    <li class="span4">
                        <a href="#">
                            <figure class="thumbnail-figure">
                                <img src="img/people6-600x400.jpg" alt="">
                                <figcaption class="thumbnail-title">
                                      <h3><span>TIP 3</h3>
                                </figcaption> 
                            </figure>
                        </a>
                        <h3> Sweat Like a Pro</h3>
                        <p>
Get the most out of your exercise routine by making sure you elevate your heart rate to the appropriate level. Just be sure to know your limitations. Also, make sure to stretch beforehand, and take breaks when necessary.
                        </p>
                    </li>
                </ul>
            </div>	

			 <div class="container">
                <div class="page-header">
                    <h1>
                        Type of Diseases
                    </h1>
                </div>
                <ul class="thumbnails bordered thumbnail-list">
                    <li class="span12">                     
                        <h3 id="cancer"> CANCER</h3>
						<p align="justify">Cancer known medically as a malignant neoplasm, is a broad group of various diseases, all involving unregulated cell growth. In cancer, cells divide and grow uncontrollably, forming malignant tumors, and invade nearby parts of the body. The cancer may also spread to more distant parts of the body through the lymphatic system or bloodstream. Not all tumors are cancerous. Benign tumors do not grow uncontrollably, do not invade neighboring tissues, and do not spread throughout the body. There are over 200 different known cancers that afflict humans.</p>
                        <div align="justify" id="showCancer" style="display:none;">
						<p>Determining what causes cancer is complex. Many things are known to increase the risk of cancer, including tobacco use, certain infections, radiation, lack of physical activity, obesity, and environmental pollutants. These can directly damage genes or combine with existing genetic faults within cells to cause the disease. Approximately five to ten percent of cancers are entirely hereditary.</p>	

						<p><strong>DON’T</strong> rely on pills for nutrition. Taking one-a-day with a Wendy’s triple and large fries just isn’t going to cut it. Supplements should be taken with good food, not instead of good food.</p>

						<p><strong>DO</strong> drink water. It may be bland next to Coke, Pepsi and coffee, but the cells in your body don’t think so. Water is the most essential nutrient for them. Try adding lemon or lime slices for flavor.</p>

						<p><strong>DON’T</strong> walk around dehydrated. If your urine is deep in color or has a strong odor, you need to drink more water.</p>

						<p><strong>DO</strong> eat “mixed” food for breakfast such as those containing a little carbohydrate, a little protein, and a little fat. For example: Eggs and a bowl of fruit or a protein shake with soy milk and a banana.</p>

						<p><strong>DON’T</strong> eat sugary foods in the morning. A burst of refined sugar on an empty stomach will trigger a flood of insulin which will suppress the immune system, and feed any abnormal cells which are common in everyone’s body.</p>
                        </div><button class="cancer btn btn-success">View Details</button>
                    </li>
                </ul>
				
				<ul class="thumbnails bordered thumbnail-list">
                    <li class="span12">                     
                        <h3 id="diabetes"> DIABETES</h3>
						<p align="justify">Diabetes mellitus, or simply diabetes, is a group of metabolic diseases in which a person has high blood sugar, either because the pancreas does not produce enough insulin, or because cells do not respond to the insulin that is produced.[2] This high blood sugar produces the classical symptoms of polyuria (frequent urination), polydipsia (increased thirst) and polyphagia (increased hunger).</p>
                        <div align="justify" id="showDiabetes" style="display:none;">
						<p><strong>There are three main types of diabetes mellitus (DM).</strong></p>

						<p>Type 1 DM results from the body's failure to produce insulin, and presently requires the person to inject insulin or wear an insulin pump. This form was previously referred to as "insulin-dependent diabetes mellitus" (IDDM) or "juvenile diabetes".</p>
						<p>Type 2 DM results from insulin resistance, a condition in which cells fail to use insulin properly, sometimes combined with an absolute insulin deficiency. This form was previously referred to as non insulin-dependent diabetes mellitus (NIDDM) or "adult-onset diabetes".</p>
						<p>The third main form, gestational diabetes occurs when pregnant women without a previous diagnosis of diabetes develop a high blood glucose level. It may precede development of type 2 DM.</p>	

						<p><strong>DON’T</strong> eat out of a bag or box. You've probably heard this one before, but you're tired and hungry and grab a bag of baked chips. You figure that you will just eat a few and you won't do that much damage. Well, ten minutes later you've downed more than a half a bag of chips and more than 60 grams of carbs. It is too easy to overeat and not even realize how many calories and carbs you've consumed when you eat out of a bag. So, make a commitment to yourself today to follow this rule. Get a bowl (and make it a small one).</p>
						<p><strong>DON’T</strong> Drink regular soda or sweetened drinks — unless you are hypoglycemic (having a low blood sugar episode). Some people with diabetes will tell me, "I don't drink that much regular soda, maybe just when I go out to eat or a couple times a week." My response is direct and simple: You canNOT drink regular soda or sweetened drinks if you have diabetes. The only exception is if you have low blood sugar. The reason is obvious—a can of regular soda contains about 40 grams of carbohydrates and is going to raise your blood sugar dramatically. This is equivalent to eating a turkey sandwich and a small piece of fruit. Do not waste your carbs on drinks, but rather use your carbs for food that will fill you up and give your body the nutrients it needs.</p>
                        </div><button class="diabetes btn btn-success">View Details</button>
                    </li>
                </ul>
				
					<ul class="thumbnails bordered thumbnail-list">
                    <li class="span12">                     
                        <h3 id="asthma"> ASTHMA</h3>
						<p align="justify">Asthma is the common chronic inflammatory disease of the airways characterized by variable and recurring symptoms, reversible airflow obstruction, and bronchospasm. Symptoms include wheezing, coughing, chest tightness, and shortness of breath. Asthma is clinically classified according to the frequency of symptoms, forced expiratory volume in 1 second (FEV1), and peak expiratory flow rate. Asthma may also be classified as atopic (extrinsic) or non-atopic (intrinsic).</p>
                        <div align="justify" id="showAsthma" style="display:none;">
				
						<p align="justify">Asthma causes the airways in our esophagus to be highly sensitive and prone to closing over. Many things can cause this effect and these are known as 'asthma triggers'. If you come into contact with these you might find your airways tightening up, becoming swollen, or producing too much mucus which will cause wheezing and make it difficult to breathe.</p>
						
						<p align="justify">
						Identifying your asthma triggers and being able to avoid them is one of the most important ways to manage asthma and prevent an attack. Because these vary between different people however it can be hard to tell precisely what is aggravating your asthma, meaning that it is useful to use a food diary and to monitor your precise intake of food along with your health. If you notice any correlations then you know what you need to cut down on.
						</p>
                        </div><button class="asthma btn btn-success">View Details</button>
                    </li>
                </ul>
				
				
				
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
                            <i class="icon-envelope"></i><a href="mailto:doctormail@gmail.com">Doctor Portal</a>
                        </li>
                        <li>
                            <i class="icon-twitter"></i><a href="http://www.twitter.com/Doctor Portal" target="_blank">@doctor Clinic</a>
                        </li>
                        <li>
                            <i class="icon-facebook"></i><a href="http://www.facebook.com" target="_blank">Doctor Clinic</a>
                        </li>
                        <li>
                            <i class="icon-phone"></i>09792061032
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <h3>Recent news</h3>
                    <ul class="icons">
                        <li><p>
                                <i class="icon-twitter"></i>How to Know If You Have High Cholesterol
                                <small>
                                    by <a href="#">Doctor Portal</a>
                                </small>
                            </p>
                        </li>
                        <li><p>
                                <i class="icon-twitter"></i>A Good Workout Can Work the Kinks Out
                                <small>
                                    by <a href="#">Doctor Portal</a>
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
                        &copy; 2017 - Doctor Portal by <a href="mailto:doctormail@gmail.com">Doctor Clinic</a>
                    </div>
        	 	</div>           
        </div>
        
           
    </footer>

	<!---AJAX LOGIN FORM START -->

	<div id="ajax-login" style="max-width:600px; display: none;">
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
   
    <div id="register" style="max-width:600px; display: none;">
        	  <h2>Register for FREE</h2> 
              	<div style="padding:10px 30px 10px 15px">     
                	        		
                        <form id="regForm" method="post">
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" name="fname" id="fname" placeholder="First Name" class="span4" autocomplete="off">
                            </div>
                            
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-user-md"></i></span>
                               <input type="text" name="lname" id="lname" placeholder="Last Name" class="span4" autocomplete="off">
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
                               <input type="text" name="email" id="email" placeholder="Email" class="span4" autocomplete="off">
                            </div>
                            
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-key"></i></span>
                               <input type="password" name="password" id="password" placeholder="Password" class="span4" autocomplete="off">
                            </div>
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-repeat"></i></span>
                               <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="span4" autocomplete="off">
                            </div>
 
                            <p><button type="submit" class="btn btn-danger">Sign Up</button>   
							<img class="loading" id="loading" src="img/preloader.gif" alt="working.." /></p>
							
                           	 <span style="display:none; padding:10px 10px 10px 15px;" id="error" class="alert-error">&nbsp;</span> 
							<span style="display:none; padding:10px 10px 10px 15px;" id="success" class="alert-success">&nbsp;</span>
                        </form>                           
					
               </div>   
    </div>
	
    <!-- JavaScript -->

    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <script>window.jQuery || document.write('<script src="js/libs/jquery.min.js"><\/script>')</script>
    <!-- Load boostrap and custom scripts -->
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <!-- end scripts -->
	<script>
	$(document).ready(function() {
        $('.fancybox').fancybox({
		  scrolling: 'no',
		  openEffect: 'elastic',
		  closeEffect: 'elastic',
		}); 
		
		$(".cancer").click(function () {
		$("#showCancer").toggle("slow");
		}); 
		$(".diabetes").click(function () {
		$("#showDiabetes").toggle("slow");
		});
		
		$(".asthma").click(function () {
		$("#showAsthma").toggle("slow");
		});
		
    });
		
	</script>

</body></html>