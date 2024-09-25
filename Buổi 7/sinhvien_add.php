<?php

require 'sinhvien.php';

// Nếu người dùng submit form
if (!empty($_POST['add_student'])) {
    // Lấy data
    $data['sv_name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['sv_sex'] = isset($_POST['sex']) ? $_POST['sex'] : '';
    $data['sv_birthday'] = isset($_POST['birthday']) ? $_POST['birthday'] : '';

    // Validate thông tin
    $errors = array();
    if (empty($data['sv_name'])) {
        $errors['sv_name'] = 'Chưa nhập tên sinh viên';
    }

    if (empty($data['sv_sex'])) {
        $errors['sv_sex'] = 'Chưa nhập giới tính sinh viên';
    }

    // Nếu không có lỗi thì insert vào database
    if (!$errors) {
        // Gọi hàm thêm sinh viên sử dụng PDO
        add_student($data['sv_name'], $data['sv_sex'], $data['sv_birthday']);
        // Trở về trang danh sách
        header("location: sinhvien_list.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm sinh viên</h1>
        <a href="sinhvien_list.php">Trở về</a> <br/> <br/>
        <form method="post" action="sinhvien_add.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên sinh viên</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['sv_name']) ? htmlspecialchars($data['sv_name']) : ''; ?>"/>
                        <?php if (!empty($errors['sv_name'])) echo $errors['sv_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <select name="sex">
                            <option value="Nam" <?php if (!empty($data['sv_sex']) && $data['sv_sex'] == 'Nam') echo 'selected'; ?>>Nam</option>
                            <option value="Nữ" <?php if (!empty($data['sv_sex']) && $data['sv_sex'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                        </select>
                        <?php if (!empty($errors['sv_sex'])) echo $errors['sv_sex']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="birthday" value="<?php echo !empty($data['sv_birthday']) ? htmlspecialchars($data['sv_birthday']) : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_student" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
