<?php

include_once 'set.php';
$_title = $SiteTitle;
include_once 'head.php';
if ($_login == null) {
	header("location:login.php");
	exit();
}
?>
<main class="flex-grow-1 flex-shrink-1">
	<div class="container py-3">
		<?php
		if ($_status == "0") {
			echo '<div class="alert alert-info">Để có thể đăng nhập vào game, bạn cần phải <a style="color:#00f21d;" href="/active">kích hoạt tài khoản</a> (Phí: 20,000 COIN = 20,000 VND).</div>';
		}
		// Kiểm tra xem session 'activated' có tồn tại và có giá trị là true hay không
		?>
		<div class="row">
			<div class="col-md-3">
				<?php include_once 'menu.php' ?>
			</div>
			<div class="col-md-9 pb-3 pt-2">
				<?php if (isset($_SESSION['activated']) && $_SESSION['activated'] === true) {
					echo '<div class="alert alert-success">Tài khoản của bạn đã được kích hoạt thành công!</div>';
					unset($_SESSION['activated']); // xóa session để tránh hiển thị lại thông báo khi tải lại trang
				} ?>
				<h5 class="pb-3 pt-0">Thông tin tài khoản</h5>
				<table class="table">
					<tbody>
						<tr>
                        <th scope="row">Tài khoản đăng nhập</th>
                        <th>
                            <div class="w-50" style='font-size:16px; color:#12f05a;'> <!-- Thêm thuộc tính color vào đây -->
                                <?php echo $_username; ?>
                            </div>
                        </th>
                    </tr>
						<tr>
							<th scope="row">Số dư</th>
							<td>
								<div style="color:#e6fc0f;"><b>
										<?php echo number_format($ngoc); ?> COIN
									</b></div>
							</td>
						</tr>
						<tr>
							<th scope="row">Lượng trong tài khoản</th>
							<td>
								<div style="color:#FF0099;"><b>
										<?php echo number_format($_luong); ?> lượng
									</b></div>
							</td>
						</tr>
						<tr>
							<th scope="row">Số điện thoại</th>
							<td>
						 <div class="w-50" style='font-size:16px; color:#FF0099;'>
							<?php echo $_phone; ?>
							<a href="change-sdt.php"><b><i>(Đổi SDT)</i></b></a>
						</div>

							</td>
						</tr>
						<tr>
						<tr>
                    <th scope="row">Trạng thái</th>
                    <td class="w-50" style='font-size:16px; color:#12f05a;'>
                        <?php echo $_status_check?></td>
                </tr>
			</div>
			</td>
			</tr>
			<tr>
				<th scope="row">Mật khẩu</th>
				<td><a href="change-password.php"><b><i style="color:#ff0000;font-weight:bold">****** (Đổi mật khẩu)</i></b></a></td>
			</tr>
			<tr>
				<th scope="row">Đăng xuất</th>
				<td>
					<a class="btn btn-outline-info" href="logout.php">Đăng xuất</a>
				</td>
			</tr>
			</tbody>
		</div>
		</table>
		<div class="row">
		
	<?php
	include_once 'end.php';
	?>
</main>