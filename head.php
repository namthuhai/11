<?php
ob_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once 'cauhinh.php';
include_once 'config.php';
include_once 'set.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="Ninja School Online - Game nhập vai Việt Nam được yêu thích nhất trên Mobile!">
  <meta name="author" content="">
  <title>
    <?php echo $_title; ?>
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/pricing/">
  <link rel="manifest" href="/images/site.webmanifest">
  <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="/images/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Winwheel.js/2.7.0/Winwheel.min.js"></script>

  <meta charset="utf-8">
<style>
li{
	list-style-type: none;
}
    .btn-primary {
        border-color: #880000 !important;
        color: #66FFFF !important;
		font-weight: bold;
    }

    .border-primary {
        border-color: #05fc4b !important;
    }

    .bg-primary,
    .btn-primary {
        background-color: #CC33FF !important;
    }

    .btn-outline-primary:hover {
        background-color: #000099;
        border-color: #00fa08;
		color:#FF3333;
    }

    .btn-outline-primary {
        color: #fff;
        border-color: #000099;
        box-shadow: #02f5e9;
		background-color: #CC6600;
		font-weight: bold;
    }

    .feature-box {
        padding: 38px 30px;
        position: relative;
        overflow: hidden;
        background: #99FFFF;
        box-shadow: 0 0 20px 0 #BB0000;
        transition: all 0.3s ease-in-out;
        border-radius: 8px;
        z-index: 1;
        width: 100%;
    }

    .feature-icon {
        font-size: 1.8em;
        margin-bottom: 1rem;
    }

    .feature-title {
        font-size: 1.2em;
        font-weight: 500;
        padding-bottom: 0.25rem;
        text-decoration: none;
        color: #212529;
    }

    .list-group-item.active {
        background-color: #05fc4b;
        border-color: #05fc4b;
    }

    a {
        text-decoration: none;
    }

    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: #05fc4b;
    }

    .nav-link {
        color: #05fc4b;
    }

    .nav-link:focus, .nav-link:hover {
        color: #cd3a2f;
    }
    .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .form-group{
            padding-bottom: 0.5rem;
        }
        .form-signup {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signup .checkbox {
            font-weight: 400;
        }
        .header-container {
  min-height: 100px; /* Thay đổi giá trị này để tăng độ cao của header */
}
.post-item {
    background-color: #ecff21;
    border: 1px solid #000000;
    border-radius: 16px;
    box-shadow: 0 3px 4px rgb(0 0 0 / 5%);
    padding: 10px;
}
.my-2 {
    margin-bottom: 0.5rem!important;
    margin-top: 0.5rem!important;
}
.align-items-center {
    align-items: center!important;
}
.d-flex {
    display: flex!important;
}
*, :after, :before {
    box-sizing: border-box;
}
user agent stylesheet
div {
    display: block;
}
.card-body {
    color: var(--bs-card-color);
    flex: 1 1 auto;
    padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
}
.card {
    --bs-card-spacer-y: 1rem;
    --bs-card-spacer-x: 1rem;
    --bs-card-title-spacer-y: 0.5rem;
    --bs-card-border-width: 1px;
    --bs-card-border-color: var(--bs-border-color-translucent);
    --bs-card-border-radius: 0.375rem;
    --bs-card-box-shadow: ;
    --bs-card-inner-border-radius: calc(0.375rem - 1px);
    --bs-card-cap-padding-y: 0.5rem;
    --bs-card-cap-padding-x: 1rem;
    --bs-card-cap-bg: rgba(0,0,0,.03);
    --bs-card-cap-color: ;
    --bs-card-height: ;
    --bs-card-color: ;
    --bs-card-bg: #fff;
    --bs-card-img-overlay-padding: 1rem;
    --bs-card-group-margin: 0.75rem;
    word-wrap: break-word;
    background-clip: initial;
    background-color: var(--bs-card-bg);
    border: var(--bs-card-border-width) solid var(--bs-card-border-color);
    border-radius: var(--bs-card-border-radius);
    display: flex;
    flex-direction: column;
    height: var(--bs-card-height);
    min-width: 0;
    position: relative;
}
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    margin-left: auto;
    margin-right: auto;
    padding-left: calc(var(--bs-gutter-x)*.5);
    padding-right: calc(var(--bs-gutter-x)*.5);
    width: 100%;
}
body {
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
    background-color: #fff;
    background-color: var(--bs-body-bg);
    color: #212529;
    color: var(--bs-body-color);
    font-family: system-ui,-apple-system,Segoe UI,Roboto,Helvetica Neue,Noto Sans,Liberation Sans,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
    font-family: var(--bs-body-font-family);
    font-size: 1rem;
    font-size: var(--bs-body-font-size);
    font-weight: 400;
    font-weight: var(--bs-body-font-weight);
    line-height: 1.5;
    line-height: var(--bs-body-line-height);
    margin: 0;
    text-align: var(--bs-body-text-align);
}
:root {
    --bs-body-font-size: 14px;
}
:root {
    --bs-blue: #0d6efd;
    --bs-indigo: #6610f2;
    --bs-purple: #6f42c1;
    --bs-pink: #d63384;
    --bs-red: #05fc4b;
    --bs-orange: #fd7e14;
    --bs-yellow: #ffc107;
    --bs-green: #198754;
    --bs-teal: #20c997;
    --bs-cyan: #0dcaf0;
    --bs-black: #000;
    --bs-white: #fff;
    --bs-gray: #6c757d;
    --bs-gray-dark: #343a40;
    --bs-gray-100: #f8f9fa;
    --bs-gray-200: #e9ecef;
    --bs-gray-300: #dee2e6;
    --bs-gray-400: #ced4da;
    --bs-gray-500: #adb5bd;
    --bs-gray-600: #6c757d;
    --bs-gray-700: #495057;
    --bs-gray-800: #343a40;
    --bs-gray-900: #212529;
    --bs-primary: #0d6efd;
    --bs-secondary: #6c757d;
    --bs-success: #198754;
    --bs-info: #0dcaf0;
    --bs-warning: #ffc107;
    --bs-danger: #05fc4b;
    --bs-light: #f8f9fa;
    --bs-dark: #212529;
    --bs-primary-rgb: 13,110,253;
    --bs-secondary-rgb: 108,117,125;
    --bs-success-rgb: 25,135,84;
    --bs-info-rgb: 13,202,240;
    --bs-warning-rgb: 255,193,7;
    --bs-danger-rgb: 220,53,69;
    --bs-light-rgb: 248,249,250;
    --bs-dark-rgb: 33,37,41;
    --bs-white-rgb: 255,255,255;
    --bs-black-rgb: 0,0,0;
    --bs-body-color-rgb: 33,37,41;
    --bs-body-bg-rgb: 255,255,255;
    --bs-font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    --bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
    --bs-gradient: linear-gradient(180deg,hsla(0,0%,100%,.15),hsla(0,0%,100%,0));
    --bs-body-font-family: var(--bs-font-sans-serif);
    --bs-body-font-size: 1rem;
    --bs-body-font-weight: 400;
    --bs-body-line-height: 1.5;
Show All Properties (16 more)
}
<style>
:root, :host {
    --fa-font-solid: normal 900 1em/1 "Font Awesome 6 Solid";
    --fa-font-regular: normal 400 1em/1 "Font Awesome 6 Regular";
    --fa-font-light: normal 300 1em/1 "Font Awesome 6 Light";
    --fa-font-thin: normal 100 1em/1 "Font Awesome 6 Thin";
    --fa-font-duotone: normal 900 1em/1 "Font Awesome 6 Duotone";
    --fa-font-sharp-solid: normal 900 1em/1 "Font Awesome 6 Sharp";
    --fa-font-sharp-regular: normal 400 1em/1 "Font Awesome 6 Sharp";
    --fa-font-sharp-light: normal 300 1em/1 "Font Awesome 6 Sharp";
    --fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
}
*, :after, :before {
    box-sizing: border-box;
}
*, :after, :before {
    box-sizing: border-box;
}
.edit{
    background-color:#19ff5e;
    border-color:#19ff5e;
}
button:hover{
        background-color: #19fbff;
        border-color: #19fbff;
		color:black;
}
.delete{
    background-color:#ff1919;
    border-color:#ff1919;
}
:root{
            --transition-effect: 0.25s cubic-bezier(.25,-0.59,.82,1.66) .3s;
        }
        body{
            background: #fff;
            transition: var(--transition-effect);
        }
        body.light{
            background: #fff;
        }
        #wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 10vh;
            height:10px;
        }
        .switch-toggle{
            width: 90px;
            height: 50px;
            appearance: none;
            background: #111;
            border-radius: 26px;
            position: relative;
            cursor: pointer;
            box-shadow: inset 0px 0px 8px #111;
            transition: var(--transition-effect);
        }
        .switch-toggle::before{
            content: "";
            width: 44px;
            height: 44px;
            position: absolute;
            top: 3px;
            left: 3px;
            background: #05fc4b;
            border-radius: 50%;
            box-shadow: 0px 0px 5px #05fc4b;
            transition: var(--transition-effect);
        
        }
        .switch-toggle:checked{
            background: #111;
        }
        .switch-toggle:checked:before{
            left: 40px;
        }
