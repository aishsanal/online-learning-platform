<?php include('./includes/register_validation.php'); ?>
<?php
   
if(isset($_POST['submit']))
{
    session_start();
    $connect=mysqli_connect('localhost','root','','learning_platform');
    $insert=false;
 
    //check connection
    if(mysqli_connect_errno())
    {
        echo 'Failed to connect to database: '.mysqli_connect_error();
    } 
        
    $showAlert = false; 
    $emailid = $_POST["emailid1"]; 
    $password = $_POST["password1"]; 
     
    $sql = "SELECT * FROM user WHERE emailid='$emailid'";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);
    
    // This sql query is use to check if the username is already present or not in our Database
  
    if($num != 0) 
    {
        $row = mysqli_fetch_array($result);
        $hash = $row['password'];
        $Fname = $row['Fname'];
        if(password_verify($password, $hash))
        {
            $_SESSION['userLoggedInName'] = $Fname;
            $_SESSION['userLoggedInemail'] = $emailid;
            
            header("Location: user_view.php");
        }
        else
        {
            $showAlert = true; 
        }
        
    }   
    else 
    { 
        $showAlert = true; 
    }   
 
    if($showAlert) {
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Wrong emaild or password 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
    }
}   
?>

<?php
   
if(isset($_POST['Submit']))
{
    session_start();
    $connect=mysqli_connect('localhost','root','','learning_platform');
    $insert=false;
 
    //check connection
    if(mysqli_connect_errno())
    {
        echo 'Failed to connect to database: '.mysqli_connect_error();
    } 
        
    $showAlert = false; 
    $showError = false; 
    $exists=false;
    
    $emailid = $_POST["emailid"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $phone = $_POST["phone"];
     
    //echo("check1");
    $sql = "SELECT * FROM user WHERE emailid='$emailid'";
    //echo("check2");
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);
    
    // This sql query is use to check if the username is already present or not in our Database
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

        // Password Hashing is used here. 
            $sql = "INSERT INTO `user` ( `emailid`, `password`,  `Fname`, `Lname`,  `phone`) VALUES ('$emailid', '$hash','$Fname', '$Lname',  '$phone')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                $showAlert = true; 
                $_SESSION['userLoggedInName'] = $Fname;
                $_SESSION['userLoggedInemail'] = $emailid;
                header("Location: user_view.php");
            }

        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }
    if($num>0) 
    {
      $exists="Username not available"; 
    } 
 
    if($showAlert) {
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your account is now created. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
    }
    
    if($showError) {
        echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                    <strong>Error!</strong> '. $showError.'
                    <button type="button" class="close" data-dismiss="alert aria-label="Close">
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
   }
        
    if($exists) {
        echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> '. $exists.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button>
                </div> '; 
     }
}   
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="node_modules/bootstrap-social/css/bootstrap-social.css">
	<link rel="stylesheet" href="css/styles.css">
    <title>LearnZone</title>
    <link rel="icon" href="img/online-education.png" type="image/icon type">
</head>

