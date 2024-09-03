<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <style>
        .error {color: #FF0000;}
    </style>

    <script>
        function validateForm() {
            let valid = true;
            document.getElementById("tenErr").innerText = "";
            document.getElementById("emailErr").innerText = "";
            document.getElementById("gioitinhErr").innerText = "";
            const ten = document.forms["myForm"]["name"].value;
            const email = document.forms["myForm"]["email"].value;
            const gender = document.forms["myForm"]["gender"].value;
            if (ten === "") {
                document.getElementById("tenErr").innerText = "Vui lòng nhập tên!";
                valid = false;
            }
            if (email === "") {
                document.getElementById("emailErr").innerText = "Vui lòng nhập email!";
                valid = false;
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                document.getElementById("emailErr").innerText = "Email không hợp lệ, vui lòng nhập lại!";
                valid = false;
            }
            if (!gender) {
                document.getElementById("gioitinhErr").innerText = "Vui lòng chọn một phương án!";
                valid = false;
            }
            return valid;
        }
    </script>
</head>
<body>  

<?php
$ten = $email = $gioitinh = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ten = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gioitinh = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>FORM</h2>
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">  
  Tên: <input type="text" name="name">
  <span class="error">*</span>
  <span id="tenErr" class="error"></span>
  <br><br>
  Email: <input type="text" name="email">
  <span class="error">*</span>
  <span id="emailErr" class="error"></span>
  <br><br>
  Trang web: <input type="text" name="website">
  <span id="websiteErr" class="error"></span>
  <br><br>
  Nhận xét: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Giới tính:
  <input type="radio" name="gender" value="Nữ">Nữ
  <input type="radio" name="gender" value="Nam">Nam
  <input type="radio" name="gender" value="Khác">Khác
  <span class="error">*</span>
  <span id="gioitinhErr" class="error"></span>
  <br><br>
  <input type="submit" name="submit" value="Gửi">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h2>Thông Tin Bạn Nhập:</h2>";
  echo "Tên: " . $ten;
  echo "<br>";
  echo "Email: " . $email;
  echo "<br>";
  echo "Trang web: " . $website;
  echo "<br>";
  echo "Nhận xét: " . $comment;
  echo "<br>";
  echo "Giới tính: " . $gioitinh;
}
?>

</body>
</html>
