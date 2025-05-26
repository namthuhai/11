<?php
include_once 'set.php';
$_title = $SiteTitle;
include_once 'head.php';

if(!isset($_login)) {
    header("location:/login.php");
    exit;
}
$message='';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(isset($_POST['password'])) {
    $old_pass = isset_sql($_POST['password']);
    $new_pass = isset_sql($_POST['new_password']);
    $re_pass = isset_sql($_POST['new_password_confirmation']);

    if ($_username === 'adminxn') {
        $message = '<div class="alert alert-danger">Không thể thay đổi mật khẩu cho người dùng admin.</div>';
    } elseif (!password_verify($old_pass, $_password)) {
        $message = '<div class="alert alert-danger">Mật khẩu hiện tại không đúng!</div>';
    } elseif(strlen($_POST['new_password']) < 6) {
        $message = '<div class="alert alert-danger">Mật khẩu mới phải có độ dài lớn hơn hoặc bằng 6 ký tự!</div>';
    } elseif($new_pass !== $re_pass) {
        $message = '<div class="alert alert-danger">Mật khẩu mới không trùng nhau!</div>';
    } else {
        
        $new_pass = password_hash($new_pass, PASSWORD_BCRYPT);
        $query = "UPDATE users SET password = '$new_pass' WHERE username = '$_username'";

        $result = mysqli_query($conn, $query);
        if($result) {
            $message = '<div class="alert alert-success">Đổi mật khẩu thành công!</div>';
        } else {
            $message = '<div class="alert alert-danger">Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!</div>';
        }
    }
}

?>

<main class="flex-grow-1 flex-shrink-1">
</br>
    <div class="container pb-5">
    <?php
   if($_login != null) {
      if($_status == "wait") {
   echo '<div class="alert alert-info">Để có thể đăng nhập vào game, bạn cần phải <a href="/active">kích hoạt tài khoản</a> (Phí: 20,000 SCoin = 20,000 VND).</div>';
   }
   
   echo $message;
   }
   ?>
    <div class="col-md-12">
       
            <h3 class="mt-0 mb-20">Thay đổi mật khẩu</h3>
            <form method="POST">
                <div class="mb-3">
                <label class="font-weight-bold">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control " name="password" id="password" placeholder="Mật khẩu hiện tại" required>
                </div>

                <div class="mb-3">
                <label class="font-weight-bold">Mật khẩu mới</label>
                    <input type="password" class="form-control " name="new_password" id="new_password" placeholder="Mật khẩu mới" required>
                </div>

                <div class="mb-3">
                <label class="font-weight-bold">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control " name="new_password_confirmation" id="new_password_confirmation" placeholder="Xác nhận mật khẩu mới" required>
                </div>
                <button class="btn btn-info btn-block" type="submit">Thực hiện</button>
            </form>
        </div>
        <?php
include_once 'end.php';
?>
    </div>

</main>
