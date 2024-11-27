<?php
// Kiểm tra và khởi động session nếu chưa khởi động
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Xử lý lỗi đăng nhập nếu có và sau đó xóa khỏi session để tránh hiển thị lại
$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']);

// Đường dẫn đến thư mục gốc của dự án
$base_url = '/banthucphamchucnang';

include '../Database/db.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra nếu người dùng đã đăng nhập
$cart_items = [];
$total_price = 0;
$cart_count = 0;

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Truy vấn giỏ hàng từ cơ sở dữ liệu cho người dùng đã đăng nhập
    $sql = "SELECT cart.id_cart, cart.quantity, sanpham.id, sanpham.tensanpham, sanpham.gia, sanpham.img
            FROM cart
            JOIN sanpham ON cart.id_product = sanpham.id
            WHERE cart.id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Lặp qua kết quả truy vấn để tính tổng giá và đếm số lượng sản phẩm trong giỏ hàng
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
        $total_price += $row['gia'] * $row['quantity'];
    }

    // Đếm số lượng sản phẩm trong giỏ hàng
    $cart_count = count($cart_items);

    $stmt->close();
}

// Đóng kết nối cơ sở dữ liệu sau khi hoàn tất
$conn->close();
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../home/homestyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../home/header.css">
    <script src="../Js/timkiem.js"></script>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif;">
    <div>
        <div id="mainHeader">
            <ul class="menu-header">
                <div style="margin-right: auto; cursor: pointer;">
                    <a href="../home/home.php"><img src="../img/logo_left_corner_94b56bba8980415da64ac711a8e3e22d.png"
                            alt="" style="height: 50px;"></a>
                </div>
                <li><a href="<?php echo $base_url; ?>/home/home.php" style="text-decoration: none; color: black;">Trang
                        Chủ</a></li>
                <li><a href="<?php echo $base_url; ?>/branch/supper_sale.php"
                        style="text-decoration: none; color: black;">Super Sale</a></li>
                <li><a>Chăm Sóc Sức Khỏe<i class="fa-solid fa-chevron-down" style="margin-left: 10px;"></i></a>
                    <ul class="submenu-header">
                        <li><a href="../branh_chamsocsuckhoe/baove-gan-than-phoi.php"
                                style="text-decoration: none; color: black;">Bảo Vệ Gan - Thận - Phổi</a></li>
                        <li><a href="../branh_chamsocsuckhoe/bomat.php" style="text-decoration: none; color: black;">Bổ
                                Mắt</a></li>
                        <li><a href="../branh_chamsocsuckhoe/bonao_tangtrinho.php"
                                style="text-decoration: none; color: black;">Bổ Não - Tăng Trí Nhớ</a></li>
                        <li><a href="../branh_chamsocsuckhoe/bosungcanxi_khop.php"
                                style="text-decoration: none; color: black;">Bổ Sung Canxi, Xương Khớp</a></li>
                        <li><a href="../branh_chamsocsuckhoe/bosungloikhuan.php"
                                style="text-decoration: none; color: black;">Bổ Sung Lợi Khuẩn cho Phụ Nữ</a></li>
                        <li><a href="../branh_chamsocsuckhoe/giamcangthang.php"
                                style="text-decoration: none; color: black;">Giảm Căng Thẳng</a></li>
                        <li><a href="../branh_chamsocsuckhoe/cannang.php"
                                style="text-decoration: none; color: black;">Hỗ Trợ Cân Nặng</a></li>

                    </ul>
                </li>
                <li><a>Làm đẹp<i class="fa-solid fa-chevron-down" style="margin-left: 10px;"></i></a>
                    <ul class="submenu-header">
                        <li><a href="../branh_lamdep/depdadaitoc.php" style="text-decoration: none; color: black;">Đẹp
                                Da Dài Tóc</a></li>
                        <li><a href="../branh_lamdep/sanphamkhac.php" style="text-decoration: none; color: black;">Sản
                                Phẩm Khác</a></li>
                    </ul>
                </li>
                <li><a h>Mẹ & Bé<i class="fa-solid fa-chevron-down" style="margin-left: 10px;"></i></a>
                    <ul class="submenu-header">
                        <li><a href="../branh_me&be/vitaminchobe.php"
                                style="text-decoration: none; color: black;">Vitamin Dành Cho Bé</a></li>
                    </ul>
                </li>


                <div class="menu-header"
                    style="padding: 0; margin-left: auto; display: flex; justify-content: center; align-items: center;">
                    <ul style="list-style: none; display: flex; margin: 0; padding: 0; position: relative;">
                        <li id="searchBarContainer" style="position: relative;">
                            <a style="padding: 0; " onclick="toggleSearchPopup()">
                                <i class="fa-solid fa-magnifying-glass"
                                    style="width: 35px; height: 26px; font-size: 20px;"></i>
                            </a>
                            <div id="searchPopup" class="popup-content" style="min-width: 520px">
                                <h2>Tìm kiếm</h2>
                                <form onsubmit="searchProduct(event)">
                                    <input type="text" id="search" name="search" placeholder="Tìm kiếm sản phẩm..."
                                        required>
                                    <button type="submit" class="search-btn">Tìm kiếm</button>
                                </form>
                                <div id="searchResults"></div>
                                <button id="loadMoreButton" style="display: none;" onclick="displayProducts()">Xem
                                    thêm</button>
                            </div>
                        </li>
                        <div>
                            <li style="position: relative;">
                                <?php if (isset($_SESSION['fullname'])): ?>
                                <a style="padding: 0;" onclick="toggleUserPopup()">
                                    <i class="fa-solid fa-user" style="width: 35px;height: 26px; font-size: 20px;"></i>
                                </a>
                                <div id="userPopup" class="popup-content" style="display: none;">
                                    <h2 style="padding: 12px;">Xin chào, <?php echo $_SESSION['fullname']; ?></h2>
                                    <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#updateAccountModal"
                                        style="display: block; width: 100%; padding: 12px; text-align: left; color: #333; background: none; border: none; font-size: 16px; cursor: pointer; outline: none; box-shadow: none;font-weight: bold;">
                                        Thông tin tài khoản
                                    </button>
                                    <button type="button"
                                        style="display: block; width: 100%; padding: 12px; text-align: left; color: #333; background: none; border: none; font-size: 16px; cursor: pointer; outline: none; box-shadow: none;padding:0">
                                        <a href="../admin_panel/user.php"
                                            style="text-decoration: none;color: black;padding: 12px;">Quản
                                            Lý</a>
                                    </button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#updateAccountModal"
                                        style="display: block; width: 100%;font-weight: bold; padding: 12px; text-align: left; color: #333; background: none; border: none; font-size: 16px; cursor: pointer; outline: none; box-shadow: none;">
                                        Thông tin tài khoản
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#feedbackModal"
                                        style="display: block; font-weight: bold;width: 100%; padding: 12px; text-align: left; color: #333; background: none; border: none; font-size: 16px; cursor: pointer; outline: none; box-shadow: none;">
                                        Phản hồi
                                    </button>
                                    <?php endif; ?>
                                    <a href="../Database/logout.php" class="logout-btn"
                                        style="padding: 12px;text-decoration:none;color:#333">Đăng
                                        xuất</a>
                                </div>
                                <?php else: ?>
                                <a style="padding: 0;" onclick="toggleLoginPopup()">
                                    <i class="fa-solid fa-user" style="width: 35px;height: 26px; font-size: 20px;"></i>
                                </a>
                                <div id="loginPopup"
                                    class="popup-content <?php if (!empty($error) || isset($_GET['showLogin'])) echo 'show-error'; ?>"
                                    style="display: <?php echo (!empty($error) || isset($_GET['showLogin'])) ? 'block' : 'none'; ?>;">
                                    <h2>Đăng Nhập Tài Khoản</h2>
                                    <p>Nhập email và mật khẩu của bạn:</p>
                                    <form action="../Database/login.php" method="POST"
                                        onsubmit="return validateLogin();">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Email" required>

                                        <label for="password">Mật khẩu</label>
                                        <input type="password" id="password" name="password" placeholder="Mật khẩu"
                                            required>
                                        <!-- Hiển thị thông báo lỗi nếu có -->
                                        <?php if (!empty($error)): ?>
                                        <p style="color: red;"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-primary" id="openModalBtn">
                                            Đăng ký tài khoản
                                        </button>

                                        <button type="submit" class="login-btn">Đăng nhập</button>
                                    </form>
                                </div>
                                <?php endif; ?>
                            </li>
                        </div>
                        <!-- HTML hiển thị giỏ hàng -->
                        <li style="position: relative;">
                            <a style="padding: 0;" onclick="toggleCartPopup()">
                                <i class="fa-solid fa-cart-shopping"
                                    style="width: 35px;height: 26px; font-size: 20px;"></i>
                                <span id="cartCount"><?php echo isset($cart_count) ? $cart_count : 0; ?></span>
                            </a>
                            <div id="cartPopup" class="popup-content" style="display: none; min-width:450px">
                                <h2>Giỏ hàng</h2>
                                <div id="cartItems">
                                    <?php if (isset($cart_items) && !empty($cart_items)): ?>
                                    <?php foreach ($cart_items as $item): ?>

                                    <div class="cart-item">

                                        <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['tensanpham']; ?>"
                                            width="50">
                                        <span><?php echo $item['tensanpham']; ?></span>
                                        <span>Số lượng: <?php echo $item['quantity']; ?></span>
                                        <span>Giá: <?php echo number_format($item['gia'] * $item['quantity']); ?>
                                            đ</span>
                                        <button
                                            onclick="console.log('Item ID: <?php echo $item['id']; ?>'); removeItem(<?php echo $item['id']; ?>)">X</button>

                                    </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <p>Giỏ hàng của bạn trống.</p>
                                    <?php endif; ?>
                                </div>
                                <div id="totalPriceContainer">
                                    <span class="total-label">TỔNG TIỀN:</span>
                                    <span id="totalPrice"
                                        class="total-amount"><?php echo isset($total_price) ? number_format($total_price) : '0'; ?>
                                        đ</span>
                                </div>
                                <div class="cart-buttons">
                                    <a href="../cart/shopping cart details.php"><button class="view-cart-btn">Xem giỏ
                                            hàng</button></a>
                                    <a href="../cart/cart checkout.php"><button class="checkout-btn">Thanh
                                            toán</button></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- đăng ký tài khoản -->
                <!-- Modal -->
                <?php

