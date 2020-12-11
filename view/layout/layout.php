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
	<header>
		<div class="nav-logo">COREA</div>
		<!-- <nav>
			<ul>
				<li>
					<a class="current-nav" href="">Home</a>
				</li>
				<li>
					<a class="" href="">Data</a>
				</li>
				<li>
					<a class="" href="">About Us</a>
				</li>
			</ul>
		</nav> -->
	</header>
	<div id='header-bar'>
		<!-- contoh link -->
		<a href=<?php echo $upPrefix."index"?>>home</a>
		
		<?php
			echo "<span><a href='" . $upPrefix . "index/login'>Login</a></span>";
		?>
</body>

</html>