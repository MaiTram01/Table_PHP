<?php
session_start();

// Lấy thông tin sinh viên cần sửa
$student_id = $_GET['id'];
$student = null;

foreach ($_SESSION['students'] as $key => $value) {
    if ($value['id'] == $student_id) {
        $student = $_SESSION['students'][$key];
        $student_key = $key;
        break;
    }
}

// Xử lý cập nhật sinh viên
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['students'][$student_key] = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'gender' => $_POST['gender'],
        'hometown' => $_POST['hometown'],
        'dob' => $_POST['dob'],
        'major' => $_POST['major']
    ];

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <?php if ($student): ?>
    <form method="post" action="">
        <label for="id">Mã sinh viên:</label>
        <input type="text" id="id" name="id" value="<?php echo $student['id']; ?>" required><br><br>

        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required><br><br>

        <label for="gender">Giới tính:</label>
        <select id="gender" name="gender">
            <option value="Nam" <?php echo $student['gender'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo $student['gender'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
        </select><br><br>

        <label for="hometown">Quê quán:</label>
        <input type="text" id="hometown" name="hometown" value="<?php echo $student['hometown']; ?>" required><br><br>

        <label for="dob">Ngày sinh:</label>
        <input type="text" id="dob" name="dob" value="<?php echo $student['dob']; ?>" required><br><br>

        <label for="major">Ngành học:</label>
        <input type="text" id="major" name="major" value="<?php echo $student['major']; ?>" required><br><br>

        <button type="submit">Cập nhật</button>
    </form>
    <?php else: ?>
        <p>Sinh viên không tồn tại.</p>
    <?php endif; ?>
</body>
</html>
