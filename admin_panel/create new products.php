<?php
session_start(); // Bắt đầu session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../home/homestyles.css">
    <title>Tạo mới sản phẩm</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'Sidebar.php'; ?>

            <!-- Main Content -->
            <main class="col-md-10 content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Tạo mới sản phẩm</h2>
                    <a href="manage_super_sale.php" class="btn btn-secondary">Quay lại</a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form action="create_product.php" method="POST" enctype="multipart/form-data">
                                <!-- Hình ảnh -->
                                <div class="mb-3">
                                    <label for="img" class="form-label">Hình ảnh</label>
                                    <input type="file" class="form-control" id="img" name="img" required>
                                </div>

                                <!-- Tên hàng -->
                                <div class="mb-3">
                                    <label for="tenhang" class="form-label">Tên hàng</label>
                                    <input type="text" class="form-control" id="tenhang" name="tenhang" required>
                                </div>

                                <!-- Tên sản phẩm -->
                                <div class="mb-3">
                                    <label for="tensanpham" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="tensanpham" name="tensanpham" required>
                                </div>

                                <!-- Mô tả sản phẩm -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả sản phẩm</label>
                                    <textarea class="form-control" id="description" name="description"
                                        required></textarea>
                                </div>

                                <!-- Giá sản phẩm -->
                                <div class="mb-3">
                                    <label for="gia" class="form-label">Giá</label>
                                    <input type="number" class="form-control" id="gia" name="gia" required>
                                </div>

                                <!-- Thông tin sản phẩm -->
                                <div class="mb-3">
                                    <label for="product_information" class="form-label">Thông tin sản phẩm</label>
                                    <textarea class="form-control" id="product_information" name="product_information"
                                        required></textarea>
                                </div>

                                <!-- Hướng dẫn sử dụng -->
                                <div class="mb-3">
                                    <label for="uses" class="form-label">Hướng dẫn sử dụng</label>
                                    <textarea class="form-control" id="uses" name="uses" required></textarea>
                                </div>

                                <!-- Liều dùng và cách dùng -->
                                <div class="mb-3">
                                    <label for="lieudung" class="form-label">Liều dùng và cách dùng</label>
                                    <textarea class="form-control" id="lieudung" name="lieudung" required></textarea>
                                </div>

                                <!-- Thận trọng -->
                                <div class="mb-3">
                                    <label for="thantrong" class="form-label">Thận trọng</label>
                                    <textarea class="form-control" id="thantrong" name="thantrong" required></textarea>
                                </div>

                                <!-- Bảo quản -->
                                <div class="mb-3">
                                    <label for="baoquan" class="form-label">Bảo quản</label>
                                    <textarea class="form-control" id="baoquan" name="baoquan" required></textarea>
                                </div>

                                <!-- Chọn loại -->
                                <div class="mb-3">
                                    <label for="category" class="form-label">Loại</label>
                                    <select class="form-select" id="category" name="category" required
                                        onchange="updateSubtypes()">
                                        <option value="Super sale">Super sale</option>
                                        <option value="Làm đẹp">Làm đẹp</option>
                                        <option value="Mẹ & bé">Mẹ & bé</option>
                                        <option value="Chăm sóc sức khỏe">Chăm sóc sức khỏe</option>
                                    </select>
                                </div>

                                <!-- Chọn subtype -->
                                <div class="mb-3">
                                    <label for="category_subtype" class="form-label">Chọn subtype</label>
                                    <select class="form-select" id="category_subtype" name="category_subtype">
                                        <option value="" disabled selected>Chọn một subtype</option>
                                    </select>
                                </div>

                                <!-- Nút tạo mới sản phẩm -->
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-success">Tạo mới sản phẩm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
    // Hàm cập nhật các subtype tùy theo loại đã chọn
    function updateSubtypes() {
        const category = document.getElementById('category').value;
        const subtypeSelect = document.getElementById('category_subtype');

        // Xóa các option cũ
        subtypeSelect.innerHTML = '<option value="" disabled selected>Chọn một subtype</option>';

        // Dựa vào loại chọn, cập nhật các subtype
        let subtypes = [];

        if (category === 'Chăm sóc sức khỏe') {
            subtypes = [{
                    value: 'Bảo vệ-gan-thận-phổi',
                    text: 'Bảo vệ-gan-thận-phổi'
                },
                {
                    value: 'Bổ mắt',
                    text: 'Bổ mắt'
                },
                {
                    value: 'Bổ sung canxi,xương khớp',
                    text: 'Bổ sung canxi,xương khớp'
                },
                {
                    value: 'Bổ sung lợi khuẩn phụ nữ',
                    text: 'Bổ sung lợi khuẩn phụ nữ'
                },
                {
                    value: 'Giảm căng thẳng',
                    text: 'Giảm căng thẳng'
                },
                {
                    value: 'Hỗ trợ cân nặng',
                    text: 'Hỗ trợ cân nặng'
                },
                {
                    value: 'Hỗ trợ chống lão hóa',
                    text: 'Hỗ trợ chống lão hóa'
                }
            ];
        } else if (category === 'Làm đẹp') {
            subtypes = [{
                    value: 'Đẹp da dài tóc',
                    text: 'Đẹp da dài tóc'
                },
                {
                    value: 'Sản phẩm khác',
                    text: 'Sản phẩm khác'
                }
            ];
        } else if (category === 'Mẹ & bé') {
            subtypes = [{
                value: 'Vitamin dành cho bé',
                text: 'Vitamin dành cho bé'
            }];
        } else {
            subtypes = [];
        }

        // Thêm các option mới vào select
        subtypes.forEach(subtype => {
            const option = document.createElement('option');
            option.value = subtype.value;
            option.textContent = subtype.text;
            subtypeSelect.appendChild(option);
        });
    }
    </script>
</body>

</html>