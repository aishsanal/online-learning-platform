<?php
if(isset($_POST['js']))
{
    session_start();
    $connect=mysqli_connect('localhost','root','','learning_platform');
    $insert=false;
    $showAlert = false; 
 
    //check connection
    if(mysqli_connect_errno())
    {
        echo 'Failed to connect to database: '.mysqli_connect_error();
    } 
        
    
    $emailid = $_SESSION['userLoggedInemail'];
    
  
    if(in_array("jscb1", $_POST['js']) and in_array("jscb2", $_POST['js']) and in_array("jscb3", $_POST['js']) and in_array("jscb4", $_POST['js']) and in_array("jscb5", $_POST['js']))  
    {
        
        $sql="UPDATE user SET js= 0 WHERE emailid = '$emailid'";
        $result = mysqli_query($connect, $sql);
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You have been successfully deregistered. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">×</span> 
                    </button> 
                </div> ';
        header("Location: user_view.php");
    }   
    else 
    { 
        $showAlert = true; 
    }   
 
    if($showAlert) {
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> You have not completed all courses.
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
        <title>JS</title>
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
                    
                
                    
                    <a href="index.php" class="btn btn-sm btn-danger " id="logout-btn" role="button" aria-pressed="true" >LogOut</a>
                </div>
            <!-- </div> -->
        </nav>

        <div class="jumbotron py-4">
            <!-- <div class="container"> -->
                <div class="row row-header">
                    <div class=" col-sm-2 ml-0 ">
                        <img src="img/js1.png" alt="" class="img-fluid" height="160" width="160">
                        
                    </div>
                    <div class="col-8 col-sm-6 align-self-center "><h1 class="text-light display-3 font-weight-bold">JavaScript</h1> </div>
                </div>
            <!-- </div> -->
            
            
        </div>


        <div class="row row-header">
            <div class="col-sm-2 pl-0">
                <div class="sidebar-section ">
                    <div class="sidebar-item sticky-top">
                        <div class="sidebar-content px-0">
                            <h4 class="ml-3 font-weight-bold">Filters</h4>
                            <ul class=" navbar-nav list-group bg-light">
                                <li class="sidebar-list nav-item filter_link list-group-item" data-filter="all"><a class="text-dark font-weight-bold" href="#" >All</a></li>
                                <li class="sidebar-list nav-item filter_link list-group-item" data-filter="text"><a class="text-dark font-weight-bold" href="#">Text References</a> </li>
                                <li class="sidebar-list nav-item filter_link list-group-item" data-filter="video"><a class="text-dark font-weight-bold" href="#">Video Recordings</a> </li>
                                <li class="sidebar-list nav-item filter_link list-group-item" data-filter="short"><a class="text-dark font-weight-bold" href="#">Short</a> </li>
                                <li class="sidebar-list nav-item filter_link list-group-item" data-filter="medium"><a class="text-dark font-weight-bold" href="#">Medium</a> </li>
                                <li class="sidebar-list nav-item filter_link list-group-item" data-filter="long"><a class="text-dark font-weight-bold" href="#">Long</a> </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 " >
                <div class="container my-5 ref text" >
                    <h2  >Text References</h2>
                    <div class="list-group">
                        <div class="list-group-item text1"><a href="https://www.w3schools.com/js/" target="_blank"><img  src="img/link.png" alt="" height="25" width="25"> Javascript Tutorial - W3 Schools</a></div>
                        <div class="list-group-item "><a href="https://www.tutorialspoint.com/javascript/javascript_quick_guide.htm" target="_blank"><img src="img/link.png" alt="" height="25" width="25">  Javascript Quick Guide - Tutorials point</a></div>
                        
                    </div>
                </div>
                
                <div class="container my-5 ref video" >
                    <h2  >Video Recordings</h2>

                    <form class="form-check" name="js" id="js" method="post" action="JS.php">
                        <label class="form-check-label" for="jscb1"><a href="https://www.youtube.com/watch?v=Ia0FSogTRaw" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">What is JS by Edureka</a>
                            <input type="checkbox" name="js[]" value="jscb1">
                        </label><br>
                        <label class=" form-check-label" for="jscb2"><a href="https://www.youtube.com/watch?v=W6NZfCO5SIk" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">Javascript Tutorial for Beginners by MOSH</a>
                            <input type="checkbox" name="js[]" value="jscb2">
                        </label><br>
                        <label class=" form-check-label" for="jscb3"><a href="https://www.youtube.com/watch?v=pU722vRd66A" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">JavaScript Tutorial for Beginners by Telusko</a>
                            <input type="checkbox" name="js[]" value="jscb3">
                        </label><br>
                        <label class="form-check-label" for="jscb4"><a href="https://www.youtube.com/watch?v=o1IaduQICO0" target="_blank"><img src="img/play.png" alt="" height="25" width="25">JavaScript Full Course by Edureka</a>
                            <input type="checkbox" name="js[]" value="jscb4">
                        </label><br>
                        <label class="form-check-label" for="jscb5"><a href="https://www.youtube.com/watch?v=PkZNo7MFNFg" target="_blank"><img src="img/play.png" alt="" height="25" width="25">Learn Javascript - Full Course for Beginners by FreeCodeCamp</a>
                            <input type="checkbox" name="js[]" value="jscb5">
                        </label><br>
                        <br>
                        <label>
                        Finished course? Want to de-register?
                        <input name="js[]" id="Yes" value="Yes" type="submit" class="btn btn-primary btn-sm ml-1"></input>
                        <!--input type="submit" name="Completed" id="Completed" value="Completed"-->
                        </label>
                        
                        </form> 
                </div>


                <div class="container my-5 ref hide short">
                    <h2> Short Videos</h2>
                    <div class="list-group-item ref hide video short"><a href="https://www.youtube.com/watch?v=Ia0FSogTRaw" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">What is JS by Edureka</a></div>
                </div>

                <div class="container my-5 ref hide medium">
                    <h2> Medium Videos</h2>
                    <div class="list-group-item ref hide video medium"><a href="https://www.youtube.com/watch?v=W6NZfCO5SIk" target="_blank"><img src="img/play.png" alt="" height="25" width="25"> JavaScript Tutorial for Beginners by MOSH</a></div>
                </div>

                <div class="container my-5 ref hide long">
                    <h2> Long Videos</h2>
                    <div class="list-group-item ref hide video long"><a href="https://www.youtube.com/watch?v=pU722vRd66A" target="_blank"><img  src="img/play.png" alt="" height="25" width="25"> JavaScript Tutorial for Beginners by Telusko</a></div>
                    <div class="list-group-item ref hide video long"><a href="https://www.youtube.com/watch?v=o1IaduQICO0" target="_blank"><img src="img/play.png" alt="" height="25" width="25"> JavaScript Full Course by Edureka</a></div>
                    <div class="list-group-item ref hide video long"><a href="https://www.youtube.com/watch?v=PkZNo7MFNFg" target="_blank"><img src="img/play.png" alt="" height="25" width="25">Learn JavaScript Full Course for Beginners by FreeCodeCamp</a></div>               
                </div>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
    <script src="js/filter.js"></script>
    </body>
</html>