<?php 
$title = 'สถานที่ท่องเที่ยว'; //กำหนดไตเติ้ล
include 'templates/header.php';
if ($_SESSION['status'] =='admin')  
{
include 'connect.php';
include 'function.php';
} else {
    echo "<script>alert('คุณไม่มีสิทธิในการเข้าถึง!'); window.location ='index.php';</script>";
}
?>
<style>
.inputcolor {
      padding: 0px !important;
}
</style>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php?page=home">หน้าเเรก</a>
							</li>
							<li class="active">สถานที่ท่องเที่ยว</li>
						</ul><!-- /.breadcrumb -->
</div>				
<div class="page-header">
							<h1>
								<!-- <?php echo $org; ?> -->
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
<!-- <?php if ($_GET['action']=='') {?>  -->
<p> <a class="btn btn-white btn-primary " href="index.php?page=travelbl&action=add" role="button"><i class="ace-icon glyphicon glyphicon-plus"></i>เพิ่มวัด</a><p>
<div class="table-header">
<?php echo $title; ?>
</div>                    
        <!-- div.table-responsive -->
		<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
		<div id="msg"></div>
<table id="dynamic-table" class="table table-striped table-bordered table-hover" >  
<thead>
  <tr>
	<th width="20">เลื่อน</th>
    <th class="center">ลำดับ</th>
	<th class="center">รูปภาพ</th>
	<th class="center">ชื่อ</th>
	<th class="center">รายละเอียด</th>
	<th class="center">ที่อยู่</th>
	<th class="center">จัดการ</th>
  </tr>
</thead>
<tbody id="sortable">
<?php
$i=1 ;
$meSQL = "SELECT * FROM travel ";
$meQuery = $conn->query($meSQL);
while ($rs = $meQuery->fetch_assoc()){
?>
  <!-- <tr data-sort-id="<?php echo $rs['travel']; ?>"> -->
	<td class="center"><i class="fa fa-fw fa-arrows-alt" data-toggle="tooltip" title="Grag up or down"></i></td>
    <td class="center"><?php echo $i++; ?></td>
	<td class="center ace-thumbnails clearfix"><p><a href="images/<?php echo $rs['travel_pic']?>" data-rel="colorbox"><img src="images/<?php echo $rs['travel_pic']?>" alt="รูปภาพ" style="width:120px;height:100px;border: 1px solid #9e9e9e"></p></td>
	<td><pre style="padding: 1px;border: 0px;background-color: transparent !important;"><?php echo $rs['travel_name']?></pre></td>
    <td class="center"><?php echo $rs['travel_detail']?></td>
	<td><pre style="padding: 1px;border: 0px;background-color: transparent !important;"><?php echo $rs['travel_address']?></pre></td>
	<td class="center">
	
	<div class="hidden-sm hidden-xs action-buttons">
	<a class="green" href="index.php?page=travelbl&action=edit&id=<?php echo $rs['travel_id']; ?>">
		<i class="ace-icon fa fa-pencil bigger-130" title="แก้ไข"></i>
	</a>

	<a class="red" href="travel/action.php?action=delete&id=<?php echo $rs['travel_id']; ?>&image=<?php echo $rs['travel_pic']; ?>" OnClick="return chkdel();">
		<i class="ace-icon fa fa-trash-o bigger-130" title="ลบ"></i>
	</a>
</div>

<div class="hidden-md hidden-lg">
	<div class="inline pos-rel">
		<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
			<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
		</button>

		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

			<li>
				<a href="index.php?page=travelbl&action=edit&id=<?php echo $rs['travel_id']; ?>" class="tooltip-success" data-rel="tooltip" title="แก้ไข">
					<span class="green">
						<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
					</span>
				</a>
			</li>

			<li>
				<a href="travel/action.php?action=delete&id=<?php echo $rs['travel_id']; ?>&image=<?php echo $rs['travel_pic']; ?>" class="tooltip-error" data-rel="tooltip" title="ลบ" OnClick="return chkdel();">
					<span class="red">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</span>
				</a>
			</li>
		</ul>
	</div>
</div>
	</td> 
  </tr>
  <?php } ?>   
  </tbody>
</table>
<?php } ?>
<!-- เพิ่ม -->
<!-- <?php if ($_GET['action']=='add') {?>  -->
<form class="form-horizontal" role="form" name="formregister" method="post" action="travel\action.php?action=add" enctype="multipart/form-data">
    <div class="page-header"><h1>เพิ่มสถานที่เที่ยว</h1></div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="Upload">รูปภาพ</label>
    <div class="col-sm-9"> <img id="imgAvatar" src="images/noimages.png" style="width:270px;height:300px;"><p></p>	
			<input type="file" name="Upload" id="Upload" OnChange="showPreview(this)" accept="image/*" value="" > </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="travel_name"> ชื่อ </label>
      <div class="col-sm-9">
	  <textarea name="travel_name" id="travel_name" placeholder="" ></textarea>
      </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="travel_detail"> รายละเอียด </label>
      <div class="col-sm-9">
	  <textarea class="form-control" name="travel_detail" id="travel_detail" placeholder="" ></textarea>
      </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="travel_address"> ที่อยู่ </label>
      <div class="col-sm-4">
<textarea class="form-control" id="travel_address" name="travel_address" placeholder=""></textarea>
      </div>
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
	<button class="btn btn-primary" type="submit">
	<i class="ace-icon fa fa-check bigger-110"></i>
		ยืนยัน
</button>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button class="btn btn-warning" type="button" onClick="javascript: window.history.back();">
	<i class="ace-icon fa fa-undo bigger-110"></i>
		ยกเลิก
</button>
    </div>
</div>
</form>
<?php }?>
<!-- แก้ไข -->
<!--<?php if ($_GET['action']=='edit') { 
		$meSQL = "SELECT * FROM travel WHERE travel_id ='{$_GET['id']}' ";
		$meQuery = $conn->query($meSQL);
    if ($meQuery == TRUE) {
        $meResult = $meQuery->fetch_assoc();
    } else {
        echo $conn->error;
    }
    ?>    -->        
<form class="form-horizontal" role="form" name="formregister" method="post" action="travel\action.php?action=edit" enctype="multipart/form-data">
    <div class="page-header"><h1>แก้ไขสถานที่ท่องเที่ยว</h1></div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="Upload">รูปภาพ</label>
    <div class="col-sm-9"> <img id="imgAvatar" src="images/<?php echo $meResult['travel_pic'];?>" style="width:270px;height:180px;"><p></p>	
			<input type="file" name="Upload" id="Upload" OnChange="showPreview(this)" accept="image/*" value="<?php echo $meResult['travel_pic'];?>" > </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="travel_name"> ชื่อสถานที่ท่องเที่ยว </label>
      <div class="col-sm-9">
	<input type="text" name="travel_name" id="travel_name" placeholder="" class="col-xs-10 col-sm-5" value="<?php echo $meResult['travel_name'];?>" required />
      </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="travel_detail"> รายละเอียด </label>
      <div class="col-sm-9">
	<input type="text" name="travel_detail" id="travel_detail" placeholder="" class="col-xs-10 col-sm-5" value="<?php echo $meResult['travel_detail'];?>" required />
      </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="travel_address"> ที่อยู่ </label>
      <div class="col-sm-4">
<textarea class="form-control" id="travel_address" name="travel_address" placeholder=""><?php echo $meResult['travel_address'];?></textarea>
      </div>
</div>

<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
	<button class="btn btn-primary" type="submit">
	<i class="ace-icon fa fa-check bigger-110"></i>
		ยืนยัน
</button>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button class="btn btn-warning" type="button" onClick="javascript: window.history.back();">
	<i class="ace-icon fa fa-undo bigger-110"></i>
		ยกเลิก
</button>
    </div>
</div>
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<input type="hidden" name="hdnOldFile" value="<?php echo $meResult['travel_pic'];?>">
</form>
<?php }?>
				</div>
            </div>	
		</div>
	</div>
<script type="text/javascript">
	function showPreview(ele)
	{
			$('#imgAvatar').attr('src', ele.value); // for IE
            if (ele.files && ele.files[0]) {
			
                var reader = new FileReader();
				
                reader.onload = function (e) {
                    $('#imgAvatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(ele.files[0]);
            }
	}
</script>
<script language="JavaScript">
function chkdel(){if(confirm('ต้องการลบหรือไม่')){
	return true;
}else{
	return false;
}
}
</script>			
<?php		
$path = 'travel';
include 'templates/footer.php';
$conn->close();
?>
                              