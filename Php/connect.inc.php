<?php
$mysql_hostname = 'localhost';
$mysql_user = 'root';
$mysql_password = '12345';
$mysql_database = 'tiffin_service';
$db = mysqli_connect($mysql_hostname , $mysql_user ,$mysql_password);

    if(!mysqli_select_db($db,$mysql_database))
    {
        die(mysqli_error($db));
    }
?>
