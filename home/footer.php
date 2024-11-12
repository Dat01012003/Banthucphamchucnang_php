<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thương Hiệu Nổi Bật</title>
    <style>
    /* Footer cuối */
    .footer-main {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        padding: 20px 0;
        border-top: 1px solid #ddd;
        background-color: white;
        border-radius: 8px;
    }

    .footer-section {
        flex: 1;
        padding: 0 15px;
    }

    .footer-section h3 {
        font-size: 18px;
        color: #333;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .footer-section p,
    .footer-section li {
        font-size: 14px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 8px;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section input[type="email"] {
        width: calc(100% - 100px);
        padding: 8px;
        margin-right: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .footer-section button {
        padding: 8px 20px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .footer-section button:hover {
        background-color: #007bff;
    }
    </style>
</head>

<body>
    <div>
        <!-- Footer chính -->
        <div class="footer-main" style="    width: 70%;
    margin: auto;">
            <!-- Về Giplus -->
            <div class="footer-section">
                <h3>Về Giplus</h3>
                <p>
                    Giplus ra đời với mục tiêu mang đến cho mọi người một địa điểm mua sắm tin cậy với đa dạng các sản
                    phẩm
                    thực phẩm chức năng chăm sóc sức khỏe và sắc đẹp từ các thương hiệu nổi tiếng.
                </p>
                <p>Điện thoại: 0349856484</p>
                <p>Email: datcatt1123@gmail.com</p>
            </div>

            <!-- Hỗ Trợ Khách Hàng -->
            <div class="footer-section">
                <h3>Thông Tin Nhóm</h3>
                <ul>
                    <li>Lê Văn Đạt - 01/01/2003</li>
                    <li>Phạm Thị Thanh - 20/08/2003</li>
                    <li>Trần Thị Việt Anh - 10/6/2003</li>
                </ul>
            </div>

            <!-- Đăng Ký Nhận Tin -->
            <div class="footer-section">
                <h3>Đăng Ký Nhận Tin</h3>
                <p>Để cập nhật những sản phẩm mới, nhận thông tin ưu đãi đặc biệt và thông tin giảm giá khác.</p>
                <input type="email" placeholder="Nhập email của bạn">
                <button>ĐĂNG KÝ</button>
            </div>
        </div>
    </div>
</body>

</html>