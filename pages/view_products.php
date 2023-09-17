<?php
require ('../layouts/header.php');

$page_title="Produk Terdaftar";
$display = 10;
require('../includes/mysqli_connect.php');

if(isset($_GET['p']) && is_numeric($_GET['p'])){
	$pages = $_GET['p'];
}else{
	//total record
	$q = "SELECT COUNT(produk_id) FROM produk";
	$r = @mysqli_query($dbc, $q);
	$row = @mysqli_fetch_array($r, MYSQLI_NUM);
	$records = $row[0];
	if($records>$display){
		$pages = ceil($records/$display);
	}else{
		$pages = 1;
	}
}

if(isset($_GET['s']) && is_numeric($_GET['s'])){
		$start = $_GET['s'];
	}else{
		$start=0;
}

//Menentukan sort 
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'pn';
switch ($sort){
	case 'pn':
		$order_by = 'produk_nama ASC';
		break;
	case 'c': 
		$order_by = 'kategori ASC';
		break;
	case 'hs':
		$order_by = 'harga_satuan ASC';
		break;
	case 's':
		$order_by = 'stok ASC';
		break;
	case 'ol':
		$order_by = 'order_level ASC';
		break;
	default:
		$order_by = 'produk_nama ASC';
		break;
}
?>

<h1>Halaman Produk</h1>

<?php

$sql = "SELECT produk_nama, kategori, harga_satuan, stok, order_level, produk_id 
FROM produk ORDER BY $order_by LIMIT $start, $display";
$r = @mysqli_query($dbc, $sql);//run query
//total row
$num = mysqli_num_rows($r);
if($num) {
	echo "<p> Total produk found $num </p>\n";
	
	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	<tr><td align="left"><strong>Edit</strong></td>
	<td align="left"><strong>Delete</strong></td>
	<td align="left"><strong><a href="view_products.php?sort=pn">Produk Nama</a></strong></td>
	<td align="left"><strong><a href="view_products.php?sort=c">Kategori</a></strong></td>
	<td align="left"><strong><a href="view_products.php?sort=hs">Harga Satuan</a></strong></td>
	<td align="left"><strong><a href="view_products.php?sort=s">Stok</a></strong></td>
	<td align="left"><strong><a href="view_products.php?sort=ol">Order Level</a></strong></td>
	</tr>';
	$bg = '#eeeeee';
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor=' . $bg . '">
		<td align="left"><a href="edit_product.php?id=' . $row['produk_id'] . '">Edit</a></td>
		<td align="left"><a href="delete_product.php?id=' . $row['produk_id'] . '">Delete</a></td>
		<td align="left">' . $row['produk_nama'] . '</td>
		<td align="left">' . $row['kategori'] . '</td>
		<td align="left">' . $row['harga_satuan'] . '</td>
		<td align="left">' . $row['stok'] . '</td>
		<td align="left">' . $row['order_level'] . '</td></tr>';
	}
	echo '</table>';
	mysqli_free_result($r);
	mysqli_close($dbc);
} else {
	echo '<p class="error"> Users could not be rettrieved".</p>';
	echo '<p>' . mysqli_error($dbc) . '<br/>Query: ' . $sql . '</p>';
}
if($pages>1){
	echo '<br/><p>';
	$current_page = ($start/$display) + 1;
	if($current_page !=1){
	echo '<a href="view_products.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a>';
	}
	//tampilkan jumlah halaman
	for($i=1;$i<=$pages; $i++){
	if($i !=$current_page){
	echo '<a href="view_products.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a>';
	}else{
	echo $i . ' ';
	}
	}
	if($current_page !=$pages){
	echo '<a href="view_products.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}
	echo '</p>';
	}
	
	include('../layouts/footer.php');
?>