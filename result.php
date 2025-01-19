<?php session_start();

if (!isset($_SESSION['classNumber'], $_SESSION['courseName'], $_POST['studentName'], $_POST['studentScore'])) {
    exit("اطلاعات کافی برای نمایش گزارش وجود ندارد.");
}

$classNumber = $_SESSION['classNumber'];
$courseName = $_SESSION['courseName'];
$studentNames = $_POST['studentName'];
$studentScores = $_POST['studentScore'];
$totalScore = array_sum($studentScores);
$studentCount = count($studentScores);
?>

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گزارش نهایی</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>گزارش نهایی</h1>
        <table>
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>اسامی دانش‌آموزان کلاس <?= htmlspecialchars($classNumber); ?></th>
                    <th>نمره درس <?= htmlspecialchars($courseName); ?></th>
                    <th>وضعیت</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentNames as $index => $name): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($name); ?></td>
                        <td><?= htmlspecialchars($studentScores[$index]); ?></td>
                        <?php
                        $status = $studentScores[$index] < 12 ? 'تجدید پودمان' : 'قبولی پودمان';
                        $color = $studentScores[$index] < 12 ? 'red' : 'green';
                        ?>
                        <td style="color: <?= $color; ?>;">
                            <?= $status; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>معدل کلاس: <?= $totalScore / $studentCount; ?></p>
        <div class="buttons">
            <button onclick="location.href='index.php'">تهیه گزارش جدید</button>

            <form action="action.php" method="post" style="display: inline;">
                <input type="hidden" name="classNumber" value="<?= htmlspecialchars($classNumber); ?>">
                <input type="hidden" name="courseName" value="<?= htmlspecialchars($courseName); ?>">
                <?php foreach ($studentNames as $index => $name): ?>
                    <input type="hidden" name="studentName[]" value="<?= htmlspecialchars($name); ?>">
                    <input type="hidden" name="studentScore[]" value="<?= htmlspecialchars($studentScores[$index]); ?>">
                <?php endforeach; ?>
                <button type="submit">ویرایش اطلاعات</button>
            </form>


        </div>
    </div>
</body>

</html>