

<?php
// Start the session
session_start();
?>

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Lấy Cookies</title>
    <link rel="stylesheet" href="Bai1.css">
</head>
<body>
<div class="container">
        <?php
           echo "<h2>THÔNG TIN NGƯỜI DÙNG LẤY TỪ SESSION</h2>";
           $_SESSION["fistname"] = htmlspecialchars($_POST["firstname"]);
           $_SESSION["lastname"] = htmlspecialchars($_POST["lastname"]);
           $_SESSION["email"] = htmlspecialchars($_POST["email"]);
           $_SESSION["InvoiceID"] = htmlspecialchars($_POST["InvoiceID"]);
           
           echo "FirstName is: ". $_SESSION["fistname"] . "<br>";
           echo "LastName is: ". $_SESSION["lastname"] . "<br>";
           echo "Email is: ". $_SESSION["email"] . "<br>";
           echo "InvoiceID is: ". $_SESSION["InvoiceID"] . "<br>";

        ?>
    </div>
</body>
</html>