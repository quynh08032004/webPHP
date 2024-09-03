
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Vui lòng nhập tên !";
  } else {
    $name = test_input($_POST["name"]);
    // Kiểm tra tên
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Tên không hợp lệ, vui lòng nhập lại !";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Vui lòng nhập email !";
  } else {
    $email = test_input($_POST["email"]);
    // Kiểm tra Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Email không hợp lệ, vui lòng nhập lại !";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // Kiểm tra URL
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "URL không hợp lệ, vui lòng nhập lại !";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Vui lòng chọn 1 phương án !";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Nữ">Nữ
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Nam">Nam
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Khác">Khác
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo "<h2>Dữ liệu đã nhập:</h2>";
echo "Tên: " . $name;
echo "<br>";
echo "Email:" . $email;
echo "<br>";
echo "Website:" . $website;
echo "<br>";
echo "Comment:" . $comment;
echo "<br>";
echo "Giới tính:" . $gender;
}
?>

</body>
</html>