<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8" />
	<meta name="keywords" content="Japanese English, English Japanese, Japanese, Translation, Corporate Training" />
	<meta name="description" content="Japanese English Translation Services" />
	<meta name="author" content="mydatahack.com" />

	<title> <?php echo TITLE ?></title>
	<link rel="stylesheet" href="style/main.css" />
	<link rel="stylesheet" href="<?php echo Style ?>" />
	<?php
	foreach ($scripts as $script) {
		printf("<script type = 'text/javascript' src = '%s'></script>", $script);
	}
	?>
</head>

<body>
	<header>
		<img src="img/header3.jpg" alt="header image" id='header' />
	</header>
	<nav id="nav">
		<ul>
			<li> <a href="index.php"> Home </a> </li>
			<li> <a href="services.php"> Services </a> </li>
			<li> <a href="training.php"> Training </a> </li>
			<li> <a href="order.php"> Order </a> </li>
			<li> <a href="contact.php"> Contact Us </a> </li>
		</ul>
	</nav>
	<p> </p>
	<p> </p>