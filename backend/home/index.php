<?php 
error_reporting(0);
$title = 'ตำบลบางเลน'; 
include 'templates/header.php';
include 'connect.php';  
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate ("D, d M Y H:i:s") . " GMT");

?>

<style type="text/css">   
/* css สำหรับกำหนดรูปแบบของกล่องข้อความ Tooltip */ 
.tooltip{  
    position:fixed;    
    padding:15px;  
    z-index:90000;
}  
</style>     
<style>
  #calendar {
    max-width: 700px;
    margin: 0 auto;
  }
</style>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php?page=home">Home</a>
							</li>
						</ul><!-- /.breadcrumb -->
</div>				
<div class="page-header">
							<h1>
								<?php echo $org; ?>
							</h1>
</div><!-- /.page-header -->
                                                

<?php		
include 'templates/footer.php';
?>
                              