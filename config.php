<?php
include_once 'cauhinh.php';
$config = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$config) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Website Đã Bị Khóa</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                height: 100vh;
                background: #333; /* Nền tối */
                color: #bf3ad6;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .container {
                max-width: 700px;
                margin: 20px;
                padding: 40px;
                background-color: rgba(0, 0, 0, 0.8); /* Nền mờ */
                border-radius: 15px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            }
            h1 {
                font-size: 2.8rem;
                color: #e63946; /* Màu cho tiêu đề */
                margin-bottom: 25px;
            }
            p {
                font-size: 1.5rem;
                line-height: 1.6;
                margin: 20px 0;
            }
            .contact a {
                color: #f4a261; /* Màu cho liên kết */
                text-decoration: none;
                font-weight: bold;
            }
            .contact a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Website Đã Bị Khóa</h1>
            <p>Website hiện không khả dụng do yêu cầu khóa web vĩnh viễn từ người dùng đến nhà cung cấp. Tên miền và host liên quan đến việc này đang được thu hồi.</p>
            <div class="contact">
                <p>Đối với mọi thắc mắc hoặc cần hỗ trợ, vui lòng liên hệ: <a href="mailto:support@gmail.com">support@gmail.com</a></p>
            </div>
        </div>
    </body>
    </html>';
    exit;
} else {
    mysqli_set_charset($config, 'utf8mb4');
}
function _query($sql) {
	GLOBAL $config;
	return mysqli_query($config,$sql);
}
function _fetch($sql) {
	return mysqli_fetch_array(_query($sql));
}
function isset_sql($txt) {
	GLOBAL $config;
	return mysqli_real_escape_string($config,$txt);
}
function _insert($table,$input,$output) {
	return "INSERT INTO $table($input) VALUES($output)";
}
function _select($select,$from,$where) {
	return "SELECT $select FROM $from WHERE $where";
}
function _update($tabname,$input_output,$where) {
	return "UPDATE $tabname SET $input_output WHERE $where";
}

$_succ = '<div class="success">';
$_err = '<div class="error">';
$_end = '</div>';
// function _alert($txt,$txt1) {
// 	GLOBAL $_succ,$_err,$_end;
// 	switch ($txt) {
// 		case 'succ':
// 		return "$_succ $txt1 $_end";
// 		break;
		
// 		case 'err':
// 		return "$_err $txt1 $_end";
// 		break;
// 	}
// }
function _console($txt){
	return "<script>console.log('".htmlspecialchars($txt)."')</script>";
}
function _randtxt(){
	$string = "";
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	for($i=1; $i<=9; $i++) {
		$position = rand() % strlen($chars);
		$string .= substr($chars, $position, 1);
	}
	return $string;
}

?>