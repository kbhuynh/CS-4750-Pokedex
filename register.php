<?php
include_once('templates/header.php');
require('controller/connectdb.php');
require('dbcommands/functions.php');
require('dbcommands/teamActions.php');
?>

<?php
    // Define variables and initialize with empty values
    $email = $username = $password = $confirm_password = "";
    $email_err = $username_err = $password_err = $confirm_password_err = "";
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate email (needs @ symbol)
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter a email.";
        }
        else{
            if(checkSignUp($_POST["email"]) > 1){
                $email_err = "This email is already taken.";
            }
            else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";     
        } 
        else if(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have at least 6 characters.";
        } 
        else{
            $password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";     
        } 
        else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }
        
        // Check input errors before inserting in database
        if(empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            
            addSignUp($_POST["email"], $_POST["username"], $_POST["password"]);
            // // Prepare an insert statement
            // $sql = "INSERT INTO User (email, username, password) VALUES (?, ?, ?)";
             
            // if($stmt = mysqli_prepare($link, $sql)){
            //     // Bind variables to the prepared statement as parameters
            //     mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_username, $param_password);
                
            //     // Set parameters
            //     $param_email = $email;
            //     $param_username = $username;
            //     $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                
            //     // Attempt to execute the prepared statement
            //     if(mysqli_stmt_execute($stmt)){
            //         // Redirect to login page
            //         header("location: login.php");
            //     } else{
            //         echo "Something went wrong. Please try again later.";
            //     }
    
            //     // Close statement
            //     mysqli_stmt_close($stmt);
        }
    }
        
        // Close connection
        //mysqli_close($link);
?>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>    
</body>
</html>