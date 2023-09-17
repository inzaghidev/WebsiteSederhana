<?php
$fileclass = "../css/style.css";
$page_title = "Register";
$linkcalculator = "calculator.php";
$linkregister = "register.php";
$view_user = "view_user.php";
$password = "password.php";

include ('../layouts/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('../includes/mysqli_connect.php');
    $fn = trim($_POST['first_name']);
    $ln = trim($_POST['last_name']);
    $e = trim($_POST['email']);
    $p = trim($_POST['pass']);

    $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUE ('$fn', '$ln', '$e', SHA1('$p'), NOW())";
    $r = @mysqli_connect ($dbc, $q);

    if ($r) {
        echo '<h1>Thank you!</h1>
        <p>You are now registered.</p> <p><br /></p>';
    } else {
        echo '<h1>System Error</h1>
        <p class="error">You could not be registered due to a system error. We apologize for any inconvience.</p>';
    }
    mysqli_close($dbc);
}

?>

<h1>Register</h1>
<form action="register.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20"
    value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>"></p>

    <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40"
    value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>"></p>

    <p>Email Address: <input type="text" name="email" size="20" maxlength="60"
    value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"></p>
    
    <p>Password: <input type="text" name="pass" size="10" maxlength="20"
    value="<?php if(isset($_POST['pass'])) echo $_POST['pass'];?>"></p>

    <p>Confirm Password: <input type="text" name="pass2" size="10" maxlength="20"
    value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'];?>"></p>

    <p><input type="submit" name="submit" value="Register"></p>
</form>