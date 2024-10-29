<?php
session_start();
?>
<html>
    <body>
        <h1>Kết quả sau khi nhấn click here!</h1>
        <?php
        if (isset($_SESSION['login'])) {
            echo "Họ và tên: <b>" . $_SESSION['login']['name'] . "</b><br>";
            echo "Email: <b>" . $_SESSION['login']['email'] . "</b><br>";
            echo "Tên đăng nhập: <b>" . $_SESSION['login']['name_login'] . "</b><br>";
            echo "Mật khẩu: <b>" . $_SESSION['login']['password'] . "</b><br>";
        } else {
            echo "Chưa có thông tin đăng nhập.";
        }
        ?>
    </body>
</html>
