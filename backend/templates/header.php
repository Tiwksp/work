<?php
session_start();
if ($_SESSION['id'] != '') {
	include 'connect.php';
	$sql = "SELECT * FROM tb_member WHERE id_member = '{$_SESSION['id']}' ";
	$rs = $conn->query($sql)->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>

	<meta name="description" content="top menu &amp; navigation" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="icon" type="image/png" sizes="16x16" href="favicon.ico" />
	<link rel="stylesheet" href="custom.css" />
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
	<link rel="stylesheet" href="assets/css/colorbox.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/nav.css" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<link rel="stylesheet" href="assets/fullcalendar-3.6.2/fullcalendar.min.css" />
	<link href="assets/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
	<script src="assets/js/ace-extra.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
	<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-header pull-left">
				
				<a href="index.php?page=home" class="navbar-brand">
					<small>
						<img src="images/banglen.png" style="width: 40px; height: 40px;">
						เทศบาลตำบลบางเลน
					</small>
				</a>
			</div>
			<nav id="sidebar" role="navigation" class="navbar-menu pull-right navbar-collapse collapse">
				<ul class="nav navbar-nav">
					
					<!-- <li celass="<?php if ($_GET['page'] == 'travel') {
									echo 'active';
								} ?>">
						<a href="index.php?pag=travel">
							<i class="ace-icon fa  fa-coffee"></i>
							สถานที่ท่องเที่ยว
						</a>
					</li> -->
				
					<!-- <li class="<?php if ($_GET['page'] == 'restaurant') {
									echo 'active';
								} ?>">
						<a href="index.php?page=restaurant">
							<i class="ace-icon fa  fa-coffee"></i>
							ร้านอาหาร
						</a>
					</li> -->
					<?php if ($_SESSION['status'] == 'admin') { ?>
						<li class="<?php if ($_GET['page'] == 'member') {
										echo 'active';
									} ?>">
							<a href="index.php?page=member">
								<i class="ace-icon fa fa-users"></i>
								สมาชิก
							</a>
						</li>
						

						<li class="<?php if ($_GET['page'] == 'travelbl' || $_GET['page'] == 'restaurantbl' || $_GET['page'] == 'equip') {
										echo 'active';
									} ?>">

								<li>
									<a href="index.php?page=travelbl">
										<i class="ace-icon fa fa-coffee bigger-110 blue"></i>
										สถานที่ท่องเที่ยว
									</a>
									<li class="<?php if ($_GET['page'] == 'travelbl' || $_GET['page'] == 'restaurantbl' || $_GET['page'] == 'equip') {
										echo 'active';
									} ?>">
									<a href="index.php?page=restaurantbl">
										<i class="ace-icon fa fa-coffee bigger-110 blue"></i>
										ร้านอาหาร
									</a>
								</li>
							</ul>
						</li>
					<?php } ?>
				</ul>
			</nav>
			<div class="navbar-buttons navbar-header pull-right " role="navigation">
				<?php if ($_SESSION['id'] != '') { ?>
					<ul class="nav ace-nav">
						<li class=" dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php
								echo $rs['status'];
								?>&nbsp;&nbsp;&nbsp;
								<span class="user-info">
									<small>ยินดีต้อนรับ</small>
									<span style="font-size:13px;">
										<?php
										echo $rs['firstname'] . '  ' . $rs['surname'];
										?>
									</span>
									<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="index.php?page=user">
										<i class="ace-icon fa fa-cog"></i>
										ตั้งค่า
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="member/logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										ออกจากระบบ
									</a>
								</li>
							</ul>
						</li>
					</ul>
				<?php } else { ?>
					<ul class="nav ace-nav">
						<li>
							<a href="index.php?page=login">
								<i class="ace-icon fa  fa-laptop"></i>
								เข้าสู่ระบบ
							</a>
						</li>
					</ul>
				<?php } ?>
			</div>
		</div><!-- /.navbar-container -->
	</div>