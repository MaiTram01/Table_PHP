<?php
session_start();
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>doc_cookie</title>
    <style type="text/css">
        body,
        td,
        th {
            color: #F00;
        }

        body {
            background-color: #D5EAFF;
            background-image: url();
        }
    </style>
</head>

<body>
    <p align="center">
        <font color="#0000CC"></font>
        <?php
        error_reporting(0);
        if (isset($_COOKIE["khach_hang"]))
            echo "Xin chào khách hàng <b><i>" . $_COOKIE["khach_hang"] . "</b></i><br />";
        else
            echo "Xin chào quý khách!<br />";
        echo "<a href='cookie1.php'>Quay về trang thông tin khách hàng!</a><br>"
        ?>
    <table width="398" height="442" border="2" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="177" colspan="2" align="center"><img src="ảnh/dfc683a4ae0c10335bd5ec484b274de2.jpg" width="389"
                    height="164" /></td>
        </tr>
        <tr>
            <td width="194" height="140" align="center">
                <p><img src="ảnh/dfc683a4ae0c10335bd5ec484b274de2.jpg" width="185" height="128" /></p>
                <p>HOA ...VNĐ</p>
            </td>
            <td width="196" align="center">
                <p><img src="ảnh/dotlight_31207807390.jpg" width="188" height="129" /></p>
                <p>HOA...VNĐ</p>
            </td>
        </tr>
        <tr>
            <td align="center">
                <p><img src="ảnh/hoa huong duong_23.jpg" width="188" height="106" /></p>
                <p>HOA...VNĐ</p>
            </td>
            <td align="center">
                <p><img src="ảnh/TY02.jpg" width="191" height="105" /></p>
                <p>HOA...VNĐ</p>
            </td>
        </tr>
    </table>

</body>

</html>