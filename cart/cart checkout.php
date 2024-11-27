<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin giao hàng</title>
    <link rel="stylesheet" href="../css/cart checkout.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Giplus</h1>
            <nav>
                <a href="../cart/shopping cart details.php">Giỏ hàng</a> > <a href="#">Thông tin giao hàng</a>
            </nav>
        </div>

        <div class="content">
            <div class="left-section">
                <h2>Thông tin giao hàng</h2>
                <div class="user-info">
                    <img src="user-placeholder.png" alt="User">
                    <div>
                        <p>Lê Đạt (datcatt1123@gmail.com)</p>
                        <a href="#">Đăng xuất</a>
                    </div>
                </div>

                <form>
                    <label>Thêm địa chỉ mới:</label>
                    <select>
                        <option value="70000">70000, Vietnam</option>
                    </select>
                    <input type="text" placeholder="Họ và tên">
                    <input type="text" placeholder="Số điện thoại">
                    <input type="text" placeholder="Địa chỉ">
                    <input type="text" placeholder="Ghi Chú">
                    <div class="address-dropdowns">
                        <select>
                            <option>Chọn tỉnh / thành</option>
                        </select>
                        <select>
                            <option>Chọn quận / huyện</option>
                        </select>
                        <select>
                            <option>Chọn phường / xã</option>
                        </select>
                    </div>

                    <h3>Phương thức vận chuyển</h3>
                    <div class="shipping-method">
                        <p>Vui lòng chọn tỉnh / thành để có danh sách phương thức vận chuyển.</p>
                    </div>

                    <h3>Phương thức thanh toán</h3>
                    <div class="payment-method">
                        <label>
                            <input type="radio" name="payment" checked> Thanh toán khi giao hàng (COD)
                        </label>
                        <label>
                            <input type="radio" name="payment"> Chuyển khoản qua ngân hàng
                        </label>
                    </div>
                </form>
            </div>

            <div class="right-section">
                <h2>Đơn hàng của bạn</h2>
                <div class="order-summary">
                    <div class="item">
                        <img src="../img/1731248458_timmach.webp" alt="Product">
                        <p>Viên Uống Bổ Não Ginkgo Biloba 120mg Puritan's Pride (100 Viên/Lọ)</p>
                        <p>1,374,000đ</p>
                    </div>
                </div>
                <div class="discount-section">
                    <input type="text" placeholder="Mã giảm giá">
                    <button>Sử dụng</button>
                    <div class="discount-codes">
                        <button>Giảm 61,000đ</button>
                        <button>Giảm 41,000đ</button>
                        <button>Giảm 5%</button>
                        <button>Giảm 31,000đ</button>
                        <button>Giảm 11%</button>
                    </div>
                </div>

                <div class="price-summary">
                    <p>Tạm tính: <span>1,374,000đ</span></p>
                    <p>Phí vận chuyển: <span>-</span></p>
                    <h3>Tổng cộng: <span>1,374,000đ</span></h3>
                </div>
                <button class="complete-order">Hoàn tất đơn hàng</button>
            </div>
        </div>
    </div>
</body>

</html>