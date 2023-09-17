<?php
#template
$filecss = "../css/style.css";
$page_title = "Login";
$linkcalculator = "calculator.php";
$linkregister = "register.php";
$view_user = "view_users.php";
$password = "password.php";

include('../layouts/header.php');

if (isset($errors) && !empty($errors)) {
    echo '<h1>Error!</h1>
    <p class="error">Berikut kesalahan yang ditemukan:<br/>';
    foreach ($errors as $msg) {
        echo "- $msg<br>\n";
    }
    echo '</p><p>Silakan diicoba lagi.</p>';
}
?>

<h1>Login</h1>
<form action="login.php" method="post">
    <p>Email address: <input type="email" name="email" size="30" maxlength="60"/></p>
    <p>Password: <input type="password" name="pass" size="20" maxlength="20"/></p>
    <p><input type="submit" name="submit" value="login"/></p>
</form>

<?php
include('../includes/footer.php');
?>