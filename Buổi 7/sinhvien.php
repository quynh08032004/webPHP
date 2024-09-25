<?php
// Biến kết nối toàn cục
global $conn;

// Hàm kết nối database
function connect_db() {
    global $conn;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn) {
        try {
            // Tạo kết nối PDO
            $conn = new PDO("mysql:host=localhost;dbname=sinhvien", "root", "");
            // Thiết lập lỗi PDO để ngoại lệ
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Thiết lập font chữ kết nối
            $conn->exec("SET NAMES utf8");
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }
}

// Hàm ngắt kết nối
function disconnect_db() {
    global $conn;

    // Ngắt kết nối PDO
    if ($conn) {
        $conn = null;
    }
}

// Hàm lấy tất cả sinh viên
function get_all_students() {
    global $conn;

    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM ql";

    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Lấy tất cả kết quả dưới dạng mảng kết hợp
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả kết quả về
    return $result;
}

// Hàm lấy sinh viên theo ID
function get_student($student_id) {
    global $conn;

    connect_db();

    // Câu truy vấn lấy sinh viên theo ID
    $sql = "SELECT * FROM ql WHERE id = :student_id";

    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// Hàm thêm sinh viên
function add_student($student_name, $student_sex, $student_birthday) {
    global $conn;

    connect_db();

    // Câu truy vấn thêm sinh viên
    $sql = "INSERT INTO ql (hoten, gioitinh, ngaysinh) VALUES (:hoten, :gioitinh, :ngaysinh)";

    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hoten', $student_name);
    $stmt->bindParam(':gioitinh', $student_sex);
    $stmt->bindParam(':ngaysinh', $student_birthday);

    return $stmt->execute();
}

// Hàm sửa sinh viên
function edit_student($student_id, $student_name, $student_sex, $student_birthday) {
    global $conn;

    connect_db();

    // Câu truy vấn sửa thông tin sinh viên
    $sql = "UPDATE ql SET hoten = :hoten, gioitinh = :gioitinh, ngaysinh = :ngaysinh WHERE id = :id";

    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hoten', $student_name);
    $stmt->bindParam(':gioitinh', $student_sex);
    $stmt->bindParam(':ngaysinh', $student_birthday);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    return $stmt->execute();
}

// Hàm xóa sinh viên
function delete_student($student_id) {
    global $conn;

    connect_db();

    // Câu truy vấn xóa sinh viên
    $sql = "DELETE FROM ql WHERE id = :id";

    // Thực hiện câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    return $stmt->execute();
}
