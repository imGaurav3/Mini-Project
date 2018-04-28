<?php
    ob_start();
    session_start();
    function loggedin()
    {
        if(isset($_SESSION['user_id1']) && !empty($_SESSION['user_id1']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>