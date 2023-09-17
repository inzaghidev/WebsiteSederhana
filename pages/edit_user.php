<?php

$page_title = "Edit User";
include('../layouts/header.php');
if((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
    $id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
    $id = $_POST['id'];
} else {
    echo '<p class="error">Error ditemukan</p>';
    include("../layouts/footer.html");
}
?>

<h1>Halaman Edit User</h1>

<?php
include('../includes/mysqli_connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();
    if(empty($_POST['first_name'])){
        $errors[] = "You forgot to enter the first name.";
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }
    if(empty($_POST['last_name'])){
        $errors[] = "You forgot to enter the last name.";
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }
    if(empty($_POST['email'])){
        $errors[] = "You forgot enter Email.";
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
    if(empty($errors)){
        $q = "SELECT user_id FROM users WHERE email = '$e' AND user_id !=$id";
        $r = @mysqli_query($dbc, $q);
        if(@mysqli_num_rows($r) == 0){
            $q = "UPDATE users SET first_name = '$fn', last_name = '$ln', email = '$e' WHERE user_id = $id LIMIT 1";
            $r = @mysqli_query($dbc, $q);
            if(mysqli_affected_rows($dbc) == 1) {
                echo "<p>User sudah di edit</p>";
            } else {
                echo '<p class="Error">User tidak bisa di edit</p>';
                echo '<p>' . mysqli_error($dbc) . '<br /> Query:' . $q . '</p>';
            }        
        } else {
            echo '<p class="error">Email sudah terdaftar</p>';
        }
        mysqli_close($dbc);
        include('../includes/footer.html');
        exit();
    } else {
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occured: <br />';
        foreach($errors as $msg) {
            echo "- $msg<br>\n";
        }
        echo '</p><p>Please Try Again</p>';
    }
}

$q = "SELECT first_name, last_name, email FROM users WHERE user_id = $id";
$r = @mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 1) {
    $row = mysqli_fetch_array($r, MYSQLI_NUM);

    //create form

    echo '<form action="edit_user.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="'. $row[0] .'"></p>
    <p>Last Name: <input type="text" name="last_name" size="15" maxlength="15" value="'. $row[1] .'"></p>
    <p>Email: <input type="text" name="email" size="15" maxlength="15" value="'. $row[2] .'"></p>
    <p><input type="submit" name="submit" size="15" maxlength="15" value="Submit"></p>
    <input type="hidden" name="id" size="15" maxlength="15" value="'. $id .'"></p>
    </form>';
} else {
    echo '<p class="error">Error ditemukan</p>';
}

mysqli_close($dbc);
include('../layouts/footer.php');
?>
