<?php
include '../Database/db.php'; // Kết nối cơ sở dữ liệu

// Truy vấn lấy 8 sản phẩm từ bảng sanpham_chamsocsuckhoe
$query = "SELECT id, img, tenhang, tensanpham, gia FROM sanpham WHERE category = 'Chăm sóc sức khỏe' LIMIT 8";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chăm Sóc Sức Khỏe</title>
    <link rel="stylesheet" href="homestyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif;">
    <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #F5F5F5;">
        <div class="container" style="padding: 0 ;">
            <div class="bg-white">
                <h2 style="font-size: 20px; margin: 0; padding: 10px;">Chăm Sóc Sức Khỏe</h2>
            </div>
        </div>
        <style>
        .pro-name a {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Số dòng muốn hiển thị */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .a {
            padding: 15px;
            background-color: white;
            transition: transform 0.3s, box-shadow 0.3s;
            /* Thêm hiệu ứng chuyển tiếp cho box-shadow */
        }

        .a:hover {
            transform: translateY(-10px);
            /* Nổi lên khi di chuột */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            /* Thêm bóng đổ để tạo hiệu ứng nổi */
        }
        </style>
        <div class="container" style="background-color: #f5f5f5;">
            <div class="row">
                <?php
                // Kiểm tra và hiển thị dữ liệu sản phẩm
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product-block col-lg-3 col-md-3 col-sm-4 col-6" style="padding: 15px; background-color: white; transition: transform 0.3s;">
                                <div class="a" style="border: 1px solid rgba(128, 128, 128, 0.1);">
                                    <div class="product-img">
                                        <a href="../product details/super_sale.php?id=' . $row["id"] . '" style="text-decoration: none;">
                                            <img src="' . $row["img"] . '" alt="" style="width: 100%; height: 100%;">
                                        </a>
                                    </div>
                                    <div class="product-detail" style="padding: 15px;">
                                        <span class="product-vendor">' . $row["tenhang"] . '</span>
                                        <p class="pro-name" style="padding: 0;">
                                            <a href="../product details/chamsocsuckhoe_home.php?id=' . $row["id"] . '" style="padding: 0; font-size: 14px; text-decoration: none; color: black;">
                                                ' . $row["tensanpham"] . '
                                            </a>
                                        </p>
                                        <span>' . number_format($row["gia"], 0, ',', '.') . '₫</span>
                                    </div>
                                </div>
                            </div>';
                    }
                } else {
                    echo '<p>Không có sản phẩm nào để hiển thị.</p>';
                }
                ?>
                <div class="text-center" style="background-color: #FFFFFF; padding :10px ">
                    <a href="../branch/chamsocsuckhoe.php" class="btn btn-primary">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>