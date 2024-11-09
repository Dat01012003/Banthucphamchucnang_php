<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        include '../Database/db.php';  // Kết nối cơ sở dữ liệu

        // Lấy sản phẩm theo id từ URL
        $product_id = $_GET['id'] ?? 1; // Mặc định là 1 nếu không có id
        $sql = "SELECT * FROM sanpham WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();  // Lấy sản phẩm
            echo $row['tensanpham']; // Sử dụng tên sản phẩm làm tiêu đề
        } else {
            echo 'Sản phẩm không tồn tại'; // Hiển thị thông báo nếu không tìm thấy sản phẩm
        }

        $conn->close();
        ?>
    </title>
    <link rel="stylesheet" href="../home/homestyles.css">
    <link rel="stylesheet" href="./productstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="main-body">
        <?php
           // Bao gồm file header.php
             include '../home/header.php';
             ?>
    </div>
    <div id="product_details">
        <div class="container_product">
            <div class="row bg-white" style="padding: 15px;">
                <div class="col-md-6 col-sm-12 col-xs-12 product-content-desc">
                    <?php
            include '../Database/db.php';  // Kết nối cơ sở dữ liệu

            // Lấy sản phẩm theo id từ URL
            $product_id = $_GET['id'] ?? 1; // Mặc định là 1 nếu không có id
            $sql = "SELECT * FROM sanpham WHERE id = $product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();  // Lấy sản phẩm

                echo '<a ?id=' . $row['id'] . '">
                        <img src="' . $row['img'] . '" alt="' . $row['tensanpham'] . '" width="100%" height="100%">
                    </a>';
            } else {
                echo 'Không tìm thấy sản phẩm.';
            }

            $conn->close();
            ?>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 product-content-desc">
                    <div class="product-title">
                        <span class="product-brand">
                            <a style="padding: 0;"><?php echo $row['tenhang']; ?></a>
                        </span>
                        <h1>
                            <a href="../product details/product.php?id=<?php echo $row['id']; ?>"
                                style="color: inherit; text-decoration: none; padding: 0">
                                <?php echo $row['tensanpham']; ?>
                            </a>
                        </h1>
                    </div>
                    <div class="product-price" id="price-preview">
                        <span class="pro-price"><?php echo number_format($row['gia'], 0, ',', '.') . '₫'; ?></span>
                    </div>
                    <div class="product-promotion rounded-sm" id="ega-salebox">
                        <h3 class="product-promotion__heading rounded-sm d-inline-flex align-items-center">
                            <img src="https://file.hstatic.net/200000426279/file/icon-product-promotion.png" width="22"
                                height="22">
                            KHUYẾN MÃI - ƯU ĐÃI
                        </h3>
                        <ul class="promotion-box">
                            <li>Nhập mã <strong style="color: #B00002;">GL10</strong> giảm ngay 10% tối đa 20K đơn hàng
                                từ 200K</li>
                            <li>Nhập mã <strong style="color: #B00002;">GL15K</strong> giảm ngay 15K đơn hàng từ 395K
                            </li>
                            <li>Nhập mã <strong style="color: #B00002;">GL35K</strong> giảm ngay 35K đơn hàng từ 795K
                            </li>
                            <li>Nhập mã <strong style="color: #B00002;">GL55K</strong> giảm ngay 55K đơn hàng từ 1.195K
                            </li>
                            <li>Gọi <a href="tel:0908975627" style="text-decoration: none; padding: 0;">0908.975.627</a>
                                để mua hàng nhanh hơn</li>
                            <li>Miễn phí giao hàng từ 200.000đ</li>
                        </ul>
                    </div>
                    <form action="">
                        <div class="selector-actions">
                            <div class="quantity-area clearfix">
                                <input type="button" value="-" onclick="minusQuantity()" class="qty-btn minus">
                                <input type="text" id="quantity" name="quantity" value="1" min="1"
                                    class="quantity-selector">
                                <input type="button" value="+" onclick="plusQuantity()" class="qty-btn plus">
                            </div>
                            <div class="wrap-addcart clearfix">
                                <button type="button" id="add-to-cart"
                                    class="add-to-cartProduct button dark btn-addtocart addtocart-modal" name="add"
                                    onclick="checkLoginBeforeAddToCart(<?php echo $row['id']; ?>)">
                                    <!-- Thay addToCart bằng checkLoginBeforeAddToCart -->
                                    Thêm vào giỏ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="description_product">
            <div class="description_container" style="padding: 15px;">
                <div class="description_tile_product" style="padding: 0; margin: 0;">
                    <h2>Mô Tả Sản Phẩm</h2>
                </div>
                <div class="product-description-tab">
                    <h1 style="font-size: 18px;">
                        <?php echo $row['tensanpham']; ?>
                    </h1>

                    <div>
                        <p><span style="font-size:15px"><?php echo $row['description']; ?></span></p>
                        <p><span style="font-size:15px">_______________________________________________</span></p>
                        <p style="text-align: center"><img
                                src="//file.hstatic.net/200000426279/file/00-mcg-ho-tro-moc-toc-giam-gay-rung-toc-va-chac-khoe-mong-100-vien-lo4_f0eb9d4335764b0595204c326058d128_grande.png">
                        </p>
                        <h2><strong><span style="font-size:18px">1. Thông tin sản phẩm:</span></strong></h2>
                        <p>
                            <span style="font-size:15px">
                                <?php echo nl2br($row['product_information']); ?>
                            </span>
                        </p>

                        <h2><strong><span style="font-size:18px">2. Công dụng:</span></strong></h2>
                        <p>
                            <span style="font-size:15px">
                                <?php echo nl2br($row['uses']); ?>
                            </span>
                        </p>
                        <p style="text-align: center"><img
                                src="//file.hstatic.net/200000426279/file/00-mcg-ho-tro-moc-toc-giam-gay-rung-toc-va-chac-khoe-mong-100-vien-lo2_4967295e8ada4610954ae34e3e353c1f_grande.png">
                        </p>
                        <h2><strong><span style="font-size:18px">3. Liều dùng và cách dùng:</span></strong></h2>
                        <p>
                            <span style="font-size:15px">
                                <?php echo nl2br($row['lieudung']); ?>
                            </span>
                        </p>
                        <h2><strong><span style="font-size:18px">4. Thận trọng:</span></strong></h2>
                        <p>
                            <span style="font-size:15px">
                                <?php echo nl2br($row['thantrong']); ?>
                            </span>
                        </p>
                        <h2><strong><span style="font-size:18px">5. Bảo quản:</span></strong></h2>
                        <p>
                            <span style="font-size:15px">
                                <?php echo nl2br($row['baoquan']); ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hàm đếm số lượng -->
    <script>
    function plusQuantity() {
        const quantityInput = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityInput.value);
        if (!isNaN(currentQuantity)) {
            quantityInput.value = currentQuantity + 1;
        } else {
            quantityInput.value = 1;
        }
    }

    function minusQuantity() {
        const quantityInput = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityInput.value);
        if (!isNaN(currentQuantity) && currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }
    </script>

    <script>
    function checkLoginBeforeAddToCart(productId) {
        let quantity = document.getElementById("quantity").value;

        // Gửi yêu cầu AJAX để kiểm tra đăng nhập
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../Database/check_login.php", true); // File PHP mới để kiểm tra đăng nhập
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "logged_in") {
                    // Nếu đã đăng nhập, thêm sản phẩm vào giỏ hàng
                    addToCart(productId, quantity);
                } else {
                    // Nếu chưa đăng nhập, yêu cầu đăng nhập
                    alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.");
                    window.location.href = "../home/home.php"; // Đường dẫn đến trang đăng nhập
                }
            }
        };
        xhr.send();
    }

    function addToCart(productId, quantity) {
        // Gửi yêu cầu AJAX đến add_to_cart.php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../Database/add_to_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    alert("Đã thêm sản phẩm vào giỏ hàng!");
                } else {
                    alert("Có lỗi xảy ra. Vui lòng thử lại.");
                }
            }
        };
        xhr.send("product_id=" + productId + "&quantity=" + quantity);
    }
    </script>


    <style>
    .cart-item img {
        margin-bottom: 5px;
    }

    .cart-item span {
        margin-bottom: 5px;
    }

    .quantity {
        font-size: 14px;
        color: #333;
    }

    .cart-item {
        position: relative;
        padding: 10px;
        border: 1px solid #ddd;
    }

    .remove-item {
        position: absolute;
        top: 5px;
        right: 5px;
        color: red;
        font-size: 20px;
        cursor: pointer;
    }
    </style>
</body>

</html>