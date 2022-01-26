<?php
$title = 'ร้านอารหาร'; //กำหนดไตเติ้ล
include 'templates/header.php';
if ($_SESSION['status'] == 'admin') {
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
		<li class="active">ร้านอาหาร</li>
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
			<div class="page-content">
				<div class="row">
					<div class="col-sm-12">
						<!-- หน้าแรก -->
						<!-- <?php if ($_GET['action'] == '') { ?>  -->
						<p> <a class="btn btn-white btn-primary " href="index.php?page=restaurantbl&action=add" role="button"><i class="ace-icon glyphicon glyphicon-plus"></i>เพิ่มร้านอาหาร</a>
						<p>
						<div class="table-header">
							<?php echo $title; ?>
						</div>
						<!-- div.table-responsive -->
						<!-- div.dataTables_borderWrap -->
						<div class="table-responsive">
							<div id="msg"></div>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th width="20">เลื่อน</th>
										<th class="center">ลำดับ</th>
										<th class="center">รูปภาพ</th>
										<th class="center">ชื่อ</th>
										<th class="center">เมนูอาหาร</th>
										<th class="center">ประเภทอาหาร</th>
										<th class="center">เวลาเปิด-เวลาปิด</th>
										<th class="center">เบอร์ติดต่อ</th>
										<th class="center">ที่อยู่</th>
										<th class="center">จัดการ</th>
									</tr>
								</thead>
								<tbody id="sortable">
									<?php
									$i = 1;
									$meSQL = "SELECT * FROM restaurant ";
									$meQuery = $conn->query($meSQL);
									while ($rs = $meQuery->fetch_assoc()) {
									?>
										<!-- <tr data-sort-id="<?php echo $rs['restaurant']; ?>"> -->
										<td class="center"><i class="fa fa-fw fa-arrows-alt" data-toggle="tooltip" title="Grag up or down"></i></td>
										<td class="center"><?php echo $i++; ?></td>
										<td class="center ace-thumbnails clearfix">
											<p><a href="images/<?php echo $rs['res_pic'] ?>" data-rel="colorbox"><img src="images/<?php echo $rs['res_pic'] ?>" alt="รูปภาพ" style="width:120px;height:100px;border: 1px solid #9e9e9e"></p>
										</td>
										<td class="center"><?php echo $rs['res_name'] ?></td>
										<td class="center"><?php echo $rs['res_type'] ?></td>
										<td class="center"><?php echo $rs['res_detail'] ?></td>
										<td class="center"><?php $dateData = $rs['res_start'];
															echo thai_date_and_time(strtotime($dateData)); ?>-<?php $dateData = $rs['res_end'];
																																				echo thai_date_and_time(strtotime($dateData)); ?></td>
										<td class="center"><?php echo $rs['res_phone'] ?></td>
										<td>
											<pre style="padding: 1px;border: 0px;background-color: transparent !important;"><?php echo $rs['res_address'] ?></pre>
										</td>

										<td class="center">

											<div class="hidden-sm hidden-xs action-buttons">
												<a class="green" href="index.php?page=restaurantbl&action=edit&id=<?php echo $rs['res_id']; ?>">
													<i class="ace-icon fa fa-pencil bigger-130" title="แก้ไข"></i>
												</a>

												<a class="red" href="restaurant/action.php?action=delete&id=<?php echo $rs['res_id']; ?>&image=<?php echo $rs['res_pic']; ?>" OnClick="return chkdel();">
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
															<a href="index.php?page=restaurantbl&action=edit&id=<?php echo $rs['res_id']; ?>" class="tooltip-success" data-rel="tooltip" title="แก้ไข">
																<span class="green">
																	<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="restaurant/action.php?action=delete&id=<?php echo $rs['res_id']; ?>&image=<?php echo $rs['res_pic']; ?>" class="tooltip-error" data-rel="tooltip" title="ลบ" OnClick="return chkdel();">
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
						<!-- <?php if ($_GET['action'] == 'add') { ?>  -->
						<form class="form-horizontal" role="form" name="formregister" method="post" action="restaurant\action.php?action=add" enctype="multipart/form-data">
							<div class="page-header">
								<h1>เพิ่มร้านอาหาร</h1>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="Upload">รูปภาพ</label>
								<div class="col-sm-9"> <img id="imgAvatar" src="images/noimages.png" style="width:270px;height:180px;">
									<p></p>
									<input type="file" name="Upload" id="Upload" OnChange="showPreview(this)" accept="image/*" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="res_name"> ชื่อ </label>
								<div class="col-sm-9">
									<input type="text" name="res_name" id="res_name" placeholder="" class="col-xs-10 col-sm-5" value="" required />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="res_detail"> เมนูอาหาร </label>
								<div class="col-sm-9">
									<textarea name="res_detail" id="res_detail" placeholder="" class="col-xs-10 col-sm-5" value="" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="res_type"> ประเภทอาหาร </label>
								<div class="col-sm-9">
									<textarea name="res_type" id="res_detail" placeholder="" class="col-xs-10 col-sm-5" value="" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="res_start"> เวลาเปิด </label>
								<div class="col-sm-1">
									<div class="input-group"> <input id="res_start" name="res_start" type="time" class="form-control" value="" required></div>
								</div>
								<label class="col-sm-1 control-label no-padding-right" for="res_end"> เวลาปิด </label>
								<div class="col-sm-1">
									<div class="input-group"> <input id="res_end" name="res_end" type="time" class="form-control" value="" required></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="res_phone"> เบอร์โทร </label>
								<div class="col-sm-4">
									<textarea class="form-control" id="res_phone" name="res_phone" type="number" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="res_address"> ที่อยู่ </label>
								<div class="col-sm-4">
									<textarea class="form-control" id="res_address" name="res_address" placeholder=""></textarea>
								</div>
							</div>
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-primary" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
										เพิ่มข้อมูล
									</button>
									&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
									<button class="btn btn-warning" type="button" onClick="javascript: window.history.back();">
										<i class="ace-icon fa fa-undo bigger-110"></i>
										ยกเลิก
									</button>
								</div>
							</div>
						</form>
					<?php } ?>
					<!-- แก้ไข -->
					<!--<?php if ($_GET['action'] == 'edit') {
							$meSQL = "SELECT * FROM restaurant WHERE res_id ='{$_GET['id']}' ";
							$meQuery = $conn->query($meSQL);
							if ($meQuery == TRUE) {
								$meResult = $meQuery->fetch_assoc();
							} else {
								echo $conn->error;
							}
						?>  z -->
					<form class="form-horizontal" role="form" name="formregister" method="post" action="restaurant\action.php?action=edit" enctype="multipart/form-data">
						<div class="page-header">
							<h1>แก้ไขร้านอาหาร</h1>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="Upload">รูปภาพ</label>
							<div class="col-sm-9"> <img id="imgAvatar" src="images/<?php echo $meResult['res_pic']; ?>" style="width:270px;height:180px;">
								<p></p>
								<input type="file" name="Upload" id="Upload" OnChange="showPreview(this)" accept="image/*" value="<?php echo $meResult['res_pic']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="res_name"> ชื่อร้านอาร </label>
							<div class="col-sm-9">
								<input type="text" name="res_name" id="res_name" placeholder="" class="col-xs-10 col-sm-5" value="<?php echo $meResult['res_name']; ?>" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="res_detail"> เมนูอาหาร </label>
							<div class="col-sm-9">
								<input type="text" name="res_detail" id="res_detail" placeholder="" class="col-xs-10 col-sm-5" value="<?php echo $meResult['res_detail']; ?>" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="res_detail"> ประเภทอาหาร </label>
							<div class="col-sm-9">
								<input type="text" name="res_type" id="res_type" placeholder="" class="col-xs-10 col-sm-5" value="<?php echo $meResult['res_type']; ?>" required />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="res_start"> เวลาเปิด </label>
							<div class="col-sm-2">
								<div class="input-group"> <input id="res_start" name="res_start" type="time" class="form-control" value="<?php echo $meResult['res_start']; ?>" required /></div>
							</div>
							<label class="col-sm-1 control-label no-padding-right" for="res_end"> เวลาปิด </label>
							<div class="col-sm-2">
								<div class="input-group"> <input id="res_end" name="res_end" type="time" class="form-control" value="<?php echo $meResult['res_end']; ?>" required /></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="res_address"> ที่อยู่ </label>
							<div class="col-sm-4">
								<textarea class="form-control" id="res_address" name="res_address" placeholder=""><?php echo $meResult['res_address']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="res_phone"> เบอร์โทร </label>
							<div class="col-sm-4">
								<textarea class="form-control" id="res_phone" name="res_phone" type="number" placeholder=""><?php echo $meResult['res_phone']; ?></textarea>
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
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
						<input type="hidden" name="hdnOldFile" value="<?php echo $meResult['res_pic']; ?>">
					</form>
				<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function showPreview(ele) {
					$('#imgAvatar').attr('src', ele.value); // for IE
					if (ele.files && ele.files[0]) {

						var reader = new FileReader();

						reader.onload = function(e) {
							$('#imgAvatar').attr('src', e.target.result);
						}

						reader.readAsDataURL(ele.files[0]);
					}
				}
			</script>
			<script language="JavaScript">
				function chkdel() {
					if (confirm('ต้องการลบหรือไม่')) {
						return true;
					} else {
						return false;
					}
				}
			</script>
			<?php
			$path = 'restaurant';
			include 'templates/footer.php';
			$conn->close();
			?>