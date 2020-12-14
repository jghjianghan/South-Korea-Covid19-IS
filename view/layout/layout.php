<!DOCTYPE html>
<html>

<head>
	<title><?php echo $title; ?> - Corea</title>
	<link rel='stylesheet' type='text/css' href='<?php echo $upPrefix; ?>view/css/mainStyle.css'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/214644244f.js" crossorigin="anonymous"></script>
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
			echo "<span><a href='" . $upPrefix . "admin/login'>Login</a></span>";
		?>
	</div>
	
	<div id='wrapper'>
        <?php echo $content; ?>
	</div>
</body>

</html>