.container {
    background-color: #000000; 
    border: 4px solid #ff0000;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px #003366;
    max-width: 960px; /* Suitable for desktop but too wide for mobile */
    margin: 20px auto; /* Center the container */
}
@media (max-width: 768px) {
    .container {
        width: 95%; /* Make container wider on smaller screens */
        padding: 10px; /* Reduce padding */
        margin: 10px auto; /* Reduce margin */
        box-shadow: none; /* Optional: remove shadow for a cleaner look */
    }

    nav, .text-center, .btn {
        display: block; /* Stack elements vertically */
        width: 100%;
        text-align: center;
    }

    .btn {
        margin-bottom: 10px; /* Add space between buttons */
    }
}

/* Additional media query for very small devices like smaller phones */
@media (max-width: 480px) {
    .container {
        width: 100%; /* Use full width for very small devices */
        padding: 5px; /* Minimal padding */
    }

    .btn {
        font-size: 0.8em; /* Reduce font size for space */
    }
}
  </style>
  <style>
    .btn-gaming {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: bold;
        color: #fff;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        background-color: transparent;
        border: 2px solid #fff;
        border-radius: 0.375rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        margin: 0.5rem;
        background: linear-gradient(145deg, #6e00ff, #ff00f0);
        box-shadow: 0 0 10px #ff00f0, 0 0 40px #ff00f0;
    }
    .btn-gaming:hover {
        background: linear-gradient(145deg, #ff00f0, #6e00ff);
        box-shadow: 0 0 15px #ff0, 0 0 45px #ff0;
    }
    .btn-gaming:focus {
        outline: none;
    }

    .nav-gaming {
        display: flex;
        justify-content: center;
        padding: 1rem;
    }

    .nav-gaming a {
        transition: transform 0.2s;
    }

    .nav-gaming a:hover {
        transform: translateY(-2px);
    }

    /* Add a responsive touch for better mobile display */
    @media (max-width: 768px) {
        .nav-gaming {
            flex-direction: column;
        }

        .nav-gaming a {
            margin-bottom: 0.5rem;
        }
    }
</style>
<style>
    @keyframes multiColorTextBlink {
        0%, 100% {
            color: #FF3333; /* Bright Red */
            text-shadow: 0 0 5px #FF3333;
        }
        20% {
            color: #00FF00; /* Bright Green */
            text-shadow: 0 0 5px #00FF00;
        }
        40% {
            color: #0099FF; /* Bright Blue */
            text-shadow: 0 0 5px #0099FF;
        }
        60% {
            color: #FFFF00; /* Bright Yellow */
            text-shadow: 0 0 5px #FFFF00;
        }
        80% {
            color: #FF00FF; /* Bright Magenta */
            text-shadow: 0 0 5px #FF00FF;
        }
    }

    .game-title {
        display: block;
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        animation: multiColorTextBlink 2s linear infinite;
        background-color: #000; /* Dark background for contrast */
        padding: 10px 0; /* Padding to give some space around the text */
        margin-top: 10px; /* Space below the image */
        width: 100%; /* Ensure it takes full width for consistent background */
        border-radius: 5px; /* Optional: adds rounded corners for aesthetics */
    }
</style>

</head>
<body>
<div class="container py-3">
   <div class="text-center pb-3 mb-4 border-bottom">
    <a href="/" class="d-inline-block text-dark text-decoration-none">
        <div>
            <img class="img-fluid" src="/" alt="" style="max-width: 200px;">
        </div>
        <div class="game-title">
            <?php echo "Ninja School"; ?>
        </div>
    </a>
        <nav class="nav-gaming">
            <a href="index.php" class="btn-gaming">Trang chủ</a>
            <a target="_blank" href="tai-ve.php" class="btn-gaming">Tải về</a>
            <a target="_blank" href="https://zalo.me/g/wsekvq843" class="btn-gaming">Box Zalo</a>
            <!-- <a target="_blank" href="<?php echo $link_facebook ?>" class="btn-gaming">Fage Group</a> -->
            
        </nav>
        
        <nav class="nav-gaming">
            <?php if ($_login !== null) { ?>
                
                <a class="btn-gaming" href="baoloi.php">Báo lỗi và ý kiến</a>
                <a class="btn-gaming" href="user.php">
                    <span>
                        <?php echo ($_username); ?> - <?php echo number_format($ngoc); ?> Coin
                    </span>
                </a>
            <?php } else { ?>
                <a class="btn-gaming" href="login.php">Đăng Nhập</a>
                <a class="btn-gaming" href="register.php">Đăng Ký</a>
               
            <?php } ?>
        </nav>
    </div>
</div>

  </main>
</body>