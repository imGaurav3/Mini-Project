<?php
    include 'header2.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
    $provider_id = $_SESSION['views'];
    echo $provider_id;
    if(isset($_POST['notify']))
    {
        if(isset($_POST['l_roti']) && isset($_POST['d_roti']) && isset($_POST['l_rice']) && isset($_POST['d_rice']) && isset($_POST['l_sabji1']) && isset($_POST['d_sabji1']) && isset($_POST['l_sabji2']) && isset($_POST['d_sabji2']) && isset($_POST['l_salad']) && isset($_POST['d_salad']) && isset($_POST['l_sweet']) && isset($_POST['d_sweet']))
        {
            $l_roti = $_POST['l_roti'];
            $d_roti = $_POST['d_roti'];
            $l_sabji1 = $_POST['l_sabji1'];
            $d_sabji1 = $_POST['d_sabji1'];
            $l_sabji2 = $_POST['l_sabji2'];
            $d_sabji2 = $_POST['d_sabji2'];
            $l_rice = $_POST['l_rice'];
            $d_rice = $_POST['d_rice'];
            $l_salad = $_POST['l_salad'];
            $d_salad = $_POST['d_salad'];
            $l_sweet = $_POST['l_sweet'];
            $d_sweet = $_POST['d_sweet'];
            if(($option = $_POST['option'])=="yes")
            {
                $option = 1;
                $query_run = mysqli_query($db, "Call cancel_tiffins('$option','$provider_id')");
            }
            else
            {
                $option = 0;
                if(!empty($l_roti) && !empty($d_roti) && !empty($l_sabji1) && !empty($d_sabji1) && !empty($l_sabji2)  && !empty($d_sabji2) && !empty($l_rice) && !empty($d_rice) && !empty($l_salad) && !empty($d_salad) && !empty($l_sweet) && !empty($d_sweet))
                {
                    $query = "INSERT INTO `todays_menu` VALUES ('$provider_id','$l_roti','$d_roti','$l_sabji1','$d_sabji1','$l_sabji2','$d_sabji2','$l_rice','$d_rice','$l_salad','$d_salad','$l_sweet','$d_sweet','$option')";
                    if(($query_run = mysqli_query($db, $query)))
                        showMessage ("Menu Updated!!");
                    else
                        showMessage ("Could not update at this time!!");
                }
                else
                {
                    showMessage("All fields are compulsory!!");
                }
            }
        }
    }
?>

<html>
    <head>
        <style>
            .update 
            {
                background-color: green;
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
            h1
            {
                margin-left: 40px;
                margin-top: 15px;
                font-weight: bold;
                font-size: 40px;
            }
            .button
            {
                font-size: 30px;
                background-color: black;
                color: white;
            }
            
            table
            {
                font-size: 25px;
                
            }
            
            tr
            {
                height: 20px;
            }
            
            td
            {
                width: 300px;
            }
            
            .notifyall
            {
                font-size: 30px;
                background-color: black;
                color: white;
                border-radius: 7px;
            }
            
            .menu
            {
                font-size: 50px;
            }
        </style>
    </head>
    <body>
        <form action="provider_update_menu.php" method="POST">
        <br>
        <div class="background">
            <div class="transbox">
                <h1 class="menu"><u>Today's Menu!!!</u></h1>
                <br><br>
                <table>
                    <tr>
                        <td>
                            <h2>Lunch:</h2>
                        </td>
                        <td></td>
                        <td>
                            <h2>Dinner:</h2>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Roti:</h3>
                        </td>
                        <td>
                            <input type="text" class="l_roti" name="l_roti" placeholder="type of roti">
                        </td>
                        <td>
                            <h3>Roti:</h3>
                        </td>
                        <td>
                            <input type="text" class="d_roti" name="d_roti" placeholder="type of roti">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Sabji 1:</h3>
                        </td>
                        <td>
                            <input type="text" class="l_sabji1" name="l_sabji1" placeholder="name of sabji">
                        </td>
                        <td>
                            <h3>Sabji 1:</h3>
                        </td>
                        <td>
                            <input type="text" class="d_sabji1" name="d_sabji1" placeholder="name of sabji">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Sabji 2:</h3>
                        </td>
                        <td>
                            <input type="text" class="l_sabji2" name="l_sabji2" placeholder="name of sabji">
                        </td>
                        <td>
                            <h3>Sabji 2:</h3>
                        </td>
                        <td>
                            <input type="text" class="d_sabji2" name="d_sabji2" placeholder="name of sabji">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Type of Rice:</h3>
                        </td>
                        <td>
                            <input type="text" name="l_rice" placeholder="type of rice">
                        </td>
                        <td>
                            <h3>Type of Rice:</h3>
                        </td>
                        <td>
                            <input type="text" name="d_rice" placeholder="type of rice">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Salad </h3>
                        </td>
                        <td>
                            <input type="text" class="l_salad" name="l_salad" placeholder="yes or no">
                        </td>
                        <td>
                            <h3>Salad </h3>
                        </td>
                        <td>
                            <input type="text" class="d_salad" name="d_salad" placeholder="yes or no">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Sweet(if any) </h3>
                        </td>
                        <td>
                            <input type="text" class="l_sweet" name="l_sweet" placeholder="name of sweet or no">
                        </td>
                        <td>
                            <h3>Sweet(if any) </h3>
                        </td>
                        <td>
                            <input type="text" class="d_sweet" name="d_sweet" placeholder="name of sweet or no">
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>
                            <h3>Taking a day off??</h3>
                        </td>
                        <td>
                            <h2>Yes <input class="yes" name="option" value="yes" type="radio">    No <input class="no" value="no" name="option" type="radio" checked></h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="notifyall" type="submit" name="notify" value="Notify All">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </form>
    </body>
</html>

