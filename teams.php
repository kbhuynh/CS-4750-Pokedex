<?php
include_once('templates/header.php');
$action = "list_teams";        // default action
if(isset($_SESSION['email']))
{
?>
    <div class="container">

    <?php
    $team_to_update = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $teams = getAllTeams();
        include('viewTeam.php');        // default action
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['action']) && ($_POST['action'] == 'Edit'))
        {
            $tteam_to_update = getTeamInfo_by_id($_POST['teamID']);		
            include('editTeam.php');
            if (!empty($_POST['teamID']) && !empty($_POST['pokemon1']) && !empty($_POST['pokemon2']))
            {
                editTeam($_POST['teamID'], $_POST['pokemon1'], $_POST['pokemon2'], $_POST['pokemon3'], $_POST['pokemon4'], $_POST['pokemon5'], $_POST['pokemon6']);
                header("Location: teams.php");
            }
        }
        else if (!empty($_POST['action']) && ($_POST['action'] == 'Add'))
        {
            if (!empty($_POST['p1']))
            {
                addTeam($_SESSION['email'], $_POST['teamname'], $_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['p6']);
                header("Location: teams.php");
            }
        }
        else if (!empty($_POST['action']) && ($_POST['action'] == 'Delete'))
        {
            if (!empty($_POST['teamID']) )
            {
                deleteTeam($_POST['teamID'], $_SESSION['email']);
                header("Location: teams.php");
            }
        }
    }
    ?>
    </div>
</body>
</html>
<?php } else {
    header('Location: login.php');
}?>