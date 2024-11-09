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
    <div id="main-body">
        <?php
           // Bao gồm file header.php
             include 'header.php';
             ?>

    </div>
    <div style="background-color: #F5F5F5;">
        <div id="home-slider">
            <div class="container" style="margin: 0; max-width: 1337px;">
                <div class="row">
                    <!-- Cột chiếm 9 phần -->
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <img src="../img/1920x1055.webp" alt="Image 1"
                            style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                    <!-- Cột chiếm 3 phần -->
                    <div class="row col-md-3">
                        <div class="col-md-12 col-sm-4 col-4" style="padding: 0;">
                            <img src="../img/natrol-grid-banner.webp" alt="Image 1"
                                style="width: 100%; height: auto; padding: 0 0 11px 0;">
                        </div>
                        <div class="col-md-12 col-sm-4 col-4" style="padding: 0;">
                            <img src="../img/nhan_sam_an_do_-_t14_800x450__1_.webp" alt="Image 2"
                                style="width: 100%; height: auto; padding: 0 0 11px 0;">
                        </div>
                        <div class="col-md-12 col-sm-4 col-4" style="padding: 0;">
                            <img src="../img/jarrow-formulas-grid-banner.webp" alt="Image 3"
                                style="width: 100%; height: 96%; ">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12" style="padding: 30px 0 0 0;">
                <div class="button-list-wrapper">
                    <div class="button-list"><a>Sản Phẩm Ngủ Ngon</a></div>
                    <div class="button-list"><a>Trĩ Não</a></div>
                    <div class="button-list"><a>Sinh Lý Nam Giới</a></div>
                    <div class="button-list"><a>Huyết Áp Tim Mạch</a></div>
                    <div class="button-list"><a>Canxi, Xương Khớp</a></div>
                    <div class="button-list"><a>Stress & Mood</a></div>
                    <div class="button-list"><a>Vitamin</a></div>
                </div>
            </div>
        </div>

    </div>

    <?php
           // Bao gồm file header.php
             include 'dealsoc.php';
             ?>
    <?php
           // Bao gồm file header.php
             include 'chamsocsuckhoe.php';
             ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
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