<?php
    include 'header.inc.php';
    require './connect.inc.php';
    require './config.user.inc.php';
    $http_referer = $_SERVER['HTTP_REFERER'];
    if($http_referer=="http://localhost:8000/registration_page_user.php")
    {
        showMessage("You have been successfully registered!!");
    }
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password_login_user = $_POST['password'];
        $md_pass = md5($password_login_user);
        if(!empty($username) && !empty($password_login_user))
        {
            $query = "SELECT `id` FROM `user_data` WHERE `email` = '$username' AND `password` = '$md_pass'";
            $query_run = mysqli_query($db, $query);
            if(mysqli_num_rows($query_run)==1)
            {
                $row = mysqli_fetch_assoc($query_run);
                $user_id = $row['id'];
                $_SESSION['id'] = $user_id;
                $_SESSION['user_id1'] = $user_id;
            }
            else 
            {
                showMessage("Invalid Username/Password combination!!");
            }
            $username=NULL;
            $password_login_provider=NULL; 
        }
        else 
            {
                showMessage("Invalid Username/Password combination!!");
            }
    }
    if(loggedin())
    {
         header('Location: home_user.php');
    }
?>

<html>
    <head>
        <style>
            .submit
            {
                background-color: black;
                color: white;
                font-size: 30px;
                border-radius: 7px;
            }
            .link
            {
                font-size: 23px;
            }
            .login
            {
                font-size: 50px;
                text-decoration: underline;
            }
            h2
            {
                color: red;
            }
        </style>
    </head>
    <body>
        
        <form action ="login_user.php"  method ="POST">
            <div class="background" align="center">
            <div class="transbox" align="center">
            <table align="center">
                <tr>
                    <td>
                        <h1 class="login">Login User</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <h1>Username: <input type = "text" name = "username" placeholder="email-id" maxlength="50"></h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><br>
                        <h1>Password: <input type="password" name="password" placeholder="password" minlength="8"></h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><br>
                        <input class="submit" type="submit" value="Log In" >
                    </td>
                </tr>
                <tr>
                    <td class="link">
                        <br>
                         Not Registered?<a href="http://localhost:8000/registration_page_user.php">Create an account</a>
                    </td>
                </tr>
            </table>
            </div>
            </div>
        </form>
    </body>
</html>

