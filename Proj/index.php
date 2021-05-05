<?php
//This file is the base for all pages in the site. When creating a new page, we just open this one, then save a copy as the new page.
	include("dbconnect.php");

$error='';
$name='';
$phone='';
$email='';
$message='';

function clean_text($string)
{
	$string=trim($string);
	$string=stripslashes($string);
	$string=htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	if(empty($_POST["name"]))
	{
		$error .= '<p><label class="text-danger">Please enter your name</label></p>';
	}
	else
	{
		$name= clean_text($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
		}
	}
    if(empty($_POST["phone"]))
	{
		$error .= '<p><label class="text-danger">Phone is required</label></p>';
	}
	else
	{
		$phone= clean_text($_POST["phone"]);
	}
	if(empty($_POST["email"]))
	{
		$error .= '<p><label class="text-danger">Please enter your email</label></p>';
	}
	else
	{
		$email= clean_text($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
		}
	}
	if(empty($_POST["message"]))
	{
		$error .= '<p><label class="text-danger">Message is required</label></p>';
	}
	else
	{
		$message= clean_text($_POST["message"]);
	}
	
	if($error == '')
	{
		$file_open = fopen("rdata.csv","a");
		$no_rows = count(file("rdata.csv"));
		if($no_rows > 1){
			$no_rows = ($no_rows -1)+ 1;
		}
		$form_data= array(
			'sn_no' => $no_rows,
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'message' => $message
		);
		fputcsv($file_open, $form_data);
		$error = '<label class="text-success">Thank you for contacting us</label>';
		$name='';
		$email='';
		$phone='';
		$message='';
	}	
}


?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
	<script src="js/fontawesome.js"></script>
	<script src="js/all.js"></script>
	<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet"> 
    <link rel="stylesheet" href="magnific%2520popup/magnific-popup.css" />
    <title>Classy Cooking</title>
</head>
<body>
	<div class="container-fluid info p-3" id="top-icons">
		<div class="row">
		    <div class="col d-flex justify-content-between align-items-baseline flex-wrap">
		        <div class="info-icons p-2">
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="mr-2 primary-color"><i class="fab fa-yelp fa-2x"></i></a>
		        </div>
		        <h2 class="primary-color p-2 text-capitalize">142, Love Road, Tejgaon Industrial Area, Dhaka 1208 </h2>
				
		    </div>
	    </div>
	</div>
    
    <header id="header">
        <div class="container">
            <div class="row height-90 align-items-center justify-content-center">
                <div class="col">
                    <div class="banner text-center">
                        <h1 class="display-1 text-capitalize w-50 mx-auto">
                            <small>classy</small><br/> <strong class="primary-color">cooking</strong>
                        </h1>
						<?php
						include("header.php");
						?>
						<div class="maincontent">
						<?php
						if(!isset($_GET['page'])){
							include("home.php");
						}else{
							$page=$_GET['page'];
							include("$page.php");
						}
						?>
						</div>
						
                        <a href="#contact" class="btn main-btn btn1 my-4 text-capitalize">Contact Us</a>
                        <br/><br/><br/><br/><br/><br/><br/>
                        <a href="#special-items" class="btn header-link primary-color"><i class="fas fa-arrow-down"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
		
       
    </header>
    
    <nav class="navbar navbar-expand-lg">
        <a href="#" class="navbar-brand text-uppercase primary-color">classy cooking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="toggler-btn">
                <span class="bar bar1"></span>
                <span class="bar bar2"></span>
                <span class="bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="#special-items" class="nav-link text-capitalize">special items</a>
                </li>
                <li class="nav-item">
                    <a href="#menu" class="nav-link text-capitalize">price</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link text-capitalize">about</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <section class="py-5" id="special-items">
        <div class="container my-5">
            <div class="row parent-container">
               
                <div class="col-10 mx-auto col-sm-6 col-lg-4 my-3">
                    <div class="item-container">
                        <img src="images/gordonramsay.jpg" class="img-fluid img-thumbnail item-img" alt="menu item">
                        <a href="images/gordonramsay.jpg">
                            <h1 class="text-uppercase text-center item-link px-3">Gordon Ramsay's Pizza</h1>
                        </a>
                    </div>
                </div>
                
                <div class="col-10 mx-auto col-sm-6 col-lg-4 my-3">
                    <div class="item-container">
                        <img src="images/monster.jpg" class="img-fluid img-thumbnail item-img" alt="menu item">
                        <a href="images/monster.jpg">
                            <h1 class="text-uppercase text-center item-link px-3">Monster Thickburger</h1>
                        </a>
                    </div>
                </div>
                
                <div class="col-10 mx-auto col-sm-6 col-lg-4 my-3">
                    <div class="item-container">
                        <img src="images/royal%20sushi.jpg" class="img-fluid img-thumbnail item-img" alt="menu item">
                        <a href="images/royal%20sushi.jpg">
                            <h1 class="text-uppercase text-center item-link px-3">Royal Sushi</h1>
                        </a>
                    </div>
                </div>
                
                <div class="col-10 mx-auto col-sm-6 col-lg-4 my-3">
                    <div class="item-container">
                        <img src="images/jackiechan.jpg" class="img-fluid img-thumbnail item-img" alt="menu item">
                        <a href="images/jackiechan.jpg">
                            <h1 class="text-uppercase text-center item-link px-3">Jackie Chan Ramen</h1>
                        </a>
                    </div>
                </div>
                
                <div class="col-10 mx-auto col-sm-6 col-lg-4 my-3">
                    <div class="item-container">
                        <img src="images/swissdelight.jpg" class="img-fluid img-thumbnail item-img" alt="menu item">
                        <a href="images/swissdelight.jpg">
                            <h1 class="text-uppercase text-center item-link px-3">Swiss Delight</h1>
                        </a>
                    </div>
                </div>
                
                <div class="col-10 mx-auto col-sm-6 col-lg-4 my-3">
                    <div class="item-container">
                        <img src="images/cherryberry.jpg" class="img-fluid img-thumbnail item-img" alt="menu item">
                        <a href="images/cherryberry.jpg">
                            <h1 class="text-uppercase text-center item-link px-3">Cherryberry Crusher</h1>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
