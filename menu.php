<?php
include_once 'set.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General Styles */
        .list-group-item {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
            text-decoration: none;
            color: black;
        }
        .list-group-item:hover, .list-group-item.active {
            background-color: #CC0099;
            color: white;
        }
        .fas {
            margin-right: 10px;
        }
        .menu-toggle {
            display: none; /* Initially hidden on all screens */
        }
        .list-group {
            display: block; /* Always display the menu on larger screens */
        }

        /* Responsive Styles for Mobile Devices */
        @media (max-width: 768px) {
            .menu-toggle {
                display: block; /* Show toggle button only on small screens */
                background: #CC0099;
                border: none;
                color: white;
                font-size: 30px;
                padding: 10px 15px;
                cursor: pointer;
                position: fixed;
                top: 10px;
                right: 10px;
                z-index: 1000;
            }
            .list-group {
                display: none; /* Hide the full menu on small screens initially */
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                z-index: 999;
                padding-top: 50px;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
    <div class="list-group">
        <a href="/user" class="list-group-item <?php echo ($_SERVER['REQUEST_URI'] == '/user') ? 'active' : ''; ?>">
            <i class="fas fa-user"></i> Thông tin tài khoản
        </a>
       
        <a href="logout.php" class="list-group-item">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
    </div>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            var listGroup = document.querySelector('.list-group');
            if(listGroup.style.display === 'block') {
                listGroup.style.display = 'none';
            } else {
                listGroup.style.display = 'block';
            }
        });
    </script>
</body>
</html>
