<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giảm Căng Thẳng</title>
    <link rel="stylesheet" href="./super_salestyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../home/homestyles.css">
</head>

<body>
    <div id="main-body">
        <?php
            // Bao gồm file header.php và kết nối cơ sở dữ liệu
            include '../home/header.php';
            include '../database/db.php';

            // Truy vấn dữ liệu từ bảng 'sanpham' với category là 'Giảm Căng Thẳng'
            $query = "SELECT * FROM sanpham 
          WHERE category = 'Chăm sóc sức khỏe' AND category_subtype = 'Giảm căng thẳng'";
$result = mysqli_query($conn, $query);
        ?>
    </div>
    <div id="main-content" style="background-color: #f5f5f5;">
        <div class="container-content">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="bg-white" style="padding: 15px;">
                        <div>
                            <div class="layered_subtitle dropdown-filter"><span>Thương hiệu</span></div>
                            <div class="layered-content bl-filter filter-brand">
                                <ul class="check-box-list">
                                    <li><input type="checkbox" class="brand-filter" value="Natrol"><label>Natrol</label>
                                    </li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Swanson"><label>Swanson</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Ivory Caps"><label>Ivory
                                            Caps</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Khác"><label>Khác</label>
                                    </li>
                                    <li><input type="checkbox" class="brand-filter" value="Healthy Care"><label>Healthy
                                            Care</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="DHC"><label>DHC</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Puritan's Pride"><label>Puritan's Pride</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Healthy Origins"><label>Healthy Origins</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Jarrow Formulas"><label>Jarrow Formulas</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Nature Made"><label>Nature
                                            Made</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Swisse"><label>Swisse</label>
                                    </li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Pure Alaska Omega"><label>Pure Alaska Omega</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Angdom"><label>Angdom</label>
                                    </li>
                                    <li><input type="checkbox" class="brand-filter" value="Doctor Gak"><label>Doctor
                                            Gak</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="NoTs"><label>NoTs</label>
                                    </li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Goodhealth"><label>Goodhealth</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Spirulina System"><label>Spirulina System</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Nature's Truth"><label>Nature's Truth</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Nature's Way"><label>Nature's
                                            Way</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Truenature"><label>Truenature</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Cell Fusion C"><label>Cell
                                            Fusion C</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Clinicians"><label>Clinicians</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Blis Probiotics"><label>Blis
                                            Probiotics</label></li>
                                    <li><input type="checkbox" class="brand-filter" value="Go Healthy"><label>Go
                                            Healthy</label></li>
                                    <li><input type="checkbox" class="brand-filter"
                                            value="Orihiro"><label>Orihiro</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="group-filter" aria-expanded="true">
                            <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span></div>
                            <div class="layered-content bl-filter filter-price">
                                <ul class="check-box-list">
                                    <li><input type="checkbox" class="price-filter"
                                            value="0-500000"><label><span>Dưới</span> 500,000₫</label></li>
                                    <li><input type="checkbox" class="price-filter"
                                            value="500000-1000000"><label>500,000₫ - 1,000,000₫</label></li>
                                    <li><input type="checkbox" class="price-filter"
                                            value="1000000-1500000"><label>1,000,000₫ - 1,500,000₫</label></li>
                                    <li><input type="checkbox" class="price-filter"
                                            value="2000000-5000000"><label>2,000,000₫ - 5,000,000₫</label></li>
                                    <li><input type="checkbox" class="price-filter"
                                            value="5000000-"><label><span>Trên</span> 5,000,000₫</label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                .pro-name a {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: normal;
                }

                .a {
                    padding: 15px;
                    background-color: white;
                    transition: transform 0.3s, box-shadow 0.3s;
                }

                .a:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                }
                </style>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div style="padding: 0 12px;">
                        <div class="bg-white">
                            <h2 style="font-size: 20px; margin: 0; padding: 10px;">Giảm Căng Thẳng</h2>
                        </div>
                    </div>
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
                                                            <a href="../product details/super_sale.php?id=' . $row["id"] . '" style="padding: 0; font-size: 14px; text-decoration: none; color: black;">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
           // Bao gồm file header.php
             include '../home/footer.php';
             ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const brandCheckboxes = document.querySelectorAll('.brand-filter');
        const priceCheckboxes = document.querySelectorAll('.price-filter');

        brandCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', filterProducts);
        });

        priceCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', filterProducts);
        });

        function filterProducts() {
            const selectedBrands = Array.from(brandCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);
            const selectedPrices = Array.from(priceCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            // Tạo một đối tượng để gửi yêu cầu AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../filter_products/filter_products_cangthang.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.querySelector('.container .row').innerHTML = xhr.responseText;
                }
            };

            xhr.send(JSON.stringify({
                brands: selectedBrands,
                prices: selectedPrices
            }));
        }
    });
    </script>
</body>

</html>