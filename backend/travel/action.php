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
		$meSQL = "INSERT INTO travel (travel_pic,travel_name,travel_detail,travel_address) VALUES ('".$filename."','".$_POST["travel_name"]."','".$_POST["travel_detail"]."','".$_POST["travel_address"]."')";
		$meQuery = $conn->query($meSQL);		
		
		if ($meQuery == TRUE) {
			echo "<script>alert('เพิ่มข้อมูลเสร็จเรียบร้อยแล้ว'); window.location ='../index.php?page=tavelbl';</script>";
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
$meSQL = "UPDATE travel ";
$meSQL .="SET travel_pic='$filename',"
. "travel_name='{$_POST['travel_name']}',"
. "travel_detail='{$_POST['travel_detail']}',"
. "travel_address='{$_POST['travel_address']}' ";

$meSQL .= "WHERE travel_id='{$_POST['id']}' ";
$meQuery = $conn->query($meSQL);			
	if ($meQuery == TRUE) {
		echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location ='../index.php?page=travelbl'; </script>";
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
        $meSQL = "DELETE FROM travel ";
        $meSQL .= "WHERE travel_id='{$_GET['id']}' ";
        $meQuery = $conn->query($meSQL);
        if ($meQuery == TRUE) {
			echo "<script>alert('ลบข้อมูลสำเร็จ'); window.location ='../index.php?page=travelbl';</script>";
        } else {
			echo "<script>alert('มีปัญหาการลบข้อมูล '); history.back(-1);</script>";
			exit();
        }
}

if(isset($_REQUEST['action']) and $_REQUEST['action']=="updateSortedRows"){
	$newOrder	=	explode(",",$_REQUEST['sortOrder']);
	$n	=	'1';
	foreach($newOrder as $id){
		$conn->query('UPDATE travel SET  WHERE travel_id="'.$id.'" ');
		$n++;
	}
}

$conn->close();
?>

