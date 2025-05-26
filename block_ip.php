<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "nso";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$userIP = $_SERVER['REMOTE_ADDR'];

$sql = "SELECT blocker_ip FROM blockip_list WHERE blocker_ip = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userIP);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $stmt->close();
    $conn->close();

    die("Your IP address has been blocked.");
}

// Tiếp tục xử lý script nếu IP không bị chặn
$stmt->close();
$conn->close();
?>
