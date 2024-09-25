<?php

require 'sinhvien.php';

// Lấy thông tin sinh viên theo ID để hiển thị lên form
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id) {
    $data = get_student($id); // Hàm này đã được chuyển sang PDO
}

// Nếu không tìm thấy sinh viên thì chuyển về trang danh sách
if (!$data) {
    header("location: sinhvien_list.php");
    exit;
}

// Nếu người dùng submit form
if (!empty($_POST['edit_student'])) {
    // Lấy dữ liệu từ form
    $data['sv_name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['sv_sex'] = isset($_POST['sex']) ? $_POST['sex'] : '';
    $data['sv_birthday'] = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $data['sv_id'] = isset($_POST['id']) ? $_POST['id'] : '';

    // Validate dữ liệu
    $errors = array();
    if (empty($data['sv_name'])) {
        $errors['sv_name'] = 'Chưa nhập tên sinh viên';
    }

    if (empty($data['sv_sex'])) {
        $errors['sv_sex'] = 'Chưa nhập giới tính sinh viên';
    }

    // Nếu không có lỗi thì thực hiện cập nhật dữ liệu
    if (!$errors) {
        edit_student($data['sv_id'], $data['sv_name'], $data['sv_sex'], $data['sv_birthday']); // Hàm sử dụng PDO
        // Trở về trang danh sách sau khi sửa thành công
        header("location: sinhvien_list.php");
        exit;
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sửa sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Sửa sinh viên</h1>
        <a href="sinhvien_list.php">Trở về</a> <br/> <br/>
        <form method="post" action="sinhvien_sua.php?id=<?php echo htmlspecialchars($data['id']); ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên</td>
                    <td>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($data['hoten']); ?>"/>
                        <?php if (!empty($errors['sv_name'])) echo $errors['sv_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <select name="sex">
                            <option value="Nam" <?php if ($data['gioitinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                            <option value="Nữ" <?php if ($data['gioitinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                        </select>
                        <?php if (!empty($errors['sv_sex'])) echo $errors['sv_sex']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="birthday" value="<?php echo htmlspecialchars($data['ngaysinh']); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>"/>
                        <input type="submit" name="edit_student" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
