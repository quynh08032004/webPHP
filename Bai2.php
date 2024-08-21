<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sách</title>
    <style>
        body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;    
        }

        tr{
            text-align: center;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Nội dung sách</th>
        </tr>
        <?php
        for ($i = 1; $i <= 100; $i++) {
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>Tensach$i</td>";
            echo "<td>Noidung$i</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
