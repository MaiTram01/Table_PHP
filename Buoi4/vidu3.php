<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // kiểm tra người ta có gửi dữ liệu đi chưa 
    // Lưu thông tin nhập vào session tạm thời
    $_SESSION['login'] = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'name_login' => $_POST['name_login'],
        'password' => $_POST['password']
    ];
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>THÔNG TIN LIÊN LẠC</h1>
    <form method="post" action="">
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" required value="<?php echo  $_SESSION['login']['name'] ?>"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo  $_SESSION['login']['email'] ?>"><br><br>
        
        <label for="name_login">Tên đăng nhập:</label>
        <input type="text" id="name_login" name="name_login" required value="<?php echo  $_SESSION['login']['name_login'] ?>"><br><br>
        
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required value="<?php echo  $_SESSION['login']['password'] ?>"><br><br>
        
        <button type="submit">Đăng nhập</button>
    </form>
    <?php if (isset($_SESSION['login'])): ?>
        <p>Xin chào: <b><?php echo $_SESSION['login']['name']; ?></b></p>
        <p>Email: <b><?php echo $_SESSION['login']['email']; ?></b></p>
        <p>Tên đăng nhập: <b><?php echo $_SESSION['login']['name_login']; ?></b></p>
        <p>Mật khẩu: <b><?php echo $_SESSION['login']['password']; ?></b></p>
        <b><a href="vidu4.php">Click here</a></b>
    <?php endif; ?>
</body>
</html>
