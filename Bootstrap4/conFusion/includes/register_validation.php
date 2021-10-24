<?php
    $emailErr = $fNameErr = $lNameErr = $phNumErr = $pwErr = $cpwErr = "";
    if(isset($_POST['register']))
    {
        $email = trim($_POST['email']);
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $phoneNumber = trim($_POST['phoneNumber']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);

        if(empty($email))
            $emailErr = "*Email Address is required!";
        
        if(empty($firstName))
            $fNameErr = "*First Name is required!";
        /*else if(preg_match("/^[a-zA-Z-']*$/",$firstName)) {
            $fnameErr = "*Please enter a valid First Name";
            echo $fnameErr;
        }*/
        if(empty($lastName))
            $lNameErr = "*Last Name is required!";
        if(empty($phoneNumber))
            $phNumErr = "*Phone Number is required!";
        if(empty($password))
            $pwErr = "*Password is required!";
        if(empty($confirmPassword))
            $cpwErr = "*Please re-enter your password!";
        

        
    }
?>