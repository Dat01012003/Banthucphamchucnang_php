<?php
include '../Database/db.php'; // Bao gồm file kết nối cơ sở dữ liệu
session_start(); // Bắt đầu session

// Truy vấn dữ liệu người dùng
$sql = "SELECT id, fullname, email, role, diachi FROM account";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quản lý Người Dùng</title>
    <style>
    .ellipsis {
        cursor: pointer;
        font-size: 20px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .show {
        display: block;
    }

    /* Thiết lập cho thông báo */
    .alert {
        position: relative;
        opacity: 1;
        transition: opacity 0.5s ease-out;
    }

    .alert.fade-out {
        opacity: 0;
        visibility: hidden;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'Sidebar.php'; ?>

            <!-- Main Content -->
            <main class="col-md-10 content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Danh Sách Người Dùng</h2>
                </div>

                <?php
                // Hiển thị thông báo khi tài khoản bị xóa thành công
                if (isset($_GET['status']) && $_GET['status'] == 'success') {
                    echo "<div id='success-alert' class='alert alert-success'>Tài khoản đã được xóa thành công.</div>";
                }
                ?>

                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Vai Trò</th>
                                <th>Địa chỉ</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td><input type='text' class='input-field' value='" . htmlspecialchars($row['fullname']) . "' readonly></td>";
                                    echo "<td><input type='email' class='input-field' value='" . htmlspecialchars($row['email']) . "' readonly></td>";
                                    echo "<td><input type='text' class='input-field' value='" . htmlspecialchars($row['role']) . "' readonly></td>";
                                    echo "<td><input type='text' class='input-field' value='" . htmlspecialchars($row['diachi']) . "' readonly></td>";
                                    echo "<td>";
                                    echo "<span class='ellipsis' onclick='toggleDropdown(" . $row['id'] . ")'>...</span>";

                                    if ($row['role'] != 'admin') {
                                        echo "<div id='dropdown-" . $row['id'] . "' class='dropdown-menu'>
                                                <a class='dropdown-item' href='delete_user.php?id=" . $row['id'] . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này không?\")'>Xóa tài khoản</a>
                                              </div>";
                                    } else {
                                        echo "<div class='text-muted'>Tài khoản không thể xóa</div>";
                                    }

                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Không có người dùng nào</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script>
    function toggleDropdown(id) {
        var dropdown = document.getElementById('dropdown-' + id);
        dropdown.classList.toggle('show');
    }

    // Tự động ẩn thông báo sau 2 giây
    window.onload = function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function() {
                alert.classList.add('fade-out');
            }, 2000);
        }
    };
    </script>
</body>

</html>