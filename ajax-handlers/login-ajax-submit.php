<?php
session_start();

//connect to the database
require '../includes/db-connect.php';

$teamNumber = $_POST['teamNumber'];
$teamPassword = $_POST['teamPassword'];
$scoutName = $_POST['scoutName'];
//$location = $_POST['location'];

//TODO: integrate actual locations
$location = "test location";

try {
    $authenticate = $db->prepare('SELECT team_number FROM team_accounts WHERE team_number = ? AND team_password = md5(?)');
    $authenticate->execute(array($teamNumber, $teamPassword));
    $teams = $authenticate->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Unable to connect to DB\n " . $ex->getMessage());
}

if (key_exists('team_number', $teams)) {
    # Login success
    # Regenerate the session ID to avoid session fixation
    session_regenerate_id();

    # Store the team/user data. $userID is not validated. $teamID was verified via auth query.
    $_SESSION['teamNumber'] = $teamNumber;
    $_SESSION['scoutName'] = $scoutName;
    $_SESSION['location'] = $location;
    $_SESSION['isAdmin'] = false;

    # Redirect to the post-login page
    //header('location: home');
} else {
    unset($_SESSION['teamNumber']);
    unset($_SESSION['scoutName']);
    unset($_SESSION['location']);
    unset($_SESSION['isAdmin']);
    echo "Your username, password, or team number are incorrect. Contact your team administrator for your team's password.";
}
?>