<section id="menu" class="py-5 my-5">
   <div class="container">
       <div class="row">
           <div class="col-md-6">
               <div class="row">
                   <div class="col">
                       <h1 class="primary-color text-uppercase">Pizza</h1>
                   </div>
               </div>
               <div class="single-item d-flex justify-content-between my-3 p-3 special">
                   <div class="single-item-text">
                       <h2 class="text-uppercase text-dark">Gordon Ramsay's Pizza</h2>
                       <h4 class="text-muted">masterpiece by the masterchef</h4>
                   </div>
                   <div class="single-item-price align-self-end">
                       <h1 class="text-uppercase text-dark">$15</h1>
                   </div>
               </div>
                
                 <div class="row">
                   <div class="col">
                       <h1 class="primary-color text-uppercase">burger</h1>
                   </div>
               </div>
               <div class="single-item d-flex justify-content-between my-3 p-3 special">
                   <div class="single-item-text">
                       <h2 class="text-uppercase text-dark">Monster Thickburger</h2>
                       <h4 class="text-muted">can't finish eating</h4>
                   </div>
                   <div class="single-item-price align-self-end">
                       <h1 class="text-uppercase text-dark">$12</h1>
                   </div>
               </div>
               
               <div class="row">
                   <div class="col">
                       <h1 class="primary-color text-uppercase">Sushi</h1>
                   </div>
               </div>
               <div class="single-item d-flex justify-content-between my-3 p-3 special">
                   <div class="single-item-text">
                       <h2 class="text-uppercase text-dark">Royal Sushi</h2>
                       <h4 class="text-muted">everlasting taste</h4>
                   </div>
                   <div class="single-item-price align-self-end">
                       <h1 class="text-uppercase text-dark">$13</h1>
                   </div>
               </div>
           </div>
           <div class="col-md-6">
                <div class="row">
                   <div class="col">
                       <h1 class="primary-color text-uppercase">Ramen</h1>
                   </div>
               </div>
               <div class="single-item d-flex justify-content-between my-3 p-3 special">
                   <div class="single-item-text">
                       <h2 class="text-uppercase text-dark">Jackie Chan Ramen</h2>
                       <h4 class="text-muted">legendary recipe</h4>
                   </div>
                   <div class="single-item-price align-self-end">
                       <h1 class="text-uppercase text-dark">$13</h1>
                   </div>
               </div>
               
                 <div class="row">
                   <div class="col">
                       <h1 class="primary-color text-uppercase">Ice cream</h1>
                   </div>
               </div>
               <div class="single-item d-flex justify-content-between my-3 p-3 special">
                   <div class="single-item-text">
                       <h2 class="text-uppercase text-dark">Swiss Delight</h2>
                       <h4 class="text-muted">straight from heaven</h4>
                   </div>
                   <div class="single-item-price align-self-end">
                       <h1 class="text-uppercase text-dark">$11</h1>
                   </div>
               </div>
              
               <div class="row">
                   <div class="col">
                       <h1 class="primary-color text-uppercase">drinks</h1>
                   </div>
               </div>
               <div class="single-item d-flex justify-content-between my-3 p-3 special">
                   <div class="single-item-text">
                       <h2 class="text-uppercase text-dark">Cherryberry Crusher</h2>
                       <h4 class="text-muted">remarkable drink</h4>
                   </div>
                   <div class="single-item-price align-self-end">
                       <h1 class="text-uppercase text-dark">$10</h1>
                   </div>
               </div>
             
           </div>
       </div>
   </div>
    
