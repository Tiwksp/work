<?php 
$title = 'ร้านอาหาร'; //กำหนดไตเติ้ล
include 'templates/header.php';
include 'connect.php';
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php?page=home">หน้าแรก</a>
							</li>
							<li class="active">ร้านอาหาร</li>
						</ul><!-- /.breadcrumb -->
</div>				
<div class="page-header">
							<h1>
								<?php echo $org; ?>
								<!--<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>-->
							</h1>
</div><!-- /.page-header -->           
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
		<div class="main-content-inner">
			<div class="page-content" >
                <div class="row" >
                    <div class="col-sm-12">
<!-- หน้าแรก -->					
<?php if (!isset($_GET['action'])) {
 $meSQL = "SELECT * FROM restaurant ORDER BY res_id asc";
 $meQuery = $conn->query($meSQL);
 ?> 
<div class="table-header">
<?php echo $title; ?>
</div>                    
        <!-- div.table-responsive -->
		<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
<table id="dynamic-table" class="table table-striped table-bordered table-hover" >  
<thead>
  <tr>
    <th class="center">ลำดับ</th>
	<th class="center">รูปภาพ</th>
	<th class="center">ชื่อ</th>
	<th class="center">รายละเอียด</th>
	<th class="center">ประเภทอาหาร</th>
	<th class="center">ที่อยู่</th>

  </tr>
</thead>
<tbody>
<?php
$i=1 ;
while ($rs = $meQuery->fetch_assoc()){
?>
  <tr>
    <td class="center"><?php echo $i++; ?></td>
	<td class="center ace-thumbnails clearfix"><p><a href="images/<?php echo $rs['res_pic']?>" data-rel="colorbox"><img src="images/<?php echo $rs['res_pic']?>" alt="รูปภาพ" style="width:120px;height:100px;border: 1px solid #9e9e9e"></p></td>
	<td class="center"><?php echo $rs['res_name']?></td>
    <td class="center"><?php echo $rs['res_detail']?></td> 
	<td class="center"><?php echo $rs['res_type']?></td> 
	<td><pre style="padding: 1px;border: 0px;background-color: transparent !important;"><?php echo $rs['res_detail']?></pre></td>
  </tr>
  <?php } ?>   
  </tbody>
</table>
<?php } ?>
				</div>
            </div>	
		</div>				
<?php		
include 'templates/footer.php';
$conn->close();
?>
                              