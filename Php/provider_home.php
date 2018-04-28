<?php
    include 'header2.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
    $prov_id_login = $_SESSION['views'];
    
    $query = "SELECT `firstname` FROM `provider_data` WHERE `id` = '$prov_id_login'";
    $query_run = mysqli_query($db, $query);
    $query1 = "SELECT * FROM `tiffin_join` WHERE `provider_id` = '$prov_id_login'";
    $query1_run = mysqli_query($db, $query1);
    
    if(mysqli_num_rows($query_run)==1)
    {
        $row = mysqli_fetch_assoc($query_run);
        $firstname = $row ['firstname'];
        
    }
    $i=0;
    if(mysqli_num_rows($query1_run)>=1)
    {
        while($row1 = mysqli_fetch_assoc($query1_run))
        {
            $ids[$i] = $row1 ['user_id'];
            $i++;
        }
        $i = 0;
        foreach ($ids as $element)
        {
            $query2 = "SELECT * FROM `user_data` WHERE `id` = '$element'";
            $query1 = "SELECT * FROM `tiffin_join` WHERE `user_id` = '$element'";
            if(($query1_run = mysqli_query($db, $query1)) && ($query2_run = mysqli_query($db, $query2)))
            {
                $row1 = mysqli_fetch_assoc($query1_run);
                $row2 = mysqli_fetch_assoc($query2_run);
                $firstname1[$i] = $row2 ['firstname'];
                $lastname1[$i] = $row2 ['lastname'];
                $address1[$i] = $row2 ['address'];
                $mobile1[$i] = $row2 ['mobile'];
                $email1[$i] = $row2 ['email'];
                $one_two[$i] = $row1 ['radio_1'];
                $lunch_dinner[$i] = $row1 ['radio_2'];
                $full_half[$i] = $row1 ['full_half'];
                if($full_half[$i] == 1)
                {
                    $final2[$i] = "Full Tiffin for";
                }
                else
                {
                    $final2[$i] = "Half Tiffin for";
                }
                if($one_two[$i] == 0)
                {

                   
                    if($lunch_dinner[$i] == 1)
                    {
                        $final1[$i] = "1 Time -> Lunch";
                    }
                    else if($lunch_dinner[$i] == 0)
                    {
                        $final1[$i] = "1 Time -> Dinner";
                    }
                }
                else
                {

                    $final1[$i] = "2 Time";

                }
                $i++;
            }
           
             
        }
    }
    $ids[$i] = 0;
?>

<html>
    <head>
        <style>
            .home 
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
                margin-left: 70px;
                text-decoration: underline;
                font-weight: bold;
                font-size: 40px;
            }
            h2
            {
                text-align: center;
                font-weight: bold;
                font-size: 35px;
            }
            h3
            {
                font-size: 27px;
                font-weight: bold;
            }

            h4
            {
                font-size: 22px;
            }
            tr
            {
                height: 10px;
            }

            td
            {
                width: 300px;
            }
            .ar
            {
                width: 400px;
            }
        </style>
    </head>
    <body>
        <form action="provider_home.php" method="POST">
            <div class="background">
                <div class="transbox">
                    <table>
                        <?php
                            echo '<h1>Welcome '.$firstname.'!</h1>';
                            echo '<h2>My Users :</h2>';
                            $i = 0;
                            while ($ids[$i]!=0)
                            {
                                //$_SESSION['view'.$i] = $ids[$i];
                                echo "<tr><td><hr width=\"480%\"></td></tr>";
                                echo "<tr>";
                                echo "<td><h3>Name :</h3></td>";
                                echo "<td><h4>".$firstname1[$i].' '.$lastname1[$i]."</h4></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td><h3>Mobile No :</h3></td>";
                                echo "<td><h4>".$mobile1[$i]."</h4></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td><h3>Email :</h3></td>";
                                echo "<td><h4>".$email1[$i]."</h4></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td><h3>Address :</h3></td>";
                                echo "<td><h4>".$address1[$i]."</h4></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td><h3>Type :</h3><br></td>";
                                echo "<td class=\"ar\"><h4>".$final2[$i].' '.$final1[$i]."</h4></td>";
                                echo "</tr>";
                                
                                echo "<br>";

                                $i++;
                            }
                            echo "<tr><td><hr width=\"480%\"></td></tr>";

                        ?>
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>


