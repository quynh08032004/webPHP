<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập Buổi 4</title>
    <link rel="stylesheet" href="Bai1.css">
</head>
<body>
    <form action="bai1kq.php" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <div class="form_header">
            <h1>Payment Receipt Upload Form</h1>
        </div>
        
        <table class="table_input">
            <tr>
                <td colspan="2">Name</td>
            </tr>
            <tr>
                <td><input autocomplete="username" type="text" name="firstname" required placeholder="First Name"></td>
                <td><input autocomplete="username" type="text" name="lastname" required placeholder="Last Name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>Invoice ID</td>
            </tr>
            <tr>
                <td><input autocomplete="email" type="text" name="email" required placeholder="example@exaple.com"></td>
                <td><input autocomplete="off" type="text" name="InvoiceID" required placeholder="Invoice ID"></td>
            </tr>
        </table>

        <table class="table_checkbox">
            <tr>
                <td colspan="2">Pay for</td>
            </tr>
            <tr>
                <td><input name="pay_for1" type="checkbox" value="15k Category"><label> 15k Category</label></td>
                <td><input name="pay_for2" type="checkbox" value="35k Category"><label> 35k Category</label></td>
            </tr>
            <tr>
                <td><input name="pay_for3" type="checkbox" value="55k Category"><label> 55k Category</label></td>
                <td><input name="pay_for4" type="checkbox" value="75k Category"><label> 75k Category</label></td>
            </tr>
            <tr>
                <td><input name="pay_for5" type="checkbox" value="116k Category"><label> 116k Category</label></td>
                <td><input name="pay_for6" type="checkbox" value="Shuttle One Way"><label> Shuttle One Way</label></td>
            </tr>
            <tr>
                <td><input name="pay_for7" type="checkbox" value="Shuttle Two Way"><label> Shuttle Two Way</label></td>
                <td><input name="pay_for8" type="checkbox" value="Training Cap Merchandise"><label> Training Cap Merchandise</label></td>
            </tr>
            <tr>
                <td><input name="pay_for9" type="checkbox" value="Compressport-T-Shirt Merchandise"><label> Compressport-T-Shirt Merchandise</label></td>
                <td><input name="pay_for10" type="checkbox" value="Buf Merchandise"><label> Buf Merchandise</label></td>
            </tr>
            <tr>
                <td colspan="2"><input name="pay_for11" type="checkbox" value="Other"><label> Other</label></td>
            </tr>
            <tr>
                <td colspan="3"><label for="fileUpload">Please upload your payment receipt</label></td>
            </tr>
            <tr>
                <td> <input type="file" name="fileUpload" id="fileUpload" accept=".jpg, .jpeg, .png, .gif" required></td>
            </tr>

            <tr>
                <td colspan="3">Additional Information</td>
            </tr>

            <tr>
                <td colspan="3"><textarea name="ad_inf" placeholder=" Typy here"></textarea></td>
            </tr>
        </table>
        <button type="submit" class="submit_button">Submit</button>
    </form>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
        const firstName = document.querySelector('input[name="firstname"]').value.trim();
        const lastName = document.querySelector('input[name="lastname"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        const invoiceID = document.querySelector('input[name="InvoiceID"]').value.trim();
        const fileUpload = document.querySelector('input[name="fileUpload"]').files[0];
        
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        let errors = [];

    
        if (firstName === '') {
            errors.push('Vui lòng nhập họ của bạn.');
        }

        if (lastName === '') {
            errors.push('Vui lòng nhập tên của bạn.');
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            errors.push('Email không chính xác,xin vui lòng nhập lại.');
        } else if (!emailPattern.test(email)) {
            errors.push('Vui lòng nhập email.');
        }

        if (invoiceID === '') {
            errors.push('Vui lòng nhập id.');
        }

        if (!fileUpload) {
            errors.push('Vui lòng tải lên biên lai thanh toán của bạn.');
        }

        if (!atLeastOneChecked) {
            errors.push('Vui lòng chọn ít nhất một phương án ở Pay For.');
        }

        if (errors.length > 0) {
            e.preventDefault(); 
            alert(errors.join('\n'));
        }
    });
</script>
</script> 
</body>
</html>
