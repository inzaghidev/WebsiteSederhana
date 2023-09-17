<?php
$page_title = "Delete User";

include('../layouts/header.php');

if((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
    $id = $_GET['id'];
} elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
    $id = $_POST['id'];
} else {
    echo '<p class="error">Error Ditemukan</p>';
    include('../includes/footer.html');
    exit();
}
?>
<h1>Halaman Delete User</h1>
<?php 
require('../includes/mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if($_POST['sure'] == 'Yes') {
    $q = "DELETE FROM users WHERE user_id = $id LIMIT 1";
    $r = @mysqli_query($dbc, $q);
    
    if(mysqli_affected_rows($dbc) == 1) {
      echo '<p>User berhasil dihapus</p>';
    }
    
    else {
      echo '<p class="error">Error ditemukan, user tidak bisa dihapus</p>';
      echo '<p>'.mysqli_error($dbc).'<br/>'.$q.'</p>';
    }
  } else {
    echo '<p>User tidak jadi dihapus</p>';
  }
} else {
    //tampilkan form
    
    $q = "SELECT CONCAT(last_name, ', ', first_name) FROM users WHERE user_id = $id";
    $r = @mysqli_query($dbc, $q);
  
    if(mysqli_num_rows($r) == 1) {
    $row = mysqli_fetch_array($r, MYSQLI_NUM);
    echo "<br />";
    echo "<h3>Name: $row[0]</h3>
    <br />
    Are you sure to delete this user?";
    //create user
    echo '<form action="delete_user.php" method="post">
    <input type="radio" name="sure" value="Yes"> Yes 
    <input type="radio" name="sure" value="No"> No 
    <input type="submit" name="submit" value="Submit">
    <input type="hidden" name="id" value="'. $id .'">
    </form>';  
    } else {
      echo '<p class="error">Error ditemukan, ulangi lagi</p>';
    }
}

mysqli_close($dbc);
include('../layouts/footer.php');
?>
