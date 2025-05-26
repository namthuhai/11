<?php
include_once 'set.php';
$_title = $SiteTitle;
include_once 'head.php';
?>

<main class="flex-grow-1 flex-shrink-1">
    <div class="container pb-5" style="background-color: #FFFF99;">
        <div class="py-3 text-center">
            <?php
            // Hàm để trả về tiêu đề phù hợp với loại tệp
            function getTitle($type) {
                switch ($type) {
                    case 'JAVA':
                        return "Bản Java";
                    case 'APK - ANDROID':
                        return "Bản Android";
                    case 'PC - WINDOW':
                        return "Bản Windows";
                    case 'IPA - IOS':
                        return "Bản iOS";
                    default:
                        return "Bản Khác";
                }
            }

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Lấy danh sách các loại tệp
            $types = array('JAVA', 'APK - ANDROID', 'PC - WINDOW', 'IPA - IOS');

            // Duyệt qua từng loại tệp và hiển thị danh sách tương ứng
            foreach ($types as $type) {
                $sql = "SELECT * FROM files WHERE type = '$type'";
                $result = $conn->query($sql);

                // Nếu có tệp tương ứng, hiển thị tiêu đề và danh sách tệp
                if ($result->num_rows > 0) {
                    echo "<h2>" . getTitle($type) . "</h2>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<div>";
                        $name = $row["name"];
                        $class = "";
                        switch ($type) {
                            case 'JAVA':
                                $class = "text-danger";
                                break;
                            case 'APK - ANDROID':
                                $class = "text-primary";
                                break;
                            case 'PC - WINDOW':
                                $class = "text-warning";
                                break;
                            case 'IPA - IOS':
                                $class = "text-info";
                                break;
                            default:
                                $class = "text-dark";
                                break;
                        }
                        echo "<a href='" . $row["link_download"] . "' class='btn btn-primary text-white my-2'>";
                        echo "<i class='fa fa-download'></i> ";
                        echo "<span class='$class font-weight-bold'>[$type] </span>";
                        echo "$name</a>";
                        echo "</div>";
                    }
                } else {
                    // Nếu không có tệp tương ứng, thông báo không có phiên bản
                    echo "<h2>" . getTitle($type) . "</h2>";
                    echo "Chưa Có Phiên Bản Nào Được Tải Lên... Sẽ Được Cập Nhật Sớm";
                }
            }
            ?>
        </div>
        <?php
        include_once 'end.php';
        ?>
    </div>
</main>
