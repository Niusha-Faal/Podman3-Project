<?php session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['studentName'], $_POST['studentScore'])) {
    $studentNames = $_POST['studentName'];
    $studentScores = $_POST['studentScore'];
} else {
    $studentNames = [];
    $studentScores = [];
}

if (isset($_POST['classNumber'], $_POST['courseName'])) {
    $_SESSION['classNumber'] = $_POST['classNumber'];
    $_SESSION['courseName'] = $_POST['courseName'];
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اکشن - ثبت اطلاعات</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>اطلاعات دانش‌آموزان</h1>
        <form method="post" action="result.php" name="action_form" id="action_form">
            <table>
                <thead>
                    <tr>
                        <th>نام و نام خانوادگی</th>
                        <th>نمره</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $studentCount = isset($_SESSION['studentCount']) ? $_SESSION['studentCount'] : count($studentNames);
                    for ($i = 0; $i < $studentCount; $i++) {
                        $name = isset($studentNames[$i]) ? htmlspecialchars($studentNames[$i]) : '';
                        $score = isset($studentScores[$i]) ? htmlspecialchars($studentScores[$i]) : '';
                    ?>
                    <tr>
                        <td><input type="text" name="studentName[]" value="<?= $name; ?>" required></td>
                        <td><input type="text" name="studentScore[]" value="<?= $score; ?>" required></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="buttons">
                <button type="submit">ثبت اطلاعات</button>
                <button type="button" onclick="location.href='index.php'">بازگشت به صفحه قبل</button>
            </div>
        </form>
    </div>
</body>
</html>