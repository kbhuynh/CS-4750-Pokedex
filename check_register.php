<?php
    require('dbcommands/functions.php');
    // require('../dbcommands/functions.php');

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate email (needs @ symbol)
        if(empty(trim($_POST["email"]))){
            // $email_err = "Please enter a email.";
            die(header("location:register.php?registrationFailed=true&reason=email_blank"));
        }
        else{
            if(checkSignUp($_POST["email"]) > 0){
                // $email_err = "This email is already taken.";
                die(header("location:register.php?registrationFailed=true&reason=email_exists"));
            }
            // else {
            //     echo "<span style='display:inline-block;margin-bottom:20px;' class='alert alert-danger' role='alert'>Oops! Something went wrong. Please try again later.</span>";
            // }
        }

        // Validate username
        if(empty(trim($_POST["username"]))){
            // $username_err = "Please enter a username.";
            die(header("location:register.php?registrationFailed=true&reason=uname_blank"));
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))){
            // $password_err = "Please enter a password.";  
            die(header("location:register.php?registrationFailed=true&reason=pass_blank"));   
        } 
        else if(strlen(trim($_POST["password"])) < 6){
            // $password_err = "Password must have at least 6 characters.";
            die(header("location:register.php?registrationFailed=true&reason=pass_short"));
        } 
        else{
            $password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            // $confirm_password_err = "Please confirm password.";    
            die(header("location:register.php?registrationFailed=true&reason=cpass_blank")); 
        } 
        else{
            $confirm_password = trim($_POST["confirm_password"]);
            if($password != $confirm_password){
                // $confirm_password_err = "Passwords did not match.";
                die(header("location:register.php?registrationFailed=true&reason=pass_diff"));
            }
        }
    
        addSignUp($_POST["email"], $_POST["username"], $_POST["password"]);

    }
?>