
<?php
session_start(); 
ob_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

if($_POST['username'] == "") {                   
echo "<script>alert('กรุณาใส่ชื่อผู้ใช้');window.location ='../index.php?page=login';</script>";
} else if($_POST['password'] == "") {        
echo "<script>alert('กรุณาใส่รหัสผ่าน'); window.location ='../index.php?page=login';</script>";
} else {                                             
include("../connect.php");     
$username = $_POST['username'];
$password = $_POST['password'];

	$meSQL = "SELECT id_member,username,status FROM tb_member WHERE username='{$username}' AND password='{$password}'";
    $result = $conn->query($meSQL);
    if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	if ($row['status'] == 1) {echo "<script>alert('เข้าสู่ระบบสำเร็จ'); window.location ='../index.php';</script>";}
        $_SESSION['id'] = $row['id_member'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['status'];
        

		if ($_SESSION["status"]=="user"){  //ถ้าเป็น member ให้กระโดดไปหน้า index.php
			Header("Location: ../../user/index.php");
  
		  }
        if(!empty($_POST["remember"])) {
				setcookie ("userlogin",$_POST["username"],time()+ 60 * 60 * 24 * 365, "/");
				setcookie ("passwordform",$_POST["password"],time()+ 60 * 60 * 24 * 365, "/");
			} else {
				if(isset($_COOKIE["userlogin"])) {
					setcookie ("userlogin","");
				}
				if(isset($_COOKIE["passwordform"])) {
					setcookie ("passwordform","");
				}
			}
			$meSQL2 = "UPDATE tb_member ";
			$meSQL2 .= "WHERE id_member='{$row['id_member']}' ";
			
			
		echo "<script>window.location ='../index.php';</script>";
    } else {
		echo "<script>alert('ไม่สามารถเข้าสู่ระบบได้เนื่องจากรหัสผิดพลาด'); window.location ='../index.php?page=login';</script>";
    }
}
ob_end_flush();
$conn->close();
?>