<body>
	<nav class="navbar navbar-dark navbar-expand-sm fixed-top ">
		<!-- <div class="container"> -->
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
			<a class="navbar-brand mx-auto" href="#"><img src="img/online-education.png" height="30" width="41"></a>
			<div class="collapse navbar-collapse" id="Navbar">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
                        <a class="nav-link" href="./index.php"> Home<span class="sr-only">(current)</span></a>
                    </li>
					<li class="nav-item"><a class="nav-link" href="./aboutus.php"></span> About</a></li>
					<li class="nav-item"><a class="nav-link" href="./contactus.php"> Contact</a></li>
                    
				</ul>
                
				<!-- <span class="navbar-text" id="login-btn">
                    <a> Login</a>	
                </span>

				<span class="navbar-text" id="signup-btn">
				<a>Signup</a>
				</span> -->
                
                <button class="btn btn-outline-light ml-auto mr-1" id="login-btn" type="button" data-toggle="modal" data-target="#loginModal" >LogIn</button>
                <button class="btn btn-success ml-1 mr-1" id="signup-btn" type="button" data-toggle="modal" data-target="#signupModal">Register</button>
			</div>
		<!-- </div> -->
	</nav>
	<div id="signupModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialogue-centered modal-md" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:white">Register </h4>
                    <button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="post" action="index.php">
                        
                            <div class="form-group ">
                                    <label class= "font-weight-bold" for="exampleInputEmail3">Email Address</label>
                                    <input  name="emailid" id="emailid" type="email" class="form-control form-control-sm mr-1" id="exampleInputEmail3" name="email" placeholder = "Enter email" required>
                                    <!-- <span class="error"><?php //echo $emailErr;?></span> -->
                            </div>

                            <div class="form-group ">
                                <label class= "font-weight-bold" for="exampleInputFirstName3">First Name</label>
                                <input name="Fname" id="Fname" type="text" class="form-control form-control-sm mr-1" id="exampleInputFirstName3" name="firstName" placeholder = "Enter First Name" required>
                                <!-- <span class="error"><?php //echo $fNameErr;?></span> -->
                            </div>

                            <div class="form-group ">
                                <label class= "font-weight-bold" for="exampleInputLastName3">Last Name</label>
                                <input name="Lname" id="Lname" type="text" class="form-control form-control-sm mr-1" id="exampleInputLastName3" name = "lastName" placeholder="Enter Last Name" required>
            
                                <!-- <span class="error"><?php //echo $lNameErr;?></span> -->
                            </div>

                            <div class="form-group ">
                                <label class= "font-weight-bold" for="exampleInputphoneNumber3">Phone Number</label>
                                <input name="phone" id="phone" type="tel" class="form-control form-control-sm mr-1" id="exampleInputPhoneNumber3" name = "phoneNumber"  placeholder = "Phone Number">
                                <span class="error"><?php echo $phNumErr;?></span>
                            </div>

                            <div class="form-group"> <!-- col-sm-6 -->
                                <label class= "font-weight-bold" for="exampleInputPassword3">Password</label>
                                <input name="password" id="password" type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" name = "password" placeholder="Enter Password">
                                <span class="error"><?php echo $pwErr;?></span>
                            </div>
							<div class="form-group">
                                <label class= "font-weight-bold" for="exampleInputPassword3">Confirm Password</label>
                                <input name="cpassword" id="cpassword" type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" name = "confirmPassword" placeholder="Confirm Password">
                                <span class="error"><?php echo $cpwErr;?></span>
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" required>
                                    <label class="form-check-label"> I accept the <a href = "./aboutus.php">Terms of Use</a> and <a href = "./aboutus.php">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                        
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto"  data-dismiss="modal" >Cancel</button>
                            <button type="submit" name="Submit" value="submit" class="btn btn-primary btn-sm ml-1">Register</button>        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color:white">Login </h4>
                    <button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="login" method="post" action="index.php">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                    <input name="emailid1" id="emailid1" type="email" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter email">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input name="password1" id="password1" type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto"  data-dismiss="modal" >Cancel</button>
                            <input name="submit" id="submit" value="submit" type="submit" class="btn btn-primary btn-sm ml-1" value="Log In"></input>        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1 class="text-light display-3 font-weight-bold">LearnZone</h1>
                    <p>India's best online education platform which helps you to have best learning experience.</p>
                </div>
                
                <div class="col-12 col-sm align-self-center">
                <form >
                    <label for="cars">Available Courses</label>
                    <select id="courses" name="courses">
                        <option value="HTML">HTML</option>
                        <option value="CSS">CSS</option>
                        <option value="JS">JS</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                        <option value="Ajax">Ajax</option>
                    </select>
                </form>
                </div>

                <div class="col-12 col-sm align-self-center">
					<img src="img/online-education.png" class="img-fluid">
                </div>
				
				
            </div>
        </div>
    </header>

    <div class="container">
		<div class="row row-content">
           <div class="col">
				<div id="mycarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-25"
                                src="img/html-5.png" alt="html">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>HTML </h2>
                                <p style="margin: 10px 20mm" class="d-none d-sm-block">HTML stands for Hyper Text Markup Language. It is the standard markup language for creating Web pages. It describes the structure of a Web page. It consists of a series of elements. HTML elements tell the browser how to display the content</p>
                            </div>
                        </div>
						
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-25"
								src="img/css-3.png" alt="css">
							<div class="carousel-caption d-none d-md-block">
								<h2>CSS </h2>
								<p style="margin: 10px 20mm" class="d-none d-sm-block">CSS stands for Cascading Style Sheets. It describes how HTML elements are to be displayed on screen, paper, or in other media. It saves a lot of work. It can control the layout of multiple web pages all at once</p>
							</div>
                        </div>
						
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-25"
								src="img/js1.png" alt="js">
							<div class="carousel-caption d-none d-md-block">
								<h2>Java Script</h2>
								<p style="margin: 10px 20mm" class="d-none d-sm-block" >JavaScript is the world's most popular programming language. It is the programming language of the Web. It is easy to learn.</p>
							</div>		
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid"
								src="img/java.png" alt="java">
							<div class="carousel-caption d-none d-md-block">
								<h2>Java </h2>
								<p style="margin: 10px 20mm" class="d-none d-sm-block" >Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is a general-purpose programming language intended to let application developers write once, run anywhere. </p>
							</div>		
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid"
								src="img/ajax.jpg" alt="ajax">
							<div class="carousel-caption d-none d-md-block">
								<h2>Ajax  <span class="badge badge-danger">NEW</span></h2>
								<p style="margin: 20px 25mm" class="d-none d-sm-block " >Ajax, short for "Asynchronous JavaScript and is a set of web development techniques that uses various web technologies on the client-side to create asynchronous web applications.</p>
							</div>		
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid w-25"
								src="img/python_icon.png" alt="python">
							<div class="carousel-caption d-none d-md-block">
								<h2>Python </h2>
								<p style="margin: 15px 20mm" class="d-none d-sm-block" >Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation.</p>
							</div>		
                        </div>
                    </div>
					<ol class="carousel-indicators">
                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mycarousel" data-slide-to="1"></li>
                        <li data-target="#mycarousel" data-slide-to="2"></li>
                        <li data-target="#mycarousel" data-slide-to="3"></li>
                        <li data-target="#mycarousel" data-slide-to="4"></li>
                        <li data-target="#mycarousel" data-slide-to="5"></li>
                    </ol>
					<a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
					
						<button class="btn btn-danger btn-sm" id="carouselButton">
							<span id="carousel-button-icon" class="fa fa-pause"></span>
						</button>
				</div>
            </div>
       </div>
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>HTML Crash Courses</h3>
            </div>
            <div class="col col-sm order-sm-first col-md">
				<div class="media">
                <a href="HTML.php">
				<img class="d-flex mr-3 img-thumbnail align-self-center"
							src="img/html.png" alt="html">
                </a>
					<div class="media-body ">
                        <h2 class="mt-0">
						    <a class="mt-0 text-dark" href="HTML.php" >HTML </a>
                        </h2>
						<p class="d-none d-sm-block">HTML stands for Hyper Text Markup Language. It is the standard markup language for creating Web pages. It describes the structure of a Web page. It consists of a series of elements. HTML elements tell the browser how to display the content</p>
                    </div>
				</div>
            </div>
        </div>


        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 col-md-3">
                <h3>CSS for absolute beginners</h3>
            </div>
            <div class="col col-sm col-md">
				<div class="media">
					<div class="media-body">
						<h2 class="mt-0">
                            <a class="mt-0 text-dark" href="CSS.php">CSS </a>
                        </h2>
						<p class="d-none d-sm-block">CSS stands for Cascading Style Sheets. It describes how HTML elements are to be displayed on screen, paper, or in other media. It saves a lot of work. It can control the layout of multiple web pages all at once</p>
                    </div>
					<div class="media-right">
                        <a href="CSS.php">
						    <img class="d-flex mr-3 img-thumbnail align-self-center"
							    src="img/css.png" alt="css">
                        </a>
					</div>
				</div>
            </div>
        </div>

        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>JS training courses</h3>
            </div>
            <div class="col col-sm order-sm-first col-md">
				<div class="media">
                    <a href="JS.php">
					    <img class="d-flex mr-3 img-thumbnail align-self-center w-50"
						    src="img/js.png" alt="js">
					</a>
                    <div class="media-body">
                        <a class="mt-0 text-dark" href="JS.php">
						    <h2 class="mt-0">Java Script</h2>
                        </a>
						<p class="d-none d-sm-block" >JavaScript is the world's most popular programming language. It is the programming language of the Web. It is easy to learn.</p>
                    </div>
				</div>
            </div>
        </div> 

        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 col-md-3">
                <h3>Here is everything you ned to learn Java</h3>
            </div>
            <div class="col col-sm col-md">
				<div class="media">
					<div class="media-body">
						<h2 class="mt-0"><a class="mt-0 text-dark" href="Java.php" >Java </a> </h2>
						<p class="d-none d-sm-block">Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is a general-purpose programming language intended to let application developers write once, run anywhere. </p>
                    </div>
                    
					<div class="media-right">
                        <a href="Java.php">
						<img class="d-flex mr-3 img-thumbnail align-self-center"
							src="img/java.png" alt="java">
                        </a>
					</div>
                    
				</div>
            </div>
        </div>

        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>Full course of Ajax</h3>
            </div>
            <div class="col col-sm order-sm-first col-md">
				<div class="media">
                    <a href="Ajax.php">
					<img class="d-flex mr-3 img-thumbnail align-self-center"
						src="img/ajax.jpg" alt="ajax">
                    </a>
					<div class="media-body">
						<h2 class="mt-0">
                            <a class="mt-0 text-dark" href="Ajax.php" >Ajax <span class="badge badge-danger">NEW</span> 
                            </a>  
                        </h2>
						<p class="d-none d-sm-block" >Ajax, short for "Asynchronous JavaScript and is a set of web development techniques that uses various web technologies on the client-side to create asynchronous web applications.</p>
                    </div>
				</div>
            </div>
        </div> 

        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 col-md-3">
                <h3>Advanced Python programming</h3>
            </div>
            <div class="col col-sm col-md">
				<div class="media">
					<div class="media-body">
						<h2 class="mt-0"><a class="mt-0 text-dark" href="Python.php" >Python </a></h2>
						<p class="d-none d-sm-block">Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation.</p>
                    </div>
					<div class="media-right">
                        <a href="Python.php">
                            <img class="d-flex mr-3 img-thumbnail align-self-center"
							src="img/python.png" alt="python">
                        </a>
						
					</div>
				</div>
            </div>
        </div>
		
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="./contactus.php">Help and support</a></li>
                        <li><a href="./aboutus.php">Terms & Conditions</a></li>
                        <li><a href="./aboutus.php">Privacy policy</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5 ">
                    <h5>Our Address</h5>
                    <address>
                        NITC Campus<br>
                        Calicut<br>
                        Kerala<br>
		              <i class="fa fa-phone fa-lg"></i>: +91 7556798456<br>
		              <i class="fa fa-fax fa-lg"></i>: +852 8765 4321<br>
		              <i class="fa fa-envelope fa-lg"></i> <a href="mailto:Ishank@nitc.ac.in">LearnZone@study.net</a>
		           </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google-plus" href="http://google.com/+"><i class="fa fa-google-plus fa-lg"> </i> </a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"> </i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"> </i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"> </i></a>
                        <a class="btn btn-social-icon btn-youtube" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"> </i></a>
                        <a class="btn btn-social-icon btn-envelope-o" href="mailto:"><i class="fa fa-envelope-o fa-lg"> </i></a>
                    </div>
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class ="col-auto">
                    <p>© Copyright 2021 LearnZone@study.net</p>
                </div>
           </div>
        </div>
    </footer>
	<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</body>

</html>
