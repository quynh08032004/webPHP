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

// Nhận ID của bản ghi cần sửa từ URL
$id = $_GET['id'];

// Kiểm tra xem form đã được submit hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // Câu lệnh SQL để cập nhật bản ghi
    $sql = "UPDATE MyGuests SET firstname = ?, lastname = ?, email = ? WHERE id = ?";

    // Chuẩn bị statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $firstname, $lastname, $email, $id);

    // Thực thi statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Đóng statement
    $stmt->close();

    // Quay lại trang danh sách
    header("Location: hienthi.php");
    exit();
}

// Lấy dữ liệu của bản ghi cần sửa
$sql = "SELECT firstname, lastname, email FROM MyGuests WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($firstname, $lastname, $email);
$stmt->fetch();

// Đóng statement
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

<h2>Sửa thông tin</h2>
<form method="post">
    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname); ?>" required>

    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($lastname); ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>

    <input type="submit" value="Update">
</form>



</body>
</html>
