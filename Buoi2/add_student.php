<?php
session_start();

// Xử lý thêm sinh viên mới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $dob = $_POST['dob'];
    $major = $_POST['major'];

    $_SESSION['students'][] = [
        'id' => $id,
        'name' => $name,
        'gender' => $gender,
        'hometown' => $hometown,
        'dob' => $dob,
        'major' => $major
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
    <title>Thêm sinh viên</title>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <form method="post" action="">
        <label for="id">Mã sinh viên:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="gender">Giới tính:</label>
        <select id="gender" name="gender">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br><br>

        <label for="hometown">Quê quán:</label>
        <input type="text" id="hometown" name="hometown" required><br><br>

        <label for="dob">Ngày sinh:</label>
        <input type="text" id="dob" name="dob" required><br><br>

        <label for="major">Ngành học:</label>
        <input type="text" id="major" name="major" required><br><br>

        <button type="submit">Thêm</button>
    </form>
</body>
</html>
