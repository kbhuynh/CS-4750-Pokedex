<?php
include_once('templates/header.php');
require('controller/connectdb.php');
if(isset($_SESSION['email']))
{
?>
<body>

</body>
</html>
<?php } else {
    header('Location: login.php');
}?>