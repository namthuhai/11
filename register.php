<?php
include_once 'set.php';
$_title = $SiteTitle;
include_once 'head.php';
$_alert = null;
$message = '';

if ($_login == null) {
    if(isset($_POST['username'])) {
        $phone = isset_sql($_POST['phone']);
        $username = strtolower(trim(str_replace(" ", "", isset_sql($_POST["username"]))));
        $password = isset_sql($_POST['password']);
        $repassword = isset_sql($_POST['repassword']);

        // Validate phone number format
        if (!preg_match('/^0\d{9}$/', $phone)) {
            $message = '<div class="alert alert-danger">Số điện thoại không đúng định dạng</div>';
        }
        // Validate username format
        elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username) || strlen($username) > 12 || strlen($username) < 6) {
            $message = '<div class="alert alert-danger">Tên tài khoản chứa kí tự đặc biệt hoặc độ dài tài khoản không hợp lệ</div>';
        }
        // Validate password format and matching
        elseif (strlen($password) < 6) {
            $message = '<div class="alert alert-danger">Mật khẩu chỉ chấp nhận tối thiểu 6 kí tự</div>';
        } elseif ($password !== $repassword) {
            $message = '<div class="alert alert-danger">Hai mật khẩu không khớp nhau, vui lòng kiểm tra lại!</div>';
        } else {
            $read = _select("*", 'users', "username='$username'");
            if (is_array(_fetch($read))) {
                $message = '<div class="alert alert-danger">Tài khoản này đã tồn tại, vui lòng chọn tài khoản khác!</div>';
            } else {
                $mcs = mt_rand(100000, 999999);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $txt = _insert('users', "username,password,activated,kh,balance,tongnap,status,phone,mcs", "'$username','$hashedPassword','1','1','0','0','1','$phone','$mcs'");
                $kiemtra = _query($txt);
                if ($kiemtra) {
                    $message = '<div class="alert alert-success">Đăng kí thành công!</div>';
                } else {
                    $message = '<div class="alert alert-danger">Đã có lỗi gì đó xảy ra, đăng kí thất bại!</div>';
                }
            }
        }
    }
} else {
    header('location:/user.php');
}

?>
<main class="flex-grow-1 flex-shrink-1">
    <div class="container py-3">
        <form class="form-signup" method="POST">
            <h1 class="h3 mb-3 font-weight-normal text-center">Nhập thông tin đăng ký</h1>
            <?php echo $message; ?>
            <div class="form-group">
                <label>Tài khoản</label>
                <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username" value="">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" placeholder="Số điện thoại" required="" name="phone" value="">
            </div>

            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="repassword">
            </div>
            <button class="btn btn-primary w-100" type="submit">Đăng ký</button>
            <div class="text-center pt-2">
                Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay</a>
            </div>
            <div class="text-center pt-2">
                <a href="/password/reset">Quên mật khẩu</a>
            </div>
        </form>
    </div>
    <?php include_once 'end.php'; ?>
</main>
