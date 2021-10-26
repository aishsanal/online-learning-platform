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
                <a href="index.php" class="btn btn-sm btn-danger " id="logout-btn" role="button" aria-pressed="true" >LogOut</a>
                </div>
		<!-- </div> -->
	</nav>
	
	
    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1 class="text-light display-3 font-weight-bold">LearnZone</h1>
                    <p>India's best online education platform which helps you to have best learning experience.</p>
                </div>
                <div class="search-container">
                    <form name="search" method="post" action="user_view.php">
                        <input type="text" placeholder="Search course.." name="course" id="course">
                        <button name="search1" id="search1" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <?php
                    session_start();

                    $con=mysqli_connect('localhost','root','','learning_platform');
                    $insert=false;
             
                    //check connection
                    if(mysqli_connect_errno())
                    {
                        echo 'Failed to connect to database: '.mysqli_connect_error();
                    }

                    if(isset($_POST['search1']))
                    {
                        $emailid = $_SESSION['userLoggedInemail'];
                        $course= $_POST['course'];
                        $showAlert = false;
                        $enrollment_error= false;

                        if($course=='HTML')
                        {
                            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and html=1");
                            $num = mysqli_num_rows($result1);
            
                            if ($num==1)
                            {
                                header("Location: HTML.php");
                            }
                            else
                            {
                                $enrollment_error = true;
                            }
                            
                        }
                        else if($course=='CSS')
                        {
                            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and css=1");
                            $num = mysqli_num_rows($result1);
            
                            if ($num==1)
                            {
                                header("Location: CSS.php");
                            }
                            else
                            {
                                $enrollment_error = true;
                            }
                        }
                        else if($course=='JS')
                        {
                            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and js=1");
                            $num = mysqli_num_rows($result1);
            
                            if ($num==1)
                            {
                                header("Location: JS.php");
                            }
                            else
                            {
                                $enrollment_error = true;
                            }
                        }
                        else if($course=='Java')
                        {
                            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and java=1");
                            $num = mysqli_num_rows($result1);
            
                            if ($num==1)
                            {
                                header("Location: Java.php");
                            }
                            else
                            {
                                $enrollment_error = true;
                            }
                        }
                        else if($course=='Python')
                        {
                            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and python=1");
                            $num = mysqli_num_rows($result1);
            
                            if ($num==1)
                            {
                                header("Location: Python.php");
                            }
                            else
                            {
                                $enrollment_error = true;
                            }
                        }
                        else if($course=='Ajax')
                        {
                            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and ajax=1");
                            $num = mysqli_num_rows($result1);
            
                            if ($num==1)
                            {
                                header("Location: Ajax.php");
                            }
                            else
                            {
                                $enrollment_error = true;
                            }
                        }
                        else 
                        { 
                            $showAlert = true; 
                        }   
                        if($enrollment_error) {
                            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> You are not enrolled in the course, please enroll first.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                <span aria-hidden="true">×</span> 
                                </button> 
                            </div> '; 
                        }
                        if($showAlert) {
                            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Course Not available
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                <span aria-hidden="true">×</span> 
                                </button> 
                            </div> '; 
                        }
                        
                    }
                ?>
				
				
            </div>
        </div>
    </header>
    <?php
        $con=mysqli_connect('localhost','root','','learning_platform');
        $insert=false;
        $showAlert = false; 
             
        //check connection
        if(mysqli_connect_errno())
        {
            echo 'Failed to connect to database: '.mysqli_connect_error();
        } 
                
        $emailid = $_SESSION['userLoggedInemail'];
        
        
        if(isset($_POST['HTML']))
        {
            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and html=0");
            $num = mysqli_num_rows($result1);
            if ($num==1)
            {
                $sql="UPDATE user SET html= 1 WHERE emailid = '$emailid'";
                $result = mysqli_query($con, $sql);
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Successfully enrolled for HTML course. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
            }
            else
            {
                $showAlert = true;
            }
            
        }
        if(isset($_POST['CSS']))
        {
            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and css=0");
            $num = mysqli_num_rows($result1);
            if ($num==1)
            {
                $sql="UPDATE user SET css= 1 WHERE emailid = '$emailid'";
                $result = mysqli_query($con, $sql);
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Successfully enrolled for CSS course. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
            }
            else
            {
                $showAlert = true;
            }
            
        }
        if(isset($_POST['JS']))
        {
            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and js=0");
            $num = mysqli_num_rows($result1);
            if ($num==1)
            {
                $sql="UPDATE user SET js= 1 WHERE emailid = '$emailid'";
                $result = mysqli_query($con, $sql);
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Successfully enrolled for JS course. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
            }
            else
            {
                $showAlert = true;
            }
            
        }

        if(isset($_POST['Java']))
        {
            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and java=0");
            $num = mysqli_num_rows($result1);
            if ($num==1)
            {
                $sql="UPDATE user SET java= 1 WHERE emailid = '$emailid'";
                $result = mysqli_query($con, $sql);
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Successfully enrolled for Java course. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
            }
            else
            {
                $showAlert = true;
            }
            
        }
        if(isset($_POST['Python']))
        {
            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and python=0");
            $num = mysqli_num_rows($result1);
            if ($num==1)
            {
                $sql="UPDATE user SET python= 1 WHERE emailid = '$emailid'";
                $result = mysqli_query($con, $sql);
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Successfully enrolled for Python course. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
            }
            else
            {
                $showAlert = true;
            }
            
        }
        if(isset($_POST['Ajax']))
        {
            $result1 = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid' and ajax=0");
            $num = mysqli_num_rows($result1);
            if ($num==1)
            {
                $sql="UPDATE user SET ajax= 1 WHERE emailid = '$emailid'";
                $result = mysqli_query($con, $sql);
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Successfully enrolled for Ajax course. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> '; 
            }
            else
            {
                $showAlert = true;
            }
            
        }
        if($showAlert) {
            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Already enrolled in the course. 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                            <span aria-hidden="true">×</span> 
                        </button> 
                    </div> '; 
        }   
        mysqli_close($con); 
                
    ?>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>HTML Crash Courses</h3>
                <form name="html" method="post" action="user_view.php" >
                    <div class="form-row">
                        <button name="HTML" id="HTML" class="btn btn-sm btn-danger " type="submit" role="button" aria-pressed="true" >Enroll</button>
                    </div>
                </form>
            </div>
            <div class="col col-sm order-sm-first col-md">
				<div class="media">
				<img class="d-flex mr-3 img-thumbnail align-self-center"
							src="img/html.png" alt="html">
					<div class="media-body ">
                        <h2 class="mt-0">
						    <a class="mt-0 text-dark" >HTML </a>
                        </h2>
						<p class="d-none d-sm-block">HTML stands for Hyper Text Markup Language. It is the standard markup language for creating Web pages. It describes the structure of a Web page. It consists of a series of elements. HTML elements tell the browser how to display the content</p>
                    </div>
				</div>
            </div>
        </div>

    
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 col-md-3">
                <h3>CSS for absolute beginners</h3>
                <form name="css" method="post" action="user_view.php" >
                    <div class="form-row">
                        <button name="CSS" id="CSS" class="btn btn-sm btn-danger " type="submit" role="button" aria-pressed="true" >Enroll</button>
                    </div>
                </form>
            </div>
            <div class="col col-sm col-md">
				<div class="media">
					<div class="media-body">
						<h2 class="mt-0">
                            <a class="mt-0 text-dark" >CSS </a>
                        </h2>
						<p class="d-none d-sm-block">CSS stands for Cascading Style Sheets. It describes how HTML elements are to be displayed on screen, paper, or in other media. It saves a lot of work. It can control the layout of multiple web pages all at once</p>
                    </div>
					<div class="media-right">
						    <img class="d-flex mr-3 img-thumbnail align-self-center"
							    src="img/css.png" alt="css">
                        
					</div>
				</div>
            </div>
        </div>

        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>JS training courses</h3>
                <form name="js" method="post" action="user_view.php" >
                    <div class="form-row">
                        <button name="JS" id="JS" class="btn btn-sm btn-danger " type="submit" role="button" aria-pressed="true" >Enroll</button>
                    </div>
                </form>
            </div>
            <div class="col col-sm order-sm-first col-md">
				<div class="media">
					    <img class="d-flex mr-3 img-thumbnail align-self-center w-50"
						    src="img/js.png" alt="js">
					
                    <div class="media-body">
                        <a class="mt-0 text-dark" >
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
                <form name="java" method="post" action="user_view.php" >
                    <div class="form-row">
                        <button name="Java" id="Java" class="btn btn-sm btn-danger " type="submit" role="button" aria-pressed="true" >Enroll</button>
                    </div>
                </form>
            </div>
            <div class="col col-sm col-md">
				<div class="media">
					<div class="media-body">
						<h2 class="mt-0"><a class="mt-0 text-dark" >Java </a> </h2>
						<p class="d-none d-sm-block">Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is a general-purpose programming language intended to let application developers write once, run anywhere. </p>
                    </div>
                    
					<div class="media-right">
						<img class="d-flex mr-3 img-thumbnail align-self-center"
							src="img/java.png" alt="java">
                        
					</div>
                    
				</div>
            </div>
        </div>

        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>Full course of Ajax</h3>
                <form name="ajax" method="post" action="user_view.php" >
                    <div class="form-row">
                        <button name="Ajax" id="Ajax" class="btn btn-sm btn-danger " type="submit" role="button" aria-pressed="true" >Enroll</button>
                    </div>
                </form>
            </div>
            <div class="col col-sm order-sm-first col-md">
				<div class="media">
					<img class="d-flex mr-3 img-thumbnail align-self-center"
						src="img/ajax.jpg" alt="ajax">
                   
					<div class="media-body">
						<h2 class="mt-0">
                            <a class="mt-0 text-dark"  >Ajax <span class="badge badge-danger">NEW</span> 
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
                <form name="python" method="post" action="user_view.php" >
                    <div class="form-row">
                        <button name="Python" id="Python" class="btn btn-sm btn-danger " type="submit" role="button" aria-pressed="true" >Enroll</button>
                    </div>
                </form>
            </div>
            <div class="col col-sm col-md">
				<div class="media">
					<div class="media-body">
						<h2 class="mt-0"><a class="mt-0 text-dark"  >Python </a></h2>
						<p class="d-none d-sm-block">Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation.</p>
                    </div>
					<div class="media-right">
                            <img class="d-flex mr-3 img-thumbnail align-self-center"
							src="img/python.png" alt="python">
                    
						
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
                        <li><a href="./contactus.html">Help and support</a></li>
                        <li><a href="./aboutus.html">Terms & Conditions</a></li>
                        <li><a href="./aboutus.html">Privacy policy</a></li>
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
