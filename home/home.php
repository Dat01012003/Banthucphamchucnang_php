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



    <script>
    function toggleMenu() {
        const menu = document.getElementById('menu');
        const content = document.getElementById('content');

        if (menu.style.left === '0px') {
            menu.style.left = '-250px';
            content.style.marginLeft = '0';
        } else {
            menu.style.left = '0px';
            content.style.marginLeft = '250px';
        }
    }

    function toggleSubmenu(event, submenuId) {
        event.preventDefault(); // Ngăn chặn liên kết hoạt động
        const submenu = document.getElementById(submenuId);
        if (submenu.style.display === 'block') {
            submenu.style.display = 'none'; // Ẩn submenu nếu đang mở
        } else {
            submenu.style.display = 'block'; // Hiển thị submenu nếu đang ẩn
        }
    }
    </script>

    <div style="background-color: #F5F5F5;">
        <div class="menu-container">
            <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
            <div class="menu" id="menu">
                <ul>
                    <li>
                        <a href="#" onclick="toggleSubmenu(event, 'homeSubmenu')">Trang chủ</a>
                        <ul class="submenu" id="homeSubmenu">
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onclick="toggleSubmenu(event, 'infoSubmenu')">Thông tin chung</a>
                        <ul class="submenu" id="infoSubmenu">
                            <li><a href="#">Thông báo</a></li>
                            <li><a href="#">Lịch học</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onclick="toggleSubmenu(event, 'studySubmenu')">Học tập</a>
                        <ul class="submenu" id="studySubmenu">
                            <li><a href="#">Điểm danh</a></li>
                            <li><a href="#">Kết quả học tập</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Đăng ký học phần</a></li>
                    <li><a href="#">Học phí</a></li>
                    <li><a href="#">Khác</a></li>
                </ul>
            </div>
        </div>
        <div id="home-slider" style="    transform: translateY(-65px);
    transition: transform 0.3s ease;     padding: 0">
            <div class="container" style="margin: 0; max-width: 1337px;">
                <div class="row">
                    <!-- Cột chiếm 9 phần -->
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner" style="max-height: 536px;">
                                <div class="carousel-item active" data-bs-interval="3000">
                                    <img src="../img/pt1.webp" class="d-block w-100" alt="..."
                                        style="width: 100%; height: auto;">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="3000">
                                    <img src="../img/pt.webp" class="d-block w-100" alt="..." class="d-block w-100"
                                        alt="..." style="width: 100%; height: auto;">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="3000">
                                    <img src="../img/pt3.webp" class="d-block w-100" alt="..."
                                        style="width: 100%; height: auto;">
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
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
    <div id="footer">
        <h2>THƯƠNG HIỆU NỔI BẬT</h2>
        <div class="brand-list">
            <div class="brand-item">
                <img src="https://file.hstatic.net/200000426279/file/swanson_bf604be28ad040c8b88c09a13e773c4a.png"
                    alt="Swanson">
                <span>SWANSON</span>
            </div>
            <div class="brand-item">
                <img src="https://file.hstatic.net/200000426279/file/natrol_76ccd035126c4c039b2bb1a0ab9e1199.png"
                    alt="Natrol">
                <span>NATROL</span>
            </div>
            <div class="brand-item">
                <img src="https://file.hstatic.net/200000426279/file/puritan_e9bbe4e33a5a478a8b12a4df7fd6eb09.png"
                    alt="Puritan's Pride">
                <span>PURITAN'S PRIDE</span>
            </div>
            <div class="brand-item">
                <img src="https://file.hstatic.net/200000426279/file/dhc_27803b3d1a0740838bef16596de629d3.png"
                    alt="DHC">
                <span>DHC</span>
            </div>
            <div class="brand-item">
                <img src="https://file.hstatic.net/200000426279/file/jarrow-formulas_af1af25a4be14c058fa2942430d49ac1.png"
                    alt="Jarrow Formulas">
                <span>JARROW FORMULAS</span>
            </div>
        </div>
    </div>
    <style>
    /* Container chính */
    #footer {
        padding: 20px 9px;
        width: 70%;
        margin: 40px auto;
        /* Tạo khoảng cách trên và căn giữa */
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Tiêu đề */
    #footer h2 {
        font-size: 20px;
        color: #333;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        font-weight: bold;
    }

    #footer h2::before {
        content: "⚜";
        /* Thêm biểu tượng */
        font-size: 18px;
        margin-right: 8px;
        color: #007bff;
    }

    /* Danh sách thương hiệu */
    .brand-list {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .brand-item {
        flex: 1;
        text-align: center;
        margin: 0 10px;
    }

    .brand-item img {
        max-width: 100%;
        height: auto;
        max-height: 80px;
        margin-bottom: 8px;
    }

    .brand-item span {
        display: block;
        font-size: 14px;
        color: #555;
    }
    </style>
    <?php
           // Bao gồm file header.php
             include 'footer.php';
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
    <!-- menu left -->
    <style>
    /* Menu container */
    /* Đặt font chữ và reset mặc định */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        color: #333;
    }

    /* Phần menu */
    /* .menu-container {
        display: flex;
        flex-direction: column;
    } */

    .menu-icon {
        width: 5%;
        font-size: 24px;
        cursor: pointer;
        padding: 15px;
        background-color: green;
        color: #fff;
        text-align: center;
        border-bottom: 1px solid #0056b3;
    }

    .menu {
        width: 250px;
        background-color: #fff;
        height: 100vh;
        overflow: auto;
        position: fixed;
        left: -250px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        transition: left 0.3s ease;
    }

    .menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu ul li {
        padding: 10px 15px;
        border-bottom: 1px solid #eee;
    }

    .menu ul li a {
        text-decoration: none;
        color: #333;
        display: block;
        font-size: 16px;
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    .menu ul li a:hover {
        background-color: green;
        color: #fff;
        border-radius: 5px;
        padding-left: 20px;
    }

    .content {
        flex: 1;
        padding: 20px;
        margin-left: 0;
        transition: margin-left 0.3s ease;
    }

    /* Style cho submenu */
    .submenu {
        display: none;
        /* Ban đầu ẩn submenu */
        list-style: none;
        padding-left: 20px;
        /* Thụt vào so với menu chính */
        margin: 0;
    }

    .submenu li {
        padding: 8px 0;
    }

    .submenu li a {
        font-size: 14px;
        color: #555;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .submenu li a:hover {
        color: #007bff;
        /* Thay đổi màu khi hover submenu */
    }
    </style>
</body>

</html>