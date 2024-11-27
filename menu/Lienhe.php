<?php
// Bao gồm file kết nối cơ sở dữ liệu
include '../Database/db.php';

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $message = mysqli_real_escape_string($conn, $_POST['Message']);

    // Tạo câu lệnh SQL
    $sql = "INSERT INTO lienhechungtoi (hoten, email, sdt, tinnhan) VALUES ('$name', '$email', '$phone', '$message')";

    // Thực hiện câu lệnh SQL và kiểm tra kết quả
    if (mysqli_query($conn, $sql)) {
        $success_message = "Gửi tin nhắn thành công!";
    } else {
        $error_message = "Có lỗi xảy ra: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ Chúng Tôi</title>
    <link rel="stylesheet" href="../css/lienhe.css">
    <!-- Link đến Font Awesome để thêm icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Phần liên hệ -->

    <div class="contact-section">

        <div class="container">
            <?php 
           // Bao gồm file header.php
             include '../home/header.php';
             ?>
            <h3 class="section-title">Liên Hệ Với Chúng Tôi</h3>
            <div class="row">
                <!-- Thông tin liên hệ -->
                <div class="col contact-info">
                    <div class="info-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4>Địa chỉ</h4>
                        <p>218 Lĩnh Nam, Hoàng Mai, Hà Nội</p>
                    </div>
                    <div class="info-box">
                        <i class="fas fa-phone"></i>
                        <h4>Điện thoại</h4>
                        <p>0349856484</p>
                    </div>
                    <div class="info-box">
                        <i class="fas fa-envelope"></i>
                        <h4>Email</h4>
                        <p><a href="mailto:barthgay@gmail.com">datcatt1123@gmail.com</a></p>
                    </div>
                </div>

                <!-- Form liên hệ -->
                <div class="col contact-form">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="Name" placeholder="Nhập họ tên của bạn" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Email" placeholder="Nhập email của bạn" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="Phone" placeholder="Nhập số điện thoại của bạn"
                                pattern="[0-9]{10,11}" title="Số điện thoại phải gồm 10-11 chữ số" required>
                        </div>
                        <div class="form-group">
                            <label>Tin nhắn</label>
                            <textarea name="Message" placeholder="Nhập nội dung tin nhắn" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit">Gửi tin nhắn</button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Phần bản đồ -->
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3929.3879783761536!2d105.75682517481013!3d9.984774973296982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1690172369681!5m2!1svi!2s"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <?php 
           // Bao gồm file header.php
             include '../home/footer.php';
             ?>
</body>

</html>