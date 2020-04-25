<?php
include_once('templates/header.php');
require('../controller/connectdb.php');

if(!isset($_SESSION['email']) && $_SERVER['REQUEST_METHOD'] == 'GET')
    {
?>
<?php
    session_start();
?>
<body>  
<div class="row">
    <div class='col-md-3'></div>
    <div class='col-md-6'>
        <div class="wrapper">
            <h2>Login</h2>
            </br>
            <form class="needs-validation" action="login.php" id="login" method="post"> 
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
else if (!isset($_SESSION['email']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    if(strlen($_POST['email']) > 0)
    {
        $user = trim($_POST['email']);
        if(isset($_POST['password']))
        {
            $pwd = trim($_POST['pwd']);
            $_SESSION['email'] = $user;
            $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $_SESSION['pwd'] = $hash_pwd;
            header('Location: home.php');
        }
    }
} 
else if(isset($_SESSION['email'])) { 
    header('Location: home.php');
}?>