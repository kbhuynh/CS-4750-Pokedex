<?php
include_once('templates/header.php');

if(!isset($_SESSION['email']))
    {
?>
<div class="row">
    <div class='col-md-3'></div>
    <div class='col-md-6'>
        <div class="formContainer wrapper">
            <h2>Login</h2>
            <a href="register.php" class="register">Don't have an account? Register now</a>  
            <?php 
            $reasons = array("password" => "An account with the entered email was not found.<br>Try again or <a style='color:#721c24;text-decoration:underline;' href='register.php'>create an account</a> instead.", 
                             "blank" => "You have left one or more fields blank.",
                             "wrongpass" => "Password was incorrect. Try again."
                            ); 
            if (isset($_GET["loginFailed"])) {
                echo '<div class="alert alert-danger" role="alert">' . $reasons[$_GET["reason"]] . '</div>'; 
            }
            ?>
            <form class="form" action="signin.php" id="login" method="post"> 
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" id="username" autofocus required>
            </div>    

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class ="form-control" id="password" required/>
            </div>
            <div class="form-group formSubmit">
                <button class="btn btn-lg btn-primary" type="submit" >Sign in</button>              
            </div> 
        </form>
        </div>
    </div>
    <div class="col-md-3"></div>

</body>
</html>

<?php } 
else { 
    header('Location: home.php');
}?>