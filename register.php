<?php
include_once('templates/header.php');
?>

<div class="row">
<div class='col-md-3'></div>
<div class='col-md-6'>
    <div class="wrapper formContainer">
        <h2>Sign Up</h2>
        <p>Already have an account? <a href="login.php">Login here</a></p>
        <?php 
            $reasons = array("email_blank" => "Please enter a valid email.", 
                            "email_exists" => "There is already an account under this email. Try <a style='color:#721c24;text-decoration:underline;' href='login.php'>logging in</a> instead?",
                            "pass_short" => "Password is too short. Length must be at least 6 characters.",
                            "uname_blank" => "Please enter a username.",
                            "pass_blank" => "Please enter a password.",
                            "cpass_blank" => "Please confirm your password.",
                            "pass_diff" => "Your passwords did not match. Try again."
                        ); 
            if (isset($_GET["registrationFailed"])) {
                echo '<div class="alert alert-danger" role="alert">' . $reasons[$_GET["reason"]] . '</div>'; 
            }
        ?>
        <form class="form" action="check_register.php" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="" autofocus required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="" required>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="" required>
            </div>
            <div class="formSubmit form-group">
                <input type="submit" class="btn btn-primary" value="Submit">                
            </div>
        </form>
    </div>    
</div>
<div class='col-md-3'></div>
</div>

</body>
</html>