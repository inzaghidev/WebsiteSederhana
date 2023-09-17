<?php
$filecss = "../css/style.css";
$linkcalculator = "calculator.php";
$linkregister = "register.php";
$view_user = "view_users.php";
$password = "password.php";

session_start();
if(!isset($_SESSION['user_id']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']))) {
    require('../includes/login_function.inc.php');
    redirect_user();
}

$page_title = "Logged In";

include('../layouts/header.php');
echo "<h1>Logged In!</h1>
<p>You are logged in as {$_SESSION['first_name']}.</p>
<p><a href=\"logout.php\">Logout</a></p>";

include('../layouts/footer.php');
?>
