<?php
//session_start();
$connect=mysqli_connect('localhost','root','','learning_platform');
$insert=false;
$showAlert = false; 

//$emailid = $_SESSION['userLoggedInemail'];
//check connection
if(mysqli_connect_errno())
{
    echo 'Failed to connect to database: '.mysqli_connect_error();
}
$result2 = mysqli_query($connect,"SELECT Id,Fname,Lname FROM user");
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
                <a class="navbar-brand mx-auto" href="./user_view.php"><img src="img/online-education.png" height="30" width="41"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="user_view.php"> Home<span class="sr-only">(current)</span></a>
                        </li>    
                    </ul>
                    
                    <a href="index.php" class="btn btn-sm btn-danger " id="logout-btn" role="button" aria-pressed="true" >LogOut</a>
                </div>
            <!-- </div> -->
    </nav>
    <div id="userTable" class="container">
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

        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
    <script src="js/filter.js"></script>
</body>
</html>