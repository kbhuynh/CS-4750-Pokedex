<?php
    if(isset($_SESSION['email']))
    {
?>
<?php
include_once('templates/header.php');
require('controller/connectdb.php');
if(isset($_SESSION['email']))
{
?>
<body>

<h1>Hello <?php echo $_SESSION['email'];?></h1>

</body>
</html>
<?php } else {
    header('Location: login.php');
}?>