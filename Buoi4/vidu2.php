<?php
session_start();
?>
<html>
    <title>Page2</title>
    <body>
        <?php 
        echo "Tên của bạn là:<b>".$_SESSION['name']."</b>";
        ?> 
    </body>
</html>