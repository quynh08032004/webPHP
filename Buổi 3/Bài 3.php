<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt Upload Form</title>
    <link rel="stylesheet" href="bai3.css"> 
</head>
<body>

<?php
$first_nameErr = $last_nameErr = $emailErr = $invoice_idErr = $pay_forErr = "";
$ho = $ten = $email = $id = "";
$pay_for = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["ho"])) {
        $first_nameErr = "Vui lòng nhập họ !";
    } else {
        $ho = test_input($_POST["ho"]);
    }
    
    if (empty($_POST["ten"])) {
        $last_nameErr = "Vui lòng nhập tên !";
    } else {
        $ten = test_input($_POST["ten"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Vui lòng nhập email !";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["id"])) {
        $invoice_idErr = "Vui lòng nhập ID hóa đơn !";
    } else {
        $id = test_input($_POST["id"]);
    }

    if (empty($_POST["pay_for"])) {
        $pay_forErr = "Vui lòng chọn ít nhất 1 phương án.";
    } else {
        $pay_for = $_POST["pay_for"];
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
    <h2>Biểu mẫu đơn thanh toán</h2>
    <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">  
        <div class="row two-columns">
            <span>Họ:</span>
            <input type="text" name="ho" value="<?php echo $ho; ?>">
            <span class="error"><?php echo $first_nameErr; ?></span>
            <span>Tên:</span>
            <input type="text" name="ten" value="<?php echo $ten; ?>">
            <span class="error"><?php echo $last_nameErr; ?></span> <Br>    <Br>   
        </div>
        <div class="row two-columns">     
            <span>Email:</span>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span> 
            <span>ID Hóa đơn:</span>
            <input type="text" name="id" value="<?php echo $id; ?>">
            <span class="error"><?php echo $invoice_idErr; ?></span>
        </div>
        <h3>Thanh toán cho :</h3>
        <div class="row">
            <div class="checkbox-group">
                <p><input type="checkbox" name="pay_for[]" value="15K Category" <?php if (in_array("15K Category", $pay_for)) echo "checked"; ?>> 15K Category</p>
                <p><input type="checkbox" name="pay_for[]" value="35K Category" <?php if (in_array("35K Category", $pay_for)) echo "checked"; ?>> 35K Category</p>
                <p><input type="checkbox" name="pay_for[]" value="55K Category" <?php if (in_array("55K Category", $pay_for)) echo "checked"; ?>> 55K Category</p>
                <p><input type="checkbox" name="pay_for[]" value="75K Category" <?php if (in_array("75K Category", $pay_for)) echo "checked"; ?>> 75K Category</p>
                <p><input type="checkbox" name="pay_for[]" value="116K Category" <?php if (in_array("116K Category", $pay_for)) echo "checked"; ?>> 116K Category</p>
                <p><input type="checkbox" name="pay_for[]" value="Shuttle One Way" <?php if (in_array("Shuttle One Way", $pay_for)) echo "checked"; ?>> Shuttle One Way</p>
                <p><input type="checkbox" name="pay_for[]" value="Shuttle Two Ways" <?php if (in_array("Shuttle Two Ways", $pay_for)) echo "checked"; ?>> Shuttle Two Ways</p>
                <p><input type="checkbox" name="pay_for[]" value="Training Cap Merchandise" <?php if (in_array("Training Cap Merchandise", $pay_for)) echo "checked"; ?>> Training Cap Merchandise</p>
                <p><input type="checkbox" name="pay_for[]" value="Compressport T-Shirt Merchandise" <?php if (in_array("Compressport T-Shirt Merchandise", $pay_for)) echo "checked"; ?>> Compressport T-Shirt Merchandise</p>
                <p><input type="checkbox" name="pay_for[]" value="Buf Merchandise" <?php if (in_array("Buf Merchandise", $pay_for)) echo "checked"; ?>> Buf Merchandise</p>
                <p><input type="checkbox" name="pay_for[]" value="Other" <?php if (in_array("Other", $pay_for)) echo "checked"; ?>> Other</p>
            </div>
            <span class="error"><?php echo $pay_forErr; ?></span>
        </div>
        <div class="submit-btn">
            <input type="submit" value="Gửi">
        </div>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<div class='result-container'>";
  echo "<div class='result-content'>";
  echo "<h2>Thông Tin Đã Nhập:</h2>";
  echo "Họ: " . htmlspecialchars($ho);
  echo "<br>";
  echo "Tên: " . htmlspecialchars($ten);
  echo "<br>";
  echo "Email: " . htmlspecialchars($email);
  echo "<br>";
  echo "ID Hóa đơn: " . htmlspecialchars($id);
  echo "<br>";
  echo "Thanh toán cho: " . implode(", ", array_map('htmlspecialchars', $pay_for));
  echo "<br>";
  echo "</div>";
  echo "</div>";
}
?> 

</body>
</html>
