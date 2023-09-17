<?php

$page_title = "Edit Produk";
include('../layouts/header.php');

if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
    $id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
    $id = $_POST['id'];
} else {
    echo '<p class="error">Error ditemukan</p>';
    include("../layouts/footer.html");
}

?>

<h1>Halaman Edit Produk</h1>

<?php

include('../includes/mysqli_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    if (empty($_POST['kategori'])) {
        $errors[] = "Anda lupa memasukkan kategori.";
    } else {
        $c = mysqli_real_escape_string($dbc, trim($_POST['kategori']));
    }

    if (empty($_POST['produk_nama'])) {
        $errors[] = "Anda lupa memasukkan nama produk.";
    } else {
        $pn = mysqli_real_escape_string($dbc, trim($_POST['produk_nama']));
    }

    if (empty($_POST['harga_satuan'])) {
        $errors[] = "Anda lupa memasukkan harga satuan.";
    } else {
        $hs = mysqli_real_escape_string($dbc, trim($_POST['harga_satuan']));
    }

    if (empty($_POST['order_level'])) {
        $ol = 0;
    } else {
        $ol = mysqli_real_escape_string($dbc, trim($_POST['order_level']));
    }

    if (empty($_POST['stok'])) {
        $s = 0;
    } else {
        $s = mysqli_real_escape_string($dbc, trim($_POST['stok']));
    }

    if (empty($errors)) {
        $q = "SELECT produk_id FROM produk WHERE produk_nama = '$pn' AND produk_id != $id";
        $r = @mysqli_query($dbc, $q);
        if (@mysqli_num_rows($r) == 0) {
            $q = "UPDATE produk SET kategori = '$c', produk_nama = '$pn', harga_satuan = '$hs', order_level = $ol, stok = $s WHERE produk_id = $id LIMIT 1";
            $r = @mysqli_query($dbc, $q);
            if (mysqli_affected_rows($dbc) == 1) {
                echo "<p>Produk telah di edit</p>";
            } else {
                echo '<p class="Error">Produk tidak bisa di edit</p>';
                echo '<p>' . mysqli_error($dbc) . '<br /> Query:' . $q . '</p>';
            }
        } else {
            echo '<p class="error">Produk sudah terdaftar</p>';
        }
        mysqli_close($dbc);
        include('../includes/footer.html');
        exit();
    } else {
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occured: <br />';
        foreach ($errors as $msg) {
            echo "- $msg<br>\n";
        }
        echo '</p><p>Please Try Again</p>';
    }
}

$q = "SELECT kategori, produk_nama, harga_satuan, order_level, stok FROM produk WHERE produk_id = $id";
$r = @mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 1) {
    $row = mysqli_fetch_array($r, MYSQLI_NUM);

    //create form
    echo '<form action="edit_produk.php" method="post">
    <p>Produk Nama: <input type="text" name="produk_nama" size="20" maxlength="20" value="'. $row[0] .'"></p>
    <p>Kategori: <input type="text" name="kategori" size="15" maxlength="15" value="'. $row[1] .'"></p>
    <p>Harga Satuan: <input type="text" name="harga_satuan" size="10" maxlength="10" value="'. $row[2] .'"></p>
    <p>Order Level: <input type="text" name="order_level" size="5" maxlength="5" value="'. $row[3] .'"></p>
    <p>Stok: <input type="text" name="stok" size="5" maxlength="5" value="'. $row[4] .'"></p>
    <p><input type="submit" name="submit" size="15" maxlength="15" value="Submit"></p>
    <input type="hidden" name="id" size="15" maxlength="15" value="'. $id .'"></p>
    </form>';
} else {
    echo '<p class="error">Error ditemukan</p>';
}

mysqli_close($dbc);
include('../layouts/footer.php');
?>
