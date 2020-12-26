<!DOCTYPE html>
<html>

<head>
	<title><?php echo $title; ?></title>

	<!-- taro link library di sini -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src='<?php echo $upPrefix; ?>view/js/navbar.js' defer></script>
	<script src="https://kit.fontawesome.com/7ff575fbe7.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel='stylesheet' type='text/css' href='<?php echo $upPrefix; ?>view/css/mainStyle.css'>
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
	<header class="navbar">
		<a class="nav-logo" href="<?php echo $upPrefix; ?>index">COREA</a>
		<nav>
			<ul>
				<!-- <li>
					<a class="nav-link <?php if ($page === 'home') echo "current-nav"; ?>" href="<?php echo $upPrefix; ?>index">Home</a>
				</li>
				<li>
					<a class="nav-link <?php if ($page === 'data') echo "current-nav"; ?>" href="<?php echo $upPrefix; ?>dataOverall">Data</a>
				</li>
				<li>
					<a class="nav-link <?php if ($page === 'about') echo "current-nav"; ?>" href="<?php echo $upPrefix; ?>about">About Us</a>
				</li> -->
				
				<?php if (isset($_SESSION['username'])) { ?>
				<li class="dropdown ">
					<a class="nav-link dropdown-toggle" id="navbarAdminDropdown" role="button" data-toggle="dropdown" ><i class="fas fa-user-circle fa-lg mr-1"></i> <?php echo $_SESSION['username']; ?></a>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo $upPrefix; ?>admin/addAccount">Add Account</a>
						<a class="dropdown-item" href="<?php echo $upPrefix; ?>admin/changePassword">Change Password</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo $upPrefix; ?>admin/logout">Log Out <i class="fas fa-sign-out-alt"></i></a>
					</div>
				</li>
				<?php } ?>
			</ul>
		</nav>
	</header>

	<div id="wrapper">
		<?php echo $content; ?>
	</div>
</body>

</html>