<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Guest Information</title>
    <link rel="stylesheet" href="nhap.css"> 
</head>
<body>
    <div class="container">
        <h2>Enter Guest Information</h2>
        <form action="hienthi.php" method="POST">
            <label for="firstname">First Name:</label><br>
            <input type="text" id="firstname" name="firstname" required><br><br>
            
            <label for="lastname">Last Name:</label><br>
            <input type="text" id="lastname" name="lastname" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <input type="submit" value="Submit">

        </form>
    </div>
</body>
</html>
