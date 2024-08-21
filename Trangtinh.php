<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép Tính Trên Hai Số</title>
    <style>
        body{
            text-align: center;
        }
        form {
        border: 2px solid blue;
        padding: 20px;
        display: inline-block;
        margin-top: 20px;
        width: 400px;
        height:250px;
    } 
    </style>
</head>
<body>
    <form action="ketquapheptinh.php" method="post">
        <h2  style = "color:cadetblue">PHÉP TÍNH TRÊN HAI SỐ</h2>
        <label style = "color :red ">Chọn phép tính:</label>
        <input type="radio" name="pheptinh" value="cong" checked>
        <label style="color: red ">Cộng</label>
        <input type="radio" name="pheptinh" value="tru">
        <label style="color: red ">Trừ</label>
        <input type="radio" name="pheptinh" value="nhan">
        <label style="color: red ">Nhân</label>
        <input type="radio" name="pheptinh" value="chia">
        <label style="color: red ">Chia</label>
        <br><br>
        <label style = "color:blue">Số thứ nhất:</label>
        <input type="text" name="so1"><br><br>
        <label  style = "color:blue">Số thứ hai:</label>
        <input type="text" name="so2"><br><br>
        <input type="submit"  value="Tính">
    </form>
</body>
</html>
