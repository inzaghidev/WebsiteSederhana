<?php
require ('../layouts/header.php');

#template
session_start();
if(!isset($_SESSION['user_id'])) {
    require('../includes/login_function.inc.php');
    redirect_user();
} else {
    //setcookie('user_id', $data['user_id'], time()+3600, '/', '', 0, 0);
    //setcookie('first_name', $data['first_name'], time()+3600, '/', '', 0, 0);
    $_SESSION = array();
    session_destroy();

    setcookie('PHPSESSIONID', '', time()-3600, '/', '', 0, 0);
}

$page_title = 'Logout';
$filecss = "../css/style.css";
$linkcalculator = "calculator.php";
$linkregister = "register.php";
$view_user = "view_users.php";
$password = "password.php";

include('../layouts/header.php');
?>

<h1>Logged Out</h1>
<p>Anda sekarang telah logged out.<?php echo $_COOKIE['first_name'];?></p>

<?php
include('../layouts/footer.php');
?>