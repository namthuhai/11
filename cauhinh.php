<?php
$_domain = '';
$SiteTitle = 'NinjaSchool Online';
require_once 'connect_cpanel.php'; // Kết Nối Database

// GET API FROM SQL
$get_api = "SELECT * FROM api_connection";
$result = mysqli_query($conn, $get_api);
$row = mysqli_fetch_assoc($result);
$row['partner_id'];
$row['partner_key'];

// GET COMMUNITY LINK FROM SQL
$load_link = "SELECT * FROM link_community";
$check_link = mysqli_query($conn, $load_link);
$print_link = mysqli_fetch_assoc($check_link);
$print_link['zalo'];
$print_link['facebook'];
$print_link['youtube'];

// PRINT COMMUNITY LINK
$link_zalo = $print_link['zalo'];
$link_facebook = $print_link['facebook'];
$link_youtube = $print_link['youtube'];

// MYSQL
$db_host="localhost";
$db_user="root";
$db_pass="12345678";
// $db_name="nso";
$db_name="nso";

$w_cuphap_momo=''; // cú pháp
$_tentk ='';
$_stk ='';
$_nganhang ='';

// API NẠP THẺ TỰ ĐỘNG WEBSITE GACHTHE1S
$partner_id = $row['partner_id'];; // Partner_id
$partner_key = $row['partner_key']; // Partner_key

// Giá Kích Hoạt Tài Khoản
$priceactive = 20000;

function curl_get_contents($url)
{
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($curl);
  curl_close($curl);
  return $data;
}
//



