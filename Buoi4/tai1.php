<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            text-align: center;
        }
        .input {
            margin: 6px 0;
        }
        span {
            width: 112px;
            display: inline-block;
            text-align: start;
        }
        
        input[type = "submit"] {
            margin-top: 12px;
        }
    </style>
</head>
<body>
    <form action="tai1.php" method = "POST">
        <div class="input">
            <span>Họ và tên:</span>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="input">
            <span>Tên đăng nhập:</span>
            <input type="text" name="nameLog" id="nameLog" required>
        </div>
        <div class="input">
            <span>Email:</span>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="input">
            <span>Mật khẩu:</span>
            <input type="password" name="pass" id="pass" required>
        </div>
        <input type="submit" name="" id="" value = "Đăng nhập">
    </form>
    <?php
        session_start();
        if (!empty($_POST["name"]) && !empty($_POST["nameLog"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {
            $_SESSION["all_info"] = [];
            array_push($_SESSION["all_info"], [
                "name" => $_POST["name"],
                "nameLog" => $_POST["nameLog"],
                "email" => $_POST["email"],
                "pass" => $_POST["pass"],
            ]);
            foreach($_SESSION["all_info"] as $value) {
                echo "Họ và tên: " . $value["name"] . "</br>";
                echo "Tên đăng nhập: " . $value["nameLog"] . "</br>";
                echo "Email: " . $value["email"] . "</br>";
                echo "Mật khẩu: " . $value["pass"] . "</br>";
            }
            echo "<a href = 'tai2.php'>Click here</a>";
        }   
    ?>
</body>
</html>