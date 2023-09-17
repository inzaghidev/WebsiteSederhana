<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<meta charset="utf-8">
</head>
<body>
	<div id="header">
		<h1>Your Website</h1>
		<h2>catchy slogan...</h2>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="./index.php">Home Page</a></li>
			<li><a href="../pages/register.php">Register</a></li>
			<li><a href="../pages/view_users.php">View Users</a></li>
			<li><a href="../pages/password.php">Change Password</a></li>
			<li><a href="../pages/add_products.php">Add Products</a></li>
			<li><a href="../pages/view_products.php">View Products</a></li>
			<li><a href="../pages/calculator.php">Calculator</a></li>
			<!-- <li><a href="../pages/konversi-suhu.php">Konversi Suhu</a></li> -->
			<?php 
                    if (isset($_SESSION['user_id']) && (basename($_SERVER['PHP_SELF']) != 'logout.php')) {
                        echo '<a href="../pages/logout.php">Logout</a>';
                    } else {
                        echo '<a href="../pages/login.php">Login</a>';
                    }
			?>
		</ul>
	</div>
	<br />
	<br />
<div id="content"><!-- Start of the page-specific content. -->