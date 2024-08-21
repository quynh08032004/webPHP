<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Phép Tính</title>
    <style>
        body {
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        form {
            border: 2px solid blue;
            padding: 20px;
            margin: 10px;
            width: 400px;
            height: auto;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Form Kết Quả Phép Tính -->
        <form>
            <h2 style="color:cadetblue">PHÉP TÍNH TRÊN HAI SỐ</h2>
            <?php
                function isPrime($num) {
                    if ($num < 2) return false;
                    for ($i = 2; $i <= sqrt($num); $i++) {
                        if ($num % $i == 0) return false;
                    }
                    return true;
                }

                function checkEvenOdd($num) {
                    return ($num % 2 == 0) ? "chẵn" : "lẻ";
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $so1 = $_POST['so1'];
                    $so2 = $_POST['so2'];
                    $pheptinh = $_POST['pheptinh'];

                    if (is_numeric($so1) && is_numeric($so2)) {
                        switch ($pheptinh) {
                            case "cong":
                                $ketqua = $so1 + $so2;
                                $pheptinh_text = "Cộng";
                                break;
                            case "tru":
                                $ketqua = $so1 - $so2;
                                $pheptinh_text = "Trừ";
                                break;
                            case "nhan":
                                $ketqua = $so1 * $so2;
                                $pheptinh_text = "Nhân";
                                break;
                            case "chia":
                                if ($so2 == 0) {
                                    $ketqua = "Không thể chia cho 0";
                                } else {
                                    $ketqua = $so1 / $so2;
                                }
                                $pheptinh_text = "Chia";
                                break;
                        }
            ?>

            <?php
                echo "<span style='color:red;'>Chọn Phép Tính: $pheptinh_text</span><br><br>";
            ?>
                        
                        <label for="so1" style="color:blue">Số 1:</label>
                        <input type="text" id="so1" name="so1" value="<?php echo $so1; ?>" readonly><br><br>
                        
                        <label for="so2" style="color:blue">Số 2:</label>
                        <input type="text" id="so2" name="so2" value="<?php echo $so2; ?>" readonly><br><br>
                        
                        <label for="ketqua" style="color:blue">Kết quả:</label>
                        <input type="text" id="ketqua" name="ketqua" value="<?php echo $ketqua; ?>" readonly><br>
            <?php
                    } else {
                        echo "Vui lòng nhập số hợp lệ.";
                    }
                }
            ?>
            <br>
            <a href="Trangtinh.php">Quay lại trang trước</a><br>
        </form>

        <!-- Form Kiểm Tra Kết Quả -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && is_numeric($so1) && is_numeric($so2)) { ?>
        <form>
            <h2 style="color:cadetblue">KIỂM TRA KẾT QUẢ</h2>
            
            <h3 style="color:red">Kết quả kiểm tra</h3>
            <p>Số 1 là <?php echo checkEvenOdd($so1); ?> và <?php echo isPrime($so1) ? "là số nguyên tố" : "không phải là số nguyên tố"; ?></p>
            <p>Số 2 là <?php echo checkEvenOdd($so2); ?> và <?php echo isPrime($so2) ? "là số nguyên tố" : "không phải là số nguyên tố"; ?></p>
        </form>
        <?php } ?>
    </div>
</body>
</html>
