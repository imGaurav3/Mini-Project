<?php
    function showMessage($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
?>
<html>
    <head>
        <style>
            header
            {
                color: white;
                font-size: 40px;
                background-color:black;
                border-top:20px solid black;
                border-left: 20px solid black;
                border-right: 20px solid black;
                border-bottom:20px solid black;
            }
            
            
            body
            {
                background-image: url("tiffin1.jpg");
                
                background-attachment: fixed;
                height: 100%;
                background-position: center;
                background-size: cover;
            }
            div.background 
            {
                
                background: url(klematis.jpg) repeat;
                border: 2px solid black;
            }

            div.transbox 
            {
                
                margin: 20px;

                background-color: #ffffff;
                border: 1px solid black;
                opacity: 0.6;
                filter: alpha(opacity=60); /* For IE8 and earlier */
            }

            div.transbox table 
            {
                text-align: center;
                
                margin: 30px;
                font-weight: bold;
                color: #000000;
            }
            input
            {
                background-color: mintcream;
            }
            textArea
            {
                background-color: mintcream;
            }
        </style>
    </head>
    <body>
        <header>
            My Tiffin
        </header>
    </body>
</html>
