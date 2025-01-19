<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سامانه گزارش گیری نمرات درسی</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>سامانه گزارش گیری نمرات درسی</h1>
        <form method="post" action="action.php" id="mainForm" name="mainForm">
            <label for="classNumber">شماره کلاس:</label>
            <select id="classNumber" name="classNumber" required>
                <option value="">انتخاب کنید</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br><br>
            <label for="courseName">نام درس:</label>
            <select id="courseName" name="courseName" required>
                <option value="">انتخاب کنید</option>
                <option value="ریاضی">ریاضی</option>
                <option value="فیزیک">فیزیک</option>
                <option value="شیمی">شیمی</option>
            </select>
            <br><br>
            <label for="studentCount">تعداد دانش آموزان:</label>
            <input type="number" id="studentCount" name="studentCount" required>
            <br><br>
            <button type="button" onclick="validateForm()">ثبت اطلاعات</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var studentCount = document.getElementById('studentCount').value;
            if (studentCount) {
                if (studentCount > 1 && studentCount < 11) {
                    var payam = confirm("آیا از ارسال اطلاعات به سرور مطمئن هستی؟");
                    if (payam == true) {
                        document.mainForm.submit();
                    }
                } else {
                    alert('مقدار وارد شده صحیح نیست لطفاً عددی بین 1 تا 10 وارد کنید');
                }
            } else {
                alert('لطفا فیلد تعداد دانش آموزان را پر کنید');
            }
        }
    </script>
</body>
</html>
