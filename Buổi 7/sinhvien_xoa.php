<?php 
require 'sinhvien.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id) {
    delete_student($id);
}

// Trở về trang danh sách
header("location: sinhvien_list.php");
?>
