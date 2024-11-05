<?php
// Kết nối cơ sở dữ liệu
include '../Database/db.php';

// Câu truy vấn để lấy sản phẩm
$query = "SELECT id, img, tenhang, tensanpham, gia FROM sanpham_chamsocsuckhoe 
          WHERE category = 'Chăm sóc sức khỏe' AND category_subtype = 'Bổ sung lợi khuẩn phụ nữ'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bổ Sung Lợi Khuẩn Phụ Nữ</title>
    <link rel="stylesheet" href="../branch/super_salestyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../home/homestyles.css">

</head>

<body>
    <div id="main-body">
        <?php
           // Bao gồm file header.php
             include '../home/header.php';
             ?>
    </div>
    <div id="main-content">
        <div class="container-content">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="bg-white" style="padding: 15px;">
                        <div>
                            <div class="layered_subtitle dropdown-filter"><span>Thương hiệu</span>
                                <div class="layered-content bl-filter filter-brand">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox">
                                            <label>Natrol</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Swanson</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Ivory Caps</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Khác</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Healthy Care</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>DHC</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Puritan's Pride</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Healthy Origins</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Jarrow Formulas</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Nature Made</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Swisse</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Pure Alaska Omega</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Angdom</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Doctor Gak</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>NoTs</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Goodhealth</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Spirulina System</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Nature's Truth</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Nature's Way</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Truenature</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Cell Fusion C</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Clinicians</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Blis Probiotics</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Go Healthy</label>
                                        </li>

                                        <li>
                                            <input type="checkbox">
                                            <label>Orihiro</label>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="group-filter" aria-expanded="true">
                            <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span>
                            </div>
                            <div class="layered-content bl-filter filter-price">
                                <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox">
                                        <label>
                                            <span>Dưới</span> 500,000₫
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>
                                            500,000₫ - 1,000,000₫
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>
                                            1,000,000₫ - 1,500,000₫
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>
                                            2,000,000₫ - 5,000,000₫
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label for="p5">
                                            <span>Trên</span> 5,000,000₫
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <style>
                .pro-name a {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
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

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div style="padding: 0 12px;">
                        <div class="bg-white">
                            <h2 style="font-size: 20px; margin: 0; padding: 10px;">Bổ Sung Lợi Khuẩn Phụ Nữ</h2>
                        </div>
                    </div>
                    <div class="container" style="background-color: #f5f5f5;">
                        <div class="row">
                            <?php
                            // Lặp qua các sản phẩm và chèn vào HTML
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="product-block col-lg-3 col-md-3 col-sm-4 col-6"
                                style="padding: 15px; background-color: white; transition: transform 0.3s;">
                                <div class="a" style="border: 1px solid rgba(128, 128, 128, 0.1);">
                                    <div class="product-img">
                                        <a href="../product details/chamsocsuckhoe_home.php?id=<?php echo $row['id']; ?>"
                                            style="text-decoration: none;">
                                            <img src="<?php echo $row['img']; ?>" alt=""
                                                style="width: 100%; height: 100%;">
                                        </a>
                                    </div>
                                    <div class="product-detail" style="padding: 15px;">
                                        <span class="product-vendor"><?php echo $row['tenhang']; ?></span>
                                        <p class="pro-name" style="padding: 0;">
                                            <a href="../product details/chamsocsuckhoe_home.php?id=<?php echo $row['id']; ?>"
                                                style="padding: 0; font-size: 14px; text-decoration: none; color: black;">
                                                <?php echo $row['tensanpham']; ?>
                                            </a>
                                        </p>
                                        <span><?php echo number_format($row['gia'], 0, ',', '.'); ?>₫</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>