<!DOCTYPE html>
<html>

<head>
	<title><?php echo $title; ?> - Corea</title>
	<link rel='stylesheet' type='text/css' href='<?php echo $upPrefix; ?>view/css/mainStyle.css'>
	<!-- taro link library di sini -->

	<?php
	//link ke css berdasarkan list yang diset dari controller
	if (isset($styleSrcList)) {
		foreach ($styleSrcList as $key => $value) {
			echo "<link rel='stylesheet' type='text/css' href='" . $upPrefix . "view/css/$value'>";
		}
	}
	//link ke js berdasarkan list yang diset dari controller
	if (isset($scriptSrcList)) {
		foreach ($scriptSrcList as $key => $value) {
			echo "<script src='" . $upPrefix . "view/js/$value' defer></script>";
		}
	}
	?>
</head>

<body>
	<div id='header-bar'>
		<h1>Header</h1>

		<!-- contoh link -->
		<a href=<?php echo $upPrefix."index"?>>home</a>
		
		<?php
			echo "<span><a href='" . $upPrefix . "index/login'>Login</a></span>";
		?>
	</div>
	<div id='wrapper'>
		<?php echo $content; ?>
	</div>
	<footer>
		<hr>
		Footer
	</footer>
</body>

</html>