<?php
include '../Database/db.php';

$data = json_decode(file_get_contents('php://input'), true);
$brands = $data['brands'];
$prices = $data['prices'];

$query = "SELECT id, img, tenhang, tensanpham, gia FROM sanpham WHERE category = 'Chăm sóc sức khỏe'";

// Xử lý danh sách thương hiệu
if (!empty($brands)) {
    // Escape thương hiệu để tránh SQL Injection
    $brandList = array_map(function($brand) use ($conn) {
        return "'" . mysqli_real_escape_string($conn, $brand) . "'";
    }, $brands);
    $query .= " AND tenhang IN (" . implode(",", $brandList) . ")";
}

// Xử lý phạm vi giá
if (!empty($prices)) {
    $priceConditions = [];
    foreach ($prices as $priceRange) {
        [$min, $max] = explode('-', $priceRange);
        $min = mysqli_real_escape_string($conn, $min);  // Escape giá trị min
        if ($max == '') {
            $priceConditions[] = "gia > $min";
        } else {
            $max = mysqli_real_escape_string($conn, $max);  // Escape giá trị max
            $priceConditions[] = "gia BETWEEN $min AND $max";
        }
    }
    $query .= " AND (" . implode(' OR ', $priceConditions) . ")";
}

$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Dùng htmlspecialchars để xử lý các ký tự đặc biệt trong tenhang và tensanpham
        $tenhang = htmlspecialchars($row["tenhang"], ENT_QUOTES, 'UTF-8');
        $tensanpham = htmlspecialchars($row["tensanpham"], ENT_QUOTES, 'UTF-8');
        echo '<div class="product-block col-lg-3 col-md-3 col-sm-4 col-6" style="padding: 15px; background-color: white; transition: transform 0.3s;">
                <div class="a" style="border: 1px solid rgba(128, 128, 128, 0.1);">
                    <div class="product-img">
                        <a href="../product details/super_sale.php?id=' . $row["id"] . '" style="text-decoration: none;">
                            <img src="' . $row["img"] . '" alt="" style="width: 100%; height: 100%;">
                        </a>
                    </div>
                    <div class="product-detail" style="padding: 15px;">
                        <span class="product-vendor">' . $tenhang . '</span>
                        <p class="pro-name" style="padding: 0;">
                            <a href="../product details/super_sale.php?id=' . $row["id"] . '" style="padding: 0; font-size: 14px; text-decoration: none; color: black;">
                                ' . $tensanpham . '
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