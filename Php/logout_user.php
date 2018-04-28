<?php
    require './config.inc.php';
    session_destroy();
    header('Location: login_user.php');
?>