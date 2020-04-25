<?php
include_once('templates/header.php');
require('../controller/connectdb.php');

if(!isset($_SESSION['email']))
    {
?>

<body>  
<div class="row">
    <div class='col-md-3'></div>
    <div class='col-md-6'>
        <div class="wrapper">
            <h2>Login</h2>
            </br>
            <form class="needs-validation" action="signin.php" id="login" method="post"> 
            <div class="form-group mx-sm-5 mb-2">
                <label>Email</label>
                <input type="text" name="email" class="form-control" id="username" autofocus required>
            </div>    

            <div class="form-group mx-sm-5 mb-2 form-rounded">
                <label>Password</label>
                <input type="password" name="password" class ="form-control" id="password" required/>
            </div>
            <div class="form-group mx-sm-5 mb-2 form-rounded">
                <button class="btn btn-lg btn-primary" type="submit" >Sign in</button>
                <br>    
                <a href="register.php" class="register">Don't have an account? Register now</a>
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