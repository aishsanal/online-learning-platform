<?php
session_start();
$connect=mysqli_connect('localhost','root','','learning_platform');
$insert=false;
$showAlert = false; 

$emailid = $_SESSION['userLoggedInemail'];
//check connection
if(mysqli_connect_errno())
{
    echo 'Failed to connect to database: '.mysqli_connect_error();
}
$result1 = mysqli_query($connect, "SELECT * FROM user WHERE emailid = '$emailid' and css=1");
$num = mysqli_num_rows($result1);
        
if ($num==0)
{
    header("Location: user_view.php");
}
if(isset($_POST['css']))
{   
  
    if(in_array("csscb1", $_POST['css']) and in_array("csscb2", $_POST['css']) and in_array("csscb3", $_POST['css']) and in_array("csscb4", $_POST['css']) and in_array("csscb5", $_POST['css']))  
    {
        
        $sql="UPDATE user SET css= 0 WHERE emailid = '$emailid'";
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
$result2 = mysqli_query($connect,"SELECT Id,Fname,Lname FROM user WHERE css=1"); 
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
        <title>CSS</title>
        <link rel="icon" href="img/online-education.png" type="image/icon type">
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-sm fixed-top ">
            <!-- <div class="container"> -->
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <a class="navbar-brand mx-auto" href="./user_view.php"><img src="img/online-education.png" height="30" width="41"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="./user_view.php"> Home<span class="sr-only">(current)</span></a>
                        </li>    
                    </ul>
                    
                
                    
                    <a href="index.php" class="btn btn-sm btn-danger " id="logout-btn" role="button" aria-pressed="true" >LogOut</a>
                </div>
            <!-- </div> -->
        </nav>

        <div class="jumbotron py-4">
            <!-- <div class="container"> -->
                <div class="row row-header">
                    <div class=" col-sm-2 ml-0 ">
                        <img src="img/css-3.png" alt="" class="img-fluid" height="160" width="160">
                        
                    </div>
                    <div class="col-8 col-sm-6 align-self-center "><h1 class="text-light display-3 font-weight-bold">CSS</h1> </div>
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
                                <li class="sidebar-list nav-item list-group-item"><button type="button" class="text-dark font-weight-bold px-0 btn btn-link" data-toggle="collapse" data-target="#userTable"> Users</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 " >
                <div class="container my-5 ref text" >
                    <h2  >Text References</h2>
                    <div class="list-group">
                        <div class="list-group-item text1"><a href="https://www.w3schools.com/w3css/default.asp" target="_blank"><img  src="img/link.png" alt="" height="25" width="25"> CSS Notes - W3 Schools</a></div>
                        <div class="list-group-item "><a href="https://www.tutorialspoint.com/css/index.htm" target="_blank"><img src="img/link.png" alt="" height="25" width="25">  CSS Tutorial - Tutorials point</a></div>
                        
                    </div>
                </div>

                <div class="container my-5 ref video" >
                    <h2  >Video Recordings</h2>

                    <form class="form-check" name="css" id="css" method="post" action="CSS.php">
                        <label class="form-check-label" for="csscb1"><a href="https://www.youtube.com/watch?v=6vbgZnQrpbU" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">What is CSS by Edureka</a>
                            <input type="checkbox" name="css[]" value="csscb1">
                        </label><br>
                        <label class=" form-check-label" for="csscb2"><a href="https://www.youtube.com/watch?v=1PnVor36_40" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">Learn CSS in 20 minutes by Web Dev Simplified</a>
                            <input type="checkbox" name="css[]" value="csscb2">
                        </label><br>
                        <label class=" form-check-label" for="csscb3"><a href="https://www.youtube.com/watch?v=yfoY53QXEnI" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">CSS Crash Course for Absolute Beginners by Traversy Media</a>
                            <input type="checkbox" name="css[]" value="csscb3">
                        </label><br>
                        <label class="form-check-label" for="csscb4"><a href="https://www.youtube.com/watch?v=KN6oBEOz2ZI" target="_blank"><img src="img/play.png" alt="" height="25" width="25">CSS Crash Course for Absolute Beginners - Full Course by Clever Programmer</a>
                            <input type="checkbox" name="css[]" value="csscb4">
                        </label><br>
                        <label class="form-check-label" for="csscb5"><a href="https://www.youtube.com/watch?v=1Rs2ND1ryYc" target="_blank"><img src="img/play.png" alt="" height="25" width="25">CSS Tutorial - Zero to Hero by FreeCodeCamp</a>
                            <input type="checkbox" name="css[]" value="csscb5">
                        </label><br>
                        <br>
                        <label>
                        Finished course? Want to de-register?
                        <input name="css[]" id="Yes" value="Yes" type="submit" class="btn btn-primary btn-sm ml-1"></input>
                        <!--input type="submit" name="Completed" id="Completed" value="Completed"-->
                        </label>
                        
                        </form> 
                </div>

                <div class="container my-5 ref hide short">
                    <h2> Short Videos</h2>
                    <div class="list-group-item ref hide video short"><a href="https://www.youtube.com/watch?v=6vbgZnQrpbU" target="_blank"><img  src="img/play.png" alt="" height="25" width="25">What is CSS by Edureka</a></div>
                </div>

                <div class="container my-5 ref hide medium">
                    <h2> Medium Videos</h2>
                    <div class="list-group-item ref hide video medium"><a href="https://www.youtube.com/watch?v=1PnVor36_40" target="_blank"><img src="img/play.png" alt="" height="25" width="25">  Learn CSS in 20 minutes by Web Dev Simplified</a></div>
                </div>

                <div class="container my-5 ref hide long">
                    <h2> Long Videos</h2>
                    <div class="list-group-item ref hide video long"><a href="https://www.youtube.com/watch?v=yfoY53QXEnI" target="_blank"><img  src="img/play.png" alt="" height="25" width="25"> CSS Crash Course for Absolute Beginners by Traversy Media</a></div>
                    <div class="list-group-item ref hide video long"><a href="https://www.youtube.com/watch?v=KN6oBEOz2ZI" target="_blank"><img src="img/play.png" alt="" height="25" width="25"> CSS Crash Course for Absolute Beginners - Full Course by Clever Programmer</a></div>>
                    <div class="list-group-item ref hide video long"><a href="https://www.youtube.com/watch?v=1Rs2ND1ryYc" target="_blank"><img src="img/play.png" alt="" height="25" width="25">CSS Tutorial - Zero to Hero by FreeCodeCamp</a></div>                </div>
            </div>
        </div>
        <div id="userTable" class="container my-5 collapse">
            <h3>Users</h3>
        <table class="table table-striped" >                     
            <div class="table responsive">
                <thead>
                <tr>
                <th>UserId</th>
                <th>First Name</th>
                <th>Last Name</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($result2->num_rows > 0) {
                            // output data of each row
                            while($row = $result2->fetch_assoc()) {
                        
                        
                                echo '<tr>
                                          <td scope="row">' . $row["Id"]. '</td>
                                          <td>' . $row["Fname"] .'</td>
                                          <td> '.$row["Lname"] .'</td>
                                        </tr>';
                            }
                        } else {
                            echo "0 results";
                        } 
                    ?>

                </tbody>
            </div>
        </table>
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
    <script src="js/filter.js"></script>
    </body>
</html>