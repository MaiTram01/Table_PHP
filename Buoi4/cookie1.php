<?php
session_start();
error_reporting(0);
$flag = 0;
if (!empty($_POST["ho_ten"]) && !empty($_POST["email"]) && !empty($_POST["dia_chi"])) {
  $thong_tin = $_POST["ho_ten"] . " - " . $_POST["email"] . " - " . $_POST["dia_chi"];
  setcookie("khach_hang", $thong_tin, time() + 3600);
  $flag = 1;
}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Create_cookie</title>
</head>

<body bgcolor="mistyrose">
  <form id="form1" name="form1" method="post" action="cookie1.php">
    <table width="400" border="0" align="center">
      <tr bgcolor="deep pink">
        <td colspan="2" align="center"><strong>
            <font color="#FFFFFF">INFORMATION LOGIN</font>
          </strong></td>
      </tr>
      <tr bgcolor="#FFCC66">
        <td width="135"><strong>
            <font color="#0000FF">Fullname:</font>
          </strong></td>
        <td width="232"><label for="textfield9"></label>
          <input name="ho_ten" type="text" id="textfield9" style="background-color:#BEE9DF"
            value="<?php echo $_POST["ho_ten"]; ?>" size="30" />
        </td>
      </tr>
      <tr bgcolor="#FFCC66">
        <td><strong>
            <font color="#0000FF">Email:</font>
          </strong></td>
        <td><label for="textfield10"></label>
          <input name="email" type="text" id="textfield10" style="background-color:#BEE9DF"
            value="<?php echo $_POST["email"]; ?>" size="30" />
        </td>
      </tr>
      <tr bgcolor="#FFCC66">
        <td><strong>
            <font color="#0000FF">Address</font>
          </strong></td>
        <td><label for="textfield11"></label>
          <input name="dia_chi" type="text" id="textfield11" style="background-color:#BEE9DF"
            value="<?php echo $_POST["dia_chi"]; ?>" size="30" />
        </td>
      </tr>
      <tr bgcolor="#FFCC66">
        <td colspan="2" align="center"><input type="submit" name="Submit" id="button" value="Submit" /></td>
      </tr>
    </table>
  </form>

  <p align="center">
    <font color="#0000CC"></font>
  </p>
  <font color="#1E50C4">
    <?php
    if ($flag == 1) {
      echo "<table width='400' border='0' align='center' cellpadding='2' cellspacing='2' bgcolor='#009FFF' class='style10'>														
<tr bgcolor='#00CCFF' align='center'><td>";
      echo "<font color='#ffffff'>Thông tin khách hàng: <br>";
      echo $_COOKIE["khach_hang"] . "<br>";
      echo "<a href='cookie_doc.php'>Click here!</a>";
      echo "</td></tr></table>";
    }
    ?>
  </font>
  </p>
</body>

</html>