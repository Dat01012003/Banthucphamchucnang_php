<?php
include '../Database/db.php';
session_start();

// Query to fetch "Super Sale" products
$sql = "SELECT id, img,img1,img2, tenhang, tensanpham, gia FROM sanpham WHERE category = 'Super sale'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quản lý Super Sale</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'Sidebar.php'; ?>
            <main class="col-md-10 content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Quản lý Super Sale</h2>
                    <a href="../admin_panel/create new products.php"><button class="btn btn-success">Tạo mới sản
                            phẩm</button></a>
                </div>
                <div class="container">
                    <div class="row">
                        <?php while($row = $result->fetch_assoc()): ?>
                        <div class="product-block col-lg-3 col-md-3 col-sm-4 col-6"
                            style="padding: 15px; background-color: white;">
                            <div style="border: 1px solid rgba(128, 128, 128, 0.1); padding-bottom: 15px;">
                                <div class="product-img">
                                    <img src="../img/<?php echo $row['img']; ?>" alt=""
                                        style="width: 100%; height: 100%;">
                                </div>

                                <div class="product-detail" style="padding: 15px; color:black">
                                    <span class="product-vendor"><?php echo $row['tenhang']; ?></span>
                                    <p class="pro-name" style="padding: 0;">
                                        <a style="padding: 0; font-size: 14px;">
                                            <?php echo mb_substr($row['tensanpham'], 0, 60) . '...'; ?>
                                        </a>
                                    </p>
                                    <span><?php echo number_format($row['gia'], 0, ',', '.'); ?>₫</span>
                                </div>
                                <div class="product-buttons d-flex justify-content-between mt-3 px-2">
                                    <!-- Nút Sửa với data-id -->
                                    <button type="button" class="btn btn-primary edit-button"
                                        data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Sửa</button>

                                    <a href="../product editing/delete_sp_supersale.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-danger btn-sm">Xóa</a>

                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Edit Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa sản phẩm Super Sale</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color: black;">
                        <input type="hidden" name="id" id="productId">
                        <div class="mb-3">
                            <label for="img" class="form-label">Hình ảnh</label>
                            <!-- Hiển thị hình ảnh hiện tại -->
                            <div>
                                <img id="currentImg" src="" alt="Hình ảnh hiện tại"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                            <!-- Trường chọn file -->
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                        <div class="mb-3">
                            <label for="img1" class="form-label">Hình ảnh 1</label>
                            <div>
                                <img id="currentImg1" src="" alt="Hình ảnh 1 hiện tại"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                            <input type="file" class="form-control" id="img1" name="img1">
                        </div>
                        <div class="mb-3">
                            <label for="img2" class="form-label">Hình ảnh 2</label>
                            <div>
                                <img id="currentImg2" src="" alt="Hình ảnh 2 hiện tại"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                            <input type="file" class="form-control" id="img2" name="img2">
                        </div>



                        <div class="mb-3">
                            <label for="tenhang" class="form-label">Tên hàng</label>
                            <input type="text" class="form-control" id="tenhang" name="tenhang">
                        </div>
                        <div class="mb-3">
                            <label for="tensanpham" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="tensanpham" name="tensanpham">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gia" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="gia" name="gia">
                        </div>
                        <div class="mb-3">
                            <label for="product_information" class="form-label">Thông tin sản phẩm</label>
                            <textarea class="form-control" id="product_information"
                                name="product_information"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="uses" class="form-label">Hướng dẫn sử dụng</label>
                            <textarea class="form-control" id="uses" name="uses"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lieudung" class="form-label">Liều dùng và cách dùng</label>
                            <textarea class="form-control" id="lieudung" name="lieudung"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thantrong" class="form-label">Thận trọng</label>
                            <textarea class="form-control" id="thantrong" name="thantrong"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="baoquan" class="form-label">Bảo quản</label>
                            <textarea class="form-control" id="baoquan" name="baoquan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="saveChanges">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script>
    // Lấy thông tin sản phẩm khi bấm nút Sửa
    // Lấy thông tin sản phẩm khi bấm nút Sửa
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.getAttribute('data-id');
            fetch('../product editing/edit_product.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${productId}`
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('productId').value = data.id;

                    // Cập nhật hình ảnh hiện tại
                    document.getElementById('currentImg').src = data.img;
                    document.getElementById('currentImg1').src = data.img1;
                    document.getElementById('currentImg2').src = data.img2;

                    // Các trường khác
                    document.getElementById('tenhang').value = data.tenhang;
                    document.getElementById('tensanpham').value = data.tensanpham;
                    document.getElementById('description').value = data.description;
                    document.getElementById('gia').value = data.gia;
                    document.getElementById('product_information').value = data.product_information;
                    document.getElementById('uses').value = data.uses;
                    document.getElementById('lieudung').value = data.lieudung;
                    document.getElementById('thantrong').value = data.thantrong;
                    document.getElementById('baoquan').value = data.baoquan;
                });
        });
    });



    // Lưu thay đổi
    document.getElementById('saveChanges').addEventListener('click', function() {
        const formData = new FormData(document.getElementById('editForm'));
        fetch('../product editing/update_product.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    location.reload();
                } else {
                    alert('Cập nhật thất bại');
                }
            });
    });
    </script>
    <style></style>
</body>

</html>