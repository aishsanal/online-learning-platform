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
                        <a class="nav-link" href="./index.html"> Home<span class="sr-only">(current)</span></a>
                    </li>
					<li class="nav-item"><a class="nav-link" href="./aboutus.html"></span> About</a></li>
					<li class="nav-item"><a class="nav-link" href="./contactus.html"> Contact</a></li>
                    
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
                    if(isset($_POST['search1']))
                    {
                        $course= $_POST['course'];
                        if($course=='HTML')
                        {
                            header("Location: HTML.php");
                        }
                        else if($course=='CSS')
                        {
                            header("Location: CSS.php");
                        }
                        else if($course=='JS')
                        {
                            header("Location: JS.php");
                        }
                        else if($course=='Java')
                        {
                            header("Location: Java.php");
                        }
                        else if($course=='Python')
                        {
                            header("Location: Python.php");
                        }
                        else if($course=='Ajax')
                        {
                            header("Location: Ajax.php");
                        }
                        else 
                        { 
                            $showAlert = true; 
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

    <section id="myCourses">
        <div class="ui container">
            <div class="middle">
                <h1>My courses</h1><br>

                <?php
                session_start();
                $con=mysqli_connect('localhost','root','','learning_platform');
                $insert=false;
             
                //check connection
                if(mysqli_connect_errno())
                {
                    echo 'Failed to connect to database: '.mysqli_connect_error();
                } 
                $emailid = $_SESSION['userLoggedInemail'];
                $result = mysqli_query($con, "SELECT * FROM user WHERE emailid = '$emailid'");
                //$userId = mysqli_fetch_assoc($result)['Id'];
                echo("check1");
                //Get all courses of current user
               /* $courseQuery = "SELECT * FROM enrolled WHERE userId = '$userId'";
                $courseResult = mysqli_query($con, $courseQuery);

                if (mysqli_num_rows($courseResult) == 0) {
                    echo "<h2>Congratulations for registering! Now Enroll in a course and start learning.</h2></br>";

                    // View courses button
                    echo "
                        <div class='button'>
                            <a class='ui primary button' id='view-courses-btn' href='courses.php'>View Courses</a>
                        </div>";
                } else {
                    // User has enrolled in some courses
                    while ($course = mysqli_fetch_assoc($courseResult)) {

                        // Get course id
                        $courseId = $course['courseId'];

                        // Get course details
                        $myCourseResult = mysqli_query($con, "SELECT * FROM course WHERE Id = '$courseId'");
                        $myCourse = mysqli_fetch_assoc($myCourseResult);

                        // Html card template
                        echo "<div class='ui link cards' id='myCoursesCards'>" .
                            "<div class='link card'>
                                <div class='content'>
                                    <div class='header'>" . $myCourse['title'] . "</div>
                                    <div class='meta'>
                                        <a>" . $myCourse['category'] . "</a>
                                    </div><br>
                                </div>
                            
                        </div>
                        </div>";
                    }
                }*/
                mysqli_close($con); 
                
                ?>
            </div>
        </div>
    </section>
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
