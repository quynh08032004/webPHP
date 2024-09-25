<?php
require 'sinhvien.php';

// Lấy danh sách sinh viên sử dụng PDO
$students = get_all_students();

// Ngắt kết nối database
disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Danh sách sinh viên</h1>
        <a href="sinhvien_add.php">Thêm sinh viên</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td><b>Mã sinh viên</b></td>
                <td>Họ tên</td>
                <td>Giới tính</td>
                <td>Ngày sinh</td>
                <td>Chọn thao tác</td>
            </tr>
            <?php if ($students): ?>
                <?php foreach ($students as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id']); ?></td>
                        <td><?php echo htmlspecialchars($item['hoten']); ?></td>
                        <td><?php echo htmlspecialchars($item['gioitinh']); ?></td>
                        <td><?php echo htmlspecialchars($item['ngaysinh']); ?></td>
                        <td>
                            <form method="post" action="sinhvien_xoa.php">
                                <input onclick="window.location = 'sinhvien_sua.php?id=<?php echo htmlspecialchars($item['id']); ?>'" type="button" value="Sửa"/>
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>"/>
                                <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có sinh viên nào trong cơ sở dữ liệu.</td>
                </tr>
            <?php endif; ?>
        </table>
    </body>
</html>
