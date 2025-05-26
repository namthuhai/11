<?php
include_once 'cauhinh.php';
include_once 'set.php'; // Đảm bảo rằng file này có thông tin kết nối và session
$_title = 'Báo Lỗi';
include_once 'head.php'; // Đảm bảo các tag head chuẩn đã được đặt

// Kiểm tra xem form đã được gửi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tieu_de = $_POST['tieu_de'] ?? '';
    $noi_dung = $_POST['noi_dung'] ?? '';
    $tai_khoan = $_SESSION['username'] ?? 'Guest'; // Giả sử tên tài khoản được lưu trong session

    // Câu lệnh SQL
    $sql = "INSERT INTO bao_loi (tai_khoan, tieu_de, noi_dung) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $tai_khoan, $tieu_de, $noi_dung);
        if ($stmt->execute()) {
            echo "<p class='success'>Báo lỗi đã được gửi thành công.</p>";
        } else {
            echo "<p class='error'>Lỗi khi gửi báo lỗi: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>Lỗi: " . $conn->error . "</p>";
    }
}
?>

<style>
body {
    background-color: #f4f4f9;
    font-family: Arial, sans-serif;
}
.form-container {
    background-color: #ffffff;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    padding: 20px;
    max-width: 500px;
    margin: 50px auto;
    border-radius: 8px;
}
label {
    font-weight: bold;
}
input[type="text"],
textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type="submit"] {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}
input[type="submit"]:hover {
    background-color: #0056b3;
}
.success {
    color: #28a745;
}
.error {
    color: #dc3545;
}
</style>

<div class="form-container">
    <a class="btn btn-outline-primary" href="/lich_su_bao_loi.php">Danh sách báo lỗi</a>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="tieu_de">Tiêu đề lỗi:</label><br>
        <input type="text" id="tieu_de" name="tieu_de" required><br>
        <label for="noi_dung">Nội dung lỗi:</label><br>
        <textarea id="noi_dung" name="noi_dung" required></textarea><br>
        <input type="submit" value="Gửi lỗi">
    </form>
</div>
