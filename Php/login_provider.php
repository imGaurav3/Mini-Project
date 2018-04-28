<?php
    include 'header.inc.php';
    require './connect.inc.php';
    require './config.inc.php';
    $http_referer = $_SERVER['HTTP_REFERER'];
    if($http_referer=="http://localhost:8000/registration_page_provider2.php")
    {
        showMessage("You have been successfully registered!!");
    }
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password_login_provider = $_POST['password'];
        $md_pass = md5($password_login_provider);
        if(!empty($username) && !empty($password_login_provider))
        {
            $query = "SELECT `id` FROM `provider_data` WHERE `email` = '$username' AND `password` = '$md_pass'";
            $query_run = mysqli_query($db, $query);
            if(mysqli_num_rows($query_run)==1)
            {
                $row = mysqli_fetch_assoc($query_run);
                $user_id = $row['id'];
                $_SESSION['views']=$user_id;
                $_SESSION['user_id'] = $user_id;
            }
            else 
            {
                showMessage("Invalid Username/Password combination!!");
            }
            $username=NULL;
            $password_login_provider=NULL;      
        }
    }
    if(loggedin())
    {
         header('Location: provider_home.php');
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
        <form action ="login_provider.php"  method ="POST">
            <div class="background" align="center">
            <div class="transbox" align="center">
            <table align="center">
                <tr>
                    <td>
                        <h1 class="login">Login Provider</h1>
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
                    Not Registered?<a href="http://localhost:8000/registration_page_provider.php">Create an account</a>                
                </td>
            </tr>
            </table>
            </div>
            </div>
        </form>
    </body>
</html>

