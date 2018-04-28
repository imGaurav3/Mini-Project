<?php
    function showMessage($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
?>
<html>
    <head>
        <style>
            li.website_name
            {
                color: white;
                float: left;
                font-size: 40px;
                font-weight: bold;
            }
            input
            {
            background-color: mintcream;
            }
            textArea
            {
                background-color: mintcream;
            }
            ul 
            {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: black;
            }

            li 
            {
                float: right;
                font-size: 24px;
            }

            li a, .edit 
            {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover, .dropdown:hover .edit 
            {
                background-color: darkslategray;
            }

            li.dropdown 
            {
                display: inline-block;
            }

            .dropdown_contents 
            {
                display: none;
                position: absolute;
                background-color: gray;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown_contents a 
            {
                color: white;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }

            .dropdown_contents a:hover 
            {
                background-color: darkgrey;
            }

            .dropdown:hover .dropdown_contents 
            {
                display: block;
            }
            body
            {
                background-image: url("tiffin1.jpg");
                
                background-attachment: fixed;
                height: 100%;
                background-position: center;
                background-size: cover;
            }
        </style>
    </head>
    
    <body>
        <ul>
            
            <li class="website_name">
                My Tiffin
            </li>
            
            <ul>
                <li>
                    <a class="logout" href="http://localhost:8000/logout_user.php">Logout</a>
                </li>
                
                <li>
                    <a class="notification" href="http://localhost:8000/user_notifications.php">Today's Menu</a>
                </li>
                
                <li>
                     <a class="personal_details" href="http://localhost:8000/user_update_perdetails.php">Edit Account</a>
                </li>
                
                
                <li>
                    <a class="profile" href="http://localhost:8000/user_myprofile.php">My Profile</a>
                </li>
                
                <li>
                    <a class="home" href="http://localhost:8000/home_user.php">Home</a>
                </li>
            </ul>
        </ul>
    </body>
</html>



