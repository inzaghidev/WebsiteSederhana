<?php
$fileclass = "../css/style.css";
$page_title = "Add Products";
$linkcalculator = "calculator.php";
$add_products = "add_products.php";
$view_user = "view_user.php";
$password = "password.php";

include ('../layouts/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('../includes/mysqli_connect.php');
    $pn = trim($_POST['produk_nama']);
    $c = trim($_POST['kategori']);
    $hs = trim($_POST['harga_satuan']);
    $st = trim($_POST['stok']);
    $ol = trim($_POST['order_level']);

    $q = "INSERT INTO users (produk_nama, kategori, stok, order_level) VALUE ('$pn', '$c', '$hs', '$st', $ol, NOW())";
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

<h1>Add Products</h1>
<form action="register.php" method="post">
    <p>Nama Produk: <input type="text" name="produk_nama" size="15" maxlength="20"
    value="<?php if(isset($_POST['produk_nama'])) echo $_POST['produk_nama'];?>"></p>

    <p>Kategori: <input type="text" name="kategori" size="15" maxlength="40"
    value="<?php if(isset($_POST['kategori'])) echo $_POST['kategori'];?>"></p>

    <p>Harga Satuan: <input type="text" name="harga_satuan" size="5" maxlength="10"
    value="<?php if(isset($_POST['harga_satuan'])) echo $_POST['harga_satuan'];?>"></p>
    
    <p>Stok: <input type="text" name="stok" size="1" maxlength="5"
    value="<?php if(isset($_POST['stok'])) echo $_POST['stok'];?>"></p>

    <p>Order Level: <input type="text" name="order_level" size="1" maxlength="5"
    value="<?php if(isset($_POST['order_level'])) echo $_POST['order_level'];?>"></p>
    
    <p><input type="submit" name="submit" value="Add"></p>
</form>