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

// Kiểm tra xem form đã được submit hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // Câu lệnh SQL để chèn dữ liệu vào bảng MyGuests
    $sql = "INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES (?, ?, ?, NOW())";

    // Chuẩn bị statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $firstname, $lastname, $email);

    // Thực thi statement
    if ($stmt->execute()) {
        echo "<h3>New record created successfully</h3>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Đóng statement
    $stmt->close();
}

// Lấy danh sách các bản ghi từ bảng MyGuests
$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
       table {
            width: 80%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 4px;
            border: none;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-add {
            margin: 20px 0;
            display: inline-block;
        }
    </style>
</head>
<body>

<h2>Danh sách sinh viên</h2>
<a href="nhap.php" class="btn btn-add">Thêm nhân viên</a>
<?php
if ($result->num_rows > 0) {
    // Hiển thị dữ liệu theo dạng bảng
    echo "<table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Actions</th>
            </tr>";
    // Output dữ liệu của từng hàng
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["firstname"]. "</td>
                <td>" . $row["lastname"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>" . $row["reg_date"]. "</td>
                <td>
                    <a href='sua.php?id=" . $row["id"] . "' class='btn'>Sửa</a>
                    <a href='xoa.php?id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\");'>Xóa</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Đóng kết nối
$conn->close();
?>

</body>
</html>
