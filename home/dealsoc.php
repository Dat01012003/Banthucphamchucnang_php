<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="homestyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif;">
    <div id="home-collection" style="background-image: url(../img/bg-collection-sale__1_.webp);">
        <div class="home-deal">
            <div class="title-deal" style="padding: 15px;">
                <h2 style="padding: 0; font-size: 20px;">
                    <img src="../img/flashsale-icon.webp" alt="" style="width: 26px;height: 26px;"> GIỜ VÀNG DEAL SỐC
                </h2>
            </div>
            <div class="row list-product" style="padding: 0 15px;">
                <?php
                include '../Database/db.php';  // Kết nối cơ sở dữ liệu

                // Lấy danh sách sản phẩm
                $sql = "SELECT * FROM sanpham LIMIT 6"; // Thay đổi theo yêu cầu
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="product-block col-md-2 col-6" style="padding: 7px;">
                            <div style="background-color: white;">
                                <div class="product-img">
                                    <a href="../product details/super_sale.php?id=' . $row['id'] . '" style="padding: 0">
                                        <img src="' . $row['img'] . '" alt="' . $row['tensanpham'] . '" style="width: 100%; height: 100%;">
                                    </a>
                                </div>
                                <div class="product-detail" style="padding: 15px;">
                                    <span class="product-vendor">' . $row['tenhang'] . '</span>
                                    <p class="pro-name" style="padding: 0;">
                                        <a style="padding: 0; font-size: 14px; text-decoration: none; color: black">
                                            ' . $row['tensanpham'] . '
                                        </a>
                                    </p>
                                    <span>' . number_format($row['gia'], 0, ',', '.') . '₫</span>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo 'Không tìm thấy sản phẩm.';
                }

                $conn->close();
            ?>
            </div>
        </div>
    </div>

</body>

</html>