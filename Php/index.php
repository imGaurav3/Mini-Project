<?php
    include 'header.inc.php';
?>
<html>
    <head>
        <title>Home Page</title>
        <style>
            body
            {
                background-image: url("tiffin1.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                height: 100%;
                background-position: center;
                background-size: cover;
            }
            a
            {
                color: whitesmoke;
                color: black;
                font-weight: bold;
                font-size: 50px;
            }
            div.background 
            {
                background: url(klematis.jpg) repeat;
                border: 2px solid black;
            }

            div.transbox 
            {
                margin: 30px;
                background-color: #ffffff;
                border: 1px solid black;
                opacity: 0.6;
                filter: alpha(opacity=60); /* For IE8 and earlier */
            }
            div.transbox table 
            {
                margin: 5%;
                font-weight: bold;
                color: #000000;
            }
        .hh
        {
            padding-left: 200px;
        }
        </style>
    </head>
    <body>
        <div class="background">
        <div class="transbox">
        <table align="center">
            <tr>
                <td class="hh">
                        <br><br><br><br><br>
                    <a href ="http://localhost:8000/login_provider.php">Click here if you are a Tiffin Provider</a>
                </td>
            </tr>
                
                <tr>
                    <td class="hh">
                        <br><br><br><br><br><br>
                        <a href ="http://localhost:8000/login_user.php">Click here if you are a Tiffin User</a>
                        <br><br><br><br><br><br><br><br><br>
                    </td>
                </tr>
        </table>
        </div>
        </div>
    </body>
</html>
<?php
        include './connect.inc.php';
?>