<?php
require ('../layouts/header.php');

$page_title="User Terdaftar";
$display = 10;
require('../includes/mysqli_connect.php');
if(isset($_GET['p']) && is_numeric($_GET['p'])){
	$pages = $_GET['p'];
}else{
	//total record
	$q = "SELECT COUNT(user_id) FROM users";
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
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';
switch ($sort){
	case 'ln':
		$order_by = 'last_name ASC';
		break;
	case 'fn': 
		$order_by = 'first_name ASC';
		break;
	case 'e': 
		$order_by = 'email ASC';
		break;
	case 'rd':
		$order_by = 'registration_date ASC';
		break;
	default:
		$order_by = 'registration_date ASC';
		break;
}
?>

<h1>Halaman Users</h1>

<?php

$sql = "SELECT last_name, first_name, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id 
FROM users ORDER BY $order_by LIMIT $start, $display";
$r = @mysqli_query($dbc, $sql);//run query
//total row
$num = mysqli_num_rows($r);
if($num) {
	echo "<p> Total user found $num </p>\n";
	
	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	<tr><td align="left"><strong>Edit</strong></td>
	<td align="left"><strong>Delete</strong></td>
	<td align="left"><strong><a href="view_users.php?sort=ln">Last Name</a></strong></td>
	<td align="left"><strong><a href="view_users.php?sort=fn">First Name</a></strong></td>
	<td align="left"><strong><a href="view_users.php?sort=e">Email</a></strong></td>
	<td align="left"><strong><a href="view_users.php?sort=rd">Registration Date</a></strong></td>
	</tr>';
	$bg = '#eeeeee';
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor=' . $bg . '">
		<td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
		<td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
		<td align="left">' . $row['last_name'] . '</td>
		<td align="left">' . $row['first_name'] . '</td>
		<td align="left">' . $row['email'] . '</td>
		<td align="left">' . $row['dr'] . '</td></tr>';
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
		echo '<a href="view_users.php?s=' . ($start - $display) . '&p=' . $pages . '">Previous</a>';
	}
	//tampilkan jumlah halaman
	for($i=1;$i<=$pages; $i++){
		if($i !=$current_page){
			echo '<a href="view_users.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' . $i . '</a>';
		}else{
			echo $i . ' ';
		}
	}
	if($current_page !=$pages){
		echo '<a href="view_users.php?s=' . ($start + $display) . '&p=' . $pages . '">Next</a>';
	}
	echo '</p>';
}
?>

<?php
include('../layouts/footer.php');
?>