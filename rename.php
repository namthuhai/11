<?php
include_once 'set.php';
$_title = 'Đổi Tên Nhân Vật';
include_once 'head.php';
include_once 'hide_error.php';
$message = '';
$alert = '';

// Kiểm tra xem user có tạo nhân vật hay không
$readname = "SELECT * FROM players WHERE user_id=$id";
$result = mysqli_query($conn, $readname);
$row = mysqli_fetch_assoc($result);

if($row['name'] == null){
    $kiemtra = '<div class="alert alert-warning">Tài Khoản Chưa Tạo Nhân Vật ! Không Thể Sử Dụng Chức Năng Này.</div>';
}

// Nếu đã đăng nhập
if ($_login != null) {
    if(isset($_POST['new_name'])) {
        $new_name = trim(isset_sql($_POST["new_name"]));
        
        if(mb_strlen($new_name, 'UTF-8') < 5 || mb_strlen($new_name, 'UTF-8') > 15){
            $message = '<div class="alert alert-danger">Tên Nhân Vật Chỉ Cho Phép Từ 6 Đến 15 Kí Tự</div>';
        }
        elseif ($Is_Admin_WEB != 101096) {
        if (stripos($new_name, 'admin') !== false) {
            $message = '<div class="alert alert-danger">Tên Nhân Vật Không Được Chứa Chuỗi "admin".</div>';
        }
         }
        elseif (!preg_match('/^[a-zA-Z0-9\p{L} ]+$/u', $new_name)) {
            $message = '<div class="alert alert-danger">Tên Nhân Vật Không Được Chứa Kí Tự Đặc Biệt !</div>';
        } else {
            // Kiểm tra xem tên nhân vật đã tồn tại chưa
            $read = _select("*", 'players', "name='$new_name'");
            if (is_array(_fetch($read))) {
                $message = '<div class="alert alert-danger">Tên Nhân Vật Đã Có Người Sử Dụng ! Vui Lòng Chọn Tên Khác.</div>';
            } else {
                // Kiểm tra số dư trong tài khoản
                $check_balance_query = "SELECT balance FROM users WHERE id=$id";
                $check_balance_result = mysqli_query($conn, $check_balance_query);
                $balance_row = mysqli_fetch_assoc($check_balance_result);
                $balance = $balance_row['balance'];

                if ($balance >= 100000) {
                    // Thực hiện cập nhật tên nhân vật mới
                    $txt = "UPDATE players SET name='$new_name' WHERE user_id=$id";
                    $kiemtra = _query($txt);
                    if ($kiemtra) {
                        $message = '<div class="alert alert-success">Đổi Tên Thành Công !</div>';
                        // Trừ coin trong tài khoản
                        $uc = "UPDATE users SET balance=balance-100000 WHERE id=$id";
                        $minus = _query($uc);
                        if($minus){
                            $alert = '<div class="alert alert-warning">Đã Trừ 100,000 Coin Trong Tài Khoản.</div>';
                            
                            // Hiển thị modal thông báo
                            echo '<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="successModalLabel">Thông Báo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Đã đổi tên xong, sẽ tự động load lại sau: <span id="countdown">5</span> giây
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            // Script để tự động load lại trang sau 5 giây
                            echo '<script>
                                $(document).ready(function(){
                                    $("#successModal").modal("show");
                                    var timeleft = 5;
                                    var downloadTimer = setInterval(function(){
                                        timeleft--;
                                        document.getElementById("countdown").textContent = timeleft;
                                        if(timeleft <= 0)
                                            clearInterval(downloadTimer);
                                    }, 1000);
                                    setTimeout(function(){
                                        window.location.href = "/rename";
                                    }, 5000);
                                });
                            </script>';
                        } else {
                            $message = '<div class="alert alert-danger">Lỗi khi trừ tiền !</div>';
                        }
                    } else {
                        $message = '<div class="alert alert-danger">Lỗi !</div>';
                    }
                } else {
                    $message = '<div class="alert alert-danger">Số dư trong tài khoản không đủ để thực hiện thao tác này.</div>';
                }
            }
        }
    }
}
?>
<main class="flex-grow-1 flex-shrink-1">
    <style>
        .button:hover{
            background-color:#0af0e0;
        }
        .button {
            transition-duration: 0.4s;
            background-color:#0af057;
        }
        
        @keyframes blink {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    </style>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                <?php include_once 'menu.php' ?>
            </div>
            <div class="col-md-9 pb-3 pt-2">
                <h5 class="pb-3 pt-0" style="color:#00fa5c;font-weight:bold;font-size:20px">Đổi Tên Nhân Vật</h5>
                <?php echo $message;?>
                <?php echo $alert ?>
                <?php if($isOnline == 0 && $row['name'] != null){ ?>
                <form method="post">
                    <label><b style="color:#05fc36">Tên Nhân Vật Hiện Tại</b></label>
                    <input type="text" class="form-control" id="" value="<?php echo $row['name']?>" readonly> <br>
                    
                    <label><b style="color:#05fc36">Tên Nhân Vật Mới</b></label>
                    <input type="text" class="form-control" id="" name="new_name" placeholder="Nhập Tên Nhân Vật Mới"><br>
                    <div class="alert alert-primary">
                        <ol>
                            <li style="font-weight:bold; color:#ff0000; animation: blink 1s infinite;">LƯU Ý: khi đổi tên các bạn sẽ bị mất gia tộc</li>

                            <li>Tên Nhân Vật Không Được Chứa Kí Tự Đặc Biệt</li>
                            <li>Có thể ghi tên có dấu </li>
                            <li>Tên Nhân Vật Chỉ Có Độ Dài Từ 6 - 15 Kí Tự</li>
                            <li style="font-weight:bold">Phí Đổi Tên Nhân Vật Là 1,000,000 Coin / 1 Lần<p style="color:green">Bạn Hiện Có <?php echo $ngoc;?> Coin</p></li>
                        </ol>
                    </div>
                    <small>Lưu Ý : Sau Khi Đổi Tên, Hãy Tải Lại Trang Để Cập Nhật Tên Mới</small>
                    <div class="form-group">
                        <button type="submit" class="btn button form-control font-weight-bold text-uppercase" id="btnRegister">Xác Nhận</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php
include_once 'end.php';
?>
