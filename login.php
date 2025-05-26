<?php
include_once 'set.php';
$_title = $SiteTitle;
include_once 'head.php';
include_once 'hide_error.php';
$alert = '';
if ($_login != null) {
    header("location:/");
    exit;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    // Giả định rằng $conn là kết nối cơ sở dữ liệu của bạn
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $userRow = $result->fetch_assoc();

    if ($userRow) {
        // Giải mã JSON để lấy IP
        $ipAddresses = json_decode($userRow['ip_address']);
        $userIp = $ipAddresses[0];  // Lấy IP đầu tiên trong mảng

        $query = "SELECT * FROM blockip_list WHERE blocker_ip = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $userIp);
        $stmt->execute();
        $result = $stmt->get_result();
        $blockedRow = $result->fetch_assoc();

        if ($blockedRow) {
            $alert = '<div class="alert alert-danger">Tài khoản này có chứa IP bị chặn lên ko thể đăng nhập.</div>';
        } else {
            // Kiểm tra mật khẩu nếu IP không bị chặn
            if (password_verify($pass, $userRow['password'])) {
                $_SESSION['user'] = $user;
                header('location:user.php');
                exit;
            } else {
                $alert = '<div class="alert alert-danger">Sai Mật Khẩu! Vui Lòng Thử Lại.</div>';
            }
        }
    } else {
        $alert = '<div class="alert alert-danger">Hệ Thống Không Tìm Thấy Tài Khoản Của Bạn, Vui Lòng Kiểm Tra Lại.</div>';
    }
}

?>
<main class="flex-grow-1 flex-shrink-1">
    <div class="container pb-5">
        <form class="form-signin" method="POST">
            <div class="text-center mb-2"><img src="/images/icon.png" alt="" width="57" height="57"></div>
            <h1 class="h3 mb-3 font-weight-normal text-center">Vui lòng đăng nhập</h1>
            <?php echo $alert; ?>
            <label class="sr-only">Tài khoản</label>
            <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username">
            <label class="sr-only">Mật khẩu</label>
            <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password">
            <button class="btn btn-primary w-100" type="submit">Đăng nhập</button>
            <div class="text-center pt-2">
                Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a> 
            </div>
        </form>
    </div>
    <?php
        include_once 'end.php';
    ?>
</main>