</section>
   
   <section id="about" class="py-5">
       <div class="container">
           <div class="row">
               <div class="col-md-6 my-4">
                   <h1 class="text-uppercase display-3">about us</h1>
                   <h2 class="text-muted">We have got the best chefs in the region.Quality and customer satisfaction is all we care about.<br/>hotline:01900000001</h2>
               </div>
               <div class="col-md-6 about-pictures my-4 d-none d-lg-block">
                   <img src="images/cherryberry.jpg" alt="menu" class="img-1 img-thumbnail about-image">
                   <img src="images/jackiechan.jpg" alt="menu" class="img-2 img-thumbnail about-image">
                   <img src="images/gordonramsay.jpg" alt="menu" class="img-3 img-thumbnail about-image">
                   <img src="images/swissdelight.jpg" alt="menu" class="img-4 img-thumbnail about-image">
                   <img src="images/maca.jpg" alt="menu" class="img-5 img-thumbnail about-image">
               </div>
           </div>
       </div>    
       
   </section>
   
   <section id="contact">
       <div class="container-fluid no-padding">
           <div class="row">
               <div class="col-md-6 my-3">
                   <div class="embed-responsive embed-responsive-21by9 height-60">
                       <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.4782395541883!2d90.39909101452452!3d23.76597858458169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77d400f0369%3A0xa7cce88e02f3b88b!2sLove+Road%2C+Dhaka+1208!5e0!3m2!1sen!2sbd!4v1555152923809!5m2!1sen!2sbd" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                   </div>
               </div>
               <div class="col-md-6 my-3 align-self-center">
                   <div class="card text-center">
                       <div class="card-header">
                           <h1 class="text-uppercase">contact us</h1>
                           <?php echo $error; ?>
                       </div>
                       <div class="card-body">
                           <form method="post">
                               <div class="input-group my-3">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text" id="input-text">
                                           <i class="fas fa-user"></i>
                                       </span>
                                   </div>
                                   <input type="text" name="name" id="text" class="form-control form-control-lg" placeholder="Enter your name here" value="<?php echo $name; ?>" >
                               </div>
                               <div class="input-group my-3">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text" id="input-phone">
                                           <i class="fas fa-phone"></i>
                                       </span>
                                   </div>
                                   <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter your phone here" value="<?php echo $phone; ?>" >
                               </div>
                               <div class="input-group my-3">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text" id="input-email">
                                           <i class="fas fa-envelope"></i>
                                       </span>
                                   </div>
                                   <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Enter your email here" value="<?php echo $email; ?>" >
                               </div>
                               <div class="input-group my-3">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text" id="input-message">
                                           <i class="fas fa-sms"></i>
                                       </span>
                                   </div>
                                   <textarea name="message" id="message" class="form-control form-control-lg" placeholder="Enter message" value="<?php echo $message; ?>" ></textarea>
                               </div>
                               
                               <button href="#contact" name="submit" class="btn btn-block btn-lg text-uppercase contact-btn" value="Submit">
                                   <i class="far fa-hand-point-right mr-2"></i>Click here</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   
   <div class="container-fluid info p-3">
		<div class="row">
		    <div class="col d-flex justify-content-between align-items-baseline flex-wrap" id="ok">
		        <div class="info-icons p-2">
                    <a href="#ok" class="mr-2 primary-color"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#ok" class="mr-2 primary-color"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#ok" class="mr-2 primary-color"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#ok" class="mr-2 primary-color"><i class="fab fa-yelp fa-2x"></i></a>
		        </div>
		        <h2 class="primary-color p-2 text-uppercase">&copy;copyright 2019</h2>
				
		    </div>
	    </div>
	</div>
   
    <a href="#top-icons" id="back-to-top" class="p-1"><i class="fas fa-arrow-up primary-color fa-3x"></i></a>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js.map"></script>
<!-- <script src="js/jquery.ripples-min.js"></script> -->
<script src="js/script.js"></script>
<script src="magnific%2520popup/jquery.magnific-popup.js"></script>
</body>
</html>