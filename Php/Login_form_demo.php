<?php
    include 'header.inc.php';
?>

<html>
    <head>
        <style>
            body
            {
                background-color: floralwhite;
            }
        </style>
    </head>
    <body>
        <br><br><br><br><br><br><br>
        <form action ="login_form_demo.php"  method ="POST">
            <table align="center">
                <tr>
                    <td>
                        <br><br><br>
                        <h1>Username: <input type = "text" name = "username" placeholder="username"></h1>
                    </td>
            </tr>
            <tr>
                <td>
                    <br><br><br>
                    <h1>Password: <input type="password" name="password" placeholder="password"></h1>
                </td>
            </tr>
            <tr>
                <td>
                    <br><br><br>
                    <input type="submit" value="Log In" >
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    Not Registered?<a href="">Create an account</a>
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>

