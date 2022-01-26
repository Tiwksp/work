<?php
session_start();
if ($_SESSION['status']!='admin') {
	echo "<script>alert('session ผิดผลาด'); window.location ='../index.php';</script>";
	exit();
} else {
include '../connect.php';    
}
//เพิ่มข้อมูล
if ($_GET['action']=='add'){
	if($_FILES["Upload"]["name"] != "")
        {			
			$filename = basename($_FILES["Upload"]["name"]);
        	move_uploaded_file($_FILES["Upload"]["tmp_name"],"../images/".$filename);
        }
		$meSQL = "INSERT INTO restaurant (res_pic,res_name,res_detail,res_address,res_type,res_start,res_end,res_phone) VALUES ('".$filename."','".$_POST["res_name"]."','".$_POST["res_detail"]."','".$_POST["res_address"]."','".$_POST["res_type"]."','".$_POST["res_start"]."','".$_POST["res_end"]."','".$_POST["res_phone"]."')";
		$meQuery = $conn->query($meSQL);		
		
		if ($meQuery == TRUE) {
			echo "<script>alert('เพิ่มข้อมูลเสร็จเรียบร้อยแล้ว'); window.location ='../index.php?page=restaurantbl';</script>";
        } else {
			echo "<script>alert('มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่');history.back(-1);</script>";
			exit();
        
		}		
}

//แก้ไขข้อมูล
if ($_GET['action']=='edit'){
	if($_FILES["Upload"]["name"] != "")
        {
			        		//*** Delete Old File ***//
        	@unlink("../images/".$_POST["hdnOldFile"]);
			$filename = basename($_FILES["Upload"]["name"]);	
        	move_uploaded_file($_FILES["Upload"]["tmp_name"],"../images/".$filename);     	
        }
		else{
			$filename = $_POST['hdnOldFile'];
		}
$meSQL = "UPDATE restaurant ";
$meSQL .="SET res_pic='$filename',"
. "res_name='{$_POST['res_name']}',"
. "res_detail='{$_POST['res_detail']}',"
."res_type='{$_POST['res_start']}',"
."res_type='{$_POST['res_end']}',"
."res_type='{$_POST['res_type']}',"
."res_type='{$_POST['res_phone']}',"
. "res_address='{$_POST['res_address']}' ";


$meSQL .= "WHERE res_id='{$_POST['id']}' ";
$meQuery = $conn->query($meSQL);			
	if ($meQuery == TRUE) {
		echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location ='../index.php?page=restaurantbl'; </script>";
        } else {
		echo "<script>alert('มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่');history.back(-1);</script>";
		exit();
        }
}	

//ลบข้อมูล
if ($_GET['action']=='delete'){
	if($_GET["image"] != "")
        {			        		//*** Delete Old File ***//
        	@unlink("../images/".$_GET["image"]);   	
        }
        $meSQL = "DELETE FROM restaurant ";
        $meSQL .= "WHERE res_id='{$_GET['id']}' ";
        $meQuery = $conn->query($meSQL);
        if ($meQuery == TRUE) {
			echo "<script>alert('ลบข้อมูลสำเร็จ'); window.location ='../index.php?page=restaurantbl';</script>";
        } else {
			echo "<script>alert('มีปัญหาการลบข้อมูล '); history.back(-1);</script>";
			exit();
        }
}

if(isset($_REQUEST['action']) and $_REQUEST['action']=="updateSortedRows"){
	$newOrder	=	explode(",",$_REQUEST['sortOrder']);
	$n	=	'1';
	foreach($newOrder as $id){
		$conn->query('UPDATE restaurant SET  WHERE res_id="'.$id.'" ');
		$n++;
	}
}

$conn->close();