// Lấy lỗi và dữ liệu cũ từ session
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$old_data = isset($_SESSION['old_data']) ? $_SESSION['old_data'] : [];

// Xóa lỗi khỏi session sau khi lấy ra
unset($_SESSION['errors']);
unset($_SESSION['old_data']);
?>

                <!-- Modal Đăng Ký -->
                <div class="modal fade <?= !empty($errors) ? 'show' : '' ?>" id="exampleModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="<?= empty($errors) ? 'true' : 'false' ?>"
                    style="<?= !empty($errors) ? 'display: block;' : '' ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Đăng Ký Tài Khoản</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="../Database/register.php" method="POST">
                                <div class="modal-body">
                                    <!-- Hiển thị lỗi -->
                                    <?php if (!empty($errors)): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                            <li><?= htmlspecialchars($error) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>

                                    <!-- Form nhập liệu -->
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Họ và tên</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            value="<?= isset($old_data['fullname']) ? htmlspecialchars($old_data['fullname']) : '' ?>"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?= isset($old_data['email']) ? htmlspecialchars($old_data['email']) : '' ?>"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="<?= isset($old_data['phone']) ? htmlspecialchars($old_data['phone']) : '' ?>"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="diachi" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="diachi" name="diachi"
                                            value="<?= isset($old_data['diachi']) ? htmlspecialchars($old_data['diachi']) : '' ?>"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- JavaScript tự động hiển thị modal nếu có lỗi -->
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    <?php if (!empty($errors)): ?>
                    var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    exampleModal.show();
                    <?php endif; ?>
                });
                </script>


                <!-- thông tin tài khoản -->
                <div class="modal fade" id="updateAccountModal" tabindex="-1" aria-labelledby="updateAccountModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateAccountModalLabel">Cập nhật thông tin tài khoản</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="message" class="alert" style="display: none;"></div>
                                <form id="updateAccountForm">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Họ và tên</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            value="<?php echo $_SESSION['fullname']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php echo $_SESSION['email']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="diachi" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="diachi" name="diachi"
                                            value="<?php echo $_SESSION['diachi']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu mới</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" id="saveChangesBtn">Lưu thay đổi</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).ready(function() {
                    $("#saveChangesBtn").click(function() {
                        $.ajax({
                            url: "../Database/update_account.php",
                            type: "POST",
                            data: $("#updateAccountForm").serialize(),
                            dataType: "json",
                            success: function(response) {
                                const messageDiv = $("#message");
                                if (response.status === "success") {
                                    messageDiv.removeClass("alert-danger").addClass(
                                        "alert-success");
                                    setTimeout(() => {
                                        window.location.href =
                                            "../Database/logout.php";
                                    }, 2000);
                                } else {
                                    messageDiv.removeClass("alert-success").addClass(
                                        "alert-danger");
                                }
                                messageDiv.text(response.message).show();
                            },
                            error: function() {
                                const messageDiv = $("#message");
                                messageDiv.removeClass("alert-success").addClass(
                                    "alert-danger");
                                messageDiv.text("Có lỗi xảy ra! Vui lòng thử lại.").show();
                            }
                        });
                    });
                });
                </script>


                <!-- Modal Góp ý -->
                <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="feedbackModalLabel">Phản hồi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="../Database/contact.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                        value="<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="diachi" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="diachi" name="diachi"
                                        value="<?php echo isset($_SESSION['diachi']) ? $_SESSION['diachi'] : ''; ?>"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Chủ đề</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="message" name="message" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="img" class="form-label">Tải lên ảnh</label>
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>

                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <!-- xử lý thông báo của cập nhập thông tin -->
    <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
    <?php endif; ?>


    <script>
    window.onclick = function(event) {
        const loginPopup = document.getElementById('loginPopup');
        const cartPopup = document.getElementById('cartPopup');
        const searchPopup = document.getElementById('searchPopup');
        const userPopup = document.getElementById('userPopup');

        // Ẩn popup giỏ hàng nếu có
        if (cartPopup.style.display === 'block' && !event.target.matches('.fa-cart-shopping') && !cartPopup
            .contains(event.target)) {
            cartPopup.style.display = 'none';
        }

        // Ẩn popup tìm kiếm nếu có
        if (searchPopup.style.display === 'block' && !event.target.matches('.fa-magnifying-glass') && !
            searchPopup.contains(event.target)) {
            searchPopup.style.display = 'none';
        }

        // Ẩn popup đăng nhập và popup người dùng nếu có
        if (!event.target.matches('.fa-user') && !loginPopup.contains(event.target) && !userPopup.contains(event
                .target)) {
            loginPopup.style.display = 'none'; // Ẩn popup đăng nhập
            userPopup.style.display = 'none'; // Ẩn popup người dùng
        }

        // Ẩn popup người dùng nếu nhấp vào giỏ hàng hoặc tìm kiếm
        if ((cartPopup.style.display === 'block' || searchPopup.style.display === 'block') && !event.target
            .matches('.fa-cart-shopping') && !event.target.matches('.fa-magnifying-glass')) {
            userPopup.style.display = 'none'; // Ẩn popup người dùng
        }
    };

    function toggleLoginPopup() {
        const loginPopup = document.getElementById('loginPopup');
        loginPopup.style.display = loginPopup.style.display === 'block' ? 'none' : 'block';
    }

    function toggleCartPopup() {
        const cartPopup = document.getElementById('cartPopup');
        cartPopup.style.display = cartPopup.style.display === 'block' ? 'none' : 'block';
        document.getElementById('userPopup').style.display = 'none'; // Ẩn popup người dùng khi mở giỏ hàng
    }

    function toggleSearchPopup() {
        const searchPopup = document.getElementById('searchPopup');
        searchPopup.style.display = searchPopup.style.display === 'block' ? 'none' : 'block';
        document.getElementById('userPopup').style.display = 'none'; // Ẩn popup người dùng khi mở tìm kiếm
    }

    function toggleUserPopup() {
        const userPopup = document.getElementById('userPopup');
        userPopup.style.display = userPopup.style.display === 'block' ? 'none' : 'block';
    }

    function validateLogin() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (email === "" || password === "") {
            alert("Vui lòng điền đầy đủ thông tin!");
            return false;
        }
        return true;
    }

    function validatePasswordChange() {
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (newPassword !== confirmPassword) {
            document.getElementById("passwordError").style.display = "block";
            return false;
        }
        document.getElementById("passwordError").style.display = "none";
        return true;
    }
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>

    </script>
    <!-- Đặt đoạn mã này trong phần `<head>` hoặc ngay trước thẻ đóng `</body>` -->
    <script>
    function checkLoginBeforeAddToCart(productId) {
        <?php if (!isset($_SESSION['id'])): ?>
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập và hiển thị popup đăng nhập
        window.location.href = "../home/home.php?showLogin=1";
        <?php else: ?>
        // Nếu đã đăng nhập, gọi hàm để thêm vào giỏ hàng
        addToCart(productId);
        <?php endif; ?>
    }

    function toggleCartPopup() {
        var cartPopup = document.getElementById("cartPopup");
        cartPopup.style.display = cartPopup.style.display === "none" ? "block" : "none";
    }
    </script>
    <script>
    function removeItem(productId) {

        console.log('productId', );

        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?")) {
            const formData = new FormData();
            formData.append('product_id', productId);

            fetch('../Database/remove_cart.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        alert("Sản phẩm đã được xóa khỏi giỏ hàng.");
                        location.reload(); // Cập nhật lại trang để hiển thị giỏ hàng mới
                    } else {
                        alert("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    }
    </script>
    <script>
    document.getElementById('openModalBtn').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    });
    </script>
</body>

</html>