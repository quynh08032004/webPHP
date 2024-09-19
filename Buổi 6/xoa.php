<?php
$servername = "localhost:3306";
$username = "root";
$password = "Quynh832004#";  // Thay đổi theo cấu hình của bạn
$dbname = "myDB";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Nhận ID của bản ghi cần xóa từ URL
$id = $_GET['id'];

// Câu lệnh SQL để xóa bản ghi
$sql = "DELETE FROM MyGuests WHERE id = ?";

// Chuẩn bị statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Thực thi statement
if ($stmt->execute()) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Đóng statement và kết nối
$stmt->close();
$conn->close();

// Quay lại trang danh sách
header("Location: hienthi.php");
exit();
?>
