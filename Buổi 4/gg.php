<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cookie_Fname = "firstName";
    $cookie_Fname_value = htmlspecialchars($_POST["firstname"]);
    setcookie($cookie_Fname, $cookie_Fname_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    $cookie_Lname = "lastName";
    $cookie_Lname_value = htmlspecialchars($_POST["lastname"]);
    setcookie($cookie_Lname, $cookie_Lname_value, time() + (86400 * 30), "/");

    $cookie_email = "email";
    $cookie_email_value = htmlspecialchars($_POST["email"]);
    setcookie($cookie_email, $cookie_email_value, time() + (86400 * 30), "/");

    $cookie_email = "InvoiceID";
    $cookie_email_value = htmlspecialchars($_POST["InvoiceID"]);
    setcookie($cookie_email, $cookie_email_value, time() + (86400 * 30), "/");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Example</title>
    <link rel="stylesheet" href="Bai1.css">
</head>
<body>
<div class="container">
<?php
if(isset($_COOKIE["firstName"]) && isset($_COOKIE["lastName"]) && isset($_COOKIE["email"])) {
    echo "<h2>Cookie Values:</h2>";
    echo "First Name: " . htmlspecialchars($_COOKIE["firstName"]) . "<br>";
    echo "Last Name: " . htmlspecialchars($_COOKIE["lastName"]) . "<br>";
    echo "Email: " . htmlspecialchars($_COOKIE["email"]) . "<br>";
    echo "InvoiceID: " . htmlspecialchars($_COOKIE["InvoiceID"]) . "<br>";
} else {
    echo "<p>No cookies set yet.</p>";
}
?>
</div>
</body>
</html>
