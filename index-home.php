<?php
include_once 'set.php';
include_once 'head.php';
?>
<main class="flex-grow-1 flex-shrink-1">
    <style>
        .right{
            float:right;
        }
        .left{
            float:left;
        }
    </style>
    <div class="container py-3">
<!-- <div class="row g-4 py-4 justify-content-center">
    <div class="col d-flex align-items-stretch">
        <div class="feature-box">
            <div class="text-dark">
                <i class="fas fa-coins feature-icon"></i>
            </div>
            <div>
                <a href="vongquay.php" class="feature-title">Vòng Quay May Mắn</a>
                <p>Quay random ra những vật phẩm giá trị.</p>
                <a href="vongquay.php" class="btn btn-primary">
                    đến ngay
                </a>
            </div>
        </div>
    </div>
    <div class="col d-flex align-items-stretch">
        <div class="feature-box">
            <div class="text-dark">
                <i class="fas fa-coins feature-icon"></i>
            </div>
            <div>
                <a href="topup.php" class="feature-title">Nạp Coin</a>
                <p>Thanh toán hoàn toàn tự động, xử lý nhanh sau 1 - 5 phút.</p>
                <a href="topup.php" class="btn btn-primary">
                    Nạp ngay
                </a>
            </div>
        </div>
    </div>
    <div class="col d-flex align-items-stretch">
        <div class="feature-box">
            <div class="text-dark">
                <i class="fas fa-user-edit feature-icon"></i>
            </div>
            <div>
                <a href="rename.php" class="feature-title">Đổi Tên Nhân Vật</a>
                <p>Hãy Bú Những Cái Tên Độc Đáo Mang Phong cách lỏ.</p>
                <a href="rename.php" class="btn btn-primary">
                    Đổi Ngay
                </a>
            </div>
        </div>
    </div>
    <div class="col d-flex align-items-stretch">
        <div class="feature-box">
            <div class="text-dark">
                <i class="fas fa-exchange-alt feature-icon"></i>
            </div>
            <div>
                <a href="exchange.php" class="feature-title">Đổi Lượng</a>
                <p>Làm Trùm Đại Gia Trong Game quản lý vận may mua bán.</p>
                <a href="exchange.php" class="btn btn-primary">
                    Đổi Ngay
                </a>
            </div>
        </div>
    </div>
</div> -->
<!-- 
            <section class="text-center container">
                
                <div class="row py-md-3">
                    
                    <div class="col-lg-6 col-md-8 mx-auto">
                        
                        <h3 style="text-align:center;font-weight:bold">Thông Báo Của ADMIN</h3>
                        <ul class="list-group">
						
<?php 
//
    require_once 'diendan/connection_database/connect_post.php';

    $read_sql = ("SELECT * FROM baiviet order by id, title");

    $result = mysqli_query($ketnoi_baiviet,$read_sql);

    while ($r = mysqli_fetch_assoc($result)){
      ?>
						<li style="color:#3fff21">
						<div class="post-item d-flex align-items-center my-2">
						<img class="post-image" src="/images/admin.gif" width="50px" height="50px">
						<a class="fw-bold" href="/post?id_baiviet=<?php echo $r['id'];?>" style="color:#000000;margin-left:20px"><span style="color:#ff3826">Thông Báo:</span> <?php echo $r['title'];?></a>
						</div>
						</li>
<?php    
    }
  ?>
						
						</ul>
                    </div>
                </div>
                
            </section>     -->
        
</div>
