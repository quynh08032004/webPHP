<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>
    <?php
    $num1 = 10;
    $num2 = 5;

    function tinhTong($a, $b) {
        return $a + $b;
    }

    function tinhHieu($a, $b) {
        return $a - $b;
    }

    function tinhTich($a, $b) {
        return $a * $b;
    }

    function tinhThuong($a, $b) {
        if ($b == 0) {
            return "Không thể chia cho 0";
        }
        return $a / $b;
    }

    function kiemTraSoNguyenTo($n) {
        if ($n < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }

    function kiemTraChanLe($n) {
        return $n % 2 == 0 ? "Số chẵn" : "Số lẻ";
    }

    // Kết quả các phép tính
    echo "Số thứ nhất: $num1<br>";
    echo "Số thứ hai: $num2<br><br>";

    echo "Tổng: " . tinhTong($num1, $num2) . "<br>";
    echo "Hiệu: " . tinhHieu($num1, $num2) . "<br>";
    echo "Tích: " . tinhTich($num1, $num2) . "<br>";
    echo "Thương: " . tinhThuong($num1, $num2) . "<br><br>";

    echo "Số thứ nhất là " . kiemTraChanLe($num1) . "<br>";
    echo "Số thứ hai là " . kiemTraChanLe($num2) . "<br><br>";

    if (kiemTraSoNguyenTo($num1)) {
        echo "$num1 là số nguyên tố<br>";
    } else {
        echo "$num1 không phải là số nguyên tố<br>";
    }

    if (kiemTraSoNguyenTo($num2)) {
        echo "$num2 là số nguyên tố<br>";
    } else {
        echo "$num2 không phải là số nguyên tố<br>";
    }
    ?>
</body>
</html>
