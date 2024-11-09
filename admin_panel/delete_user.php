    <?php
    include '../Database/db.php'; // Kết nối cơ sở dữ liệu

    // Kiểm tra xem có ID được truyền vào không
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Câu truy vấn xóa tài khoản khỏi cơ sở dữ liệu
        $sql = "DELETE FROM account WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        // Thực thi câu lệnh xóa và kiểm tra
        if ($stmt->execute()) {
            // Chuyển hướng lại trang user.php với trạng thái thành công
            header("Location: user.php?status=success");
        } else {
            echo "Xóa tài khoản thất bại: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Không tìm thấy ID tài khoản.";
    }

    $conn->close();
    ?>