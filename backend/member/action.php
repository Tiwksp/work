<?php
session_start();
if ($_SESSION['status'] != 'admin') {
	echo "<script>alert('session ผิดผลาด'); window.location ='../index.php';</script>";
	exit();
} else {
	include '../connect.php';
}
//เพิ่มข้อมูล
if ($_GET['action'] == 'add') {
	if (strlen($_POST['txtUsername']) < 5) {
		echo "<script>alert('ชื่อผู้ใช้ต้องมากกว่า 5 ตัวอักษร'); history.back(-1);</script>";
		exit();
	}
	if (strlen($_POST['txtPassword']) < 6) {
		echo "<script>alert('รหัสผ่านต้องมากกว่า 6 ตัวอักษร'); history.back(-1);</script>";
		exit();
	}
	if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
		echo "<script>alert('รหัสผ่านไม่ตรงกัน'); window.history.back();</script>";
		exit();
	}
	$meSQL = "SELECT * FROM tb_member WHERE username = '" . trim($_POST['txtUsername']) . "' ";
	$meQuery = $conn->query($meSQL);
	$meResult = mysqli_fetch_array($meQuery, MYSQLI_ASSOC);
	if ($meResult) {
		echo "<script>alert('ชื่อผู้ใช้นี้ มีในระบบแล้ว');window.history.back();</script>";
	} else {
		$meSQL = "INSERT INTO tb_member (username,password,ntitle,firstname,surname,status,phone) VALUES ('" . $_POST["txtUsername"] . "','" . $_POST["txtPassword"] . "','" . $_POST["title"] . "','" . $_POST["txtfirstname"] . "','" . $_POST["txtsurname"] . "','" . $_POST["status"] . "','" . $_POST["phone"] . "')";
		$meQuery = $conn->query($meSQL);

		if ($meQuery == TRUE) {
			echo "<script>alert('สมัครเสร็จเรียบร้อยแล้ว'); window.location ='../index.php';</script>";
		} else {
			echo "<script>alert('มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่');history.back(-1);</script>";
			exit();
		}
	}
}
//แก้ไขข้อมูล
if ($_GET['action'] == 'edit') {
	if (strlen($_POST['txtUsername']) < 5) {
		echo "<script>alert('ชื่อผู้ใช้ต้องมากกว่า 5 ตัวอักษร'); history.back(-1);</script>";
		exit();
	}
	if (strlen($_POST['txtPassword']) < 6) {
		echo "<script>alert('รหัสผ่านต้องมากกว่า 6 ตัวอักษร'); history.back(-1);</script>";
		exit();
	}
	if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
		echo "<script>alert('รหัสผ่านไม่ตรงกัน'); window.history.back();</script>";
		exit();
	}
	$meSQL = "UPDATE tb_member ";
	$meSQL .= "SET username='{$_POST['txtUsername']}',"
		. "password='{$_POST['txtPassword']}',"
		. "ntitle='{$_POST['title']}',"
		. "firstname='{$_POST['txtfirstname']}',"
		. "surname='{$_POST['txtsurname']}',"
		. "phone='{$_POST['phone']}',"
		. "status='{$_POST['status']}'";
		
	$meSQL .= "WHERE id_member='{$_POST['id']}' ";
	$meQuery = $conn->query($meSQL);
	if ($meQuery == TRUE) {
		echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว'); window.location ='../index.php?page=member';</script>";
	} else {
		echo "<script>alert('มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่');history.back(-1);</script>";
		exit();
	}
}

//ลบข้อมูล
if ($_GET['action'] == 'delete') {
	$meSQL = "DELETE FROM tb_member ";
	$meSQL .= "WHERE id_member='{$_GET['id']}' ";
	$meQuery = $conn->query($meSQL);
	if ($meQuery == TRUE) {
		echo "<script>alert('ลบข้อมูลสำเร็จ'); window.location ='../index.php?page=member';</script>";
	} else {
		echo "<script>alert('มีปัญหาการลบข้อมูล '); history.back(-1);</script>";
		exit();
	}
}
$conn->close();
