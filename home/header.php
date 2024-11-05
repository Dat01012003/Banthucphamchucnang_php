<?php
                session_start();
                $error = isset($_SESSION['error']) ? $_SESSION['error'] : ""; // Lấy thông báo lỗi nếu có
                unset($_SESSION['error']); // Xóa thông báo lỗi sau khi đã lấy
                ?>
<?php
// Định nghĩa đường dẫn gốc
$base_url = '/banthucphamchucnang'; // Thay bằng đường dẫn đến thư mục gốc của dự án
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
                        <li style="position: relative;">
                            <a style="padding: 0;" onclick="toggleSearchPopup()">
                                <i class="fa-solid fa-magnifying-glass"
                                    style="width: 35px;height: 26px; font-size: 20px;"></i>
                            </a>
                            <div id="searchPopup" class="popup-content" style="display: none;">
                                <h2>Tìm kiếm</h2>
                                <form>
                                    <input type="text" id="search" name="search" placeholder="Tìm kiếm sản phẩm..."
                                        required>
                                    <button type="submit" class="search-btn">Tìm kiếm</button>
                                </form>
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
                                        style="display: block; width: 100%; padding: 12px; text-align: left; color: #333; background: none; border: none; font-size: 16px; cursor: pointer; outline: none; box-shadow: none;">
                                        Thông tin tài khoản
                                    </button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#updateAccountModal"
                                        style="display: block; width: 100%; padding: 12px; text-align: left; color: #333; background: none; border: none; font-size: 16px; cursor: pointer; outline: none; box-shadow: none;">
                                        Thông tin tài khoản
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#feedbackModal"
                                        style="display: block; width: 100%; padding: 12px; text-align: left; color: #333; background: none; border: none; font-size: 16px; cursor: pointer; outline: none; box-shadow: none;">
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
                        <li style="position: relative;">
                            <a style="padding: 0;" onclick="toggleCartPopup()">
                                <i class="fa-solid fa-cart-shopping"
                                    style="width: 35px;height: 26px; font-size: 20px;"></i>
                                <span id="cartCount"></span> <!-- Hiển thị số lượng sản phẩm -->
                            </a>
                            <div id="cartPopup" class="popup-content" style="display: none; min-width:450px">
                                <h2>Giỏ hàng</h2>
                                <div id="cartItems"></div> <!-- Nơi hiển thị sản phẩm -->
                                <div id="totalPriceContainer">
                                    <span class="total-label">TỔNG TIỀN:</span>
                                    <span id="totalPrice" class="total-amount"></span>
                                </div>
                                <div class="cart-buttons">
                                    <button class="view-cart-btn">Xem giỏ hàng</button>
                                    <button class="checkout-btn">Thanh toán</button>
                                </div>
                            </div>

                        </li>


                    </ul>
                </div>
                <!-- đăng ký tài khoản -->
                <div id="modalContainer"></div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#openModalBtn').click(function() {
                        // Sử dụng AJAX để tải nội dung modal từ file dangkitaikhoan.php
                        $('#modalContainer').load('dangkitaikhoan.php', function() {
                            // Khi modal đã được tải xong, hiển thị modal
                            $('#exampleModal').modal('show');
                        });
                    });
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
</body>

</html>