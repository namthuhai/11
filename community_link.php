<?php
include_once 'set.php';
$_title = 'Cài Đặt Community Link';
include_once 'head.php';
$message = '';
if ($Is_Admin_WEB != 101096) {
    header("location:/404.php");
    exit();
}

require_once 'connect_cpanel.php'; // Kết Nối Database
$get_sql = "SELECT * FROM link_community";

$result = mysqli_query($conn, $get_sql);
$row = mysqli_fetch_assoc($result);
?>
<main class="flex-grow-1 flex-shrink-1">
    <style>
        .button:hover{
            background-color:#0af0e0
            
        }
        .button {
  transition-duration: 0.4s;
  background-color:#0af057;
}
    </style>
	<div class="container py-3">
		<div class="row">
			<div class="col-md-3">
				<?php include_once 'menu_admin.php' ?>
			</div>

			<div class="col-md-9 pb-3 pt-2">
				<h5 class="pb-3 pt-0" style="color:#00fa5c;font-weight:bold;font-size:20px">Community Link</h5>
                <?php echo $message;?>
                <form action="update_link.php" method="post">
                <label><b style="color:#05fc36">Box Zalo</b></label>
                <input type="text" class="form-control" name="zalo" value="<?php echo $row['zalo']?>"> 
                <label><b style="color:#05fc36">Facebook Group</b></label>
                <input type="text" class="form-control" name="facebook" value="<?php echo $row['facebook']?>">  
                <label><b style="color:#05fc36">Youtube</b></label>
                <input type="text" class="form-control" name="youtube" value="<?php echo $row['youtube']?>">    <br>   
                <div class="form-group">
                <button type="submit" class="btn button form-control font-weight-bold text-uppercase" id="btnRegister" onclick="alert('Các Đường Link Đã Được Cập Nhật')">Lưu Lại</button>
              </div>
              </form>
      </div>

		<div class="row">
		
	<?php
	include_once 'end.php';
	?>
</main>
	